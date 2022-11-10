<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AdminModel;
 
class LoginAdmin extends Controller
{
    public function index()
    {
        helper(['form']);
        $session = session();
        $nama_admin = $session->get('username_admin');
        $datapassing['namauser'] = $nama_admin;
        $datapassing['pageTittle']='Login';
        return view('login_admin', $datapassing);
    } 
 
    public function auth()
    {
        $session = session();
        $model = new AdminModel();
        $username = $this->request->getVar('username_admin');
        $password = $this->request->getVar('password_admin');
        $data = $model->where('username_admin', $username)->first();
        if($data){
            $pass = $data['password_admin'];
            if($pass == $password){
                $ses_data = [
                    'username_admin'     => $data['username_admin'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admindashboard');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/loginadmin');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/loginadmin');
        }
    }
 
}