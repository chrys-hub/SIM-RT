<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AkunwargaModel;
use App\Controllers\BaseController;

class Editprofilewarga extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new AkunwargaModel();
        $nama_warga = $session->get('nama_warga');
        $username_warga = $session->get('username_warga');
        $id_desa_akunwarga = $session->get('id_desa_akunwarga');
        $id_akun_warga = $session->get('id_akun_warga');
        $role_warga = $session->get('role_warga');
        $data['role_warga'] = $role_warga;
        $data['pageTittle'] = 'Edit Profile';
        $data['nama_warga'] = $nama_warga;
        $data['username_warga'] = $username_warga;
        $data['id_desa_akunwarga'] = $id_desa_akunwarga;
        $data['id_akun_warga'] = $id_akun_warga;
        $data['warga'] = $model->where('id_akun_warga',$id_akun_warga)->find();
        return view('edit_profile_warga', $data);
    }


    public function updateprofilewarga()
    {
        $session = session();
        $model = new AkunwargaModel();
        $nama_warga = $session->get('nama_warga');
        $username_warga = $session->get('username_warga');
        $id_desa_akunwarga = $session->get('id_desa_akunwarga');
        $id_akun_warga = $session->get('id_akun_warga');
        helper(['form', 'url']);
        $val = $this->validate([
            'nik_akun_warga' => [
                'rules' => 'required|min_length[16]|max_length[16]|numeric',
                'errors' => [
                    'required' => 'nik wajib di isi',
                    'numeric' => 'tidak boleh ada huruf',
                ],
            ],
            'no_kk_akun_warga' => 'required|min_length[16]|max_length[16]|numeric',
            'no_hp_warga'  => 'required|min_length[12]|max_length[14]|numeric',
            'nama_warga'    => 'required',
        ]);

        if (!$val)
        {
            $model = new AkunwargaModel();
            $id_akun_warga = $session->get('id_akun_warga');
            $data['id_akun_warga'] = $id_akun_warga;
            $data['warga'] = $model->where('id_akun_warga',$id_akun_warga)->find();
            return view('edit_profile_warga',$data,['validation' => $this->validator]);
 
        }
        else{
            $model = new AkunwargaModel();
            $false = 'false';
            $prefixnomerhp = '62';
            $id = $session->get('id_akun_warga');
            $data = array(
                'nik_akun_warga' => $this->request->getPost('nik_akun_warga'),
                'no_kk_akun_warga' => $this->request->getPost('no_kk_akun_warga'),
                'no_hp_warga' => $this->request->getPost('no_hp_warga'),
                'nama_warga' => $this->request->getPost('nama_warga'),
                'username_warga' => $this->request->getPost('username_warga'),
                'password_warga' => $this->request->getPost('password_warga'),
                
            );
          
            $model->updateAkunwarga($id,$data);
            return redirect()->to('/editprofilewarga');
        }

    }

    
    public function updatelogininfowarga()
    {
        $session = session();
        $model = new AkunwargaModel();
        $nama_warga = $session->get('nama_warga');
        $username_warga = $session->get('username_warga');
        $id_desa_akunwarga = $session->get('id_desa_akunwarga');
        $id_akun_warga = $session->get('id_akun_warga');
        helper(['form', 'url']);
        $val = $this->validate([
            'username_warga'  => [
                'rules' => 'required|is_unique[akunwarga.username_warga]',
                'errors' => [
                    'is_unique' => 'username telah terpakai coba username lain',
                ],
            ],
            'password_warga'    => 'required',
        ]);

        if (!$val)
        {
            $model = new AkunwargaModel();
            $id_akun_warga = $session->get('id_akun_warga');
            $data['id_akun_warga'] = $id_akun_warga;
            $data['warga'] = $model->where('id_akun_warga',$id_akun_warga)->find();
            return view('edit_profile_warga',$data,['validation' => $this->validator]);
 
        }
        else{
            $model = new AkunwargaModel();
            $false = 'false';
            $prefixnomerhp = '62';
            $id = $session->get('id_akun_warga');
            $data = array(
                'username_warga' => $this->request->getPost('username_warga'),
                'password_warga' => $this->request->getPost('password_warga'),
                
            );
          
            $model->updateAkunwarga($id,$data);
            return redirect()->to('/editprofilewarga');
        }

    }
}