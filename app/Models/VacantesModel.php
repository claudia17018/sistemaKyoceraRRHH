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

    public function innerJoin(){
        $nombre = $this->db->query("SELECT * FROM vacante INNER JOIN requerimientosvacante ON vacante.IDVACANTE = requerimientosvacante.IDVACANTE");

        return $nombre->getResult();
    }
}
