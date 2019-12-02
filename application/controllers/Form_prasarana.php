<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_prasarana extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Prasarana_model');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    // $data['pinjam'] = $this->Peminjaman_model->getAll();
    $this->load->view('v_tambah_prasarana');
  }
  function tambahprasarana(){
    $prasarana = array(
      'id_prasarana' => $this->Prasarana_model->generateKodePrasarana(),
      'nama_prasarana' => $this->input->post('nama_prasarana'),
      'kondisi_prasarana' => $this->input->post('kondisi_prasarana'),
      'jenis_prasarana' => $this->input->post('jenis_prasarana'),
      'tgl_upload' => date("Y-m-d H:i:s"),
      'stock' => $this->input->post('stock'),
      'maks_jumlah' => $this->input->post('maks_jumlah'),
      'maks_durasi' => $this->input->post('maks_durasi'),
      'biaya_overtime' => $this->input->post('biaya_overtime'),
      'notes' => $this->input->post('notes'),
      'syarat' => $this->input->post('syarat'),
    );

    if($this->Prasarana_model->inputPrasarana($prasarana)){
      echo "Berhasil diupload";
      redirect('Prasarana');
    }else{
      echo "Gagal upload";
    }
  }
  function editPrasarana($id){
    $where = array("id_prasarana" => $id);
    $prasarana = array(
      'id_prasarana' => $id,
      'nama_prasarana' => $this->input->post('nama_prasarana'),
      'kondisi_prasarana' => $this->input->post('kondisi_prasarana'),
      'jenis_prasarana' => $this->input->post('jenis_prasarana'),
      'stock' => $this->input->post('stock'),
      'maks_jumlah' => $this->input->post('maks_jumlah'),
      'maks_durasi' => $this->input->post('maks_durasi'),
      'biaya_overtime' => $this->input->post('biaya_overtime'),
      'notes' => $this->input->post('notes'),
      'syarat' => $this->input->post('syarat'),
    );
    $this->Prasarana_model->ubahPrasarana('prasarana',$where,$prasarana);
    redirect('Prasarana');
  }


}
