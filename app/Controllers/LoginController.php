<?php

namespace App\Controllers;

use App\Libraries\Rest;
use App\Libraries\Service_Lib;

class LoginController extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form', 'general']);
        $this->request = \Config\Services::request();
        $this->validation = \Config\Services::validation();
        $this->users = new \App\Models\Users_Model();
        $this->pegawai = new \App\Models\Pegawai_Model();
        $this->service_lib = new Service_Lib();
    }

    public function index()
    {
        $this->users->check();
        if (session()->get('isLoggedIn') == true) {
            if (session()->get('level') == "Administrator") {
                return redirect()->to(base_url('admin/home'));
            }else {
                return redirect()->to(base_url('pengawas/home'));
            }

        }
        return view('login');
    }

    public function check()
    {
        $username 	= $this->request->getPost('username');
		$password 	= $this->request->getPost('password');

		$data = [
			'username' => $username,
			'password' => $password
		];

		if ($this->validation->run($data, 'loginUser') == FALSE){
            session()->setFlashdata('errors', 'Username, Password dan Akses User wajib diisi');
            return redirect()->to(base_url());
        } else {
        	$query = $this->users->where(['username'=> $username])->first();
        	if ($query!=''){
                if($query['status']=='1'){
                    if (password_verify($password, $query['password'])){
                        $pegawai = $this->pegawai->where('user_id', $query['id'])->first();
                        $session = [
                                'uid'     	 => $pegawai['id'],
                                'username'   => $query['username'],
                                'nama'       => $pegawai['nama'],
                                'level'      => $query['role'],
                                'isLoggedIn' => TRUE
                        ];
                        if ($query['deleted_at'] == NULL) {
                            session()->set($session);
                            if($query['role']=='Adminsistrator'){
                                return redirect()->to(base_url('admin'));
                            }else if($query['role']=='Manajer'){
                                return redirect()->to(base_url('manajer'));
                            }else{
                                return redirect()->to(base_url('pengawas'));
                            }
                        } else {
                            session()->setFlashdata('errors', 'Akun tidak aktif');
                            return redirect()->to(base_url('login'));	
                        }
                    } else {
                        session()->setFlashdata('errors', 'Username atau Password salah');
                        return redirect()->to(base_url('login'));
                    }
                }else{
                    session()->setFlashdata('errors', 'Akun anda tidak aktif');
                    return redirect()->to(base_url());
                }
        	} else {
        		session()->setFlashdata('errors', 'Akun anda belum terdaftar');
                return redirect()->to(base_url());
        	}
        }

    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }


}