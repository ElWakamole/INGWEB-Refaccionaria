<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MUsers;

class UserController extends Controller
{
    function __construct(){
        $this->middleware("auth");
        $this->middleware("isadmin");
    }

    public function getUsers(){
        $users = MUsers::getUsers();
        return view('admin.users.home')->with('users',$users);
    }
}
