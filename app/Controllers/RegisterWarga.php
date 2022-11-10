<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\RegisterWargaModel;
use App\Controllers\BaseController;

class RegisterWarga extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
        
    }
    public function index()
    {
        $model = new RegisterWargaModel();
        $data['desa'] = $model->getDesa()->getResult();
        echo view('register_warga', $data);
    }

    public function save()
    {
       
        helper(['form', 'url']);
        $val = $this->validate([
            'nik_akun_warga' => 'required|min_length[16]|max_length[16]|numeric',
            'no_kk_akun_warga' => 'required|min_length[16]|max_length[16]|numeric',
            'no_hp_warga'  => 'required|min_length[12]|max_length[14]|numeric',
            'username_warga'  => 'required|is_unique[akunwarga.username_warga]',
            'password_warga'  => 'required',
            'nama_warga'    => 'required',
        ]);
        if (!$val)
        {
            $model = new RegisterWargaModel();
            $desa['desa'] = $model->getDesa()->getResult();
            return view('register_warga',$desa, [
                   'validation' => $this->validator
            ]);
 
        }
        else{
            $model = new RegisterWargaModel();
            $false = 'false';
            $prefixnomerhp = '62';
            $data = array(
                'id_desa_akunwarga' => $this->request->getPost('nama_desa_akunwarga'),
                'nik_akun_warga' => $this->request->getPost('nik_akun_warga'),
                'no_kk_akun_warga' => $this->request->getPost('no_kk_akun_warga'),
                'no_hp_warga' => $this->request->getPost('no_hp_warga'),
                'nama_warga' => $this->request->getPost('nama_warga'),
                'status' => $false,
                'username_warga' => $this->request->getPost('username_warga'),
                'password_warga' => $this->request->getPost('password_warga'),
                
            );
            $model->saveAkunwarga($data);
            return redirect()->to('/');
        }

    }
}