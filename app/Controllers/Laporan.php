<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelHome;

class Laporan extends BaseController
{

    public function __construct()
    {
        $this->ModelHome = new ModelHome();
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
