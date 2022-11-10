<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\KategoriModel;
use App\Controllers\BaseController;
 
class Kategori extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new KategoriModel();
        $nama_rt = $session->get('nama_rt');
        $id_desa_rt = $session->get('id_desa_akunrt');
        $nik_rt = $session->get('nik_rt');
        $no_kk_rt = $session->get('no_kk_rt');
        $no_hp_rt = $session->get('no_hp_rt');
        $model->where('id_desa_kategori',$id_desa_rt);
        $data['pageTittle'] = 'Tambah Kategori';
        $data['namauser'] = $nama_rt;
        $data['id_desa_akunrt'] = $id_desa_rt;
        $data['nik_rt'] = $nik_rt;
        $data['no_kk_rt'] = $no_kk_rt;
        $data['no_hp_rt'] = $no_hp_rt;
        $data['kategori'] = $model->paginate(20);
        $data['pager'] = $model->pager;
        return view('kategori_view', $data);
    }

    public function simpankategori()
    {
        $session = session();
        $id_desa_rt = $session->get('id_desa_akunrt');
        $model = new KategoriModel();
        $data = array(
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'id_desa_kategori' => $id_desa_rt,
        );
        $model->saveKategori($data);
        return redirect()->to('/kategori');
    }

    public function editkategori()
    {
        $model = new KategoriModel();
        $id = $this->request->getPost('id_kategori');
        $data = array(
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        );
        $model->updateKategori($data,$id);
        return redirect()->to('/kategori');       
    }

    public function deletekategori()
    {
        $model = new KategoriModel();
        $id = $this->request->getPost('id_kategori');
        $model->deleteKategori($id);
        return redirect()->to('/kategori');
    }
}