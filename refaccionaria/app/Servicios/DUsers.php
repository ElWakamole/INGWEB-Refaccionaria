<?php

namespace App\Servicios;
use Illuminate\Support\Facades\DB;
use App\Http\Clases\Users;

class DUsers{
    public static function getUsers(){
        return DB::select('select * from users order by id desc');
    }
}