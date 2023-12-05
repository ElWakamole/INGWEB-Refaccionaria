<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct(){
        $this->middleware("auth");
        $this->middleware("isadmin");
    }

    public function getHome(Request $request){
       return view("admin.products.home");
    }

    public function getProductAdd(){
        return view("admin.products.add");
    }
}
