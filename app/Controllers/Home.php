<?php

namespace App\Controllers;

use App\Models\ModelHome;

class Home extends BaseController
{

    public function __construct()
    {
        $this->ModelHome = new ModelHome();
    }

    public function index()
    {
        $data = [
            'judul' => 'Dasboard',
            'subjudul' => '',
            'total_arsip' => $this->ModelHome->total_arsip(),
            'total_kategori' => $this->ModelHome->total_kategori(),
            'total_dep' => $this->ModelHome->total_dep(),
            'total_user' => $this->ModelHome->total_user(),
            'page' => 'v_home',
            'menu' => 'dashboard'
        ];
        return view('v_templates', $data);
    }
    public function PrintCount()
    {
        $data = [
            'judul' => 'Laporan Data',
            'total_arsip' => $this->ModelHome->total_arsip(),
            'total_kategori' => $this->ModelHome->total_kategori(),
            'total_dep' => $this->ModelHome->total_dep(),
            'total_user' => $this->ModelHome->total_user(),
            'page' => 'Laporan/v_print_lap',
        ];
        return view('Laporan/v_template_print', $data);
    }
}
