<?php

namespace App\Controllers\Pengawas;

use CodeIgniter\RESTful\ResourceController;

class Home extends ResourceController
{
	// protected $modelName = "App\Models\PeriodeModel";
	// protected $format = "json";
	
	public function index()
	{
		return view('admin/home');
	}
	
	public function read()
    {
        return $this->respond($this->model->findAll());
    }
    public function post()
    {
        
    }
    public function put()
    {
        # code...
    }
    public function deleted($id=null)
    {
		return $this->respond($this->model->delete($id));
    }
}