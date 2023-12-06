<?php

namespace App\Http\Controllers\Admin;

use App\Http\Clases\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MUsers;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
        $this->middleware("user.status");
        $this->middleware("isadmin");
    }

    public function getUsers($status)
    {
        if ($status == 'all') :
            $users = MUsers::getUsers();
        else :
            $users = MUsers::getUsersStatus($status);
        endif;
        return view('admin.users.home')->with('users', $users);
    }

    public function getUsersEdit($id)
    {
        $user = MUsers::getUserEdit($id);
        return view('admin.users.edit')->with('user', $user);
    }

    public function getUsersPermissions($id){
        $user = MUsers::getUserEdit($id);
        return view('admin.users.permissions')->with('user', $user);
    }

    public function postUsersPermissions(Request $request,$id){
        $permissions = [
            'dashboard' => $request->input('dashboard'),
            'products' => $request->input('products'),
        ];
        $permissions = json_encode($permissions);
        
        $user = new Users($id,null,null,null,null,null,$permissions,null,null,null);

        if(MUsers::postUsersPermissions($user)):
            return back()->with('message','Los permisos del usuario fueron actualizados')->with('typealert','success');
        else:
        endif;
    }
}
