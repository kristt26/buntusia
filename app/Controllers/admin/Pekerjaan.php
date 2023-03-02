<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

class Pekerjaan extends ResourceController
{
	protected $modelName = "App\Models\Pekerjaan_Model";
	protected $format = "json";
	
    public function __construct() {
        helper(['general']);
        $this->db = \Config\Database::connect();
        $this->proyek = new \App\Models\Proyek_Model();
        $this->detail = new \App\Models\Detail_Model();
    }
	public function index()
	{
		return view('admin/pekerjaan');
	}
	
	public function read()
    {
        $data['proyek'] = $this->proyek->find(dekrip($this->request->getGet('id')));
        $data['pekerjaan'] = $this->model->asObject()->where('proyek_id', dekrip($this->request->getGet('id')))->findAll();
        foreach ($data['pekerjaan'] as $key => $pekerjaan) {
            $pekerjaan->detail = $this->detail->where('pekerjaan_id', $pekerjaan->id)->findAll();
        }        
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