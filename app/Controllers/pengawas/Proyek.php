<?php

namespace App\Controllers\Pengawas;

use CodeIgniter\RESTful\ResourceController;

class Proyek extends ResourceController
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
		return view('pengawas/proyek');
	}
	
	public function read()
    {
        $result = $this->model->asObject()->where('proyeks.pegawai_id', session()->get('uid'))->findAll();
        foreach ($result as $key => $proyek) {
            $proyek->progress = 0;
            $pekerjaans = $this->pekerjaan->asObject()->where('proyek_id', $proyek->id)->findAll();
            foreach ($pekerjaans as $key => $pekerjaan) {
                $details = $this->detail->asObject()->where('pekerjaan_id', $pekerjaan->id)->findAll();
                foreach ($details as $key => $detail) {
                    if($detail->status=='1'){
                        $proyek->progress += $pekerjaan->bobot * ($detail->bobot/100);
                    }
                }
            }
        }
        return $this->respond($result);
    }
}