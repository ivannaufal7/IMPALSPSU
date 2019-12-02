<?php
Class Peminjaman_model extends CI_Model {
  // $id = "";
  // $jumlah = "";
  // $tanggalPinjam = "";
  // $jadwalKembali = "";
  // $tanggalKembali = "";
  // $status = 0;

  function __construct(){
          parent::__construct();
          $this->load->database(); //could be autoloaded via /config/autoload.php instead
  }

  function hitungDenda(){
    // TODO : calculate fee if jadwalKembali < tanggalKembali

    return 0;
  }

  function isOvertime()
  {
      // TODO : return true if jadwalKembali < tanggalKembali
    if($this->jadwalKembali > $this->tanggalKembali){
      return false;
    }else{
      return true;
    }
  }

  function pinjamInventory($peminjaman){
    // return true if success add peminjaman to database
    // $pinjam = array(
    //   'id_peminjaman' => $peminjaman->id,
    //   'jumlah' => $peminjaman->jumlah,
    //   'tgl_peminjaman' =>$peminjaman->tanggalPinjam,
    //   'tgl_pengembalian' =>$peminjaman->tanggalKembali,
    // );
    $this->db->insert('peminjaman',$peminjaman);
    if ($this->db->affected_rows() == '1'){
      return true;
    }else{
      return false;
    }
}


function kembalikanInventory($id){
    // return true if success change peminjaman from database
    return false;
}

function changeStatus($status){
    // return true if success change status from database
    return false;
}

function getAll(){
    // $query = $this->db->get('peminjaman
    $query = $this->db->query("select * FROM prasarana INNER JOIN peminjaman ON prasarana.id_prasarana = peminjaman.id_prasarana INNER JOIN verifikasi ON verifikasi.id_peminjaman = peminjaman.id_peminjaman LEFT JOIN mahasiswa ON mahasiswa.nim = peminjaman.nim LEFT JOIN staff ON staff.nip = peminjaman.nip");
    $result = $query->result();
    return $result; //returned array
}
function getAllRequest(){
    $this->db->join('verifikasi','peminjaman.id_peminjaman = verifikasi.id_peminjaman','inner');
    $this->db->join('prasarana','peminjaman.id_prasarana = prasarana.id_prasarana','left');
    $this->db->join('sarana','peminjaman.id_sarana = sarana.id_sarana','left');
    $query = $this->db->get('peminjaman');
    $result = $query->result();
    return $result; //returned array
}

function getById($id){
    // get peminjaman by id from database
    $query = $this->db->query("select * FROM prasarana INNER JOIN peminjaman ON prasarana.id_prasarana = peminjaman.id_prasarana INNER JOIN verifikasi ON verifikasi.id_peminjaman = peminjaman.id_peminjaman LEFT JOIN mahasiswa ON mahasiswa.nim = peminjaman.nim LEFT JOIN staff ON staff.nip = peminjaman.nip WHERE peminjaman.nim = '123' or peminjaman.nip = '123'");
    // $this->db->where('nim',$id);
    // $query = $this->db->get('peminjaman');
    return  $query->result(); //returns result in array forms(this is not necessary btw, let me know if u need only one line, or change "$query->result_array()" to "$query->row()")
}

function getByIdPinjam($id){
    // get peminjaman by id from database
    // $this->db->where('id_peminjaman',$id);
    // $query = $this->db->get('peminjaman');
    $query = $this->db->query("SELECT * FROM `peminjaman` INNER JOIN prasarana ON peminjaman.id_prasarana = prasarana.id_prasarana where peminjaman.id_peminjaman = '$id'");
    return  $query->result_array(); //returns result in array forms(this is not necessary btw, let me know if u need only one line, or change "$query->result_array()" to "$query->row()")
}

function getByUserId($userId){
    // get all peminjaman filter by userId from database
    $this->db->where("nim = '$userId' or nip='$userId'");
    $query = $this->db->get('peminjaman');
    $result = $query->result_array();
    return $result;
}


function getByStatus($status){
    // get all peminjaman filter by status from database
  // Please make this clear, where can in find this status, status darimana? status dari peminjaman atau status dari pengembalian atau status dari inventori?
  $this->db->where('status_barang',$status);
  $query = $this->db->get('pengembalian'); // Please make this clear where to find or how to find which table contains status.
    return array();
}

function generateKodePeminjaman(){
  $query = "SELECT max(id_peminjaman) as maxKode FROM peminjaman";
  $hasil = $this->db->query($query);
  foreach($hasil->result() as $row){
    echo $row->maxKode;
  }
  $kodePinjam = $row->maxKode;

  $noUrut = (int) substr($kodePinjam, 3, 3);
  $noUrut++;
  $char = "PIN";
  $kodePinjam= $char . sprintf("%03s", $noUrut);
  return $kodePinjam;
}

function generateKodeVerifikasi(){
  $query = "SELECT max(id_verifikasi) as maxKode FROM verifikasi";
  $hasil = $this->db->query($query);
  foreach($hasil->result() as $row){
    echo $row->maxKode;
  }
  $kodeVerifikasi = $row->maxKode;
  // echo $kodePrasarana;

  $noUrut = (int) substr($kodeVerifikasi, 3, 3);
  $noUrut++;
  $char = "VER";
  $kodeVerifikasi = $char . sprintf("%03s", $noUrut);
  return $kodeVerifikasi;
}

function inputVerifikasi($verifikasi){
    $this->db->insert('verifikasi',$verifikasi);
    if ($this->db->affected_rows() == '1'){
      return true;
    }else{
      return false;
    }
  }
function deletePeminjaman($table, $where){
    $this->db->where($where);
    $this->db->delete($table);
  }

//pengembalian

function generateKodePengembalian(){
  $query = "SELECT max(id_pengembalian) as maxKode FROM pengembalian";
  $hasil = $this->db->query($query);
  foreach($hasil->result() as $row){
    echo $row->maxKode;
  }
  $kodePengembalian = $row->maxKode;
  // echo $kodePrasarana;

  $noUrut = (int) substr($kodePengembalian, 3, 3);
  $noUrut++;
  $char = "PNG";
  $kodePengembalian = $char . sprintf("%03s", $noUrut);
  return $kodePengembalian;
}

function pengembalianPeminjaman($data){
  $this->db->insert('pengembalian',$data);
  if ($this->db->affected_rows() == '1'){
    return true;
  }else{
    return false;
  }
}
}?>
