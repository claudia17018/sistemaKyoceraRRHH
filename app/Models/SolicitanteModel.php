<?php 
namespace App\Models;

use CodeIgniter\Model;


class SolicitanteModel extends Model{
    protected $table = 'solicitante';
    protected $primaryKey = 'IDSOLICITANTE';
  
    protected $allowedFields = ['DUI','IDUSUARIO','GENEROSOLICITANTE','NIT','PRIMERAPELLIDOSOLICITANTE','PRIMERNOMBRESOLICITANTE','SEGUNDOAPELLIDOSOLICITANTE','SEGUNDONOMBRESOLICITANTE','SOLICITANTEFECHANACIMIENTO', 'UPDATED_AT'];
}