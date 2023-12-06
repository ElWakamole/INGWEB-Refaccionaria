<?php

namespace App\Servicios;
use Illuminate\Support\Facades\DB;
use App\Http\Clases\Users;

class DUsers{
    public static function getUsersStatus($status){
        return DB::select('select * from users where status = ?',[$status]);
    }

    public static function getUsers(){
        return DB::select('select * from users order by id desc');
    }

    public static function getUserEdit($id){
        return DB::select('select * from users where id = ?',[$id]);
    }

    public static function postUsersPermissions($user){
        return DB::update('update users set permissions = ? where id =?', [$user->getPermissions(),$user->getId()]);
    }
}