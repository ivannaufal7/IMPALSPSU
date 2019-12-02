<?php $this->load->view('template/header'); ?>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <form action="<?php echo base_url('index.php/Form_pinjam/pinjam/').$id?>" method="post">
            <div class="form-group">
              <label for="pinjamsarana">Form Peminjaman</label>
              <?php if(strpos($id,'PRA') !== false){?>
              <input type="text" class="form-control" value="<?= $id?>" name="id_prasarana" disabled>
              <?php
            }else if(strpos($id,'SAR') !== false){
              ?>
              <input type="text" class="form-control" value="<?= $id?>" name="id_sarana" disabled>
            <?php } ?>
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="text" class="form-control"  placeholder="Masukan jumlah pinjam " name="jumlah">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
              <label for="durasi">Durasi Pinjam</label>
              <input type="text" class="form-control" id="durasi" name="durasi">
              </div>
              <div class="form-group col-md-6">
              <label for="#">&nbsp;</label>
              <select class="form-control" name="satuanDurasi" id="satuanDurasi">
                <option value="hours">Hour</option>
              </select>
              </div>
            </div>

            <button type="submit" class="btn btn-success btn-block">Pinjam</button>
          </form>
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
