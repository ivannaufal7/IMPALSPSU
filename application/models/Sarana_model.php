<?php
Class Sarana_model extends CI_model {
  // $status;
  // $gedung;
  // $lantai;
  // $ruangan;
  // $openTime;
  // $closeTime;
  // $days;
  // $type;
  // $maxDuration;
  // $allowOverTime;
  // $entryDate;
  // $facilitiesId;


  public function __construct()
      {
          parent::__construct();
          $this->load->database(); //could be autoloaded via /config/autoload.php instead
      }

      // public function __construct($id,$name,$desc,$notes,$rules,$fine){
      //     parent::__construct($id,$name,$desc,$notes,$rules,$fine);
      //     $this->load->database(); //could be autoloaded via /config/autoload.php instead
      // }
  function generateKodeSarana(){
    $query = "SELECT max(id_sarana) as maxKode FROM sarana";
    $hasil = $this->db->query($query);
    foreach($hasil->result() as $row){
      echo $row->maxKode;
    }
    $kodeSarana = $row->maxKode;
    // echo $kodePrasarana;

    $noUrut = (int) substr($kodeSarana, 3, 3);
    $noUrut++;
    $char = "SAR";
    $kodeSarana = $char . sprintf("%03s", $noUrut);
    return $kodeSarana;
  }
  public function inputSarana($sarana){
    $this->db->insert('sarana',$sarana);
    if ($this->db->affected_rows() == '1'){
      return true;
    }else{
      return false;
    }
  }

  // public function editSarana(Sarana_model $sarana){
  // // TODO: edit this class from database
  // // Return : true if success and false if failed
  //   return false;
  // }

  // public function deleteSarana(Sarana_model $sarana){
  // // TODO: delete this class from database
  // // Return : true if success and false if failed
  //   return false;
  // }

  public function addFacility($prasaranaIds){
    // TODO: add Facility to this class and to database
    $facilitiesId = $prasaranaIds;
  }

  public function loadAll(){
    // TODO: load all data from database

    return $results;
  }

  public function loadById($id){
    // TODO: load data from database where id equal $id
    return $results;
  }

  public function loadBySearch($key){
    // TODO: load data from database where name or desc like $key
    return $results;
  }
  function getSarana(){
  	 	$query = $this->db->get("sarana");
  	 	if($query->num_rows() != 0){
  				return $query->result();
  			}else{
  				return false;
  			}
  	 }

   function ubahSarana($table,$id,$data){
     $this->db->where($id);
     $this->db->update($table,$data);
   }
   function getWhereSaranaId($table,$where){
  		return $this->db->get_where($table,$where)->result();
  	}
   function deleteSarana($id){
  		// $this->db->where($where);
  		// $this->db->delete($table);
     $this->db->query("DELETE sarana, peminjaman, verifikasi FROM sarana LEFT JOIN peminjaman ON sarana.id_sarana = peminjaman.id_sarana LEFT JOIN verifikasi ON verifikasi.id_peminjaman = peminjaman.id_peminjaman WHERE sarana.id_sarana = '$id'");
  	}

  }
?>
