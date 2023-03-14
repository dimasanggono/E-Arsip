<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function AllData()
    {
        return $this->db->table('tb_user')
            ->join('tbl_dep', 'tbl_dep.id_dep = tb_user.id_dep', 'left')
            ->orderBy('id_user', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function Detaildata($id_user)
    {
        return $this->db->table('tb_user')
            ->join('tbl_dep', 'tbl_dep.id_dep = tb_user.id_dep', 'left')
            ->where('id_user', $id_user)
            ->get()
            ->getRowArray();
    }
    public function AddData($data)
    {
        $this->db->table('tb_user')->insert($data);
    }
    public function Edit($data)
    {
        $this->db->table('tb_user')->where('id_user', $data['id_user'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tb_user')->delete($data);
    }
}
