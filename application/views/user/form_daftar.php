<div id="page-wrapper">
  <div class ="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <h1 align="center">List Pelatihan Terdaftar</h1>
<table class="table" border=1>
<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover">
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
  <td><?php echo $dt->harga_pelatihan ?></td>
  <?php if ($dt->status!=1) {?>
	<td><a href="<?php echo base_url();?>user/welcome/ubah/<?php echo $dt->id;?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-edit"></span></a>
      <a href="<?php echo base_url();?>user/welcome/hapus/<?php echo $dt->id;?>" onClick="return checkMe()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
  <?php } else { ?>
  <td>&nbsp;</td>
  <?php } ?>
  </tr>
  <?php endforeach?>
  </tbody>
  </table>
  </div>
  </div>
</div>
