<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{   

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        $data = array(
            'title' => 'Login',
        );
        return view('v_login', $data);
    }
    public function login()
    {
        if ($this->validate([

            'email' => [
                'label'  => 'Email',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!'
                ],
            ],
        ])) {
            // jika valid 
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek = $this->ModelAuth->login($email, $password);
            if ($cek) {
                session()->set('log', true);
                session()->set('nama_user', $cek['nama_user']);
                session()->set('id_user', $cek['id_user']);
                session()->set('email', $cek['email']);
                session()->set('level', $cek['level']);
                session()->set('foto', $cek['foto']);   
                session()->set('id_dep', $cek['id_dep']);
                // session()->set('foto', $cek['foto']);
                if ($cek['level'] == 1) {
                    return redirect()->to(base_url('Home'));
                } else {
                    return redirect()->to(base_url('Arsip'));
                }
            } else {
                session()->setFlashdata('message', 'Login Gagal !! Email atau Passwords Salah!! ');
                return redirect()->to(base_url('Auth/index'));
            }
        } else {
            // jia tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/index'));
        }
    }
    public function logout()
    {
        session()->remove('log');
        session()->remove('nama');
        session()->remove('email');
        session()->remove('level');
        session()->remove('foto');
        session()->setFlashdata('message', 'Anda Telah Logout!!');
        return redirect()->to(base_url('Auth/index'));
    }
}
