<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\KeuanganModel;
use App\Models\KategoriModel;
use App\Models\WargaModel;
use App\Controllers\BaseController;
 
class Keuangan extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new KeuanganModel();
        $kategori = new KategoriModel();
        $warga = new WargaModel();
        $nama_rt = $session->get('nama_rt');
        $id_desa_rt = $session->get('id_desa_akunrt');
        $nik_rt = $session->get('nik_rt');
        $no_kk_rt = $session->get('no_kk_rt');
        $no_hp_rt = $session->get('no_hp_rt');
        $model->where('id_desa_uang',$id_desa_rt);
        $data['pageTittle'] = 'Kelola Keuangan';
        $data['namauser'] = $nama_rt;
        $data['id_desa_akunrt'] = $id_desa_rt;
        $data['nik_rt'] = $nik_rt;
        $data['no_kk_rt'] = $no_kk_rt;
        $data['no_hp_rt'] = $no_hp_rt;

        //statemen
        $startdate = date("Y-m-01");
        $enddate = date("Y-m-t");
        $masukbulanini = $model->where('aksi','masuk')->where('id_desa_uang',$id_desa_rt)->where('tanggal >=',$startdate)->where('tanggal <=',$enddate)->select('sum(nominal) as totalmasukbulanini')->first();
        $keluarbulanini = $model->where('aksi','keluar')->where('id_desa_uang',$id_desa_rt)->where('tanggal >=',$startdate)->where('tanggal <=',$enddate)->select('sum(nominal) as totalkeluarbulanini')->first();
        $belumbayarbulanini = $model->where('aksi','belum membayar')->where('id_desa_uang',$id_desa_rt)->where('tanggal >=',$startdate)->where('tanggal <=',$enddate)->select('sum(nominal) as totalbelumbayarbulanini')->first();
        $totaluangrt = $model->where('id_desa_uang',$id_desa_rt)->select('sum(nominal) as totaluang')->first();
        $totalpengeluaran = $model->where('id_desa_uang',$id_desa_rt)->where('aksi !=','masuk')->select('sum(nominal) as totalkeluar')->first();
        $totalpemasukan = $model->where('id_desa_uang',$id_desa_rt)->where('aksi','masuk')->select('sum(nominal) as totalmasuk')->first();
        $data['masukbulanini'] = $masukbulanini;
        $data['keluarbulanini'] = $keluarbulanini;
        $data['belumbayarbulanini'] = $belumbayarbulanini;
        $data['totaluangrt'] = $totaluangrt;
        $data['totalpengeluaran'] = $totalpengeluaran;
        $data['totalpemasukan'] = $totalpemasukan;
        //ambil data kategori
        $data['kategori'] = $kategori->where('id_desa_kategori', $id_desa_rt)->findAll();
        $data['warga'] = $warga->where('id_desa_warga', $id_desa_rt)->findAll();
        //paginate hasil
        $data['keuangan'] = $model->paginateUang(50,$id_desa_rt);
        $data['pager'] = $model->pager;
        return view('keuangan_view', $data);
    }

    public function simpankeuangan()
    {
        $session = session();
        $id_desa_rt = $session->get('id_desa_akunrt');
        $model = new KeuanganModel();
        $id_warga = $this->request->getPost('id_warga');
        $aksi = $this->request->getPost('aksi');
        if($id_warga=="")
        {
            if ($aksi == 'keluar'  || $aksi == 'belum membayar') {
                $data = array(
                    'id_kategori_uang' => $this->request->getPost('id_kategori'),
                    'id_desa_uang' => $id_desa_rt,
                    'nominal' => '-'.$this->request->getPost('nominal'),
                    'aksi' => $aksi,
                    'tanggal' => $this->request->getPost('tanggal'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'id_warga_uang' => NULL,
                );
              } else {
                $data = array(
                    'id_kategori_uang' => $this->request->getPost('id_kategori'),
                    'id_desa_uang' => $id_desa_rt,
                    'nominal' => $this->request->getPost('nominal'),
                    'aksi' => $aksi,
                    'tanggal' => $this->request->getPost('tanggal'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'id_warga_uang' => NULL,
                );
              }
        }else{

            if ($aksi == 'keluar'  || $aksi == 'belum membayar') {
                $data = array(
                    'id_kategori_uang' => $this->request->getPost('id_kategori'),
                    'id_desa_uang' => $id_desa_rt,
                    'nominal' => '-'.$this->request->getPost('nominal'),
                    'aksi' => $aksi,
                    'tanggal' => $this->request->getPost('tanggal'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'id_warga_uang' => $this->request->getPost('id_warga'),
                );
              } else {
                $data = array(
                    'id_kategori_uang' => $this->request->getPost('id_kategori'),
                    'id_desa_uang' => $id_desa_rt,
                    'nominal' => $this->request->getPost('nominal'),
                    'aksi' => $aksi,
                    'tanggal' => $this->request->getPost('tanggal'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'id_warga_uang' => $this->request->getPost('id_warga'),
                );
              }

        }
        
        $model->saveKeuangan($data);
        return redirect()->to('/keuangan');
    }

    public function updatekeuangan()
    {
        $session = session();
        $id_desa_rt = $session->get('id_desa_akunrt');
        $model = new KeuanganModel();
        $aksi = $this->request->getPost('aksi');
        $id = $this->request->getPost('id_uang');
        $id_warga = $this->request->getPost('id_warga');
        if($id_warga=="")
        {
            if ($aksi == 'keluar'  || $aksi == 'belum membayar') {
                $data = array(
                    'id_kategori_uang' => $this->request->getPost('id_kategori'),
                    'id_desa_uang' => $id_desa_rt,
                    'nominal' => '-'.$this->request->getPost('nominal'),
                    'aksi' => $aksi,
                    'tanggal' => $this->request->getPost('tanggal'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'id_warga_uang' => NULL,
                );
              } else {
                $data = array(
                    'id_kategori_uang' => $this->request->getPost('id_kategori'),
                    'id_desa_uang' => $id_desa_rt,
                    'nominal' => $this->request->getPost('nominal'),
                    'aksi' => $aksi,
                    'tanggal' => $this->request->getPost('tanggal'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'id_warga_uang' => NULL,
                );
              }
        }else{

            if ($aksi == 'keluar'  || $aksi == 'belum membayar') {
                $data = array(
                    'id_kategori_uang' => $this->request->getPost('id_kategori'),
                    'id_desa_uang' => $id_desa_rt,
                    'nominal' => '-'.$this->request->getPost('nominal'),
                    'aksi' => $aksi,
                    'tanggal' => $this->request->getPost('tanggal'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'id_warga_uang' => $this->request->getPost('id_warga'),
                );
              } else {
                $data = array(
                    'id_kategori_uang' => $this->request->getPost('id_kategori'),
                    'id_desa_uang' => $id_desa_rt,
                    'nominal' => $this->request->getPost('nominal'),
                    'aksi' => $aksi,
                    'tanggal' => $this->request->getPost('tanggal'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'id_warga_uang' => $this->request->getPost('id_warga'),
                );
              }

        }
          $model->updateKeuangan($data,$id);
          return redirect()->to('/keuangan');
    }

    public function deletekeuangan()
    {
        $model = new KeuanganModel();
        $id = $this->request->getPost('id_uang');
        $model->deleteKeuangan($id);
        return redirect()->to('/keuangan');
    }

    public function carikeuangan()
    {
        $session = session();
        $model = new KeuanganModel();
        $kategori = new KategoriModel();
        $warga = new WargaModel();
        $id_desa_rt = $session->get('id_desa_akunrt');
        $nama_rt = $session->get('nama_rt');
        $id_desa_rt = $session->get('id_desa_akunrt');
        $nik_rt = $session->get('nik_rt');
        $no_kk_rt = $session->get('no_kk_rt');
        $no_hp_rt = $session->get('no_hp_rt');
        $data['pageTittle'] = 'Hasil Pencarian Keuangan';
        $data['namauser'] = $nama_rt;
        $data['id_desa_akunrt'] = $id_desa_rt;
        $data['nik_rt'] = $nik_rt;
        $data['no_kk_rt'] = $no_kk_rt;
        $data['no_hp_rt'] = $no_hp_rt;
        $model->where('id_desa_uang',$id_desa_rt);
        $data['warga'] = $warga->where('id_desa_warga', $id_desa_rt)->findAll();
        $data['kategori'] = $kategori->where('id_desa_kategori', $id_desa_rt)->findAll();
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');
        $kategori = $this->request->getPost('id_kategori');
        $aksi = $this->request->getPost('aksi_cari');
        $data['keuangan'] = $model->cariKeuangan($start_date,$end_date,$kategori,$aksi);
        $belumbayar = $model->rekapuang($start_date,$end_date,$kategori,$aksi)->where('aksi','belum membayar')->where('id_desa_uang',$id_desa_rt)->select('sum(nominal) as totalbelumbayar')->first();
        $pemasukan = $model->rekapuang($start_date,$end_date,$kategori,$aksi)->where('aksi','masuk')->where('id_desa_uang',$id_desa_rt)->select('sum(nominal) as totalmasuk')->first();
        $pengeluaran = $model->rekapuang($start_date,$end_date,$kategori,$aksi)->where('aksi','keluar')->where('id_desa_uang',$id_desa_rt)->select('sum(nominal) as totalkeluar')->first();
        $data['belumbayar'] = $belumbayar;
        $data['pemasukan'] = $pemasukan;
        $data['pengeluaran'] = $pengeluaran;
        return view('search_keuangan_view',$data);
    }


}