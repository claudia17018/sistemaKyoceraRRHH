<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $table = 'solicitante';
    protected $primaryKey = 'IDASPIRANTE';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['DUI','GENEROSOLICITANTE','NIT','PRIMERAPELLIDOSOLICITANTE','PRIMERNOMBRESOLICITANTE','SEGUNDOAPELLIDOSOLICITANTE','SEGUNDONOMBRESOLICITANTE','SOLICITANTEFECHANACIMIENTO'];
     
}