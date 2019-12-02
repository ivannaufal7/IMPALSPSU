<?php error_reporting(0); $this->load->view('template/header'); ?>

    <!-- Main content -->
    <section class="content">
      <?php if($this->session->userdata('feedbackPinjam') != NULL){?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= $this->session->userdata('feedbackPinjam')?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php } ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List Prasarana</h3>

          <div class="card-tools">
            <?php if($this->session->userdata('level') == "Admin"){?>
            <a href="<?= base_url('index.php/form_prasarana')?>" class="btn-sm btn-success">Tambah Prasarana</a>
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
                <th scope="col">Nama Prasarana</th>
                <th scope="col">Created</th>
                <th scope="col">Jenis Prasarana</th>
                <th scope="col">Max Duration</th>
                <th scope="col">Max Jumlah Pinjam</th>
                <th scope="col">Stock</th>
                <th scope="col">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $i = 0;
                foreach ($prasarana as $row) {
                    $i++;
                  ?>
                  <tr onclick="document.location = '<?= base_url('index.php/prasarana/detailPrasarana/').$row->id_prasarana?>';">
                    <td class="align-middle" scope="row"><?= $i?></td>
                    <td class="align-middle"><?= $row->nama_prasarana?></td>
                    <td class="align-middle"><?= $row->tgl_upload?></td>
                    <td class="align-middle"><?= $row->jenis_prasarana?></td>
                    <td class="align-middle"><span class="font-weight-bold"><?= $row->maks_durasi?></span><br>Hour per day</td>
                    <td class="align-middle"><span class="font-weight-bold"><?= $row->maks_jumlah?></span><br>Units</td>
                    <td class="align-middle"><span class="font-weight-bold"><?= $row->stock?></span><br>Units</td>
                    <?php if($this->session->userdata('level') == "Admin"){?>
                    <td class="align-middle"><a href="<?= base_url('/index.php/prasarana/editPrasarana/').$row->id_prasarana?>" class="btn btn-warning"><i class="fas fa-pen" style="color: white;"></i></a></td>
                    <td class="align-middle"><a href="<?= base_url('/index.php/prasarana/deletePrasarana/').$row->id_prasarana?>" class="btn btn-danger" onclick="confirmDialog()"><i class="fas fa-trash"></i></a></td>

                    <script>
        							function confirmDialog() {
        							    return confirm("Are you sure you want to delete this record?")
        							}
        						</script>
                    <?php }else{?>
                    <td class="align-middle"><a href="<?= base_url('index.php/form_pinjam/index/'.$row->id_prasarana)?>" class="btn btn-light">Pinjam</a></td>
                    <?php } ?>
                  </tr>
              <?php  }
              ?>


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
