<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_request extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Peminjaman_model');
    $this->load->model('Verifikasi_model');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['request'] = $this->Peminjaman_model->getAll();
    $this->load->view('v_daftar_request',$data);
  }

  function verifikasi($id,$status){
    if($this->Verifikasi_model->changeStatus($id,$status)){
      redirect('Daftar_request');
    }
  }

}
