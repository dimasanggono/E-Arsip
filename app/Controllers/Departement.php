<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDepartement;

class Departement extends BaseController
{

    public function __construct()
    {
        $this->ModelDepartement = new ModelDepartement();
    }

    public function index()
    {
        $data = [
            'judul' => 'Departement',
            'subjudul' => 'Data Departement',
            'page' => 'v_departement',
            'menu' => 'Departement',
            'dep' => $this->ModelDepartement->Alldata(),
        ];
        return view('v_templates', $data);
    }

    public function AddData()
    {
        $data = [
            'nama_dep' => $this->request->getPost('nama_dep')
        ];
        $this->ModelDepartement->AddData($data);
        session()->setFlashdata('message', 'Data berhasil telah ditambahkan!');
        return redirect()->to(base_url('Departement'));
    }
    public function UpdateData($id_dep)
    {
        $data = [
            'id_dep' => $id_dep,
            'nama_dep' => $this->request->getPost('nama_dep')
        ];
        $this->ModelDepartement->UpdateData($data);
        session()->setFlashdata('message', 'Data berhasil diubah!');
        return redirect()->to(base_url('Departement'));
    }
    public function DeleteData($id_dep)
    {
        $data = [
            'id_dep' => $id_dep
        ];
        $this->ModelDepartement->DeleteData($data);
        session()->setFlashdata('message', 'Data berhasil dihapus!');
        return redirect()->to(base_url('Departement'));
    }
}
