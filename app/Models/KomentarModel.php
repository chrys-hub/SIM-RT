<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table = 'komentar';

    public function saveKomentar($data)
    {
        $query = $this->db->table('komentar')->insert($data);
        return $query;
    }
}