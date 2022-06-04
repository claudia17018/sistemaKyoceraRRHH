<?php 
namespace App\Models;

use CodeIgniter\Model;

class VacantesModel extends Model{
    protected $table      = 'vacante';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $primaryKey = 'IDVACANTE';
    protected $allowedFields = ['NOMBREVACANTE','NUMEROVACANTES	','CREATED_AT'];
}