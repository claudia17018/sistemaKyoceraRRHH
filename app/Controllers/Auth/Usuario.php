<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CrearCuentaModel;
use App\Models\UsuarioModel;
use App\Models\Medioscontacto;
use App\Models\DatosModel;
use App\DataBase\query;

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
                if($session->rol==1){
                    return view('RRHH/index');
                }else{
                    return view('Plantilla/baseSolicitante');
                }
               
                
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
        public function storeVal(){
            $validation = service('validation');
            $input = $this->validate([
                'priNomSolicitante' => 'required|alpha_space',
                'segNomSolicitante' => 'required|alpha_space',
                'priApeSolicitante' => 'required|alpha_space',
                'segApeSolicitante' => 'required|alpha_space',
                'correoAspirante' => 'required|valid_email|is_unique[medioscontacto.CONTACTOSOLICITANTE]',
                'passUsuario' => 'required|matches[contraseñaConfirmar]',

            ]);

            $user = new UsuarioModel();

            if(!($validation->withRequest($this->request)->run())){
                //dd($validation->getErrors());
                return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
            
            }
            
        }

        //insert data 
        public function store(){
            /****************************************************/
            $db     =\Config\Database::connect();
            $builder=$db->table('datos');
            /*****************************************************/

            $this->storeVal();

            $userModel = new CrearCuentaModel();
            $n=1;
            $user = $userModel;
            $aspiranteModel = new UsuarioModel();
            
            $data = [
                'NOMBREUSUARIO' => $this->request->getVar('duiSolicitante'),
                'CONTRASENA' =>  $this->request->getVar('passUsuario'),
                'IDROL'=>$n,
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
            $campo = 'IDUSUARIO';
            $tabla = 'solicitante';
            //Recupera el ultimo id Insertado :VVVVVVVV
            $idUser = $aspiranteModel->getInsertID();

            //inserta la llave foranea de usuario en la tabla de solicitante
            $this->insertarForaneasUsuario($aspiranteModel, $idUser, $campo, $tabla);
            
            $this->insertarTitulo($idUser);
            $this->insertarCorreo($idUser);
            print_r($data);
            //$query = $db->query('SELECT IDSOLICITANTE from solicitante');    
          
           return $this->response->redirect(site_url('/Auth'));
        }

        //Insertar llaves para usuario y solicitante
        public function insertarForaneasUsuario($builder, $id, $campo, $tabla){
            $db     =\Config\Database::connect();
            $builder=$db->table($tabla);

            $data=[
                $campo => $id,
            ];
            $builder->where('IDSOLICITANTE=',$id);
            $builder->update($data);
        }

        //Insertar foraneas generico 
        public function insertarForaneaGenerico($builder, $id, $campo, $tabla, $condicion){
            $db     =\Config\Database::connect();
            $builder=$db->table($tabla);

            $data=[
                $campo => $id,
            ];
            $builder->where($condicion,$id);
            $builder->update($data);
        }

        //Insertar titulo//
        public function insertarTitulo($id){
            $archivo = $this->request->getFile('tituloAspirante');

            if($archivo){

                if($archivo->isValid() && !($archivo->hasMoved())){
                    
                    $validated1 = $this->validate([
                        'userFile' =>[
                           'rules'=>'uploaded[tituloAspirante]',
                            'mime_in[image, image/pdf]'
                        ]
                    ]);
                    if($validated1){
                        echo "ok";
    
                    }else{
    
                        var_dump($this->validator->listErrors());        
    
                        return false;
                    }
                    $newName1 = $archivo->getRandomName();

                    $archivo->move(WRITEPATH.'uploads/titulos',$newName1);

                    /**Enviar a la base**/
                    $userDatos = new DatosModel();

                    $data = [
                        'URLTITULOACADEMICO' => $newName1,
                        'IDSOLICITANTE' => $id,
                    ];
                    $userDatos->insert($data);
                    
                     return $ultimoID = $userDatos->getInsertID();

                }
            }

        }

        public function insertarCorreo($id){
            $contacto = new Medioscontacto();
            $data = [
                'CONTACTOSOLICITANTE' => $this->request->getVar('correoAspirante'),
                'IDSOLICITANTE' => $id,
            ];

            $contacto->insert($data);
            return $contacto->getInsertID();
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