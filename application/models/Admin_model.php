<?php
Class Admin_model extends CI_Model {
  // $nim = "";
  // $nama = "";
  // $jabatan = "";

  public function __construct(){
          parent::__construct();
          $this->load->database(); //could be autoloaded via /config/autoload.php instead
  }
  function getData($id){
    // TODO: check login status
    // ineed to be more clear about where to get this data because i need  to nkow where i should pick up this data from?
    return $this->db->get_where("akun",array('id_user' => $id))->row();
  }

}

 ?>
