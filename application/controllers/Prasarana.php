<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prasarana extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Prasarana_model');
    $this->load->model('Peminjaman_model');
    $this->load->model('Verifikasi_model');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['prasarana'] = $this->Prasarana_model->getPrasarana();
    $this->load->view('template',$data);
  }

  function tambahprasarana(){
    $this->load->view('v_tambah_prasarana');
  }
  function editPrasarana($id){
    $where = array('id_prasarana' => $id);
    $data['prasarana'] = $this->Prasarana_model->getWherePrasaranaId('prasarana',$where);
    $this->load->view('v_tambah_prasarana',$data);
  }
  function deletePrasarana($id){
		$this->Prasarana_model->deletePrasarana($id);
    redirect('Prasarana');

	}

  function detailPrasarana($id){
    $data['prasarana'] = $this->Prasarana_model->getWherePrasaranaId('prasarana',array("id_prasarana" => $id));
    $this->load->view('v_detail_prasarana',$data);
  }
}
