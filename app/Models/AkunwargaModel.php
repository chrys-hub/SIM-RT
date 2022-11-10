<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class AkunwargaModel extends Model{
    protected $table = 'akunwarga';
    protected $allowedFields = ['id_akun_warga','id_desa_akunwarga','nik_akun_warga','no_kk_akun_warga','no_hp_warga',
    'status','username_warga','password_warga','nama_warga'
];
public function konfirmasiWarga($data, $id)
    {
        $query = $this->db->table('akunwarga')->update($data, array('id_akun_warga' => $id));
        return $query;
    }

    public function deleteAkunwarga($id)
    {
        $query = $this->db->table('akunwarga')->delete(array('id_akun_warga' => $id));
        return $query;
    }

    public function updateAkunwarga($id,$data){
        $query = $this->db->table('akunwarga')->update($data, array('id_akun_warga' => $id));
        return $query;
    }
}
