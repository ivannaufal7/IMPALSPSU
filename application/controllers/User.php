<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Mahasiswa_model');
    $this->load->model('Staff_model');
    $this->load->model('Admin_model');
  }

  function index()
  {
    if($this->session->userdata('level') == "Mahasiswa"){
        $data['mhs'] = $this->Mahasiswa_model->getData($this->session->userdata('userName'));
        $this->load->view('v_user',$data);
    }else{
      $data['admin'] = $this->Admin_model->getData($this->session->userdata('userName'));
      $this->load->view('v_user',$data);
    }

  }

  function ubahProfile($id){
    $where = array('nim' => $id);
    $data = array(
        'nim' => $this->input->post('nim'),
        'nama' => $this->input->post('nama'),
        'kelas' => $this->input->post('kelas'),
        'alamat' => $this->input->post('alamat'),
        'fakultas' => $this->input->post('fakultas')
    );
    if($this->Mahasiswa_model->editProfile($where, $data) == true){
      redirect('User');
    }
  }

}
