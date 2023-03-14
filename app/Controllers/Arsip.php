<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelArsip;
use App\Models\ModelDepartement;
use App\Models\ModelKategori;

class Arsip extends BaseController
{

    public function __construct()
    {
        $this->ModelArsip = new ModelArsip();
        $this->ModelKategori = new ModelKategori();
        $this->ModelDepartement = new ModelDepartement();
    }

    public function index()
    {
        $data = array(
            "judul" => "Home",
            'menu' => 'home',
            'submenu' => '',
            'isi' => "Arsip/v_home",
        );
        return view('v_index', $data);
    }
    public function DetailData()
    {
        $data = array(
            "judul" => "Arsip",
            'arsip' => $this->ModelArsip->AllData(),
            'menu' => 'arsip',
            'submenu' => 'data-arsip',
            'isi' => "Arsip/v_arsip",
        );
        return view('v_index', $data);
    }
    public function add()
    {
        $data = array(
            "judul" => "Add Arsip",
            'kategori' => $this->ModelKategori->alldata(),
            'departemen' => $this->ModelDepartement->alldata(),
            'no_arsip' => $this->ModelArsip->NoArsip(),
            'menu' => 'arsip',
            'submenu' => 'buat-arsip',
            'isi' => "Arsip/v_add",
        );
        return view('v_index', $data);
    }
    public function Insert()
    {
        if ($this->validate([

            'nama_file' => [
                'label'  => 'Nama Arsip',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'file_arsip' => [
                'label'  => 'File Arsip',
                'rules'  => 'uploaded[file_arsip]|max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi !!',
                    'max_size' => 'Ukuran {field} maksimal 1024 KB !!',
                    'ext_in' => 'Format {field} harus .PDF !!'

                ],
            ],
        ])) {
            // JIKA valid
            $file_arsip = $this->request->getFile('file_arsip');
            // ukuran file 
            $ukuran_file = $file_arsip->getSize('kb');
            // merandom nama file
            $nama_file = $file_arsip->getRandomName();
            $data = [
                'no_arsip' => $this->request->getPost('no_arsip'),
                'nama_file' => $this->request->getPost('nama_file'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tgl_upload' => date('y-m-d'),
                'tgl_update' => date('y-m-d'),
                'id_dep' => session()->get('id_dep'),
                'id_user' => session()->get('id_user'),
                // 'level' => $this->request->getPost('level'),
                'file_arsip' => $nama_file,
                'ukuran_file' => $ukuran_file,
            ];

            $file_arsip->move('file_arsip', $nama_file);  //direction upload file

            $this->ModelArsip->AddData($data);
            session()->setFlashdata('message', 'Data berhasil ditambahkan!');
            return redirect()->to(base_url('Arsip/DetailData'));
        } else {
            // jia tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Arsip/Add'));
        }
    }
    public function Edit($id_arsip)
    {
        $data = array(
            "judul" => "Edit Arsip ",
            'kategori' => $this->ModelKategori->alldata(),
            'arsip' => $this->ModelArsip->Detaildata($id_arsip),
            'menu' => '',
            'submenu' => '',
            'isi' => "arsip/v_edit",
        );
        return view('v_index', $data);
    }
    public function Update($id_arsip)
    {
        if ($this->validate([

            'nama_file' => [
                'label'  => 'Nama Arsip',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'file_arsip' => [
                'label'  => 'File Arsip',
                'rules'  => 'max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1024 KB !!',
                    'ext_in' => 'Format {field} harus .PDF !!'

                ],
            ],
        ])) {
            // JIKA valid
            $file_arsip = $this->request->getFile('file_arsip');
            if ($file_arsip->getError() == 4) {
                $data = [
                    'id_arsip' => $id_arsip,
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'nama_file' => $this->request->getPost('nama_file'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('d-m-y'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),

                ];
                $this->ModelArsip->Edit($data);
            } else {
                $arsip = $this->ModelArsip->Detaildata($id_arsip);
                if ($arsip['file_arsip'] != "") {
                    unlink('file_arsip/' .  $arsip['file_arsip']);
                }
                // ukuran file 
                $ukuran_file = $file_arsip->getSize('kb');
                // merandom nama file
                $nama_file = $file_arsip->getRandomName();
                $data = [
                    'id_arsip' => $id_arsip,
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'nama_file' => $this->request->getPost('nama_file'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('y-m-d'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                    'file_arsip' => $nama_file,
                    'ukuran_file' => $ukuran_file,
                ];
                $file_arsip->move('file_arsip', $nama_file);  //direction upload file
                $this->ModelArsip->Edit($data);
            }
            session()->setFlashdata('message', 'Data berhasil diubah!');
            return redirect()->to(base_url('Arsip/DetailData'));
        } else {
            // jia tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Arsip/Edit/' . $id_arsip));
        }
    }
    public function Deletedata($id_arsip)
    {

        $arsip = $this->ModelArsip->Detaildata($id_arsip);
        if ($arsip['file_arsip'] != "") {
            unlink('file_arsip/' .  $arsip['file_arsip']);
        }
        $data = [
            'id_arsip' => $id_arsip,
        ];

        $this->ModelArsip->Deletedata($data);
        session()->setFlashdata('message', 'Data berhasil di hapus!');
        return redirect()->to(base_url('Arsip/DetailData'));
    }


    public function Viewpdf($id_arsip)
    {
        $data = array(
            "judul" => "View Arsip",
            'arsip' => $this->ModelArsip->Detaildata($id_arsip),
            'menu' => '',
            'submenu' => '',
            'isi' => "Arsip/v_viewpdf",
        );
        return view('v_index', $data);
    }
    public function DetailDataAdmin()
    {
        $data = array(
            'judul' => 'Arsip',
            'subjudul' => 'Data Arsip',
            'page' => 'Arsip/v_admin_arsip',
            'menu' => 'Arsip',
            'arsip' => $this->ModelArsip->AllData(),
        );
        return view('v_templates', $data);
    }

    public function AddData()
    {
        $data = array(
            'judul' => 'Arsip',
            'kategori' => $this->ModelKategori->alldata(),
            'departemen' => $this->ModelDepartement->alldata(),
            'no_arsip' => $this->ModelArsip->NoArsip(),
            'subjudul' => 'Form Tambah Arsip',
            'page' => 'Arsip/v_add_data',
            'menu' => 'Arsip',
        );
        return view('v_templates', $data);
    }

    public function InsertData()
    {
        if ($this->validate([

            'nama_file' => [
                'label'  => 'Nama Arsip',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'file_arsip' => [
                'label'  => 'File Arsip',
                'rules'  => 'uploaded[file_arsip]|max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi !!',
                    'max_size' => 'Ukuran {field} maksimal 1024 KB !!',
                    'ext_in' => 'Format {field} harus .PDF !!'

                ],
            ],
        ])) {
            // JIKA valid
            $file_arsip = $this->request->getFile('file_arsip');
            // ukuran file 
            $ukuran_file = $file_arsip->getSize('kb');
            // merandom nama file
            $nama_file = $file_arsip->getRandomName();
            $data = [
                'no_arsip' => $this->request->getPost('no_arsip'),
                'nama_file' => $this->request->getPost('nama_file'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tgl_upload' => date('y-m-d'),
                'tgl_update' => date('y-m-d'),
                'id_dep' => session()->get('id_dep'),
                'id_user' => session()->get('id_user'),
                // 'level' => $this->request->getPost('level'),
                'file_arsip' => $nama_file,
                'ukuran_file' => $ukuran_file,
            ];

            $file_arsip->move('file_arsip', $nama_file);  //direction upload file

            $this->ModelArsip->AddData($data);
            session()->setFlashdata('message', 'Data berhasil ditambahkan!');
            return redirect()->to(base_url('Arsip/DetailDataAdmin'));
        } else {
            // jia tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Arsip'));
        }
    }

    public function EditData($id_arsip)
    {
        $data = array(
            "judul" => "Edit Arsip ",
            'kategori' => $this->ModelKategori->alldata(),
            'arsip' => $this->ModelArsip->Detaildata($id_arsip),
            'subjudul' => 'Form Edit Arsip',
            'page' => 'Arsip/v_edit_data',
            'menu' => 'Arsip',
        );
        return view('v_templates', $data);
    }
    public function UpdateData($id_arsip)
    {
        if ($this->validate([

            'nama_file' => [
                'label'  => 'Nama Arsip',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'file_arsip' => [
                'label'  => 'File Arsip',
                'rules'  => 'max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1024 KB !!',
                    'ext_in' => 'Format {field} harus .PDF !!'

                ],
            ],
        ])) {
            // JIKA valid
            $file_arsip = $this->request->getFile('file_arsip');
            if ($file_arsip->getError() == 4) {
                $data = [
                    'id_arsip' => $id_arsip,
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'nama_file' => $this->request->getPost('nama_file'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('d-m-y'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),

                ];
                $this->ModelArsip->Edit($data);
            } else {
                $arsip = $this->ModelArsip->Detaildata($id_arsip);
                if ($arsip['file_arsip'] != "") {
                    unlink('file_arsip/' .  $arsip['file_arsip']);
                }
                // ukuran file 
                $ukuran_file = $file_arsip->getSize('kb');
                // merandom nama file
                $nama_file = $file_arsip->getRandomName();
                $data = [
                    'id_arsip' => $id_arsip,
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'nama_file' => $this->request->getPost('nama_file'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('y-m-d'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                    'file_arsip' => $nama_file,
                    'ukuran_file' => $ukuran_file,
                ];
                $file_arsip->move('file_arsip', $nama_file);  //direction upload file
                $this->ModelArsip->Edit($data);
            }
            session()->setFlashdata('message', 'Data berhasil diubah!');
            return redirect()->to(base_url('Arsip/DetailDataAdmin'));
        } else {
            // jia tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Arsip' . $id_arsip));
        }
    }
    public function Delete($id_arsip)
    {

        $arsip = $this->ModelArsip->Detaildata($id_arsip);
        if ($arsip['file_arsip'] != "") {
            unlink('file_arsip/' .  $arsip['file_arsip']);
        }
        $data = [
            'id_arsip' => $id_arsip,
        ];

        $this->ModelArsip->Deletedata($data);
        session()->setFlashdata('message', 'Data berhasil di hapus!');
        return redirect()->to(base_url('Arsip/DetailDataAdmin'));
    }

    public function ViewpdfAdmin($id_arsip)
    {
        $data = array(
            "judul" => "View Arsip",
            'arsip' => $this->ModelArsip->Detaildata($id_arsip),
            'subjudul' => 'View Arsip',
            'page' => 'Arsip/v_viewpdf_admin',
            'menu' => 'Arsip',
        );
        return view('v_templates', $data);
    }
}
