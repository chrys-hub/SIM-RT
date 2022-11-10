<?php

namespace App\Models;
use CodeIgniter\Model;

class KeuanganModel extends Model {
    
    protected $table = 'keuangan';
    
    public function paginateUang(int $page,$id_desa_rt) 
    {
        return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('keuangan.id_desa_uang',$id_desa_rt)->orderBy('tanggal', 'DESC')->paginate($page);
    }

    public function saveKeuangan($data){
        $query = $this->db->table('keuangan')->insert($data);
        return $query;
    }

    public function updateKeuangan($data,$id)
    {
        $query = $this->db->table('keuangan')->update($data, array('id_uang' => $id));
        return $query;
    }

    public function deleteKeuangan($id)
    {
        $query = $this->db->table('keuangan')->delete(array('id_uang' => $id));
        return $query;
    }

    public function cariKeuangan($start_date,$end_date,$kategori,$aksi)
    {
        if ($kategori == 'semua' && $aksi == 'semua') {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->orderBy('tanggal', 'DESC')->findAll();
          } 

          elseif($kategori != 'semua' && $aksi == 'semua')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->where('id_kategori_uang',$kategori)->orderBy('tanggal', 'DESC')->findAll();
          } 
          elseif($kategori != 'semua' && $aksi == 'keluar')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('aksi',$aksi)->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->where('id_kategori_uang',$kategori)->orderBy('tanggal', 'DESC')->findAll();
          } 
          elseif($kategori != 'semua' && $aksi == 'masuk')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('aksi',$aksi)->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->where('id_kategori_uang',$kategori)->orderBy('tanggal', 'DESC')->findAll();
          } 
          elseif($kategori != 'semua' && $aksi == 'belum membayar')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('aksi',$aksi)->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->where('id_kategori_uang',$kategori)->orderBy('tanggal', 'DESC')->findAll();
          } 
          elseif($kategori == 'semua' && $aksi == 'belum membayar')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('aksi',$aksi)->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->orderBy('tanggal', 'DESC')->findAll();
          } 
          elseif($kategori == 'semua' && $aksi == 'masuk')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('aksi',$aksi)->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->orderBy('tanggal', 'DESC')->findAll();
          } 
          elseif($kategori == 'semua' && $aksi == 'keluar')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('aksi',$aksi)->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->orderBy('tanggal', 'DESC')->findAll();
          } 
        
    }


    public function rekapuang($start_date,$end_date,$kategori,$aksi)
    {
        if ($kategori == 'semua' && $aksi == 'semua') {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->orderBy('tanggal', 'DESC');
          } 

          elseif($kategori != 'semua' && $aksi == 'semua')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->where('id_kategori_uang',$kategori)->orderBy('tanggal', 'DESC');
          } 
          elseif($kategori != 'semua' && $aksi == 'keluar')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('aksi',$aksi)->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->where('id_kategori_uang',$kategori)->orderBy('tanggal', 'DESC');
          } 
          elseif($kategori != 'semua' && $aksi == 'masuk')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('aksi',$aksi)->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->where('id_kategori_uang',$kategori)->orderBy('tanggal', 'DESC');
          } 
          elseif($kategori != 'semua' && $aksi == 'belum membayar')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('aksi',$aksi)->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->where('id_kategori_uang',$kategori)->orderBy('tanggal', 'DESC');
          } 
          elseif($kategori == 'semua' && $aksi == 'belum membayar')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('aksi',$aksi)->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->orderBy('tanggal', 'DESC');
          } 
          elseif($kategori == 'semua' && $aksi == 'masuk')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('aksi',$aksi)->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->orderBy('tanggal', 'DESC');
          } 
          elseif($kategori == 'semua' && $aksi == 'keluar')
          {
            return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->where('aksi',$aksi)->where('tanggal >=',$start_date)->where('tanggal <=',$end_date)->orderBy('tanggal', 'DESC');
          } 
        
    }
}