<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class WargaModel extends Model
{
    protected $table = 'warga';

    public function saveWarga($data){
        $query = $this->db->table('warga')->insert($data);
        return $query;
    }

    public function updateWarga($data, $id)
    {
        $query = $this->db->table('warga')->update($data, array('id_warga' => $id));
        return $query;
    }

    public function deleteWarga($id)
    {
        $query = $this->db->table('warga')->delete(array('id_warga' => $id));
        return $query;
    }

}