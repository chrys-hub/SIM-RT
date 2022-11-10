<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class AdminDashboard extends Controller
{
    public function index()
    {
        $session = session();
        $nama_admin = $session->get('username_admin');
        $data['pageTittle'] = 'Admin Dashboard';
        $data['namauser'] = $nama_admin;
        return view('admin_dashboard', $data);
    }
    
    public function logout()
    {
        $session = session();
        $session->remove('username_admin');
        $session->remove('logged_in');
        return redirect()->to('/');
    }
}