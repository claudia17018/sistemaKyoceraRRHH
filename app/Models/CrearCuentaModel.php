<?php 
namespace App\Models;

use CodeIgniter\Model;

class CrearCuentaModel extends Model{
    
    protected $table = 'usuario';    
    // Uncomment below if you want add primary key

    protected $primaryKey = 'IDUSUARIO';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['NOMBREUSUARIO','CONTRASENA'];
    protected $returnType = 'array';

	// Dates
	//protected $useTimestamps        = false;
	//protected $dateFormat           = 'datetime';
	//protected $createdField         = 'created_at';
	//protected $updatedField         = 'updated_at';
	//protected $deletedField         = 'deleted_at';

	// Validation
	//protected $validationRules      = [];
	//protected $validationMessages   = [];
	//protected $skipValidation       = false;
	//protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = ["beforeInsert"];
    

	protected function beforeInsert(array $data)
	{
		$data = $this->passwordHash($data);
		return $data;
	}

	protected function passwordHash(array $data)
	{
		if (isset($data['data']['CONTRASENA'])) {
			$data['data']['CONTRASENA'] = password_hash($data['data']['CONTRASENA'], PASSWORD_BCRYPT);
		}

		return $data;
	}
    /************************************************************/



    /*
    public function setCuenta(string $primerNombre, string $primerApellido, string $dui, string $fechaNacimiento, string $nivelAcademino, string $contraseña  ){

        $this->db->query("INSERT INTO solicitante ($primerNombre,$primerApellido, $dui, $fechaNacimiento, $nivelAcademino, $contraseña) VALUES");

    }*/

}