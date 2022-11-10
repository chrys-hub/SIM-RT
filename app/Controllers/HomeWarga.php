<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class HomeWarga extends Controller
{
    public function index()
    {
        $session = session();
        $nama_warga = $session->get('nama_warga');
        $username_warga = $session->get('username_warga');
        $id_desa_akunwarga = $session->get('id_desa_akunwarga');
        $id_akun_warga = $session->get('id_akun_warga');
        $role_warga = $session->get('role_warga');
        $data['role_warga'] = $role_warga;
        $data['pageTittle'] = 'Halaman Awal Warga';
        $data['nama_warga'] = $nama_warga;
        $data['username_warga'] = $username_warga;
        $data['id_desa_akunwarga'] = $id_desa_akunwarga;
        $data['id_akun_warga'] = $id_akun_warga;
        return view('home_warga', $data);
    }
    
    public function logout()
    {
        $session = session();
        $session->remove('nama_warga');
        $session->remove('username_warga');
        $session->remove('id_desa_akunwarga');
        $session->remove('logged_in_warga');
        $session->remove('id_akun_warga');
        $session->remove('role_warga');
        return redirect()->to('/');
    }
}