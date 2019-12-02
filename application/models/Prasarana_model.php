<?php
Class Prasarana_model extends CI_Model{

  public function __construct()
      {
          parent::__construct();
          $this->load->database(); //could be autoloaded via /config/autoload.php instead
      }

  // public function __construct($id,$name,$desc,$notes,$rules,$fine){
  //         parent::__construct($id,$name,$desc,$notes,$rules,$fine);
  //         $this->load->database(); //could be autoloaded via /config/autoload.php instead
  //     }

  function inputPrasarana($prasarana){
      $this->db->insert('prasarana',$prasarana);
      if ($this->db->affected_rows() == '1'){
        return true;
      }else{
        return false;
      }
    }
  function generateKodePrasarana(){
    $query = "SELECT max(id_prasarana) as maxKode FROM prasarana";
    $hasil = $this->db->query($query);
    foreach($hasil->result() as $row){
      echo $row->maxKode;
    }
    $kodePrasarana = $row->maxKode;
    echo $kodePrasarana;

    $noUrut = (int) substr($kodePrasarana, 3, 3);
    $noUrut++;
    $char = "PRA";
    $kodePrasarana = $char . sprintf("%03s", $noUrut);
    return $kodePrasarana;
  }
  public function editPrasarana(Prasarana_model $prasarana){
          return false;
      }
  // public function deletePrasarana(Prasarana_model $prasarana){
  //         return false;
  //     }
  function getPrasarana(){
  	 	$query = $this->db->get("prasarana");
  	 	if($query->num_rows() != 0){
  				return $query->result();
  			}else{
  				return false;
  			}
  	 }
  function ubahPrasarana($table,$id,$data){
    $this->db->where($id);
    $this->db->update($table,$data);
  }
  function getWherePrasaranaId($table,$where){
		return $this->db->get_where($table,$where)->result();
	}
  function deletePrasarana($id){
		// $this->db->where($where);
		// $this->db->delete($table);
    $this->db->query("DELETE prasarana, peminjaman, verifikasi FROM prasarana LEFT JOIN peminjaman ON prasarana.id_prasarana = peminjaman.id_prasarana LEFT JOIN verifikasi ON verifikasi.id_peminjaman = peminjaman.id_peminjaman WHERE prasarana.id_prasarana = '$id'");
	}
  public function loadBySearch($key){
          return reseult;
      }
}
?>
