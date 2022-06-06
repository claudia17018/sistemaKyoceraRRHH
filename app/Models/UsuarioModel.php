<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $table = 'solicitante';
    protected $primaryKey = 'IDSOLICITANTE';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = ['DUI','GENEROSOLICITANTE','NIT','PRIMERAPELLIDOSOLICITANTE','PRIMERNOMBRESOLICITANTE','SEGUNDOAPELLIDOSOLICITANTE','SEGUNDONOMBRESOLICITANTE','SOLICITANTEFECHANACIMIENTO'];
    
    public function getUsuarioBy(String $column, $value){

    return $this->where($column,$value)->first();
    }
}