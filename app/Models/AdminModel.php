<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class AdminModel extends Model{
    protected $table = 'admin';
    protected $allowedFields = ['username_admin','password_admin','no_hp_admin',];
}
 