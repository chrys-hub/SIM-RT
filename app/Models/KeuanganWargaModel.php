<?php

namespace App\Models;
use CodeIgniter\Model;

class KeuanganWargaModel extends Model {
    
    protected $table = 'keuangan';
    
    public function getAllUang() 
    {
        return $this->select()->join('kategori', 'keuangan.id_kategori_uang = kategori.id_kategori')->join('warga','keuangan.id_warga_uang = warga.id_warga','left')->orderBy('tanggal', 'DESC')->findAll();
    }

    public function caridetailKeuangan($start_date,$end_date,$kategori,$aksi)
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


    public function rekap($start_date,$end_date,$kategori,$aksi)
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