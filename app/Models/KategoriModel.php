<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';

    public function saveKategori($data){
        $query = $this->db->table('kategori')->insert($data);
        return $query;
    }
 
    public function updateKategori($data, $id)
    {
        $query = $this->db->table('kategori')->update($data, array('id_kategori' => $id));
        return $query;
    }
 
    public function deleteKategori($id)
    {
        $query = $this->db->table('kategori')->delete(array('id_kategori' => $id));
        return $query;
    }

    public function getKategori($id_desa_rt)
    {
        $builder = $this->db->table('kategori');
        return $builder->where('id_desa_kategori',$id_desa_rt);
    }
}