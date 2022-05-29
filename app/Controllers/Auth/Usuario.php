<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Usuario extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('Auth/login');
    }

    public function signin(){
    
        if(!$this->validate([
            'username' => 'required',
            'password' => 'required'
        ])){
            return redirect()->back()
            ->with('errors',$this->validator->getErrors())
            ->withInput();
        }
        $session = session();
        $usuario = trim($this->request->getVar('username'));
        $contrasena = trim($this->request->getVar('password'));
        $model = model('UserModel');

        if(!$user = $model->getUserBy('NOMBREUSUARIO',$usuario)){
             return redirect()->back()
                ->with('msg',"Usuario no existe");
        }
        
        $ses_data = [
                    'id' => $user['IDUSUARIO'],
                    'usuario' => $user['NOMBREUSUARIO'],
                    'rol' => $user['IDROL'],
                    'logged_in' => TRUE
                ];

        $session -> set($ses_data);

        return view('RRHH/index');
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('Auth/login');
    }
    
}