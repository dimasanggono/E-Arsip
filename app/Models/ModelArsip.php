<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelArsip extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_arsip')
            ->join('tbl_dep', 'tbl_dep.id_dep = tbl_arsip.id_dep', 'left')
            ->join('tb_user', 'tb_user.id_user = tbl_arsip.id_user', 'left')
            ->join('tb_kategori', 'tb_kategori.id_kategori = tbl_arsip.id_kategori', 'left')
            ->orderBy('id_arsip', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function DataBulanan($bulan, $tahun)
    {
        return $this->db->table('tbl_arsip')
            ->join('tbl_dep', 'tbl_dep.id_dep = tbl_arsip.id_dep', 'left')
            ->join('tb_user', 'tb_user.id_user = tbl_arsip.id_user', 'left')
            ->join('tb_kategori', 'tb_kategori.id_kategori = tbl_arsip.id_kategori', 'left')
            ->where('month(tbl_arsip.tgl_upload)', $bulan)
            ->where('year(tbl_arsip.tgl_upload)', $tahun)
            ->select('tbl_arsip.tgl_upload')
            ->groupBy('tbl_arsip.tgl_upload')
            ->get()->getResultArray();
    }

    public function NoArsip()
    { {
            $tgl = date('Ymd');
            $query = $this->db->query("SELECT MAX(RIGHT(no_arsip,3)) as no_urut from tbl_arsip where DATE(tgl_upload)='$tgl'");
            $hasil = $query->getRowArray();
            if ($hasil['no_urut'] > 0) {
                $temp = $hasil['no_urut'] + 1;
                $kd = sprintf("%04s", $temp);
            } else {
                $kd =   "001";
            }
            $no_arsip = date('Ymd') . '-'.  $kd;
            return $no_arsip;
        }
    }
    public function Detaildata($id_arsip)
    {
        return $this->db->table('tbl_arsip')
            ->join('tbl_dep', 'tbl_dep.id_dep = tbl_arsip.id_dep', 'left')
            ->join('tb_user', 'tb_user.id_user = tbl_arsip.id_user', 'left')
            ->join('tb_kategori', 'tb_kategori.id_kategori = tbl_arsip.id_kategori', 'left')
            ->where('id_arsip', $id_arsip)
            ->get()
            ->getRowArray();
    }
    public function AddData($data)
    {
        $this->db->table('tbl_arsip')->insert($data);
    }
    public function Edit($data)
    {
        $this->db->table('tbl_arsip')->where('id_arsip', $data['id_arsip'])->update($data);
    }
    public function Deletedata($data)
    {
        $this->db->table('tbl_arsip')->where('id_arsip', $data['id_arsip'])->delete($data);
    }
}
