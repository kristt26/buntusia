<?php

namespace App\Controllers\Pengawas;

use CodeIgniter\RESTful\ResourceController;

class Monitoring extends ResourceController
{
	protected $modelName = "App\Models\Proyek_Model";
	protected $format = "json";
	
    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->pekerjaan = new \App\Models\Pekerjaan_Model();
        $this->detail = new \App\Models\Detail_Model();
    }
	public function index()
	{
		return view('pengawas/monitoring');
	}
	
	public function read()
    {
        $result = $this->model->asObject()->where('proyeks.pegawai_id', session()->get('uid'))->findAll();
        foreach ($result as $key => $proyek) {
            $proyek->pekerjaans = $this->pekerjaan->asObject()->where('proyek_id', $proyek->id)->findAll();
            foreach ($proyek->pekerjaans as $key => $pekerjaan) {
                $pekerjaan->details = $this->detail->asObject()->where('pekerjaan_id', $pekerjaan->id)->findAll();
                foreach ($pekerjaan->details as $key => $detail) {
                    if($detail->status=='1'){
                        $detail->checked = true;
                    }else{
                        $detail->checked = false;
                    }
                }
            }
        }
        return $this->respond($result);
    }

    public function put()
    {
        $data = $this->request->getJSON();
        $this->detail->update($data->id, $data);
        return $this->respondUpdated($data);
    }
}