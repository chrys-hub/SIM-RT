<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AkunrtModel;
use App\Controllers\BaseController;

class Editprofilert extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new AkunrtModel();
        $nama_rt = $session->get('nama_rt');
        $id_desa_rt = $session->get('id_desa_akunrt');
        $nik_rt = $session->get('nik_rt');
        $no_kk_rt = $session->get('no_kk_rt');
        $no_hp_rt = $session->get('no_hp_rt');
        $id_rt = $session->get('id_rt');
        $data['id_rt'] = $id_rt;
        $data['pageTittle'] = 'Edit Profile';
        $data['namauser'] = $nama_rt;
        $data['id_desa_akunrt'] = $id_desa_rt;
        $data['nik_rt'] = $nik_rt;
        $data['no_kk_rt'] = $no_kk_rt;
        $data['no_hp_rt'] = $no_hp_rt;
        $data['rt'] = $model->where('id_rt',$id_rt)->find();
        return view('edit_profile_rt',$data);

    }


    public function updateprofilert()
    {
        $session = session();
        $model = new AkunrtModel();
        $nama_rt = $session->get('nama_rt');
        $id_desa_rt = $session->get('id_desa_akunrt');
        $nik_rt = $session->get('nik_rt');
        $no_kk_rt = $session->get('no_kk_rt');
        $no_hp_rt = $session->get('no_hp_rt');
        $id_rt = $session->get('id_rt');

        $val = $this->validate([
            'nik_rt' => [
                'rules' => 'required|min_length[16]|max_length[16]|numeric',
                'errors' => [
                    'required' => 'nik wajib di isi',
                    'numeric' => 'tidak boleh ada huruf',
                ],
            ],
            'no_kk_rt' => 'required|min_length[16]|max_length[16]|numeric',
            'no_hp_rt'  => 'required|min_length[12]|max_length[14]|numeric',
            'nama_rt'    => 'required',
        ]);

        if (!$val)
        {
            $model = new AkunrtModel();
            $id_rt = $session->get('id_rt');
            $data['id_rt'] = $id_rt;
            $data['rt'] = $model->where('id_rt',$id_rt)->find();
            return view('edit_profile_rt',$data,['validation' => $this->validator]);
 
        }
        else{
            $model = new AkunrtModel();
            $id_rt = $session->get('id_rt');
            $data = array(
                'nama_rt' => $this->request->getPost('nama_rt'),
                'nik_rt' => $this->request->getPost('nik_rt'),
                'no_kk_rt' => $this->request->getPost('no_kk_rt'),
                'no_hp_rt' => $this->request->getPost('no_hp_rt'),
            );
          
            $model->updateAkunrt($data,$id_rt);
            return redirect()->to('/editprofilert');
        }
    }

    public function updatelogininfort()
    {
        $session = session();
        $model = new AkunrtModel();
        $nama_rt = $session->get('nama_rt');
        $id_desa_rt = $session->get('id_desa_akunrt');
        $nik_rt = $session->get('nik_rt');
        $no_kk_rt = $session->get('no_kk_rt');
        $no_hp_rt = $session->get('no_hp_rt');
        $id_rt = $session->get('id_rt');

        $val = $this->validate([
            'username_rt'  => [
                'rules' => 'required|is_unique[akunrt.username_rt]',
                'errors' => [
                    'is_unique' => 'username telah terpakai coba username lain',
                ],
            ],
            'password_rt'  => 'required',
        ]);

        if (!$val)
        {
            $model = new AkunrtModel();
            $id_rt = $session->get('id_rt');
            $data['id_rt'] = $id_rt;
            $data['rt'] = $model->where('id_rt',$id_rt)->find();
            return view('edit_profile_rt',$data,['validation' => $this->validator]);
 
        }
        else{
            $model = new AkunrtModel();
            $id_rt = $session->get('id_rt');
            $data = array(
                'username_rt' => $this->request->getPost('username_rt'),
                'password_rt' => $this->request->getPost('password_rt'),
            );
          
            $model->updateAkunrt($data,$id_rt);
            return redirect()->to('/editprofilert');
        }
    }
}