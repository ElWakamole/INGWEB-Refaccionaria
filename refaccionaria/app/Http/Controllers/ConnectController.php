<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ConnectController extends Controller
{
    public function __construct(){
        $this->middleware("guest")->except(["getLogout"]);
    }

    public function getLogin(){
        return view("connect.login");
    }

    public function postLogin(Request $request){
        $rules = [
            "email"=> "required|email",
            "password"=> "required|min:8",
        ];

        $messages = [
            'email.required'=> 'Su correo es requerido',
            'email.email' => 'El formato de su correo es invalido',
            'password.required'=> 'Su NIP es requerido',
            'password.min'=> 'El NIP debe tener al menos 8 caracteres',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return redirect()->back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            if(!Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')],true)):
                return redirect()->back()->with('message','Credenciales incorrectas')->with('typealert','danger');
            else:
                return redirect('/');
            endif;
        endif;
    }
    public function getRegister(){
        return view("connect.register");
    }
    public function postRegister(Request $request){
        $rules = [
            'name' => 'required',
            'lastnameP' => 'required',
            'lastnameM' => 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:8',
            'passwordC'=> 'required|min:8|same:password',
            'address' => 'required',
            'phone'=> 'required|min:10|max:10',
        ];

        $messages = [
            'name.required' => 'Su nombre es requerido',
            'lastnameP.required'=> 'Su apellido paterno es requerido',
            'lastnameM.required'=> 'Su apellido materno es requerido',
            'email.required'=> 'Su correo es requerido',
            'email.email' => 'El formato de su correo es invalido',
            'email.unique' => 'Ya existe un usuario con este correo',
            'password.required'=> 'Su NIP es requerido',
            'password.min'=> 'El NIP debe tener al menos 8 caracteres',
            'passwordC.required'=> 'Su NIP de confirmacion es requerido',
            'passwordC.min'=> 'El NIP de confirmacion debe tener al menos 8 caracteres',
            'passwordC.same'=> 'El NIP de confirmacion debe coincidir',
            'address.required'=> 'Su domicilio es requerido',
            'phone'=> 'su numero de celular es requerido',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return redirect()->back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $user = new User();
            $user->name = e($request->input('name'));
            $user->lastnameP = e($request->input('lastnameP'));
            $user->lastnameM = e($request->input('lastnameM'));
            $user->email = e($request->input('email'));
            $user->password = hash::make($request->input('password'));
            $user->address = e($request->input('address'));
            $user->phone = e($request->input('phone'));

            if($user->save()):
                return redirect('/login')->with('message','su peticion de registro fue enviada exitosamente')->with('typealert','success');
            endif;
        endif;
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
}
