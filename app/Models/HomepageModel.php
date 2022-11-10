<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class HomepageModel extends Model{

    protected $table = 'admin';

    function getAdmin(){
        return $this->select('no_hp_admin')->first();
    }

    function getJumlahDesaTerdaftar(){
        $query = $this->db->table('desa')->countAll();
        return $query;
    }

    function getJumlahWargaTerdaftar(){
        $query = $this->db->table('akunwarga')->countAll();
        return $query;
    }

}
 