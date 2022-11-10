<?php

namespace App\Controllers;
use App\Models\HomepageModel;
class Home extends BaseController
{
    public function index()
    {
        $model = new HomepageModel();
        $data['no_hp_admin'] = $model->getAdmin();
        $data['desaterdaftar'] = $model->getJumlahDesaTerdaftar();
        $data['wargaterdaftar'] = $model->getJumlahWargaTerdaftar();
        return view('welcome_message',$data);
    }
}
