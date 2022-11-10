<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table = 'pengumuman';

    public function savePengumuman($data)
    {
        $query = $this->db->table('pengumuman')->insert($data);
        return $query;
    }
    public function updatePengumuman($data, $id)
    {
        $query = $this->db->table('pengumuman')->update($data, array('id_pengumuman' => $id));
        return $query;
    }
    public function deletePengumuman($id)
    {
        $query = $this->db->table('pengumuman')->delete(array('id_pengumuman' => $id));
        return $query;
    }

}