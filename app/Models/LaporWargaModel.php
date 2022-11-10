<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class LaporWargaModel extends Model{

    protected $table = 'akunrt';

    function getKontak($id){
        return $this->select('nama_rt,no_hp_rt')->where('id_desa_akunrt',$id)->findAll();
    }

}
 