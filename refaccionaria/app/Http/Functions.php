<?php

//Key Value from Json
function kvfj($json, $key)
{
    if ($json == null) :
        return null;
    else :
        $json = $json;
        $json = json_decode($json, true);
        if (array_key_exists($key, $json)) :
            return $json[$key];
        else :
            return null;
        endif;
    endif;
}

function getModulesArray()
{
    $modules = [
        "0" => "Local 1",
        "1" => "Local 2",
    ];

    return $modules;
}

function getRoleUserKey($id)
{
    $roles = ['0' => 'Usuario', '1' => 'Administrador'];
    if (is_null($id)) :
        return $roles;
    endif;
    return $roles[$id];
}

function getStatusUserKey($id)
{
    $status = ['0' => 'Registrado', '1' => 'Verificado'];
    if (is_null($id)):
        return $status;
    endif;
    return $status[$id];
}

function user_permissions(){
    $p =[
        'dashboard' => [
            'icon' => '<i class="fa-solid fa-house"></i>',
            'title'=> 'Modulo Dashboard',
            'key'=> [
                'dashboard' => 'Ver el dashboard',
                'dashboardstd' => 'Ver estadisticas',
            ],
        ],
        'products'=> [
            'icon'=> '<i class="fa-solid fa-box"></i>',
            'title'=> 'Modulo Productos',
            'key'=> [
                'products' => 'Ver los productos',
                'productsadd' => 'Agregar productos',
                'productsedit' => 'Editar los productos',
                'productsdelete' => 'Eliminar productos',
            ],
        ],
        'types'=> [
            'icon'=> '<i class="fa-solid fa-folder"></i>',
            'title'=> 'Modulo Tipos',
            'key'=> [
                'types'=> 'Ver los tipos',
                'typesadd'=> 'Agregar tipos',
                'typesedit'=> 'Editar tipos',
                'typesdelete'=> 'Eliminar tipos',
            ],
        ],
        'user'=> [
            'icon'=> '<i class="fa-solid fa-users"></i>',
            'title'=> 'Modulo Usuarios',
            'key'=> [
                'user'=> 'Ver lo usuarios',
                'useredit' => 'Editar usuarios',
                'userpermissions'=> 'Editar permisos de usuarios',
            ],
        ],
    ];

    return $p;
}
