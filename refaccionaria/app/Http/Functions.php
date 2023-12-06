<?php

function getModulesArray(){
    $modules = [
        "0"=> "Local 1",
        "1"=> "Local 2",
    ];
    
    return $modules;
}

function getRoleUserKey($id){
    $roles = ['0' => 'Usuario', '1' => 'Administrador'];
    return $roles[$id];
}

function getStatusUserKey($id){
    $status = ['0'=> 'Registrado','1'=> 'Verificado'];
    return $status[$id];
}