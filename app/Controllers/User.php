<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ModelUser;
use App\Models\ModelDepartement;

class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelDepartement = new ModelDepartement();
    }

    public function index()
    {
        $data = [
            'judul' => 'User',
            'subjudul' => 'Data User',
            'page' => 'v_user',
            'menu' => 'user',
            'user' => $this->ModelUser->AllData(),
            'departement' => $this->ModelDepartement->AllData()
        ];
        return view('v_templates', $data);
    }

    public function Add()
    {
        $data = [
            'judul' => 'Tambah User',
            'subjudul' => 'Form Tambah User',
            'page' => 'user/v_add',
            'menu' => 'user',
            'user' => $this->ModelUser->AllData(),
            'departement' => $this->ModelDepartement->AllData()
        ];
        return view('v_templates', $data);
    }
    public function Insert()
    {
        if ($this->validate([

            'nama_user' => [
                'label'  => 'Nama User',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],
            'email' => [
                'label'  => 'E-mail',
                'rules'  => 'required|is_unique[tb_user.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                    'is_unique' => '{field} Sudah ada, harap Input {field} yang lain !!'
                ],
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',

                ],
            ],

            'id_dep' => [
                'label'  => 'Departemen',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',

                ],
            ],

            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',

                ],
            ],

            // 'foto' => [
            //     'label'  => 'Foto',
            //     'rules'  => 'uploaded[foto]|max_size[foto,2024]|mime_in[field_name,image/png,image/jpeg]',
            //     'errors' => [
            //         'uploaded' => '{field} Wajib diisi !!',
            //         'max_size' => 'Ukuran {field} maksimal 20024 KB !!',
            //         'mime_in' => 'Format {field} harus JPG/PNG !!',
            //     ],
            // ],
        ])) {
            // JIKA valid
            $foto = $this->request->getFile('foto');
            // merandom nama file\\
            $nama_file = $foto->getRandomName();
            $data = [
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'id_dep' => $this->request->getPost('id_dep'),
                'level' => $this->request->getPost('level'),
                'foto' => $nama_file,
            ];

            $foto->move('foto', $nama_file);  //direction upload file

            $this->ModelUser->AddData($data);
            session()->setFlashdata('message', 'Data berhasil ditambahkan!');
            return redirect()->to(base_url('User'));
        } else {
            // jia tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('User/Add'));
        }
    }
    public function Edit($id_user)
    {
        $data = [
            'judul' => 'Edit User',
            'subjudul' => 'Form Edit User',
            'page' => 'user/v_edit',
            'menu' => 'user',
            'user' => $this->ModelUser->DetailData($id_user),
            'departement' => $this->ModelDepartement->AllData()
        ];
        return view('v_templates', $data);
    }
    public function Update($id_user)
    {
        if ($this->validate([

            'nama_user' => [
                'label'  => 'Nama User',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ],

            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',

                ],
            ],

            'id_dep' => [
                'label'  => 'Departemen',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',

                ],
            ],

            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',

                ],
            ],

        ])) {
            // JIKA valid
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'password' => sha1($this->request->getPost('password')),
                    'id_dep' => $this->request->getPost('id_dep'),
                    'level' => $this->request->getPost('level'),
                    // 'foto' => $nama_file,
                ];

                // $foto->move('foto', $nama_file);  //direction upload file

                $this->ModelUser->Edit($data);
            } else {

                $user = $this->ModelUser->Detaildata($id_user);
                if ($user['foto'] != "") {
                    unlink('foto/' .  $user['foto']);
                }
                $nama_file = $foto->getRandomName();
                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'password' => $this->request->getPost('password'),
                    'id_dep' => $this->request->getPost('id_dep'),
                    'level' => $this->request->getPost('level'),
                    'foto' => $nama_file,
                ];

                $foto->move('foto', $nama_file);  //direction upload file

                $this->ModelUser->Edit($data);
            }
            // merandom nama file


            session()->setFlashdata('message', 'Data berhasil diupdate!');
            return redirect()->to(base_url('User'));
        } else {
            // jia tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('User/Edit' . $id_user));
        }
    }

    public function Delete($id_user)
    {
        $user = $this->ModelUser->Detaildata($id_user);
        if ($user['foto'] != "") {
            unlink('foto/' .  $user['foto']);
        }
        $data = [
            'id_user' => $id_user,
        ];

        $this->ModelUser->DeleteData($data);
        session()->setFlashdata('message', 'Data berhasil di hapus!');
        return redirect()->to(base_url('User'));
    }
}
