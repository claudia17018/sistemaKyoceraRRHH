<?php 
namespace App\Models;

use CodeIgniter\Model;
use \DateTime;
use PhpParser\Node\Expr\Cast\String_;

class UsuarioModel extends Model{
    protected $table = 'solicitante';
    protected $primaryKey = 'IDSOLICITANTE';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['DUI','IDUSUARIO','GENEROSOLICITANTE','NIT','PRIMERAPELLIDOSOLICITANTE','PRIMERNOMBRESOLICITANTE','SEGUNDOAPELLIDOSOLICITANTE','SEGUNDONOMBRESOLICITANTE','SOLICITANTEFECHANACIMIENTO'];
     
     public function getSolicitanteBy(String $column, $value){
        $data = $this->where($column,$value)->first();
        return $data;
    }

    public function getSolicitanteByIdUser(String $idusuario,$id){
         $solicitante = $this->where($idusuario,$id)->first();
        return $solicitante;
    }

}