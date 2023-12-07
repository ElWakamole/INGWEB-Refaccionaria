<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Servicios\DProducts;
use App\Http\Clases\Products;

class MProducts extends Model
{
    use HasFactory;
    
    public static function postProductAdd(Products $products){
        return DProducts::postAddProducts($products);
    }

    public static function getProducts(){
        $Productsjson = DProducts::getProducts();
        $products = [];
        foreach ($Productsjson as $Product){
            $products[] = new Products($Product->id,
            $Product->local,
            $Product->name,
            null,
            $Product->tipo_id,
            $Product->img,
            $Product->price,
            $Product->stock,
            $Product->stock_min,
            $Product->stock_max,
            $Product->description,null);
        }
        return $products;
    }
    public static function getProduct($id){
        $Productsjson = DProducts::getProduct($id);
        foreach ($Productsjson as $Product){
            $products = new Products($Product->id,
            $Product->local,
            $Product->name,
            null,
            $Product->tipo_id,
            $Product->img,
            $Product->price,
            $Product->stock,
            $Product->stock_min,
            $Product->stock_max,
            $Product->description,null);
        }
        return $products;
    }
    public static function postProductEdit($product){
        return DProducts::postProductEdit($product);
    }

    public static function getProductDelete($products){
        return DProducts::getProductDelete($products);
    }
}
