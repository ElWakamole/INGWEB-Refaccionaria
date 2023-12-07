<?php

namespace App\Http\Controllers\Admin;

use App\Http\Clases\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MUsers;
use App\Models\Types;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
        $this->middleware("user.status");
        $this->middleware("user.permissions");
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
        $type = Types::find($id);
        return view('admin.users.edit')->with('user', $user)->with('type', $type);
    }

    public function postUsersEdit(Request $request, $id)
    {
        if ($request->input('role') == '1') :
            $permissions = [
                'dashboard' => 'true',
            ];
            $permissions = json_encode($permissions);
            $user = new Users($id, null, $request->input('role'), null, null, null, null, $permissions, null, null, $request->input('status'));
        else:
            $user = new Users($id, null, $request->input('role'), null, null, null, null, null, null, null, $request->input('status'));
        endif;

        if (MUsers::postUsersEdit($user)) :
            return back()->with('message', 'El usuario fue actualizados')->with('typealert', 'success');
        endif;
    }

    public function getUsersPermissions($id)
    {
        $user = MUsers::getUserEdit($id);
        return view('admin.users.permissions')->with('user', $user);
    }

    public function postUsersPermissions(Request $request, $id)
    {
        $permissions = json_encode($request->except(['_token']));

        $user = new Users($id, null, null, null, null, null, null, $permissions, null, null, null);

        if (MUsers::postUsersPermissions($user)) :
            return back()->with('message', 'Los permisos del usuario fueron actualizados')->with('typealert', 'success');
        endif;
    }
}
