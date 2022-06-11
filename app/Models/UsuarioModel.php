<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $table = 'solicitante';
    protected $primaryKey = 'IDSOLICITANTE';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['DUI','IDUSUARIO','GENEROSOLICITANTE','NIT','PRIMERAPELLIDOSOLICITANTE','PRIMERNOMBRESOLICITANTE','SEGUNDOAPELLIDOSOLICITANTE','SEGUNDONOMBRESOLICITANTE','SOLICITANTEFECHANACIMIENTO', 'UPDATED_AT'];
    
    public function getSolicitanteBy(String $column, $value){

    return $this->where($column,$value)->first();
    }
    
    public function getSolicitanteByIdUser(String $idusuario,$id){
         $solicitante = $this->where($idusuario,$id)->first();
        return $solicitante;
    }
}