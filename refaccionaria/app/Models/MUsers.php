<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Servicios\DUsers;
use App\Http\Clases\Users;

class MUsers extends Model
{
    use HasFactory;

    public static function getUsers(){
        $Usersjson = DUsers::getUsers();
        $users = [];
        foreach ($Usersjson as $User){
            $users[] = new Users($User->id,$User->name,$User->lastnameP,$User->lastnameM,$User->email,$User->address,$User->phone);
        }
        return $users;
    }
}
