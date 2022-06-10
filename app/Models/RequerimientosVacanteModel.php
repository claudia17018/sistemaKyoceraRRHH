<?php 
namespace App\Models;

use CodeIgniter\Model;


class RequerimientosVacanteModel extends Model{
    protected $table      = 'requerimientosvacante';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $primaryKey = 'IDREQVACANTE';
    protected $allowedFields = ['IDVACANTE','EXPERIENCIALABORAL','NIVEL_ESTUDIO','GENEROCANDIDATO','EDADMINIMAREQUERIDA	','EDADMAXIMAREQUERIDA'];
}