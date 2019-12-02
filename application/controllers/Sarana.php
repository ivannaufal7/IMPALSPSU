<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sarana extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Prasarana_model');
    $this->load->model('Sarana_model');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['sarana'] = $this->Sarana_model->getSarana();
    $this->load->view('v_sarana',$data);
  }
  function tambahsarana(){
    $data['prasarana'] = $this->Prasarana_model->getPrasarana();
    $this->load->view('v_tambah_sarana',$data);
  }

  function editSarana($id){
    $where = array('id_sarana' => $id);
    $data['sarana'] = $this->Sarana_model->getWhereSaranaId('sarana',$where);
    // print_r($data);
    $this->load->view('v_tambah_sarana',$data);
  }
  function deleteSarana($id){
		$this->Sarana_model->deleteSarana($id);
    redirect('Sarana');

	}
}
