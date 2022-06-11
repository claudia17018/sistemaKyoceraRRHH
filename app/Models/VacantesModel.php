<?php 
namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class VacantesModel extends Model{
    protected $table      = 'vacante';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $primaryKey = 'IDVACANTE';
    protected $allowedFields = ['CREATED_AT','DESCRIPCIONVACANTE','ESTADOVACANTE','IDAREA','IDPERSONALRECURSOSHUMANOS','NOMBREVACANTE','NUMEROVACANTES','REQUERIMIENTOSPROPIOSVACANTE','UPDATED_AT'];

    public function listarVacantes(){
        $nombre = $this->db->query("SELECT * FROM vacante");
        return $nombre->getResult();
       
    }
    public function buscar($bus){
        $db     =\Config\Database::connect();
        $builder=$db->table('vacante');
        //$vacantes = new VacantesModel();
        $builder->like('NOMBREVACANTE',$bus);
        
       $datos= $builder;

        
      
      
       
        
        //$quer=$builder->get('vacante');
        return $datos->get('vacante');

    }
}
