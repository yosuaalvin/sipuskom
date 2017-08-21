<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Website Font style -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link href="<?php echo base_url();?>assets/css/pendaftaran.css" rel="stylesheet">
<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div class="container">
  <div class="row main">
    <div class="main-login main-center">
      <?php echo form_open_multipart('welcome/daftar_peserta_pelatihan');?>
      <center><h2 class="cols-sm-2 control-label">Form Pendaftaran Peserta Pelatihan</h2></center>

        <div class="form-group" >
          <label for="nm_peserta" class="cols-sm-2 control-label">Nama Peserta</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
              <input required type="text" class="form-control" name="nm_peserta" id="nm_peserta" placeholder="Masukkan Nama Anda">
            </div>
          </div>
        </div>

        <div class="form-group" >
          <label for="institusi" class="cols-sm-2 control-label">Institusi/Perusahaan</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="institusi" id="institusi" placeholder="Masukkan Nama Institusi">
            </div>
          </div>
        </div>



        <div class="form-group">
          <label for="nm_kursus" class="cols-sm-2 control-label">Jenis Pelatihan</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-mortar-board fa" aria-hidden="true"></i></span>
              <select class="form-control" name="nm_kursus" value="">
                <option value="">Pilih Pelatihan</option>
                <?php
                $no=1;
                foreach($kursus as $k):?>
                <option value="<?php echo $k->nama_kursus; ?>"><?php echo $k->nama_kursus; ?></option>
                <?php endforeach; ?>
              </select>
                </div>
          </div>
        </div>

        <div class="form-group" id="harga_pelatihan" style="display:none">
          <label for="harga_pelatihan" class="cols-sm-2 control-label">Harga Pelatihan</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-money fa" aria-hidden="true"></i></span>
              <input type="hidden" class="form-control" name="harga_pelatihan" id="harga_pelatihan_value">
              <input type="text" class="form-control" name="harga_pelatihan_tampilan" id="harga_pelatihan_angka">
            </div>
          </div>
        </div>

        <div class="form-group" id="pelatihan_custom">
          <label for="nm_kursus_custom" class="cols-sm-2 control-label">Pelatihan Custom</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-wrench fa" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="nm_kursus_custom">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="kuota" class="cols-sm-2 control-label">Jumlah Peserta</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="kuota">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="periode" class="cols-sm-2 control-label">Waktu Pelatihan</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar fa" aria-hidden="true"></i></span>
              <input required class="form-control" name="periode" type="date">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="cols-sm-2 control-label">Email</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
              <input required type="email" class="form-control" name="email" placeholder="Masukkan Email Anda"/>
            </div>
          </div>
        </div>

              <p>Buka Telegram messenger. Cari akun @uptpuskom_bot. Tekan tombol /start untuk memperoleh chat ID Anda.</p>
              <p>Bila anda tidak memiliki telegram maka field ini bisa dikosongkan.</p>
              <center><img src="<?php echo base_url();?>assets/images/telegram.gif"/></center><br/>
              <div class="form-group">
                <label for="chat_id" class="cols-sm-2 control-label">Telegram Chat ID</label>
                <div class="cols-sm-10">
                  <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="chat_id" placeholder="Masukkan Chat ID Anda"/>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="password" class="cols-sm-2 control-label">Password</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
              <input required type="password" class="form-control" name="password"  placeholder="Masukkan Password Anda"/>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="id_pertanyaan" class="cols-sm-2 control-label">Pertanyaan Keamanan</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-question fa" aria-hidden="true"></i></span>
              <select required class="form-control" name="id_pertanyaan" value="">
                <option value="">Pilih Pertanyaan</option>
                <?php
                $no=1;
                foreach($pertanyaan as $p):?>
                <option value="<?php echo $p->id_pertanyaan; ?>"><?php echo $p->isi_pertanyaan; ?></option>
                <?php endforeach; ?>
              </select>
                </div>
          </div>
        </div>

        <div class="form-group">
          <label for="jawaban_pertanyaan" class="cols-sm-2 control-label">Jawaban Pertanyaan</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-question-circle fa" aria-hidden="true"></i></span>
              <input required type="text" class="form-control" name="jawaban_pertanyaan" placeholder="Masukkan Jawaban Pertanyaan Keamanan Anda"/>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="tempat_lahir" class="cols-sm-2 control-label">Tempat Lahir</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-download fa" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir Anda"/>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="tanggal_lahir" class="cols-sm-2 control-label">Tanggal Lahir</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar-o fa" aria-hidden="true"></i></span>
              <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Anda"/>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="alamat" class="cols-sm-2 control-label">Alamat</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-bank fa" aria-hidden="true"></i></span>
              <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Anda"/>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="no_telp" class="cols-sm-2 control-label">No. HP / Telegram</label>
          <div class="cols-sm-10">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
              <input required type="text" class="form-control" name="no_telp" placeholder="Masukkan No. HP atau Telegram Anda"/>
            </div>
          </div>
        </div>
        <input id="custom" type="hidden" name="custom" value="1">
        <div align="center" class="g-recaptcha" data-sitekey="6LebdC0UAAAAAKPNiB6Ob7UaLOZ2kTD4NG2Frflp"></div>

        <div class="form-group ">
        <input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Register" name="submit"/>
        </div>

      </form>
      <?php echo form_close();?>

    </div>
  </div>
</div>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--
<div class="container">
  <h2>Form Pendaftaran Pelatihan</h2>

  <div class="row">
    <div class="col-xs-12">
            <?php echo form_open_multipart('welcome/daftar_peserta_pelatihan');?>
            <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="info">
                          <th>Nama Peserta</th>
                          <th><input type="text" size=50 name="nm_peserta" value=""></th>
                        </tr>
                        <tr class="info">
                          <th>Institusi/Perusahan</th>
                          <th><input type="text" size=50 name="institusi" value=""></th>
                        </tr>
                        <tr class="info">
                            <th>Jenis Pelatihan</th>
                            <th><select name="nm_kursus" value="">
                              <option value="">Pilih Pelatihan</option>
                              <?php
                              $no=1;
                              foreach($kursus as $k):?>
                              <option value="<?php echo $k->nama_kursus; ?>"><?php echo $k->nama_kursus; ?></option>
                              <?php endforeach; ?>
                            </select>
                              </th>
                        </tr>
                        <tr class="info">
                            <th>Harga Pelatihan</th>
                            <th><input type="text" size=50 name="harga" id="harga" value="" ></th>
                        </tr>
                        <tr id="pelatihan_custom" class="info">
                            <th>Pelatihan Custom</th>
                            <th><input type="text" size=50 name="nm_kursus_custom" value="">
                            </th>
                        </tr>
                        <tr class="info">
                            <th>Jumlah Peserta</th>
                            <th><input type="text" size=50 name="kuota" value="" ></th>
                        </tr>
                        <tr class="info">
                            <th>Waktu Pelatihan</th>
                            <th><input type="date" size=50 name="periode" value="">
                            </th>
                        </tr>
                        <tr class="info">
                            <th>Email</th>
                            <th><input type="email" size=50 name="email" value=""></th>
                        </tr>
                        <tr class="info">
                            <th>Password</th>
                            <th><input type="password" size=50 name="password" value=""></th>
                        </tr>
                        <tr class="info">
                            <th>Tempat Lahir</th>
                            <th><input type="text" size=50 name="tempat_lahir" value=""></th>
                        </tr>
                        <tr class="info">
                            <th>Tanggal Lahir</th>
                            <th><input type="date" size=50 name="tanggal_lahir" value=""></th>
                        </tr>
                        <tr class="info">
                            <th>Alamat</th>
                            <th><input type="text" size=50 name="alamat" value="" ></th>
                        </tr>
                        <tr class="info">
                            <th>No. Telepon/Telegram</th>
                            <th><input type="text" size=50 name="no_telp" value="" ></th>
                        </tr>
                        <input id="custom" type="hidden" name="custom" value="1">
                        </thead>
                    </table>

          </div>
        </div>
      </div>
    </div>

            <hr>
                     <input type="submit" class="btn btn-primary" value="Daftar" name="submit"/>


                  -->

<script src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>

<script type="text/javascript">
function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('');
}
$(document).ready(function() {
        $('select').change(function() {
            var option = $(this).val();
            showFields(option);
            return false;
        });
        function showFields(option) {
          if (option!='')
          {
            $.ajax({
              url: 'get_harga',
              data: ({ nama_kursus: option }),
              dataType: 'json',
              type: 'post',
              success: function(data) {
                object = JSON.stringify(data);
                stringify = JSON.parse(object);
                for (var i = 0; i < stringify.length; i++) {
                  harga = stringify[i]['harga'];
                  angka = toRp(harga);
                }
                document.getElementById('harga_pelatihan_angka').value = angka;

                document.getElementById('harga_pelatihan_value').value = harga;
            }
            });
            document.getElementById('pelatihan_custom').style.display = "none";
            document.getElementById('harga_pelatihan').style.display = "";

            document.getElementById('custom').value = '0';
          }
          else
          {
            document.getElementById('harga_pelatihan').value = '';
            document.getElementById('pelatihan_custom').style.display = "";
            document.getElementById('harga_pelatihan').style.display = "none";

            document.getElementById('custom').value = '1';
          }
          }
          });
</script>
