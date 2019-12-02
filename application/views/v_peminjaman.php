<?php $this->load->view('template/header'); ?>

    <!-- Main content -->
    <section class="content">
      <?php  if($this->session->userdata('Admin')){?>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner text-white">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
      </div>
    <?php } ?>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List Peminjaman</h3>

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
                <th scope="col">No.</th>
                <th scope="col">ID Peminjaman</th>
                <th scope="col">Nama Item</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Estimasi tgl Pengembalian</th>
                <th scope="col">Biaya Overtime</th>
                <th scope="col">Denda</th>
                <th scope="col">Status</th>
                <?php if($this->session->userdata('level') == "Admin"){?>
                  <th scope="col">Action</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php $i = 0;foreach ($pinjam as $row) { $i++;?>
                <tr>
                  <th class="align-middle" scope="row"><?= $i?></th>
                  <td class="align-middle"><?= $row->id_peminjaman?></td>
                  <td class="align-middle"><?= $row->nama_prasarana.' '.$row->nama_sarana?></td>
                  <td class="align-middle"><?= $row->tgl_peminjaman?></td>
                  <td class="align-middle"><?= $row->tgl_pengembalian?></td>
                  <td class="align-middle"><strong><?= $row->biaya_overtime?><?= $row->overtime?></strong><br>Per hour</td>
                  <td class="align-middle"><?php if($row->denda == NULL){ echo "0";}else{ echo $row->denda;}?></td>
                  <td class="align-middle"><?= $row->status_persetujuan?></td>
                  <?php if($this->session->userdata('level') == "Admin"){
                    if($row->status_persetujuan != "Kembali" && $row->status_persetujuan == "Accepted"){?>
                  <td class="align-middle"><a href="<?= base_url('/index.php/Peminjaman/pengembalian/').$row->id_peminjaman?>" class="btn btn-light">Return</a></td>
                  <?php
                }else if($row->status_persetujuan == "Waiting"){?>
                    <td class="align-middle"></td>
                <?php }else{?>
                    <td class="align-middle">Telah Selesai</td>
                  <?php }}?>
                </tr>
              <?php } ?>

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
