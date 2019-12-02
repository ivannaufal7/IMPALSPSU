<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--CSS Internal-->
    <link rel="stylesheet" type="text/css" href="assets/css/login.css" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Register</title>
</head>
<body style="overflow-x: hidden;">
        <div class="container login">
                <div class="row">
                    <div class="col-6">
                        <div class="container form" style="position: relative; top: 25%;">
                            <div class="judul">
                                <h2>Register</h2>
                                <p>Please register to access our property </p>
                            </div>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->userdata('validasiAkun');?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="id" placeholder="NIP / NIM">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="repassword" placeholder="RePassword">
                                </div>
                                <div class="after-input">
                                    <button type="submit" name="register_button" class="button btn btn-success">Daftar</button>
                                    <p>have account? <a href="<?php echo base_url();?>index.php/main/login">Sign in</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class= "container background"></div>
                            <img src="<?php echo base_url();?>/assets/img/background.png" width="148%" height="119%">
                            <div style="position: absolute; top: 30%; bottom: 20%; left: 50%;" class="text-center">
                                <img src="<?php echo base_url();?>/assets/img/logo.png" class="img-fluid" width="160px">
                                <p style="font-size: 24px;" class="text-white">Sistem Peminjaman Sarana dan Prasarana Universitas</p>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
</body>
</html>
