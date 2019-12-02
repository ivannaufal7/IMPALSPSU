<?php $this->load->view('template/header'); ?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Request</h3>

          <div class="card-tools">
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
                <th scope="col">Post Name</th>
                <th scope="col">Created</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($request as $row) { ?>
                <tr>
                  <td class="align-middle"><?= $row->nama_prasarana?><?= $row->nama_sarana?></td>
                  <td class="align-middle"><?= $row->tgl_peminjaman?></td>
                  <td class="align-middle"><span class="font-weight-bold"><?= $row->jumlah?></span><br>Units</td>
                  <td class="align-middle status"><?= $row->status_persetujuan?></td>
                  <td class="align-middle"><?php if($this->session->userdata('level') != "Admin"){?><button class="btn btn-success">Upload</button><?php } else {
                    if($row->status_persetujuan == "Waiting"){?><a href="<?= base_url('/index.php/Daftar_request/verifikasi/').$row->id_peminjaman.'/Accepted'?>" class="btn btn-light accept">Accept</a><a href="<?= base_url('/index.php/Daftar_request/verifikasi/').$row->id_peminjaman.'/Declined'?>" class="btn btn-light" id="decline">Decline</a>
                  <?php }else if($row->status_persetujuan == "Accepted" or $row->status_persetujuan == "Declined"){?>
                    <!-- <a href="<?= base_url('/index.php/Daftar_request/verifikasi/').$row->id_peminjaman.'/Batal'?>" class="btn btn-light batal">Batal</a> -->
                  <?php }else if($row->status_persetujuan == "Batal"){?>
                    <a href="<?= base_url('/index.php/Daftar_request/verifikasi/').$row->id_peminjaman.'/Accepted'?>" class="btn btn-light accept">Accept</a><a href="<?= base_url('/index.php/Daftar_request/verifikasi/').$row->id_peminjaman.'/Declined'?>" class="btn btn-light" id="decline">Decline</a>
                  <?php }
                }?></td>
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
