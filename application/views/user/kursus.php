<div id="page-wrapper">
  <div class ="container-fluid">
    <div class="row">
      <div class="col-md-11">
      <h1 align="center">Pendaftaran Pelatihan &nbsp;<a href="<?php echo base_url();?>user/welcome/daftar_pelatihan_custom/" class="btn btn-sm btn-default">Daftar Pelatihan Custom</a></h1>
<table class="table" border=1>
<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover" id="example">
<thead>
<tr class="progress-bar-info">
  <th><b>No</b></th>
  <th><b>Nama Pelatihan</b></th>
  <th><b>Nama Laboratorium</b></th>
  <th><b>Tanggal</b></th>
  <th><b>Harga</b></th>
  <th><b>Kuota</b></th>
  <th><b>Aksi</b></th>
</tr>
</thead>
<tbody>
<?php
$no=1;
foreach($kursus as $b):?>
  <tr>
  <td><?php echo $no++?></td>
  <td><?php echo $b->nama_kursus?></td>
  <td><?php echo $b->laboratorium?></td>
  <td><?php echo $b->periode?></td>
  <td><?php echo 'Rp. ' . number_format($b->harga,0, ',' , '.'); ?></td>
  <td><?php echo $b->kuota?></td>
  <?php if ($b->status ==1){
  echo '<td><a href="<?php echo base_url();?>user/welcome/daftar/<?php echo $b->id;?>" disabled="disabled" class="btn btn-sm btn-default">Locked <span class="glyphicon glyphicon-remove-sign">';}
  else{?>
 <td><a href="<?php echo base_url();?>user/welcome/daftar/<?php echo $b->id;?>" class="btn btn-sm btn-default">Daftar <span class="glyphicon glyphicon-new-window"><?php
  }?>
  </span></a>
  </td>

</tr>
<?php endforeach?>
</tbody>
</table>
</div>
</div>
</div>
</div>


		</div>

    </div>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

            <script type="text/javascript   ">
                $(document).ready( function () {
                    $('#example').DataTable();
                    //$( 'a' ).imageLightbox();
                } );

            </script>
