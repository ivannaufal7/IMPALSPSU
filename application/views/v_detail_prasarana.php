<?php $this->load->view('template/header'); ?>

    <!-- Main content -->
    <section class="content">

    <div class="info" style="margin: 24px;">
      <?php foreach ($prasarana as $row) {?>
        <h2><?= $row->nama_prasarana?></h2>
        <h5><?= $row->jenis_prasarana?></h5>
        <p><?= $row->kondisi_prasarana?></p>
        <h4><b>Notes</b></h4>
        <p><?= $row->notes?></p>
        <h4><b>Informasi</b></h4>
        <p style="font-size: 18px;">Stock : <?= $row->stock?><br>Maksimal Jumlah : <?= $row->maks_jumlah?> Pcs<br>
        Maksimal Durasi : <?= $row->maks_durasi?> Jam<br>Biaya Overtime : Rp. <?= $row->biaya_overtime?>/jam</p>
        <h4><b>Syarat Peminjaman</b></h4>
        <p><?= $row->syarat?></p>
      <?php } ?>
      <a href="<?= base_url('index.php/form_pinjam/index/'.$row->id_prasarana)?>" class="btn btn-light btn-lg col-5">Pinjam</a>

    </div>


    </section>
  <!-- /.content-wrapper -->
<?php $this->load->view('template/footer'); ?>
