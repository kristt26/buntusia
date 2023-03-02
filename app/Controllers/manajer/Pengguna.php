<?php

namespace App\Controllers\Manajer;

use CodeIgniter\RESTful\ResourceController;

class Pengguna extends ResourceController
{
	protected $modelName = "App\Models\Users_Model";
	protected $format = "json";
	
    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->pegawai = new \App\Models\Pegawai_Model();
    }
	public function index()
	{
		return view('manajer/pengguna');
	}
	
	public function read()
    {
        $data = $this->model->select('users.id, users.username, users.role, users.status, pegawais.nama')->join('pegawais', 'users.id=pegawais.user_id')->findAll();
        return $this->respond($data);
    }
   
    public function put()
    {
        $data = $this->request->getJSON();
        try {
            $this->model->update($data->id, $data);
            return $this->respondUpdated($data);
        } catch (\Throwable $th) {
            $a = $th->getMessage();
            return fail($a);
        }
    }
}