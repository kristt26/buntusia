<?php

namespace App\Controllers\Manajer;

use CodeIgniter\RESTful\ResourceController;

class Proyek extends ResourceController
{
	protected $modelName = "App\Models\Proyek_Model";
	protected $format = "json";
	
    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->pegawai = new \App\Models\Pegawai_Model();
    }
	public function index()
	{
		return view('manajer/proyek');
	}
	
	public function read()
    {
        $data['proyek'] = $this->model->select('proyeks.*, pegawais.nama')->join('pegawais', 'pegawais.id=proyeks.pegawai_id', 'left')->findAll();
        $data['pegawai'] = $this->pegawai->findAll();
        return $this->respond($data);
    }
    public function post()
    {
        $data = $this->request->getJSON();
        try {
            $this->model->insert($data);
            $data->id = $this->model->getInsertID();
            return $this->respondCreated($data);
        } catch (\Throwable $th) {
            $a = $th->getMessage();
            return $this->fail($a);
        }
    }
    public function put()
    {
        $data = $this->request->getJSON();
        $this->model->update($data->id, $data);
        return $this->respondUpdated($data);
    }
    public function deleted($id=null)
    {
        $pegawai = $this->model->find($id);
        $this->user->delete($pegawai['user_id']);
        $this->model->delete($id);
		return $this->respond(true);
    }
}