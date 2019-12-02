<?php $this->load->view('template/header'); ?>

    <!-- Main content -->
    <section class="content">

    <div class="info" style="margin: 24px;">
      <?php foreach ($sarana as $row) {?>
        <h2><?= $row->nama_sarana?></h2>
        <h5><?= $row->gedung?></h5>
        <p><?= $row->description?></p>
        <h4><b>Notes</b></h4>
        <p><?= $row->notes?></p>
        <h4><b>Informasi</b></h4>
        <p style="font-size: 18px;">Kapasitas : <?= $row->kapasitas?> Orang<br>Hari Tersedia : <?= $row->hari_available?><br>
          Jam Peminjaman : <?= $row->waktu_awal.' '.$row->waktu_akhir?><br> Maksimal Durasi : <?= $row->maks_durasi?> Jam<br>Biaya Overtime : Rp. <?= $row->overtime?>/jam</p>
        <h4><b>Syarat Peminjaman</b></h4>
        <p><?= $row->syarat?></p>
      <?php } ?>
      <a href="<?= base_url('index.php/form_pinjam/index/'.$row->id_sarana)?>" class="btn btn-light btn-lg col-5">Pinjam</a>

    </div>


    </section>
  <!-- /.content-wrapper -->
<?php $this->load->view('template/footer'); ?>
