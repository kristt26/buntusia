<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Libraries\Rest;

class Auth extends ResourceController
{
    protected $rest;
    public function __construct()
    {
        $this->rest = new Rest();
    }
    public function index()
    {
        return view("login");
    }

    public function login()
    {
        $session = session();
        $data = $this->request->getPost();
        $result = $this->rest->getRest($data['username'], $data['password']);
        if($result !== false){
            $result->data = (array)$result->data;
            $result->data['RoleUser'] = (array)$result->data['RoleUser'];
            $result->data['logged_in'] = true;
            $session->set($result->data);
                return redirect()->to('pembobotan');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_ur);
    }

    public function registrasi()
    {
        $role = $this->role->where('role', 'Customer')->first();
        $data = $this->request->getPost();
        if (count($data) > 0) {
            $pass = $data['password'];
            $data['password'] = base64_encode($this->encrypter->encrypt($pass));
            $this->user->insert($data);
            $data['users_id'] = $this->user->getInsertID();
            $this->customer->insert($data);
            $item = [
                "users_id" => $data['users_id'],
                "roles_id" => $role['id'],
            ];
            $this->userinroles->insert($item);
            return redirect()->to("/auth");
        } else {
            return view("registrasi");
        }
    }
}