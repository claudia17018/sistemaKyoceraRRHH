<?php 
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\User;

class UsuarioModel extends Model{
    protected $table = 'solicitante';
    protected $primaryKey = 'IDSOLICITANTE';
    protected $useAutoIncrement = true;

    protected $createdField  = 'CREATED_AT';
    protected $updatedField  = 'UPDATED_AT';
    protected $useTimestamps = true;
    //protected $returnType = User::class;

    protected $allowedFields = ['IDUSUARIO','DUI','GENEROSOLICITANTE','NIT','PRIMERAPELLIDOSOLICITANTE','PRIMERNOMBRESOLICITANTE','SEGUNDOAPELLIDOSOLICITANTE','SEGUNDONOMBRESOLICITANTE','SOLICITANTEFECHANACIMIENTO'];
/*
    protected $afterInsert = ['storeUserInfo'];

	protected function storeUserInfo($data){
		$this->infoUser->IDSOLICITANTE = $data['IDUSUARIO'];
		$model = model('CrearCuentaModel');
		$model->insert($this->infoUser);
	}*/

      public function getSolicitanteBy(String $column, $value){
        $data = $this->where($column,$value)->first();
        return $data;
    }

    public function getSolicitanteByIdUser(String $idusuario,$id){
         $solicitante = $this->where($idusuario,$id)->first();
        return $solicitante;
    }
     
}