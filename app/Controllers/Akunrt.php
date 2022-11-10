<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AkunrtModel;
use App\Controllers\BaseController;

class Akunrt extends BaseController
{

    public function index()
    {
        $model = new AkunrtModel();
        $session = session();
        $nama_admin = $session->get('username_admin');
        $data['akunrt']  = $model->getAkunrt()->getResult();
        $data['desa'] = $model->getDesa()->getResult();
        $data['pageTittle'] = 'Manage Akun RT';
        $data['namauser'] = $nama_admin;
        echo view('akunrt_view', $data);
    }

    public function save()
    {
        $model = new AkunrtModel();
        $data = array(
            'id_desa_akunrt' => $this->request->getPost('nama_desa_akunrt'),
            'nama_rt' => $this->request->getPost('nama_rt'),
            'nik_rt' => $this->request->getPost('nik_rt'),
            'no_kk_rt' => $this->request->getPost('no_kk_rt'),
            'no_hp_rt' => $this->request->getPost('no_hp_rt'),
            'username_rt' => $this->request->getPost('username_rt'),
            'password_rt' => $this->request->getPost('password_rt'),
            
        );
        $model->saveAkunrt($data);
        return redirect()->to('/Akunrt');
    }

    public function update()
    {
        $model = new AkunrtModel();
        $id = $this->request->getPost('id_rt');
        $data = array(
            'id_desa_akunrt' => $this->request->getPost('nama_desa_akunrt'),
            'nama_rt' => $this->request->getPost('nama_rt'),
            'nik_rt' => $this->request->getPost('nik_rt'),
            'no_kk_rt' => $this->request->getPost('no_kk_rt'),
            'no_hp_rt' => $this->request->getPost('no_hp_rt'),
            'username_rt' => $this->request->getPost('username_rt'),
            'password_rt' => $this->request->getPost('password_rt'),
        );
        $model->updateAkunrt($data, $id);
        return redirect()->to('/Akunrt');
    }

    public function delete()
    {
        $model = new AkunrtModel();
        $id = $this->request->getPost('id_rt');
        $model->deleteAkunrt($id);
        return redirect()->to('/Akunrt');
    }
 

}