<?php
namespace App\Models;

use CodeIgniter\Model;


class Detail_Model extends Model {
	
    protected $table = 'details';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['pekerjaan_id','detail', 'bobot', 'status'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $db;
    protected $dt;


    public function __construct()
    {
       parent::__construct();
       $this->db = db_connect();
       $this->dt = $this->db->table($this->table);
    }
}