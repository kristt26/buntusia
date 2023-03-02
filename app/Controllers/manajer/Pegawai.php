<?php

namespace App\Controllers\Manajer;

use CodeIgniter\RESTful\ResourceController;

class Pegawai extends ResourceController
{
	protected $modelName = "App\Models\Pegawai_Model";
	protected $format = "json";
	
    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->user = new \App\Models\Users_Model();
    }
	public function index()
	{
		return view('manajer/pegawai');
	}
	
	public function read()
    {
        return $this->respond($this->model->findAll());
    }
    public function post()
    {
        $data = $this->request->getJSON();
        $this->db->transBegin();
        try {
            $this->user->insert(['username'=>$data->username, 'password'=>password_hash($data->password, PASSWORD_DEFAULT), 'role'=>$data->role]);
            $data->user_id = $this->user->getInsertID();
            $this->model->insert($data);
            $data->id = $this->model->getInsertID();
            if($this->db->transStatus()){
                $this->db->transCommit();
                return $this->respondCreated($data);
            }else{
                $this->db->transRollback();
                return $this->fail('error');
            }
        } catch (\Throwable $th) {
            $this->db->transRollback();
            $a = $th->getMessage();
            $this->fail($th->getMessage());
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