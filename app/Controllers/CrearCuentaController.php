<?php 
namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;
use App\Models\CrearCuentaModel;

use CodeIgniter\HTTP\Request;
use PhpParser\Node\Stmt\Return_;

class CrearCuentaController extends Controller{
    /**   
     *
     *@var HTTP\IncomingRequest
     */

     protected $request;

    public function crearCuenta()
    {
         return view('cuentaUsuario/view_crearCuenta');
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
        public function index(){
            $userModel = new CrearCuentaModel();
            $data['USUARIOS']= $userModel->orderBy('IDUSUARIO', 'DESC')->findAll;
            return view('user_view', $data);
        }
        //add user form
        public function create(){
            return view('cuentaUsuario/view_crearCuenta');
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
           
            $userModel->insert($data);
            $aspiranteModel->insert($data);
            print_r($data);
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