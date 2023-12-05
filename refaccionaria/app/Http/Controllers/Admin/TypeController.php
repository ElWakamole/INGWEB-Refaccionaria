<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Types;

class TypeController extends Controller
{
    function __construct(){
        $this->middleware("auth");
        $this->middleware("isadmin");
    }

    public function getHome($module){
        $types = Types::where('module',$module)->orderBy('name','Asc')->get();
        return view("admin.types.home")->with("types",$types);
    }

    public function postTypeAdd(Request $request){
        $rules = [
            "name"=> "required",
            "icon"=> "required",
        ];

        $messages = [
            "name.required"=> "Se requiere un nombre para el tipo",
            "icon.required"=> "Se requiere un icono para el tipo",
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()):
            return redirect()->back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $t = new Types();
            $t->module = $request->module;
            $t->name = e($request->name);
            $t->slug = Str::slug($request->name);
            $t->icon = e($request->icon);
            if($t->save()):
                return redirect()->back()->with('message','Tipo registrado exitosamente')->with('typealert','success');
            endif;
        endif;
    }

    public function getTypeEdit($id){
        $type = Types::find($id);
        return view('admin.types.edit')->with('type',$type);
    }

    public function postTypeEdit(Request $request, $id){
        $rules = [
            "name"=> "required",
            "icon"=> "required",
        ];

        $messages = [
            "name.required"=> "Se requiere un nombre para el tipo",
            "icon.required"=> "Se requiere un icono para el tipo",
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()):
            return redirect()->back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $t = Types::find($id);
            $t->module = $request->module;
            $t->name = e($request->name);
            $t->slug = Str::slug($request->name);
            $t->icon = e($request->icon);
            if($t->save()):
                return redirect()->back()->with('message','Tipo registrado exitosamente')->with('typealert','success');
            endif;
        endif;
    }

    public function getTypeDelete($id){
        $t = Types::find($id);
        if($t->delete()):
            return redirect()->back()->with('message','Tipo borrado exitosamente')->with('typealert','success');
        endif;
    }
}
