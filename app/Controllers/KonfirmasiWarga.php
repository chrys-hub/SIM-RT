<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\AkunwargaModel;
use App\Controllers\BaseController;
 
class KonfirmasiWarga extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new AkunwargaModel();
        $nama_rt = $session->get('nama_rt');
        $id_desa_rt = $session->get('id_desa_akunrt');
        $nik_rt = $session->get('nik_rt');
        $no_kk_rt = $session->get('no_kk_rt');
        $no_hp_rt = $session->get('no_hp_rt');
        $model->where('id_desa_akunwarga',$id_desa_rt);
        $data['pageTittle'] = 'Konfirmasi Akun Warga';
        $data['namauser'] = $nama_rt;
        $data['id_desa_akunrt'] = $id_desa_rt;
        $data['nik_rt'] = $nik_rt;
        $data['no_kk_rt'] = $no_kk_rt;
        $data['no_hp_rt'] = $no_hp_rt;
        $data['akunwarga'] = $model->paginate(50);
        $data['pager'] = $model->pager;
        return view('konfirmasi_warga', $data);
    }

    public function konfirmasi()
    {
        $model = new AkunwargaModel();
        $id = $this->request->getPost('id_akun_warga');
        $data = array(
            'status' => $this->request->getPost('status'),
            'role_warga' => $this->request->getPost('role_warga'),
        );
        $model->konfirmasiWarga($data,$id);
        return redirect()->to('/konfirmasiwarga');        
    }

    public function hapusakunwarga()
    {
        $model = new AkunwargaModel();
        $id = $this->request->getPost('id_akun_warga');
        $model->deleteAkunwarga($id);
        return redirect()->to('/konfirmasiwarga');
    }
}