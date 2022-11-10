<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\PengumumanWargaModel;
use App\Models\KomentarModel;
use App\Controllers\BaseController;
class PengumumanWarga extends BaseController
{
    public function index()
    {
        $session = session();
        $model= new PengumumanWargaModel();
        $nama_warga = $session->get('nama_warga');
        $username_warga = $session->get('username_warga');
        $id_desa_akunwarga = $session->get('id_desa_akunwarga');
        $id_akun_warga = $session->get('id_akun_warga');
        $role_warga = $session->get('role_warga');
        $data['role_warga'] = $role_warga;
        $data['id_akun_warga'] = $id_akun_warga;
        $data['pengumuman'] = $model->where('id_desa_pengumuman',$id_desa_akunwarga)->findAll();
        $data['pageTittle'] = 'Halaman Pengumuman';
        $data['nama_warga'] = $nama_warga;
        $data['username_warga'] = $username_warga;
        $data['id_desa_akunwarga'] = $id_desa_akunwarga;
        return view('pengumuman_warga', $data);
    }
    public function view(){
        $session = session();
        $request = \Config\Services::request();
        $id_pengumuman = $request->uri->getSegment('3');
        $model = new PengumumanWargaModel();
        $komentar = new KomentarModel();
        $nama_warga = $session->get('nama_warga');
        $username_warga = $session->get('username_warga');
        $id_desa_akunwarga = $session->get('id_desa_akunwarga');
        $id_akun_warga = $session->get('id_akun_warga');
        $role_warga = $session->get('role_warga');
        $data['role_warga'] = $role_warga;
        $data['pengumuman'] = $model->where('id_pengumuman',$id_pengumuman)->findAll();
        $data['komentar'] = $komentar->where('id_pengumuman_komentar',$id_pengumuman)->findAll();
        $data['id_akun_warga'] = $id_akun_warga;
        $data['pageTittle'] = 'Komentari Pengumuman';
        $data['nama_warga'] = $nama_warga;
        $data['username_warga'] = $username_warga;
        $data['id_desa_akunwarga'] = $id_desa_akunwarga;
        return view('view_pengumuman_warga', $data);
    }

    public function komentar(){
        $session = session();
        $nama_warga = $session->get('nama_warga');
        $komentar = new KomentarModel();
        $id_pengumuman = $this->request->getPost('id_pengumuman');
        $isi_komentar = $this->request->getPost('isi_komentar');
        $data = array(
            'isi_komentar' => $isi_komentar,
            'nama_komentator' => $nama_warga,
            'id_pengumuman_komentar' => $id_pengumuman,
        );
        $komentar->saveKomentar($data);
        return redirect()->to('/pengumumanwarga/view/'.$id_pengumuman);
    }
}