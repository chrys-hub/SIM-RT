<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class RegisterWargaModel extends Model
{
    protected $table = 'akunwarga';
   
    public function getDesa()
    {
        $builder = $this->db->table('desa');
        return $builder->get();
    }
    public function saveAkunwarga($data){
        $query = $this->db->table('akunwarga')->insert($data);
        return $query;
    }
}