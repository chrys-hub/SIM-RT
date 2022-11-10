<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\KeuanganWargaModel;
use App\Models\KategoriModel;
use App\Controllers\BaseController;
class KeuanganWarga extends BaseController
{
    public function index()
    {
        $session = session();
        $model= new KeuanganWargaModel();
        $kategori = new KategoriModel();
        $nama_warga = $session->get('nama_warga');
        $username_warga = $session->get('username_warga');
        $id_desa_akunwarga = $session->get('id_desa_akunwarga');
        $id_akun_warga = $session->get('id_akun_warga');
        $role_warga = $session->get('role_warga');
        $data['role_warga'] = $role_warga;
        $data['id_akun_warga'] = $id_akun_warga;
        $data['pageTittle'] = 'Halaman Keuangan RT';
        $data['nama_warga'] = $nama_warga;
        $data['username_warga'] = $username_warga;
        $data['id_desa_akunwarga'] = $id_desa_akunwarga;
        $model->where('id_desa_uang',$id_desa_akunwarga);
        $data['keuangan'] = $model->getAllUang();
        $data['kategori'] = $kategori->where('id_desa_kategori', $id_desa_akunwarga)->findAll();
        $startdate = date("Y-m-01");
        $enddate = date("Y-m-t");
        $masukbulanini = $model->where('aksi','masuk')->where('id_desa_uang',$id_desa_akunwarga)->where('tanggal >=',$startdate)->where('tanggal <=',$enddate)->select('sum(nominal) as totalmasukbulanini')->first();
        $keluarbulanini = $model->where('aksi','keluar')->where('id_desa_uang',$id_desa_akunwarga)->where('tanggal >=',$startdate)->where('tanggal <=',$enddate)->select('sum(nominal) as totalkeluarbulanini')->first();
        $belumbayarbulanini = $model->where('aksi','belum membayar')->where('id_desa_uang',$id_desa_akunwarga)->where('tanggal >=',$startdate)->where('tanggal <=',$enddate)->select('sum(nominal) as totalbelumbayarbulanini')->first();
        $totaluangrt = $model->where('id_desa_uang',$id_desa_akunwarga)->select('sum(nominal) as totaluang')->first();
        $totalpengeluaran = $model->where('id_desa_uang',$id_desa_akunwarga)->where('aksi !=','masuk')->select('sum(nominal) as totalkeluar')->first();
        $totalpemasukan = $model->where('id_desa_uang',$id_desa_akunwarga)->where('aksi','masuk')->select('sum(nominal) as totalmasuk')->first();
        $data['masukbulanini'] = $masukbulanini;
        $data['keluarbulanini'] = $keluarbulanini;
        $data['belumbayarbulanini'] = $belumbayarbulanini;
        $data['totaluangrt'] = $totaluangrt;
        $data['totalpengeluaran'] = $totalpengeluaran;
        $data['totalpemasukan'] = $totalpemasukan;
        return view('keuangan_warga', $data);
    }

    public function caridetailKeuangan() {

        $session = session();
        $model= new KeuanganWargaModel();
        $nama_warga = $session->get('nama_warga');
        $username_warga = $session->get('username_warga');
        $id_desa_akunwarga = $session->get('id_desa_akunwarga');
        $id_akun_warga = $session->get('id_akun_warga');
        $data['id_akun_warga'] = $id_akun_warga;
        $data['pageTittle'] = 'Halaman Hasil Pencarian';
        $data['nama_warga'] = $nama_warga;
        $data['username_warga'] = $username_warga;
        $data['id_desa_akunwarga'] = $id_desa_akunwarga;
        $model->where('id_desa_uang',$id_desa_akunwarga);
        //get
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');
        $kategori = $this->request->getPost('id_kategori');
        $aksi = $this->request->getPost('aksi_cari');
        $data['keuangan'] = $model->caridetailKeuangan($start_date,$end_date,$kategori,$aksi);
        
        $belumbayar = $model->rekap($start_date,$end_date,$kategori,$aksi)->where('aksi','belum membayar')->where('id_desa_uang',$id_desa_akunwarga)->select('sum(nominal) as totalbelumbayar')->first();
        $pemasukan = $model->rekap($start_date,$end_date,$kategori,$aksi)->where('aksi','masuk')->where('id_desa_uang',$id_desa_akunwarga)->select('sum(nominal) as totalmasuk')->first();
        $pengeluaran = $model->rekap($start_date,$end_date,$kategori,$aksi)->where('aksi','keluar')->where('id_desa_uang',$id_desa_akunwarga)->select('sum(nominal) as totalkeluar')->first();
        $data['belumbayar'] = $belumbayar;
        $data['pemasukan'] = $pemasukan;
        $data['pengeluaran'] = $pengeluaran;
        return view('search_keuangan_warga_view',$data);

    }
}