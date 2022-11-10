<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class LupaPasswordModel extends Model{

    protected $table = 'desa';

    function getListkontak($id){
        $this->join('akunrt', 'desa.id_desa = akunrt.id_desa_akunrt', 'LEFT');
        $this->select('akunrt.nama_rt');
        $this->select('akunrt.no_hp_rt');
        $this->where('id_desa_akunrt',$id);
        $result = $this->findAll();
        return $result;
    }

}
 