<?php $this->load->view('template/header'); ?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List Sarana</h3>

          <div class="card-tools">
            <?php if($this->session->userdata('level') == "Admin"){?>
            <a href="<?= base_url('index.php/sarana/tambahsarana')?>" class="btn-sm btn-success">Tambah Sarana</a>
          <?php } ?>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-borderless">
            <thead class="text-secondary">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Sarana</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Gedung</th>
                <th scope="col">Max Duration</th>
                <th scope="col">Open Time</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php error_reporting(0); $i = 0; foreach ($sarana as $row) { $i++;?>
                <tr>
                  <th class="align-middle" scope="row"><?= $i?></th>
                  <td class="align-middle"><?= $row->nama_sarana?></td>
                  <td class="align-middle"><strong><?= $row->kapasitas?></strong><br>Orang</td>
                  <td class="align-middle"><?= $row->gedung?></td>
                  <td class="align-middle"><span class="font-weight-bold"><?= $row->maks_durasi?></span><br>Hour Per Day</td>
                  <td class="align-middle"><span class="font-weight-bold"><?php $waktuAwal = explode(':',$row->waktu_awal); echo $waktuAwal[0].':'.$waktuAwal[1]?>-
                  <?php $waktuAkhir = explode(':',$row->waktu_akhir); echo $waktuAkhir[0].':'.$waktuAkhir[1]?></span><br><?php $hari = explode(',',$row->hari_available); $len = count($hari); echo $hari[0].'-'.$hari[$len-1];?></td>
                  <?php if($this->session->userdata('level') == "Admin"){?>
                  <td class="align-middle"><a href="<?= base_url('/index.php/sarana/editSarana/').$row->id_sarana?>" class="btn btn-warning"><i class="fas fa-pen" style="color: white;"></i></a></td>
                  <td class="align-middle"><a href="<?= base_url('/index.php/sarana/deleteSarana/').$row->id_sarana?>" class="btn btn-danger" onclick="confirmDialog()"><i class="fas fa-trash"></i></a></td>

                  <script>
                    function confirmDialog() {
                        return confirm("Are you sure you want to delete this record?")
                    }
                  </script>
                  <?php }else{?>
                  <td class="align-middle"><a href="<?= base_url('index.php/form_pinjam/index/'.$row->id_sarana)?>" class="btn btn-light">Pinjam</a></td>
                  <?php } ?>
                </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('template/footer'); ?>
