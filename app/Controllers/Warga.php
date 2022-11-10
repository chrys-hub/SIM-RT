<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\WargaModel;
use App\Controllers\BaseController;
 
class Warga extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new WargaModel();
        $nama_rt = $session->get('nama_rt');
        $id_desa_rt = $session->get('id_desa_akunrt');
        $nik_rt = $session->get('nik_rt');
        $no_kk_rt = $session->get('no_kk_rt');
        $no_hp_rt = $session->get('no_hp_rt');
        $model->where('id_desa_warga',$id_desa_rt);
        $data['pageTittle'] = 'Tambah Data Warga';
        $data['namauser'] = $nama_rt;
        $data['id_desa_akunrt'] = $id_desa_rt;
        $data['nik_rt'] = $nik_rt;
        $data['no_kk_rt'] = $no_kk_rt;
        $data['no_hp_rt'] = $no_hp_rt;
        $data['warga'] = $model->paginate(50);
        $data['pager'] = $model->pager;
        return view('warga_view', $data);
    }

    public function simpanwarga()
    {
        helper(['form', 'url']);
        $session = session();
        $id_desa_rt = $session->get('id_desa_akunrt');
        $model = new WargaModel();
        $cekktp = $this->request->getFile('gambar_ktp_warga');
        //cek jika warga di tidak memiliki ktp
        if($_FILES['gambar_ktp_warga']['name'] =="")
        {
            $input = $this->validate([
                'gambar_kk_warga' => [
                    'uploaded[gambar_kk_warga]',
                    'mime_in[gambar_kk_warga,image/jpg,image/jpeg,image/png]',
                    'max_size[gambar_kk_warga,5000]',
                ],
                'nik_warga'  => [
                    'rules' => 'required|is_unique[warga.nik_warga]',
                    'errors' => [
                        'is_unique' => 'input gagal,cek nik/nama yang anda masukan',
                    ],
                ],
            ]);
            if (!$input) {
                $session->setFlashdata('gagal', 'cek nik dan nama / format file tidak sesuai silahkan pilih format jpg/png dengan ukuran maximal 1mb');
                return redirect()->to('/warga');
            } else {
                $kk = $this->request->getFile('gambar_kk_warga');
                $namafilekk = $kk->getRandomName();
                $data = array(
                    'id_desa_warga' => $id_desa_rt,
                    'nama_warga' =>  $this->request->getPost('nama_warga'),
                    'nik_warga' =>  $this->request->getPost('nik_warga'),
                    'no_kk_warga' =>  $this->request->getPost('no_kk_warga'),
                    'gambar_ktp_warga' => NULL,
                    'gambar_kk_warga' => $namafilekk,
                );
                $kk->move('../public/upload/kk',$namafilekk);
               
            }    
           //jika warga mempunyai ktp
        }else{

            $input = $this->validate([
                'gambar_kk_warga' => [
                    'uploaded[gambar_kk_warga]',
                    'mime_in[gambar_kk_warga,image/jpg,image/jpeg,image/png]',
                    'max_size[gambar_kk_warga,5000]',
                ],
                'gambar_ktp_warga' => [
                    'uploaded[gambar_ktp_warga]',
                    'mime_in[gambar_ktp_warga,image/jpg,image/jpeg,image/png]',
                    'max_size[gambar_ktp_warga,5000]',
                ],
                'nik_warga'  => [
                    'rules' => 'required|is_unique[warga.nik_warga]',
                    'errors' => [
                        'is_unique' => 'input gagal,cek nik/nama yang anda masukan',
                    ],
                ],
            ]);
            if (!$input) {
                $session->setFlashdata('gagal', 'cek nik dan nama / format file tidak sesuai silahkan pilih format jpg/png dengan ukuran maximal 1mb');
                return redirect()->to('/warga');
            } else {
                $kk = $this->request->getFile('gambar_kk_warga');
                $ktp = $this->request->getFile('gambar_ktp_warga');
                $namafilekk = $kk->getRandomName();
                $namafilektp = $ktp->getRandomName();
                $data = array(
                    'id_desa_warga' => $id_desa_rt,
                    'nama_warga' =>  $this->request->getPost('nama_warga'),
                    'nik_warga' =>  $this->request->getPost('nik_warga'),
                    'no_kk_warga' =>  $this->request->getPost('no_kk_warga'),
                    'gambar_ktp_warga' => $namafilektp,
                    'gambar_kk_warga' => $namafilekk,
                );
                $kk->move('../public/upload/kk',$namafilekk);
                $ktp->move('../public/upload/ktp',$namafilektp);
            } 
        
        }
        $model->saveWarga($data);
        return redirect()->to('/warga');
    }

    public function editwarga()
    {
        helper(['form', 'url']);
        $session = session();
        $id_desa_rt = $session->get('id_desa_akunrt');
        $model = new WargaModel();
        //ambil kk dan ktp lama
        $id = $this->request->getPost('id_warga');
        $ktp_old = $this->request->getPost('ktp_old');
        $kk_old = $this->request->getPost('kk_old');

        //jika rt upload ktp tanpa kk
        if($_FILES['gambar_ktp_warga']['name'] !="" && $_FILES['gambar_kk_warga']['name'] =="")
        {
            //validasi file
            $input = $this->validate([
                'gambar_ktp_warga' => [
                    'uploaded[gambar_ktp_warga]',
                    'mime_in[gambar_ktp_warga,image/jpg,image/jpeg,image/png]',
                    'max_size[gambar_ktp_warga,5000]',
                ],
            ]);
            if (!$input) {
                $session->setFlashdata('gagal', 'format file tidak sesuai silahkan pilih format jpg/png dengan ukuran maximal 1mb');
                return redirect()->to('/warga');
            } else {
                if($ktp_old==NULL || $ktp_old='')
                {
                    $ktp = $this->request->getFile('gambar_ktp_warga');
                    $namafilektp = $ktp->getRandomName();
                    $data = array(
                        'id_desa_warga' => $id_desa_rt,
                        'nama_warga' =>  $this->request->getPost('nama_warga'),
                        'nik_warga' =>  $this->request->getPost('nik_warga'),
                        'no_kk_warga' =>  $this->request->getPost('no_kk_warga'),
                        'gambar_ktp_warga' => $namafilektp,
                    );
                    $ktp->move('../public/upload/ktp',$namafilektp);
                }
                elseif($ktp_old!='' || strlen($ktp_old)>=0)
                {
                    $ktp = $this->request->getFile('gambar_ktp_warga');
                    $ktp_tua = $this->request->getPost('ktp_old');
                    $namafilektp = $ktp->getRandomName();
                    $data = array(
                        'id_desa_warga' => $id_desa_rt,
                        'nama_warga' =>  $this->request->getPost('nama_warga'),
                        'nik_warga' =>  $this->request->getPost('nik_warga'),
                        'no_kk_warga' =>  $this->request->getPost('no_kk_warga'),
                        'gambar_ktp_warga' => $namafilektp,
                    );
                    $path = '../public/upload/ktp/'.$ktp_tua;
                    unlink($path);
                    $ktp->move('../public/upload/ktp',$namafilektp);
                }
            }
        }
        //jika rt upload kk tanpa ktp
        elseif($_FILES['gambar_ktp_warga']['name'] =="" && $_FILES['gambar_kk_warga']['name'] !="")
        {
            //validasi file
            $input = $this->validate([
                'gambar_kk_warga' => [
                    'uploaded[gambar_kk_warga]',
                    'mime_in[gambar_kk_warga,image/jpg,image/jpeg,image/png]',
                    'max_size[gambar_kk_warga,5000]',
                ],
            ]);
            if (!$input) {
                $session->setFlashdata('gagal', 'format file tidak sesuai silahkan pilih format jpg/png dengan ukuran maximal 1mb');
                return redirect()->to('/warga');
            } else {
                $kk_tua = $this->request->getPost('kk_old');
                $kk = $this->request->getFile('gambar_kk_warga');
                $namafilekk = $kk->getRandomName();
                $data = array(
                    'id_desa_warga' => $id_desa_rt,
                    'nama_warga' =>  $this->request->getPost('nama_warga'),
                    'nik_warga' =>  $this->request->getPost('nik_warga'),
                    'no_kk_warga' =>  $this->request->getPost('no_kk_warga'),
                    'gambar_kk_warga' => $namafilekk,
                );
                $path = '../public/upload/kk/'.$kk_tua;
                unlink($path);
                $kk->move('../public/upload/kk',$namafilekk);
            }
        }
        //jika rt upload tanpa kk dan tanpa ktp
        elseif($_FILES['gambar_ktp_warga']['name'] =="" && $_FILES['gambar_kk_warga']['name'] =="")
        {
            //no validasi karna ga ada file yang di submit
            $data = array(
                'id_desa_warga' => $id_desa_rt,
                'nama_warga' =>  $this->request->getPost('nama_warga'),
                'nik_warga' =>  $this->request->getPost('nik_warga'),
                'no_kk_warga' =>  $this->request->getPost('no_kk_warga'),
            );
        }
        //jika rt upload ktp dan kk
        elseif($_FILES['gambar_ktp_warga']['name'] !="" && $_FILES['gambar_kk_warga']['name'] !="")
        {
            $input = $this->validate([
                'gambar_kk_warga' => [
                    'uploaded[gambar_kk_warga]',
                    'mime_in[gambar_kk_warga,image/jpg,image/jpeg,image/png]',
                    'max_size[gambar_kk_warga,5000]',
                ],
                'gambar_ktp_warga' => [
                    'uploaded[gambar_ktp_warga]',
                    'mime_in[gambar_ktp_warga,image/jpg,image/jpeg,image/png]',
                    'max_size[gambar_ktp_warga,5000]',
                ],
            ]);
            if (!$input) {
                $session->setFlashdata('gagal', 'format file tidak sesuai silahkan pilih format jpg/png dengan ukuran maximal 1mb');
                return redirect()->to('/warga');
            } else {
                $kk_tua = $this->request->getPost('kk_old');
                $ktp_tua = $this->request->getPost('ktp_old');
                $kk = $this->request->getFile('gambar_kk_warga');
                $namafilekk = $kk->getRandomName();
                $ktp = $this->request->getFile('gambar_ktp_warga');
                $namafilektp = $ktp->getRandomName();
                if($ktp_tua == NULL || strlen($ktp_tua)<=0 || $ktp_tua=='')
                {
                    $data = array(
                        'id_desa_warga' => $id_desa_rt,
                        'nama_warga' =>  $this->request->getPost('nama_warga'),
                        'nik_warga' =>  $this->request->getPost('nik_warga'),
                        'no_kk_warga' =>  $this->request->getPost('no_kk_warga'),
                        'gambar_ktp_warga' => $namafilektp,
                        'gambar_kk_warga' => $namafilekk,
                    );
                    $path = '../public/upload/kk/'.$kk_tua;
                    unlink($path);
                    $kk->move('../public/upload/kk',$namafilekk);
                    $ktp->move('../public/upload/ktp',$namafilektp);
                }elseif($ktp_tua != NULL || $ktp_tua!='' || strlen($ktp_old)>=0){
                    $data = array(
                        'id_desa_warga' => $id_desa_rt,
                        'nama_warga' =>  $this->request->getPost('nama_warga'),
                        'nik_warga' =>  $this->request->getPost('nik_warga'),
                        'no_kk_warga' =>  $this->request->getPost('no_kk_warga'),
                        'gambar_ktp_warga' => $namafilektp,
                        'gambar_kk_warga' => $namafilekk,
                    );
                    $pathkk = '../public/upload/kk/'.$kk_tua;
                    $pathktp = '../public/upload/ktp/'.$ktp_tua;
                    unlink($pathkk);
                    unlink($pathktp);
                    $kk->move('../public/upload/kk',$namafilekk);
                    $ktp->move('../public/upload/ktp',$namafilektp);
                }
                
            }
        }
        $model->updateWarga($data,$id);
        return redirect()->to('/warga');       
    }

    public function hapuswarga()
    {
        $model = new WargaModel();
        $id = $this->request->getPost('id_warga');
        $ktp_old = $this->request->getPost('ktp_old');
        $kk_old = $this->request->getPost('kk_old');
        $pathktp = '../public/upload/ktp/'.$ktp_old;
        $pathkk = '../public/upload/kk/'.$kk_old;
        //cek kondisi ktp bisa null tapi kk wajib upload
        if($ktp_old!=NULL || $ktp_old!='' || strlen($ktp_old)>0 && file_exists($pathktp))
        {
            unlink($pathktp);
            unlink($pathkk);
        }elseif($ktp_old==NULL || $ktp_old=='' || strlen($ktp_old)<=0){
            unlink($pathkk);
        }else{
            $model->deleteWarga($id);
            return redirect()->to('/warga');
        }
        $model->deleteWarga($id);
        return redirect()->to('/warga');
 
    }
}