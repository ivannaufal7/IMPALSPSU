<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_pinjam extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library(array('form_validation'));
    $this->load->helper(array('url','form'));
    $this->load->model('Peminjaman_model');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['id'] = $this->uri->segment('3');
    $this->load->view('v_form_pinjam',$data);
  }

  function pinjam($id){

    if(strpos($id,'PRA') !== false){
        $id_sarana = NULL;
        $id_prasarana = $id;
        $where = array("id_prasarana" => $id);
        $this->db->where($where);
        $data = $this->db->get('prasarana')->result_array();
        $stok = $data[0]['stock'];
        if($this->input->post('jumlah') <= $data[0]['maks_jumlah'] && $this->input->post('durasi') <= $data[0]['maks_durasi']){
          $hitungStok = $data[0]['stock'] - $this->input->post('jumlah');
          // $updateStok = array("stock"=>$hitungStok);
          // $this->db->where($where);
          // $this->db->update('prasarana',$updateStok);

          //cek Durasi
          $update = array("stock"=>$hitungStok);
          $this->db->where($where);
          $this->db->update('prasarana',$update);
          $this->session->set_userdata('feedbackPinjam',NULL);

          $id_peminjaman = $this->Peminjaman_model->generateKodePeminjaman();
          $durasi = $this->input->post('durasi');
          $satuanDurasi = $this->input->post('satuanDurasi');
          $countDates = $durasi." ".$satuanDurasi;

          if($this->session->userdata('level') == "Mahasiswa"){
            $pinjam = array(
              'id_peminjaman' => $id_peminjaman,
              'id_sarana' => $id_sarana,
              'id_prasarana' => $id_prasarana,
              'nim' => $this->session->userdata('userId'),
              'jumlah' => $this->input->post('jumlah'),
              'tgl_peminjaman' =>date("Y-m-d H:i:s"),
              'tgl_pengembalian' =>date("Y-m-d H:i:s", strtotime("+".$countDates)),
            );
          }
          $request = array(
              "id_verifikasi" => $this->Peminjaman_model->generateKodeVerifikasi(),
              "tgl_verifikasi" => date("Y-m-d H:i:s"),
              "status_persetujuan" => "Waiting",
              "id_admin" =>"",
              "id_peminjaman" => $id_peminjaman
          );

          if($this->Peminjaman_model->pinjamInventory($pinjam) && $this->Peminjaman_model->inputVerifikasi($request) && $this->session->userdata('feedbackPinjam') == NULL){
            echo "Berhasil diupload";
            redirect('Daftar_request');
          }else{
            echo "Gagal upload";
            redirect('Prasarana');
          }
        }else{
          $this->session->set_userdata('feedbackPinjam','Melebihi batas jumlah peminjaman atau durasi yg tidak valid');
          redirect('Prasarana');
        }
        // print_r($data);
        // echo $hitungStok;

    }else if(strpos($id,'SAR') !== false){
      $id_sarana = $id;
      $id_prasarana = NULL;

      $where = array("id_sarana" => $id);
      $this->db->where($where);
      $data = $this->db->get('sarana')->result_array();
      // $stok = $data[0]['stock'];
      if($this->input->post('jumlah') <= $data[0]['kapasitas'] && $this->input->post('durasi') <= $data[0]['maks_durasi']){
        // $hitungStok = $data[0]['stock'] - $this->input->post('jumlah');
        // $updateStok = array("stock"=>$hitungStok);
        // $this->db->where($where);
        // $this->db->update('prasarana',$updateStok);

        //cek Durasi
        // $update = array("stock"=>$hitungStok);
        // $this->db->where($where);
        // $this->db->update('prasarana',$update);

        $this->session->set_userdata('feedbackPinjam',NULL);

        $id_peminjaman = $this->Peminjaman_model->generateKodePeminjaman();
        $durasi = $this->input->post('durasi');
        $satuanDurasi = $this->input->post('satuanDurasi');
        $countDates = $durasi." ".$satuanDurasi;

        if($this->session->userdata('level') == "Mahasiswa"){
          $pinjam = array(
            'id_peminjaman' => $id_peminjaman,
            'id_sarana' => $id_sarana,
            'id_prasarana' => $id_prasarana,
            'nim' => $this->session->userdata('userId'),
            'jumlah' => $this->input->post('jumlah'),
            'tgl_peminjaman' =>date("Y-m-d H:i:s"),
            'tgl_pengembalian' =>date("Y-m-d H:i:s", strtotime("+".$countDates)),
          );
        }
        $request = array(
            "id_verifikasi" => $this->Peminjaman_model->generateKodeVerifikasi(),
            "tgl_verifikasi" => date("Y-m-d H:i:s"),
            "status_persetujuan" => "Waiting",
            "id_admin" =>"",
            "id_peminjaman" => $id_peminjaman
        );

        if($this->Peminjaman_model->pinjamInventory($pinjam) && $this->Peminjaman_model->inputVerifikasi($request) && $this->session->userdata('feedbackPinjam') == NULL){
          echo "Berhasil diupload";
          redirect('Daftar_request');
        }else{
          echo "Gagal upload";
          redirect('Sarana');
        }
      }else{
        $this->session->set_userdata('feedbackPinjam','Melebihi batas jumlah peminjaman atau durasi yg tidak valid');
        redirect('Sarana');
      }
    }



  }

}
