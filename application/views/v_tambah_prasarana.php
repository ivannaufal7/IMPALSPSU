<?php $this->load->view('template/header'); ?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <?php if($this->uri->segment(2) != "editPrasarana"){?>
        <div class="card-body">
          <form action="<?= base_url('index.php/form_prasarana/tambahprasarana');?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
              <label for="durasi">Tambah Prasarana</label>
              <input type="text" class="form-control" placeholder="Nama Prasarana" name="nama_prasarana" style="margin-bottom: 12px;">
              <select class="form-control" name="jenis_prasarana">
                <option value="fasilitas umum">Fasilitas Umum</option>
                <option value="fasilitas khusus">Fasilitas Khusus</option>
                <option value="fasilitas lainnya">Fasilitas Lainnya</option>
              </select>
              </div>
              <div class="form-group col-md-6">
              <label for="#">Deskripsi</label>
              <textarea class="form-control" name="kondisi_prasarana" rows="3"></textarea>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
              <div class="form-row">
                <div class="form-group col-sm-4">
                <label for="durasi">Stock</label>
                <input type="text" class="form-control" name="stock" style="margin-bottom: 12px;">
                </div>
                <div class="form-group col-sm-8">
                <label for="durasi">&nbsp;</label>
                <select class="form-control">
                  <option>Units</option>
                  <option>Units</option>
                </select>
                </div>
                <div class="form-group col-sm-4">
                <label for="durasi">Maksimal Jumlah</label>
                <input type="text" class="form-control" name="maks_jumlah" style="margin-bottom: 12px;">
                </div>
                <div class="form-group col-sm-8">
                <label for="durasi">&nbsp;</label>
                <select class="form-control">
                  <option>Hour</option>
                  <option>Minute</option>
                </select>
                </div>
              </div>
            </div>
              <div class="form-group col-md-6">
              <label for="#">Notes</label>
              <textarea class="form-control" rows="5" name="notes"></textarea>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
              <div class="form-row">
                <div class="form-group col-sm-4">
                <label for="durasi">Maksimal Durasi</label>
                <input type="text" class="form-control" name="maks_durasi" style="margin-bottom: 12px;">
                </div>
                <div class="form-group col-sm-8">
                <label for="durasi">&nbsp;</label>
                <select class="form-control">
                  <option>Hour</option>
                  <option>Day</option>
                </select>
                </div>
                <div class="form-group col-sm-8">
                <label for="durasi">Overtime</label>
                <input type="text" class="form-control" name="biaya_overtime" placeholder="Biaya Overtime" style="margin-bottom: 12px;">
                </div>
                <div class="form-group col-sm-4">
                <label for="durasi">&nbsp;</label>
                <select class="form-control">
                  <option>per Hour</option>
                  <option>per Day</option>
                </select>
                </div>
              </div>
            </div>
              <div class="form-group col-md-6">
              <label for="#">Syarat</label>
              <textarea class="form-control" rows="5" name="syarat"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-success btn-block">Tambah</button>
          </form>
        </div>

      <?php }else{
        foreach ($prasarana as $row) { ?>
        <div class="card-body">
          <form action="<?= base_url('index.php/form_prasarana/editPrasarana/').$row->id_prasarana;?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
              <label for="durasi">Edit Prasarana</label>
              <input type="text" class="form-control" placeholder="Nama Prasarana" value="<?= $row->nama_prasarana?>" name="nama_prasarana" style="margin-bottom: 12px;">
              <select class="form-control" name="jenis_prasarana">
                <option value="fasilitas umum" <?php if($row->jenis_prasarana == "fasilitas umum") echo 'selected="selected"';?>>Fasilitas Umum</option>
                <option value="fasilitas khusus" <?php if($row->jenis_prasarana == "fasilitas khusus") echo 'selected="selected"';?>>Fasilitas Khusus</option>
                <option value="fasilitas lainnya" <?php if($row->jenis_prasarana == "fasilitas lainnya") echo 'selected="selected"';?>>Fasilitas Lainnya</option>
              </select>
              </div>
              <div class="form-group col-md-6">
              <label for="#">Deskripsi</label>
              <textarea class="form-control" name="kondisi_prasarana" rows="3"><?= $row->kondisi_prasarana?></textarea>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
              <div class="form-row">
                <div class="form-group col-sm-4">
                <label for="durasi">Stock</label>
                <input type="text" class="form-control" name="stock" value="<?= $row->stock?>" style="margin-bottom: 12px;">
                </div>
                <div class="form-group col-sm-8">
                <label for="durasi">&nbsp;</label>
                <select class="form-control">
                  <option>Units</option>
                  <option>Units</option>
                </select>
                </div>
                <div class="form-group col-sm-4">
                <label for="durasi">Maksimal Jumlah</label>
                <input type="text" class="form-control" value="<?= $row->maks_jumlah?>" name="maks_jumlah" style="margin-bottom: 12px;">
                </div>
                <div class="form-group col-sm-8">
                <label for="durasi">&nbsp;</label>
                <select class="form-control">
                  <option>Hour</option>
                  <option>Minute</option>
                </select>
                </div>
              </div>
            </div>
              <div class="form-group col-md-6">
              <label for="#">Notes</label>
              <textarea class="form-control" rows="5" name="notes"><?= $row->notes?></textarea>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
              <div class="form-row">
                <div class="form-group col-sm-4">
                <label for="durasi">Maksimal Durasi</label>
                <input type="text" class="form-control" name="maks_durasi" value="<?= $row->maks_durasi?>" style="margin-bottom: 12px;">
                </div>
                <div class="form-group col-sm-8">
                <label for="durasi">&nbsp;</label>
                <select class="form-control">
                  <option>Hour</option>
                  <option>Day</option>
                </select>
                </div>
                <div class="form-group col-sm-8">
                <label for="durasi">Overtime</label>
                <input type="text" class="form-control" name="biaya_overtime" value="<?= $row->biaya_overtime?>" placeholder="Biaya Overtime" style="margin-bottom: 12px;">
                </div>
                <div class="form-group col-sm-4">
                <label for="durasi">&nbsp;</label>
                <select class="form-control">
                  <option>per Hour</option>
                  <option>per Day</option>
                </select>
                </div>
              </div>
            </div>
              <div class="form-group col-md-6">
              <label for="#">Syarat</label>
              <textarea class="form-control" rows="5" name="syarat"><?= $row->syarat?></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-warning btn-block">Edit</button>
          </form>
        </div>
      <?php }
      }?>
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
