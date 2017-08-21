<div id="page-wrapper">
  <div class ="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <h1 align="center">List Pelatihan Terdaftar</h1>
<table class="table" border=1>
<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover" id="example">
<thead>
  <tr class="progress-bar-info">
     <th>No</th>
     <th>Nama</th>
     <th>Nama Pelatihan</th>
     <th>Periode</th>
     <th>Harga</th>
     <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
  <?php
  $no=1;
  foreach ($d_peserta->result() as $dt): ?>
  <tr>
	<td><?php echo $no++?></td>
	<td><?php echo $dt->nama ?></td>
	<td><?php echo $dt->nm_kursus ?></td>
  <td><?php echo $dt->periode ?></td>
  <td><?php echo 'Rp. ' . number_format($dt->harga_pelatihan,0, ',' , '.'); ?></td>
  <?php if ($dt->status!=1) {?>
	<td><a href="<?php echo base_url();?>user/welcome/ubah/<?php echo $dt->id;?>" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
      <a href="<?php echo base_url();?>user/welcome/hapus/<?php echo $dt->id;?>" onClick="return checkMe()" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
      <?php if ($dt->id_pembayaran!=''&&$dt->no_transaksi==''&&$dt->harga_pelatihan!=0) {?>
      <a href="<?php echo base_url();?>user/welcome/konfirm/<?php echo $dt->id_pembayaran;?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-check"> Konfirmasi</span></a>
      <?php } ?>
  </td>
  <?php } else { ?>
  <td><a href="<?php echo base_url();?>user/welcome/cetak_kartu/<?php echo $dt->id;?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Cetak</a></td>
  <?php } ?>
  </tr>
  <?php endforeach?>
  </tbody>
  </table>
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
