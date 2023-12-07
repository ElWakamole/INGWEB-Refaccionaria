<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User, App\Models\MProducts;

class DashboardController extends Controller
{
    function __construct(){
        $this->middleware("auth");
        $this->middleware("user.status");
        $this->middleware("user.permissions");
        $this->middleware("isadmin");
    }

    public function getDashboard(){
        $users = User::count();
        $products = count(MProducts::getProducts());
        return view("admin.dashboard")->with("users",$users)->with("products",$products);
    }
}
