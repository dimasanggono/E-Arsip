<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    public function total_arsip()
    {
        return $this->db->table('tbl_arsip')->countAll();
    }
    public function total_kategori()
    {
        return $this->db->table('tb_kategori')->countAll();
    }
    public function total_dep()
    {
        return $this->db->table('tbl_dep')->countAll();
    }
    public function total_user()
    {
        return $this->db->table('tb_user')->countAll();
    }
    public function CountAll()
    {
        return $this->db->table('tb_user', 'tb_kategori', 'tbl_dep', 'tbl_arsip')->countAll();
    }
}
