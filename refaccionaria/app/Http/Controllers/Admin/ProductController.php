<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Clases\Products;
use App\Models\MProducts;
use Illuminate\Support\Str;
use App\Models\Types;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
        $this->middleware("user.status");
        $this->middleware("user.permissions");
        $this->middleware("isadmin");
    }

    public function getHome(Request $request)
    {
        $products = MProducts::getProducts();
        return view("admin.products.home")->with("products", $products);
    }

    public function getProductAdd()
    {
        $types = Types::where('module', Auth::user()->local)->pluck('name', 'id');
        return view("admin.products.add")->with("types", $types);
    }

    public function postProductAdd(Request $request)
    {
        $validator = $this->Validacion($request);

        if ($validator->fails()) :
            return redirect()->back()->withErrors($validator)->with('message', 'Se ha producido un error')
                ->with('typealert', 'danger')->withInput();
        else :

            $opImg = $this->Img($request);

            $products = new Products(
                null,
                Auth::user()->local,
                e($request->input('name')),
                Str::slug($request->input('name')),
                $request->input('type'),
                'refacciones/' . $opImg[1],
                $request->input('price'),
                $request->input('stock'),
                $request->input('stock_min'),
                $request->input('stock_max'),
                e($request->input('content')),
                null
            );

            if (MProducts::postProductAdd($products)) :
                if ($request->hasFile('img')) :
                    $fl = $request->img->storeAs($opImg[0], $opImg[1], 'uploads');
                    $img = Image::make($opImg[2]);
                    $img->fit(200, 200, function ($contraint) {
                        $contraint->upsize();
                    });
                    $img->save($opImg[3] . '/' . $opImg[0] . '/' . $opImg[1]);
                endif;
                return redirect('/admin/products')->with('message', 'Producto guardado exitosamente')->with('typealert', 'success');
            endif;
        endif;
    }
    public function Img($request)
    {
        $path = '/refacciones';
        $fileExt = trim($request->file('img')->getClientOriginalExtension());
        $upload_path = Config::get('filesystems.disks.uploads.root');
        $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
        $filename = $name . '.' . $fileExt;
        $file_file = $upload_path . '/' . $path . '/' . $filename;

        return [$path, $filename, $file_file, $upload_path];
    }

    public function getProductEdit($id)
    {
        $product = MProducts::getProduct($id);
        $types = Types::where('module', Auth::user()->local)->pluck('name', 'id');
        return view('/admin.products.edit')->with('product', $product)->with('types', $types);
    }

    public function postProductEdit(Request $request, $id)
    {
        $validator = $this->Validacion($request);

        if ($validator->fails()) :
            return redirect()->back()->withErrors($validator)->with('message', 'Se ha producido un error')
                ->with('typealert', 'danger')->withInput();
        else :

            $opImg = $this->Img($request);

            $products = new Products(
                $id,
                Auth::user()->local,
                e($request->input('name')),
                Str::slug($request->input('name')),
                $request->input('type'),
                'refacciones/' . $opImg[1],
                $request->input('price'),
                $request->input('stock'),
                $request->input('stock_min'),
                $request->input('stock_max'),
                e($request->input('content')),
                null
            );

            if (MProducts::postProductEdit($products)) :
                if ($request->hasFile('img')) :
                    $fl = $request->img->storeAs($opImg[0], $opImg[1], 'uploads');
                    $img = Image::make($opImg[2]);
                    $img->fit(200, 200, function ($contraint) {
                        $contraint->upsize();
                    });
                    $img->save($opImg[3] . '/' . $opImg[0] . '/' . $opImg[1]);
                endif;
                return redirect('/admin/products')->with('message', 'Producto actualizado exitosamente')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getProductDelete($id)
    {
        $products = new Products(
            $id,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null
        );

        if (MProducts::getProductDelete($products)) :
            return redirect('/admin/products')->with('message', 'Producto eliminado exitosamente')->with('typealert', 'success');
        endif;
    }

    public function Validacion($request)
    {
        $rules = [
            "name" => "required",
            "img" => "required|image",
            "price" => "required",
            "stock" => "required",
            "stock_min" => "required",
            "stock_max" => "required",
            "content" => "required",
        ];

        $messages = [
            "name.required" => "El nombre del producto es requerido",
            "img.required" => "La imagen del producto es requerida",
            "img.image" => "Debe ser una imagen",
            "price.required" => "El producto debe tener un precio",
            "stock.required" => "El stock debe ser definido",
            "stock_min.required" => "El stock minimo debe ser definido",
            "stock_max.required" => "El stock maximo debe ser definido",
            "content.required" => "Se require la descripcion del producto",
        ];

        return Validator::make($request->all(), $rules, $messages);
    }
}
