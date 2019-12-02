<?php $this->load->view('template/header'); ?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <?php if($this->uri->segment(2) != "editSarana"){?>
        <div class="card-body">
          <form action="<?= base_url('/index.php/form_sarana/tambahSarana')?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
              <label for="durasi">Tambah Sarana</label>
              <input type="text" class="form-control" placeholder="Kode Ruangan" name="nama_sarana" style="margin-bottom: 12px;" required>
              <small style="position: relative; bottom: 8px;">Kode ruangan Auto generate</small>
              <select class="form-control" name="gedung">
                <option value="gedung tokong nanas">Gedung Tokong Nanas</option>
                <option value="gedung D">Gedung D</option>
                <option value="gedung F">Gedung F</option>
              </select>
              <input type="text" class="form-control" name="lantai" placeholder="Keterangan lantai" style="margin-top: 12px;margin-bottom: 12px;" required>
              </div>
              <div class="form-group col-md-6">
              <label for="#">Description</label>
              <textarea class="form-control" name="description" rows="6"></textarea>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
              <div class="form-row">
                <div class="form-group col-sm-12">
                <label for="durasi">Kapasitas</label>
                <input type="number" class="form-control" name="kapasitas" style="margin-bottom: 12px;" required>
                </div>
                <div class="form-group col-sm-4">
                <label for="durasi">Maksimal Durasi</label>
                <input type="number" class="form-control" name="maks_durasi" style="margin-bottom: 12px;" required>
                </div>
                <div class="form-group col-sm-8">
                <label for="durasi">&nbsp;</label>
                <select class="form-control">
                  <option>Hour</option>
                </select>
                </div>
              </div>
            </div>
              <div class="form-group col-md-6">
              <label for="#">Notes</label>
              <textarea class="form-control" name="notes" rows="5"></textarea>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
              <div class="form-row">
                <div class="form-group col-sm-12">
                <label for="durasi">Dapat dipinjam pada</label>
                <div class="form-row row">
                  <input type="index" class="form-control col-md-5 timepicker" name="waktuAwal" style="margin-bottom: 12px; margin-right: 12px;" required>
                  <div style="margin-right: 12px;">-</div>
                  <input type="index" class="form-control col-md-5 timepicker" name="waktuAkhir" style="margin-bottom: 12px;" required>
                </div>
                <div class="controls">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="hari_available[]" type="checkbox" id="inlineCheckbox1" value="Senin"
                      data-validation-minchecked-minchecked="1"
                      data-validation-minchecked-message="Pilih minimal satu" checked
                      >
                      <label class="form-check-label" for="inlineCheckbox1">Senin</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input"  name="hari_available[]" type="checkbox" id="inlineCheckbox2" value="Selasa" checked >
                      <label class="form-check-label" for="inlineCheckbox2">Selasa</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="hari_available[]" type="checkbox" id="inlineCheckbox1" value="Rabu" checked >
                      <label class="form-check-label" for="inlineCheckbox1">Rabu</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="hari_available[]" type="checkbox" id="inlineCheckbox2" value="Kamis" checked >
                      <label class="form-check-label" for="inlineCheckbox2">Kamis</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="hari_available[]" type="checkbox" id="inlineCheckbox1" value="Jumat" checked>
                      <label class="form-check-label" for="inlineCheckbox1">Jumat</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="hari_available[]" type="checkbox" id="inlineCheckbox2" value="Sabtu" >
                      <label class="form-check-label" for="inlineCheckbox2">Sabtu</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="hari_available[]" type="checkbox" id="inlineCheckbox2" value="Minggu" >
                      <label class="form-check-label" for="inlineCheckbox2">Minggu</label>
                    </div>
                    <p class="help-block"></p>
                </div>
                </div>
                <div class="form-group col-sm-8">
                <label for="durasi">Overtime</label>
                <input type="number" class="form-control" name="biaya_overtime"  placeholder="Biaya Overtime" style="margin-bottom: 12px;" required>
                </div>
                <div class="form-group col-sm-4">
                <label for="durasi">&nbsp;</label>
                <select class="form-control">
                  <option>per Hour</option>
                </select>
                </div>
              </div>
            </div>
              <div class="form-group col-md-6">
              <label for="#">Syarat</label>
              <textarea class="form-control" name="syarat" rows="5" style="margin-bottom: 16px;"></textarea>

              <!-- <div class="pilih_prasarana">
                <label for="#">Pilih Prasarana</label>
                <button class="btn float-right" style="font-size: 16px;" id="addForm">+</button>
                <div class="form-group row col-md-12" id="itemPrasarana">
                  <select class="form-control col-md-7" style="margin-right: 8px;">
                    <?php foreach ($prasarana as $row) { ?>
                      <option><?= $row->nama_prasarana?></option>
                    <?php }?>
                  </select>
                <input type="text" class="form-control col-md-2" style="margin-bottom: 12px;">
              </div>
              </div> -->

              <div class="jumlah_prasarana">
                <label for="#">Jumlah Prasarana</label>
                <div class="form-group row col-md-12" id="itemPrasarana">
                <input type="number" name="jumlah_prasarana" class="form-control" style="margin-bottom: 12px;" required>
              </div>
              </div
              </div>
            </div>

            <button type="submit" class="btn btn-success btn-block">Tambah</button>
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
  <?php }else{
    foreach ($sarana as $row) {?>
      <div class="card-body">
        <form action="<?= base_url('/index.php/form_sarana/editSarana/').$row->id_sarana?>" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="durasi">Edit Sarana</label>
            <input type="text" class="form-control" placeholder="Kode Ruangan" name="nama_sarana" style="margin-bottom: 12px;" value="<?= $row->nama_sarana?>" required>
            <small style="position: relative; bottom: 8px;">Kode ruangan Auto generate</small>
            <select class="form-control" name="gedung">
              <option value="gedung tokong nanas">Gedung Tokong Nanas</option>
              <option value="gedung D">Gedung D</option>
              <option value="gedung F">Gedung F</option>
            </select>
            <input type="text" class="form-control" name="lantai" placeholder="Keterangan lantai" style="margin-top: 12px;margin-bottom: 12px;" value="<?= $row->lantai?>" required>
            </div>
            <div class="form-group col-md-6">
            <label for="#">Description</label>
            <textarea class="form-control" name="description" rows="6"><?= $row->description?></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
            <div class="form-row">
              <div class="form-group col-sm-12">
              <label for="durasi">Kapasitas</label>
              <input type="number" class="form-control" name="kapasitas" style="margin-bottom: 12px;" value="<?= $row->kapasitas?>" required>
              </div>
              <div class="form-group col-sm-4">
              <label for="durasi">Maksimal Durasi</label>
              <input type="number" class="form-control" name="maks_durasi" value="<?= $row->maks_durasi?>" style="margin-bottom: 12px;" required>
              </div>
              <div class="form-group col-sm-8">
              <label for="durasi">&nbsp;</label>
              <select class="form-control">
                <option>Hour</option>
              </select>
              </div>
            </div>
          </div>
            <div class="form-group col-md-6">
            <label for="#">Notes</label>
            <textarea class="form-control" name="notes" rows="5"><?= $row->notes?></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
            <div class="form-row">
              <div class="form-group col-sm-12">
              <label for="durasi">Dapat dipinjam pada</label>
              <div class="form-row row">
                <input type="index" class="form-control col-md-5 timepicker" name="waktuAwal" style="margin-bottom: 12px; margin-right: 12px;" value="<?php $awal = explode(':',$row->waktu_awal); echo $awal[0].':'.$awal[1];?>" required>
                <div style="margin-right: 12px;">-</div>
                <input type="index" class="form-control col-md-5 timepicker" name="waktuAkhir" style="margin-bottom: 12px;" value="<?php $akhir = explode(':',$row->waktu_akhir); echo $akhir[0].':'.$akhir[1];?>" required>
              </div>
              <div class="controls">
                <?php $checkbox_hari = explode(',',$row->hari_available);?>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="hari_available[]" type="checkbox" id="inlineCheckbox1" value="Senin"
                    data-validation-minchecked-minchecked="1"
                    data-validation-minchecked-message="Pilih minimal satu" <?php if(in_array("Senin", $checkbox_hari)){ echo " checked=\"checked\""; } ?>
                    >
                    <label class="form-check-label" for="inlineCheckbox1">Senin</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input"  name="hari_available[]" type="checkbox" id="inlineCheckbox2" value="Selasa" <?php if(in_array("Selasa", $checkbox_hari)){ echo " checked=\"checked\""; } ?>>
                    <label class="form-check-label" for="inlineCheckbox2">Selasa</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="hari_available[]" type="checkbox" id="inlineCheckbox1" value="Rabu" <?php if(in_array("Rabu", $checkbox_hari)){ echo " checked=\"checked\""; } ?>>
                    <label class="form-check-label" for="inlineCheckbox1">Rabu</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="hari_available[]" type="checkbox" id="inlineCheckbox2" value="Kamis" <?php if(in_array("Kamis", $checkbox_hari)){ echo " checked=\"checked\""; } ?>>
                    <label class="form-check-label" for="inlineCheckbox2">Kamis</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="hari_available[]" type="checkbox" id="inlineCheckbox1" value="Jumat" <?php if(in_array("Jumat", $checkbox_hari)){ echo " checked=\"checked\""; } ?>>
                    <label class="form-check-label" for="inlineCheckbox1">Jumat</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="hari_available[]" type="checkbox" id="inlineCheckbox2" value="Sabtu" <?php if(in_array("Sabtu", $checkbox_hari)){ echo " checked=\"checked\""; } ?>>
                    <label class="form-check-label" for="inlineCheckbox2">Sabtu</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="hari_available[]" type="checkbox" id="inlineCheckbox2" value="Minggu" <?php if(in_array("Minggu", $checkbox_hari)){ echo " checked=\"checked\""; } ?>>
                    <label class="form-check-label" for="inlineCheckbox2">Minggu</label>
                  </div>
                  <p class="help-block"></p>
              </div>
              </div>
              <div class="form-group col-sm-8">
              <label for="durasi">Overtime</label>
              <input type="number" class="form-control" name="biaya_overtime" value="<?= $row->biaya_overtime?>" placeholder="Biaya Overtime" style="margin-bottom: 12px;" required>
              </div>
              <div class="form-group col-sm-4">
              <label for="durasi">&nbsp;</label>
              <select class="form-control">
                <option>per Hour</option>
              </select>
              </div>
            </div>
          </div>
            <div class="form-group col-md-6">
            <label for="#">Syarat</label>
            <textarea class="form-control" name="syarat" value="<?= $row->syarat?>" rows="5" style="margin-bottom: 16px;"></textarea>

            <!-- <div class="pilih_prasarana">
              <label for="#">Pilih Prasarana</label>
              <button class="btn float-right" style="font-size: 16px;" id="addForm">+</button>
              <div class="form-group row col-md-12" id="itemPrasarana">
                <select class="form-control col-md-7" style="margin-right: 8px;">
                  <?php foreach ($prasarana as $row) { ?>
                    <option><?= $row->nama_prasarana?></option>
                  <?php }?>
                </select>
              <input type="text" class="form-control col-md-2" style="margin-bottom: 12px;">
            </div>
            </div> -->

            <div class="jumlah_prasarana">
              <label for="#">Jumlah Prasarana</label>
              <div class="form-group row col-md-12" id="itemPrasarana">
              <input type="number" name="jumlah_prasarana" value="<?= $row->jumlah_prasarana?>" class="form-control" style="margin-bottom: 12px;" required>
            </div>
            </div
            </div>
          </div>

          <button type="submit" class="btn btn-warning btn-block">Edit</button>
        </form>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
  <?php
      }
    } ?>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      var max_fields = 5;
      var x = 1;
      $("#addForm").click(function(e){
        e.preventDefault();
        if(x < max_fields){
          x++;
          $(".pilih_prasarana").append('<div><div class="form-group row col-md-12" id="itemPrasarana"><select class="form-control col-md-7" style="margin-right: 8px;"><?php foreach($prasarana as $row){?><option><?= $row->nama_prasarana?></option><?php }?><input type="text" class="form-control col-md-2" style="margin-bottom: 12px; margin-right: 8px;"><a href="#" class="remove_field">Remove</a></div></div>');
        }
      });

      $(".pilih_prasarana").on("click",".remove_field", function(e){ //user click on remove text
    		e.preventDefault(); $(this).parent('div').remove(); x--;
    	});


    });
  </script>

  <script>
  $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
</script>

  <script>
  const setCaret = function(elm, pos) {
    if(elm.createTextRange) {
      var range = elm.createTextRange();
      range.move('character', pos);
      range.select();
    } else {
      if(typeof(elm.selectionStart) !== "undefined") {
        elm.focus();
        elm.setSelectionRange(pos, pos);
      } else {
        elm.focus();
      }
    }
    }
    const update = function(elm, val, pos) {
    requestAnimationFrame(function() {
      elm.value = val;
    });
    requestAnimationFrame(function() {
      setCaret(elm, pos);
    });
    }
    const getFormattedValue = function(state) {
    const newStateInput = state.input.reduce(function(acc, curr) {
      if (acc.length === 2) {
        acc += ":";
      }
      if (curr !== null) {
        return acc + String(curr);
      }
        return acc;
    }, "")
    return newStateInput;
    }
    const getFormattedPosition = function(position) {
    switch(position) {
      case 0:
      case 1:
        return position;
      case 2:
        return 3;
      case 3:
        return 5;
    }
    }
    const updateInput = function(state, newInt, forceTimeOfDay) {
    let newInput = state.input.slice();
    newInput[state.position] = parseInt(newInt, 10);
    if (forceTimeOfDay) {
      const hours =
        newInput[0] !== null && newInput[1] !== null
          ? newInput[0] * 10 + newInput[1]
          : null;
      const minutes =
        newInput[2] !== null && newInput[3] !== null
          ? newInput[2] * 10 + newInput[3]
          : null;
      if (hours && hours > 24) {
        newInput[0] = 2;
        newInput[1] = 4;
      }
      if (minutes && minutes > 59) {
        newInput[2] = 5;
        newInput[3] = 9;
      }
    }
    return newInput;
    }
    const stop = function(event) {
    event.preventDefault();
    event.stopImmediatePropagation();
    event.stopPropagation();
    }
    var makeItTime = function(options) {
    let input;
    if (typeof(options.input) === "string") {
      input = document.getElementById(options.input);
    } else {
      input = options.input;
    }
    input.size = 5;
    input.placeholder = "00:00";
    let managedKeyCodes = { BACKSPACE: 8
                          , SHIFT: 16
                          , SPACE: 32
                          , END: 35
                          , HOME: 36
                          , LEFT: 37
                          , RIGHT: 39
                          , DELETE: 46
                          }
    for (let i = 48; i < 58; i++) {
      managedKeyCodes[`NUM_${i - 48}`] = i;
    }
    for (let i = 96; i < 106; i++) {
      managedKeyCodes[`NUMPAD_${i - 96}`] = i;
    }
    const keyCodeList = Object.values(managedKeyCodes);
    let state = {
      input: [null, null, null, null],
      position: 0
    }
    input.addEventListener("keydown", function(event) {
      if (event.keyCode > 47) {
        stop(event);
      }
      if (keyCodeList.includes(event.keyCode)) {
        if ((event.keyCode > 47 && event.keyCode < 59)
            || (event.keyCode > 95 && event.keyCode < 107)) {
          state.input = updateInput(state, String.fromCharCode((event.keyCode % 48) + 48), options.forceTimeOfDay);
          state.position = state.position < 3 ? state.position + 1 : 3;
        }
        switch(event.keyCode) {
          case managedKeyCodes.LEFT:
            state.position = state.position > 0 ? state.position - 1 : 0;
            break;
          case managedKeyCodes.RIGHT:
            state.position = state.position < 3 ? state.position + 1 : 3;
            break;
          case managedKeyCodes.HOME:
            state.position = 0;
            break;
          case managedKeyCodes.END:
            state.position = 3;
            break;
          case managedKeyCodes.DELETE:
            state.input[state.position] = null;
            state.position = state.position < 3 ? state.position + 1 : 3;
            break;
          case managedKeyCodes.BACKSPACE:
            if (state.input[state.position] === null) {
              state.position = state.position > 0 ? state.position - 1 : 0;
            }
            state.input[state.position] = null;
            break;
        }
        update(input, getFormattedValue(state), getFormattedPosition(state.position));
      }
    })
    input.addEventListener("keyup", stop);
    input.addEventListener("change", stop);
    input.addEventListener("click", function(event) {
      const pos = this.selectionStart;
      switch(pos) {
        case 0:
        case 1:
          state.position = pos;
          break;
        case 2:
        case 3:
          state.position = 2;
          break;
        default:
          state.position = 3;
          break;
      }
      update(input, getFormattedValue(state), getFormattedPosition(state.position));
    })
    }
    makeItTime({
    input: document.getElementsByClassName("timepicker")[0],
    forceTimeOfDay: true
    });
    makeItTime({
    input: document.getElementsByClassName("timepicker")[1],
    forceTimeOfDay: false
    });
  </script>
<?php $this->load->view('template/footer'); ?>
