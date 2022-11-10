<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class RtDashboard extends Controller
{
    public function index()
    {
        $session = session();
        $nama_rt = $session->get('nama_rt');
        $id_desa_rt = $session->get('id_desa_akunrt');
        $nik_rt = $session->get('nik_rt');
        $no_kk_rt = $session->get('no_kk_rt');
        $no_hp_rt = $session->get('no_hp_rt');
        $id_rt = $session->get('id_rt');
        $data['id_rt'] = $id_rt;
        $data['pageTittle'] = 'Rt Dashboard';
        $data['namauser'] = $nama_rt;
        $data['id_desa_akunrt'] = $id_desa_rt;
        $data['nik_rt'] = $nik_rt;
        $data['no_kk_rt'] = $no_kk_rt;
        $data['no_hp_rt'] = $no_hp_rt;
        return view('rt_dashboard', $data);
    }
    
    public function logout()
    {
        $session = session();
        $session->remove('username_rt');
        $session->remove('nama_rt');
        $session->remove('id_desa_akunrt');
        $session->remove('nik_rt');
        $session->remove('no_kk_rt');
        $session->remove('no_hp_rt');
        $session->remove('logged_in_rt');
        $session->remove('id_rt');
        return redirect()->to('/');
    }
}