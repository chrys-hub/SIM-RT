<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class RtModel extends Model{
    protected $table = 'akunrt';
    protected $allowedFields = ['id_desa_akunrt','nama_rt','nik_rt','no_kk_rt','no_hp_rt','username_rt','password_rt'];
}
