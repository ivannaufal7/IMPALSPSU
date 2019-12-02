<?php
Class Verifikasi_model extends CI_Model {
  // $urlDokumen = "";
  // $uploadDate = "";
  // $status = "";

  public function __construct(){
          parent::__construct();
          $this->load->database(); //could be autoloaded via /config/autoload.php instead
  }

  function uploadDocument($file){
    // TODO: upload file document to database
    return false;
  }

  function changeStatus($id,$status){
    if($status == "Accepted"){
      $where = array('id_peminjaman' => $id);
      $data = array('status_persetujuan' => 'Accepted', 'id_admin'=> $this->session->userdata('userId'));
    }else if($status == "Declined"){
      $where = array('id_peminjaman' => $id);
      $data = array('status_persetujuan' => 'Declined', 'id_admin'=> $this->session->userdata('userId'));
    }else if($status == "Kembali"){
      $where = array('id_peminjaman' => $id);
      $data = array('status_persetujuan' => 'Kembali', 'id_admin'=> $this->session->userdata('userId'));
    }else if($status == "Batal"){
      $where = array('id_peminjaman' => $id);
      $data = array('status_persetujuan' => 'Waiting', 'id_admin'=> $this->session->userdata('userId'));
    }

    $this->db->where($where);
    $this->db->update("verifikasi",$data);
    return true;
  }
  function deleteVerifikasi($table, $where){
		$this->db->where($where);
		$this->db->delete($table);
	}
  function getWhereVerifikasiId($table,$where){
    return $this->db->get_where($table,$where)->result();
  }
}

 ?>
