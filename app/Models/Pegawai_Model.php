<?php
namespace App\Models;

use CodeIgniter\Model;


class Pegawai_Model extends Model {
	
    protected $table = 'pegawais';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['nama','alamat', 'tgl_lahir', 'tempat_lahir', 'email', 'no_telp', 'user_id'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}