<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;

class Kategori extends BaseController
{

    public function __construct()
    {
        $this->ModelKategori = new ModelKategori();
    }

    public function index()
    {
        $data = [
            'judul' => 'Kategori',
            'subjudul' => 'Data Kategori',
            'page' => 'v_kategori',
            'menu' => 'Kategori',
            'kategori' => $this->ModelKategori->AllData()
        ];
        return view('v_templates', $data);
    }
    public function AddData()
    {
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ];
        $this->ModelKategori->AddData($data);
        session()->setFlashdata('message', 'Data berhasil ditambah!');
        return redirect()->to(base_url('Kategori'));
    }
    public function UpdateData($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ];
        $this->ModelKategori->UpdateData($data);
        session()->setFlashdata('message', 'Data berhasil diubah!');
        return redirect()->to(base_url('Kategori'));
    }
    public function DeleteData($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori
        ];
        $this->ModelKategori->DeleteData($data);
        session()->setFlashdata('message', 'Data berhasil dihapus!');
        return redirect()->to(base_url('Kategori'));
    }
}
