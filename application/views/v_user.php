<?php $this->load->view('template/header'); ?>

    <!-- Main content -->
    <section class="content">
<?php if($this->session->userdata('level') == "Mahasiswa"){?>
      <!-- Default box -->
      <div class="col-12">
        <img src="https://images.unsplash.com/photo-1533134486753-c833f0ed4866?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
        width="100%" height="450px" />
    <div class="main main-raised text-center" style="position: absolute; bottom: 55%; left: 0px; right: 0px;color: white;">
		    <div class="profile-content">
            <div class="container">
                <div class="row">
	                <div class="col-md-6 ml-auto mr-auto">
        	           <div class="profile">
	                        <div class="avatar">
	                            <img src="https://www.biography.com/.image/ar_1:1%2Cc_fill%2Ccs_srgb%2Cg_face%2Cq_auto:good%2Cw_300/MTU0NjQzOTk4OTQ4OTkyMzQy/ansel-elgort-poses-for-a-portrait-during-the-baby-driver-premiere-2017-sxsw-conference-and-festivals-on-march-11-2017-in-austin-texas-photo-by-matt-winkelmeyer_getty-imagesfor-sxsw-square.jpg" alt="Circle Image"
                              class="img-raised rounded-circle img-fluid" width="150px" height="150px" style="margin-bottom: 24px;">
	                        </div>
	                        <div class="name">
	                            <h3 class="title"><?= $mhs->nama?></h3>
	                        </div>
	                    </div>
    	            </div>
                </div>
                <!-- <div class="description text-center" style="margin-right: 24px;margin-left: 24px;">
                    <p>An artist of considerable range, Chet Faker — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
                </div> -->

      </div>
    </div>
</div>
    <div class="info" style="margin: 24px;">
      <h3><b>Informasi</b></h3>

        <table class="table table-borderless">
          <tbody>
            <tr>
              <td>NIM</td>
              <td>:</td>
              <td><?= $mhs->nim?></td>
            </tr>
            <tr>
              <td>Kelas</td>
              <td>:</td>
              <td><?= $mhs->kelas?></td>
            </tr>
            <tr>
              <td>Fakultas</td>
              <td>:</td>
              <td><?= $mhs->fakultas?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><?= $mhs->alamat?></td>
            </tr>
          </tbody>
        </table>
              <div class="modal fade" id="modalUbahProfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Ubah Profil</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?= base_url('index.php/user/ubahProfile/').$mhs->nim?>">
            <div class="modal-body mx-3">
              <div class="md-form mb-4">
                <label data-success="right" for="defaultForm-email">NIM</label>
                <input type="text" name="nim" value="<?= $mhs->nim?>" class="form-control">
              </div>

              <div class="md-form mb-4">
                <label data-success="right" for="defaultForm-email">Nama</label>
                <input type="text"  name="nama" class="form-control" value="<?= $mhs->nama?>" validate>
              </div>

              <div class="md-form mb-4">
                <label data-success="right" for="defaultForm-email">Kelas</label>
                <input type="text" name="kelas" value="<?= $mhs->kelas?>" class="form-control">
              </div>

              <div class="md-form mb-4">
                <label data-success="right" for="defaultForm-email">Fakultas</label>
                <input type="text" name="fakultas" value="<?= $mhs->fakultas?>" class="form-control">
              </div>

              <div class="md-form mb-4">
                <label data-success="right" for="defaultForm-email">Alamat</label>
                <input type="text" name="alamat" value="<?= $mhs->alamat?>" class="form-control">
              </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="submit" class="btn btn-success col-12">Ubah</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <div class="text-center">
        <a href="" class="btn btn-success btn-rounded mb-4 col-12" data-toggle="modal" data-target="#modalUbahProfil">
          Ubah Profil</a>
      </div>

    <?php
  }else if($this->session->userdata('level') == "Admin"){ ?>

    <?php } ?>
    </div>

</div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('template/footer'); ?>
