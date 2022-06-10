<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CrearCuentaModel;
use App\Models\UsuarioModel;

use App\DataBase\query;

use App\Entities\User;

class Usuario extends BaseController
{

    public function index()
    {
        if(!session()->logged_in){ 
            helper(['form']);
             return view('Auth/login');
        }else{
             return view('RRHH/index');
        }
       
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

        $model = new UserModel();
        $user = $model->getUserBy('NOMBREUSUARIO',$usuario);

        if($user){
             $pass= $user['CONTRASENA'];
             $authenticatePassword = password_verify($contrasena, $pass);

            if($authenticatePassword){
                 $ses_data = [
                    'id' => $user['IDUSUARIO'],
                    'usuario' => $user['NOMBREUSUARIO'],
                    'rol' => $user['IDROL'],
                    'logged_in' => TRUE
                ];

                $session -> set($ses_data);

                return view('RRHH/index');
                
            }else{
                return redirect()->back()
                ->with('msg',"Credenciales incorrectas");
            }
        }else{
                 return redirect()->back()
                ->with('msg',"Usuario no existe");
            }      
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('Auth/');
    }

    /********CREAR CUENTA*******************/
    public function crearCuenta()
    {
         return view('Auth/view_crearCuenta');
    }
    /*
    public function guardarAspirante(){
        $model = new CrearCuentaModel();
        $request = \Config\Services::request();
        $data = [
            "PRIMERNOMBRESOLICITANTE"=>$request->getPost('nombreAspirante'),
            "PRIMERAPELLIDOSOLICITANTE"=>$request->getPost('apellidoAspirante')
        ];

        $model->insert($data);
        echo json_encode(["msg"=>"creado"]);
    }*/

        //show userList
        public function index2(){
            $userModel = new CrearCuentaModel();
            $data['USUARIOS']= $userModel->orderBy('IDUSUARIO', 'DESC')->findAll;
            return view('user_view', $data);
        }
        //add user form
        public function create(){
            return view('Auth/view_crearCuenta');
        }
        /*********************** */
        //insert data 
        public function store(){
            $userModel = new CrearCuentaModel();
            $user = $userModel;
            $aspiranteModel = new UsuarioModel();
            
            $data = [
                'NOMBREUSUARIO' => $this->request->getVar('duiSolicitante'),
                'CONTRASENA' =>  $this->request->getVar('passUsuario'),
                'DUI' => $this->request->getVar('duiSolicitante'),
                'PRIMERNOMBRESOLICITANTE' => $this->request->getVar('priNomSolicitante'),
                'PRIMERAPELLIDOSOLICITANTE' => $this->request->getVar('priApeSolicitante'),
                'SEGUNDONOMBRESOLICITANTE' => $this->request->getVar('segNomSolicitante'),
                'SEGUNDOAPELLIDOSOLICITANTE' => $this->request->getVar('segApeSolicitante'),
                'NIT' => $this->request->getVar('nitAspirante'),
                'SOLICITANTEFECHANACIMIENTO' => $this->request->getVar('fechaNacimiento'),
                'GENEROSOLICITANTE' => $this->request->getVar('genero'),
            ];
            
             
            $query = $userModel->insert($data);
            $aspiranteModel->insert($data);
            
            //$query = $db->query('SELECT IDSOLICITANTE from solicitante');
            
            
          
            $user = new User($data);
            $userModel->addInfoUser($user);

           return $this->response->redirect(site_url('/Auth'));
        }


/*
        public function aspiranteGuardar(){
            $aspiranteModel = new UsuarioModel();
            $data = [
                'DUI' => $this->request->getVar('duiSolicitante'),
                'PRIMERNOMBRESOLICITANTE' => $this->request->getVar('priNomSolicitante'),
                'PRIMERAPELLIDOSOLICITANTE' => $this->request->getVar('priApeSolicitante'),
                'SEGUNDONOMBRESOLICITANTE' => $this->request->getVar('segNomSolicitante'),
                'SEGUNDOAPELLIDOSOLICITANTE' => $this->request->getVar('segApeSolicitante'),
                'NIT' => $this->request->getVar('nitAspirante'),
                'FECHANACIMIENTO' => $this->request->getVar('fechaNacimiento'),
                'GENEROSOLICITANTE' => $this->request->getVar('genero'),
            ];
            $aspiranteModel->insert($data);
            return $this->response->redirect(site_url('/'));

        }*/

    
}