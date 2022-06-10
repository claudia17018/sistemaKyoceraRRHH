<?php 
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\User;

class UsuarioModel extends Model{
    protected $table = 'solicitante';
    protected $primaryKey = 'IDSOLICITANTE';
    protected $useAutoIncrement = true;
    //protected $returnType = User::class;

    protected $allowedFields = ['DUI','GENEROSOLICITANTE','NIT','PRIMERAPELLIDOSOLICITANTE','PRIMERNOMBRESOLICITANTE','SEGUNDOAPELLIDOSOLICITANTE','SEGUNDONOMBRESOLICITANTE','SOLICITANTEFECHANACIMIENTO'];
/*
    protected $afterInsert = ['storeUserInfo'];

	protected function storeUserInfo($data){
		$this->infoUser->IDSOLICITANTE = $data['IDUSUARIO'];
		$model = model('CrearCuentaModel');
		$model->insert($this->infoUser);
	}*/
     
}