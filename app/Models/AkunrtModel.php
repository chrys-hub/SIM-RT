<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class AkunrtModel extends Model{
    protected $table = 'akunrt';

    public function getDesa()
    {
        $builder = $this->db->table('desa');
        return $builder->get();
    }

    public function getAkunrt()
    {
        $builder = $this->db->table('akunrt');
        $builder->select('*');
        $builder->join('desa', 'id_desa = id_desa_akunrt','left');
        return $builder->get();
    }

    
    public function saveAkunrt($data){
        $query = $this->db->table('akunrt')->insert($data);
        return $query;
    }
 
    public function updateAkunrt($data, $id)
    {
        $query = $this->db->table('akunrt')->update($data, array('id_rt' => $id));
        return $query;
    }
 
    public function deleteAkunrt($id)
    {
        $query = $this->db->table('akunrt')->delete(array('id_rt' => $id));
        return $query;
    }


}
 