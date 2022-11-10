<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\RtModel;
use App\Models\HomepageModel;
 
class LoginRt extends Controller
{
    public function index()
    {
        helper(['form']);
        $session = session();
        $nama_rt = $session->get('nama_rt');
        $model = new HomepageModel();
        $data['namauser'] = $nama_rt;
        $data['no_hp_admin'] = $model->getAdmin();
        $data['pageTittle']='Login';
        return view('login_rt', $data);
    } 
 
    public function authrt()
    {
        $session = session();
        $model = new RtModel();
        $username = $this->request->getVar('username_rt');
        $password = $this->request->getVar('password_rt');
        $data = $model->where('username_rt', $username)->first();
        if($data){
            $pass = $data['password_rt'];
            if($pass == $password){
                $ses_data = [
                    'username_rt'     => $data['username_rt'],
                    'nama_rt'          => $data['nama_rt'],
                    'id_desa_akunrt' => $data['id_desa_akunrt'],
                    'nik_rt' => $data['nik_rt'],
                    'no_kk_rt' => $data['no_kk_rt'],
                    'no_hp_rt' => $data['no_hp_rt'],
                    'id_rt' => $data['id_rt'],
                    'logged_in_rt'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/RtDashboard');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/loginrt');
            }
        }else{
            $session->setFlashdata('msg', 'User tidak di temukan');
            return redirect()->to('/loginrt');
        }
    }
 
}