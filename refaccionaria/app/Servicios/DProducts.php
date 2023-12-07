<?php

namespace App\Servicios;
use Illuminate\Support\Facades\DB;
use App\Http\Clases\Products;

class DProducts{
    public static function postAddProducts(Products $products){
        return DB::insert("insert into products(local ,name, slug, tipo_id, img, price, stock, stock_min, stock_max, description, created_at) values (?,?,?,?,?,?,?,?,?,?,?)",
        [$products->getLocal(),
        $products->getName(),
        $products->getSlug(),
        $products->getTipo(),
        $products->getImg(),
        $products->getPrice(),
        $products->getStock(),
        $products->getStockMin(),
        $products->getStockMax(),
        $products->getDesciption(),
        date('Y-m-d H:i:s')]);
    }

    public static function getProducts(){
        return DB::select('select * from products where deleted_at is null order by id desc');
    }

    public static function getProduct($id){
        return DB::select('select * from products where id = ?',[$id]);
    }

    public static function postProductEdit($products){
        return DB::update("update products set name = ?, slug = ?, tipo_id = ?, img = ?, price = ?, stock = ?, stock_min = ?, stock_max = ?, description = ?, updated_at = ? where id = ?",
        [$products->getName(),
        $products->getSlug(),
        $products->getTipo(),
        $products->getImg(),
        $products->getPrice(),
        $products->getStock(),
        $products->getStockMin(),
        $products->getStockMax(),
        $products->getDesciption(),
        date('Y-m-d H:i:s'),
        $products->getId()]);
    }

    public static function getProductDelete($products){
        return DB::update('update products set deleted_at = ? where id = ?',[date('Y-m-d H:i:s'),$products->getId()]);
    }
}