<?php
namespace App\Models;

use CodeIgniter\Model;


class Proyek_Model extends Model {
	
    protected $table = 'proyeks';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['proyek','lokasi', 'waktu', 'nilai_kontrak', 'pegawai_id'];
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