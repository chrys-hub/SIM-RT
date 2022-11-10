<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\LaporWargaModel;
class LaporWarga extends Controller
{
    public function index()
    {
        $session = session();
        $model= new LaporWargaModel();
        $nama_warga = $session->get('nama_warga');
        $username_warga = $session->get('username_warga');
        $id_desa_akunwarga = $session->get('id_desa_akunwarga');
        $id_akun_warga = $session->get('id_akun_warga');
        $role_warga = $session->get('role_warga');
        $data['role_warga'] = $role_warga;
        $data['id_akun_warga'] = $id_akun_warga;
        $data['pageTittle'] = 'Halaman Pelaporan';
        $data['nama_warga'] = $nama_warga;
        $data['username_warga'] = $username_warga;
        $data['id_desa_akunwarga'] = $id_desa_akunwarga;
        $model->where('id_desa_akunrt',$id_desa_akunwarga);
        $data['kontak'] = $model->getKontak($id_desa_akunwarga);
        return view('lapor_warga', $data);
    }
}