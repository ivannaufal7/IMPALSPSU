<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Peminjaman_model');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    // $data['pinjam'] = $this->Peminjaman_model->getAll();
    if($this->session->userdata('level') != "Admin"){
      $data['pinjam'] = $this->Peminjaman_model->getById($this->session->userdata('userId'));
      $this->load->view('v_peminjaman',$data);
    }else{
      $data['pinjam'] = $this->Peminjaman_model->getAll();
      $this->load->view('v_peminjaman',$data);
    }
  }
  function verifikasi($id, $status){
    print_r($this->session->userdata('userName'));
    $data = array(
        "id_verifikasi" => $this->Peminjaman_model->generateKodeVerifikasi(),
        "tgl_verifikasi" => date("Y-m-d H:i:s"),
        "status_persetujuan" => $status,
        "id_admin" => $this->session->userdata('userId'),
        "id_peminjaman" => $id
    );
    if($this->Peminjaman_model->inputVerifikasi($data)){
      echo "Berhasil diupload";
      redirect('Daftar_request');
    }else{
      echo "Gagal upload";
    }
  }

  function pengembalian($id){
    $getData = $this->Peminjaman_model->getByIdPinjam($id);
    $diff = strtotime($getData[0]['tgl_pengembalian']) - strtotime($getData[0]['tgl_peminjaman']);
    // $diff = strtotime($getData[0]['tgl_pengembalian']);
    $hitungDenda = strtotime(date("Y-m-d H:i:s")) - strtotime($getData[0]['tgl_pengembalian']);
    $jam   = round($diff / (60 * 60));
    $denda   = round($hitungDenda / (60 * 60));
    // echo date("Y-m-d h:i:s").'<br>';
    // echo $getData[0]['tgl_pengembalian'].'<br>';
    // echo floor(strtotime(date("Y-m-d h:i:s")) / (60 * 60)) ."<br>";
    // echo floor(strtotime($getData[0]['tgl_pengembalian']) / (60 * 60));

    if($getData[0]['id_prasarana'] != NULL && $getData[0]['id_sarana'] == NULL){
      if($denda <= 0){
        $hasil = 0;
      }else{
        $hasil = $denda * $getData[0]['biaya_overtime'];
      }
    }else if($getData[0]['id_prasarana'] == NULL && $getData[0]['id_sarana'] != NULL){

      if($denda <= 0){
        $hasil = 0;
      }else{
        $hasil = $denda * $getData[0]['overtime'];
      }
    }

    // echo $denda.' '.$getData[0]['tgl_pengembalian'].' '.date("Y-m-d H:i:s");
    //
    // echo $denda;
    $statusBarang = "Kembali";

    $data = array(
      'id_pengembalian' => $this->Peminjaman_model->generateKodePengembalian(),
      'lama_peminjaman' => $denda,
      'denda' => $hasil,
      'status_barang' => $statusBarang,
      'id_admin' => $this->session->userdata('userId'),
      'id_peminjaman' => $id
    );
    if($this->Peminjaman_model->pengembalianPeminjaman($data)){
      echo "Berhasil diupload";
      $this->db->where(array('id_peminjaman'=>$id));
      $this->db->update('verifikasi',array('status_persetujuan'=>$statusBarang));

      if($getData[0]['id_prasarana'] != NULL){
        $this->db->where(array('id_prasarana'=>$getData[0]['id_prasarana']));
        $stok = $getData[0]['jumlah'] + $getData[0]['stock'];
        $this->db->update('prasarana',array('stock'=>$stok));
      }
      redirect('Peminjaman');
    }else{
      echo "Gagal upload";
    }
    // echo $jam." ".$denda."<br>";
    // echo date("Y-m-d h:i:s")." ".$getData[0]['tgl_pengembalian'];
  }
}
