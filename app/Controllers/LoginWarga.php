<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AkunwargaModel;
use App\Models\LupaPasswordModel;
use App\Models\DesaModel;

class LoginWarga extends Controller
{
    public function index()
    {
        $model = new DesaModel();
        helper(['form']);
        $session = session();
        $data['pageTittle']='Login Warga';
        $data['desa'] = $model->findAll();
        return view('login_warga', $data);
    } 
    public function authwarga()
    {
        $session = session();
        $model = new AkunwargaModel();
        $username = $this->request->getVar('username_warga');
        $password = $this->request->getVar('password_warga');
        $data = $model->where('username_warga', $username)->first();
        if($data){
            $pass = $data['password_warga'];
            $status = $data['status'];
            if($pass == $password && $status == 'terkonfirmasi'){
                $ses_data = [
                    'username_warga'     => $data['username_warga'],
                    'nama_warga'          => $data['nama_warga'],
                    'id_desa_akunwarga' => $data['id_desa_akunwarga'],
                    'id_akun_warga' => $data['id_akun_warga'],
                    'role_warga' => $data['role_warga'],
                    'logged_in_warga'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/halamanawal');
            }else{
                $session->setFlashdata('msg', 'Akun anda belum di konfirmasi/belum terdaftar');
                return redirect()->to('/loginwarga');
            }
        }else{
            $session->setFlashdata('msg', 'Akun anda belum di konfirmasi/belum terdaftar');
            return redirect()->to('/loginwarga');
        }
    }

    public function lupaakunwarga(){
        $model = new LupaPasswordModel();
        $id_desa = $this->request->getVar('id_desa');
        $data['listkontak'] = $model->getListkontak($id_desa);
        return view('list_kontak_lupa_pw',$data);

    }
}