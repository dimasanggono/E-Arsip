<?php

namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

class ModelDepartement extends Model
{
    public function Alldata()
    {
        return $this->db->table('tbl_dep')
            ->get()->getResultArray();
    }
    public function AddData($data)
    {
        $this->db->table('tbl_dep')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_dep')->where('id_dep', $data['id_dep'])->update($data);
    }
    public function DeleteData($data)
    {
        $this->db->table('tbl_dep')->where('id_dep', $data['id_dep'])->delete($data);
    }
}
