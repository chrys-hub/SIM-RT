<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\PengumumanModel;
use App\Controllers\BaseController;
 
class Pengumuman extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new PengumumanModel();
        $nama_rt = $session->get('nama_rt');
        $id_desa_rt = $session->get('id_desa_akunrt');
        $nik_rt = $session->get('nik_rt');
        $no_kk_rt = $session->get('no_kk_rt');
        $no_hp_rt = $session->get('no_hp_rt');
        $data['pageTittle'] = 'Tambah Pengumuman';
        $data['namauser'] = $nama_rt;
        $data['id_desa_akunrt'] = $id_desa_rt;
        $data['nik_rt'] = $nik_rt;
        $data['no_kk_rt'] = $no_kk_rt;
        $data['no_hp_rt'] = $no_hp_rt;
        $model->where('id_desa_pengumuman',$id_desa_rt);
        $totalpengumuman = $model->countAllResults();
        $data['totalpengumuman'] = $totalpengumuman;
        $data['pengumuman'] = $model->where('id_desa_pengumuman',$id_desa_rt)->paginate(50);
        $data['pager'] = $model->pager;
        return view('pengumuman_view', $data);
    }

    public function simpanpengumuman()
    {
        $session = session();
        $id_desa_rt = $session->get('id_desa_akunrt');
        $model = new PengumumanModel();
        $data = array(
            'pengumuman' => $this->request->getPost('pengumuman'),
            'tanggal' => $this->request->getPost('tanggal'),
            'id_desa_pengumuman' => $id_desa_rt,
        );
        $model->savePengumuman($data);
        return redirect()->to('/pengumuman');

    }

    public function editpengumuman()
    {
        $model = new PengumumanModel();
        $id = $this->request->getPost('id_pengumuman');
        $data = array(
            'pengumuman' => $this->request->getPost('pengumuman'),
            'tanggal' => $this->request->getPost('tanggal'),
        );
        $model->updatePengumuman($data,$id);
        return redirect()->to('/pengumuman');       
    }

    public function deletepengumuman()
    {
        $model = new PengumumanModel();
        $id = $this->request->getPost('id_pengumuman');
        $model->deletePengumuman($id);
        return redirect()->to('/pengumuman');
    }
}