<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

class Detail extends ResourceController
{
	protected $modelName = "App\Models\Detail_Model";
	protected $format = "json";
	
    public function __construct() {
        helper(['general']);
        $this->db = \Config\Database::connect();
        $this->pekerjaan = new \App\Models\Pekerjaan_Model();
    }
	public function index()
	{
		return view('admin/detail');
	}
	
	public function read()
    {
        $data['pekerjaan'] = $this->pekerjaan->find(dekrip($this->request->getGet('id')));
        $data['detail'] = $this->model->asObject()->where('pekerjaan_id', dekrip($this->request->getGet('id')))->findAll();
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
		return $this->respond($this->model->delete($id));
    }
}