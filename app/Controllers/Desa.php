<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DesaModel;

class Desa extends BaseController
{
	
    protected $desaModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->desaModel = new DesaModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{
		$session = session();
        $nama_admin = $session->get('username_admin');
	    $data = [
                'controller'    	=> 'desa',
				'title'     		=> 'Desa',
				'pageTittle'		=> 'Tambah Desa',
				'namauser'			=> $nama_admin,				
			];
		
		return view('desa', $data);
			
	}

	public function getAll()
	{
 		$response = array();		
		
	    $data['data'] = array();
 
		$result = $this->desaModel->select('id_desa, nama_desa')->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '	<button type="button" class="btn btn-sm btn-info" onclick="edit('. $value->id_desa .')"><i class="fa fa-edit"></i></button>';
			$ops .= '	<button type="button" class="btn btn-sm btn-danger" onclick="remove('. $value->id_desa .')"><i class="fa fa-trash"></i></button>';
			$ops .= '</div>';
			
			$data['data'][$key] = array(
				$value->id_desa,
				$value->nama_desa,

				$ops,
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id_desa');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->desaModel->where('id_desa' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			
			throw new \CodeIgniter\Exceptions\PageNotFoundException();

		}	
		
	}	
	
	public function add()
	{

        $response = array();

        $fields['id_desa'] = $this->request->getPost('idDesa');
        $fields['nama_desa'] = $this->request->getPost('namaDesa');


        $this->validation->setRules([
            'nama_desa' => ['label' => 'Nama desa', 'rules' => 'required|max_length[255]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
			
        } else {

            if ($this->desaModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = 'Data has been inserted successfully';	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = 'Insertion error!';
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{

        $response = array();
		
        $fields['id_desa'] = $this->request->getPost('idDesa');
        $fields['nama_desa'] = $this->request->getPost('namaDesa');


        $this->validation->setRules([
            'nama_desa' => ['label' => 'Nama desa', 'rules' => 'required|max_length[255]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
			
        } else {

            if ($this->desaModel->update($fields['id_desa'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = 'Successfully updated';	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = 'Update error!';
				
            }
        }
		
        return $this->response->setJSON($response);
		
	}
	
	public function remove()
	{
		$response = array();
		
		$id = $this->request->getPost('id_desa');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->desaModel->where('id_desa', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = 'Deletion succeeded';	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = 'Deletion error!';
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		
}	