<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Servicios\DUsers;
use App\Http\Clases\Users;

class MUsers extends Model
{
    use HasFactory;

    public static function getUsersStatus($status){
        $Usersjson = DUsers::getUsersStatus($status);
        $users = [];
        foreach ($Usersjson as $User){
            $users[] = new Users($User->id,$User->role,$User->name,$User->lastnameP,$User->lastnameM,$User->email,null,$User->address,$User->phone,$User->status);
        }
        return $users;
    }

    public static function getUsers(){
        $Usersjson = DUsers::getUsers();
        $users = [];
        foreach ($Usersjson as $User){
            $users[] = new Users($User->id,$User->role,$User->name,$User->lastnameP,$User->lastnameM,$User->email,null,$User->address,$User->phone,$User->status);
        }
        return $users;
    }

    public static function getUserEdit($id){
        $Userjson = DUsers::getUserEdit($id);
        foreach ($Userjson as $User){
            $users = new Users($User->id,$User->role,$User->name,$User->lastnameP,$User->lastnameM,$User->email,null,$User->address,$User->phone,$User->status);
        }
        return $users;
    }

    public static function postUsersPermissions($user){
        return DUsers::postUsersPermissions($user);
    }
}
