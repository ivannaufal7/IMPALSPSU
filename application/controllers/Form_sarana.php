<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_sarana extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Sarana_model');
    //Codeigniter : Write Less Do More
  }
  function index()
  {
    // $data['pinjam'] = $this->Peminjaman_model->getAll();
    $this->load->view('v_tambah_sarana');
  }

  function tambahSarana(){

    $hari = implode(',', $_POST['hari_available']);
    $sarana = array(
      'id_sarana' => $this->Sarana_model->generateKodeSarana(),
      'nama_sarana' => $this->input->post('nama_sarana'),
      'kapasitas' => $this->input->post('kapasitas'),
      'jumlah_prasarana' => $this->input->post('jumlah_prasarana'),
      'gedung' => $this->input->post('gedung'),
      'lantai' => $this->input->post('lantai'),
      'maks_durasi' => $this->input->post('maks_durasi'),
      'hari_available' => $hari,
      'waktu_awal' => $this->input->post('waktuAwal'),
      'waktu_akhir' => $this->input->post('waktuAkhir'),
      'biaya_overtime' => $this->input->post('biaya_overtime'),
      'description' => $this->input->post('description'),
      'notes' => $this->input->post('notes'),
      'syarat' => $this->input->post('syarat'),
    );
    // print_r($sarana);
    if($this->Sarana_model->inputSarana($sarana)){
      echo "Berhasil diupload";
      redirect('Sarana');
    }else{
      echo "Gagal upload";
    }
  }

  function editSarana($id){
    $where = array("id_sarana" => $id);
    $hari = implode(',', $_POST['hari_available']);
    $sarana = array(
      'id_sarana' => $this->Sarana_model->generateKodeSarana(),
      'nama_sarana' => $this->input->post('nama_sarana'),
      'kapasitas' => $this->input->post('kapasitas'),
      'jumlah_prasarana' => $this->input->post('jumlah_prasarana'),
      'gedung' => $this->input->post('gedung'),
      'lantai' => $this->input->post('lantai'),
      'maks_durasi' => $this->input->post('maks_durasi'),
      'hari_available' => $hari,
      'waktu_awal' => $this->input->post('waktuAwal'),
      'waktu_akhir' => $this->input->post('waktuAkhir'),
      'biaya_overtime' => $this->input->post('biaya_overtime'),
      'description' => $this->input->post('description'),
      'notes' => $this->input->post('notes'),
      'syarat' => $this->input->post('syarat'),
    );
    $this->Sarana_model->ubahSarana('sarana',$where,$sarana);
    redirect('sarana');
  }

}
?>
