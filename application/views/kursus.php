<link href="<?php echo base_url();?>assets/css/kursus.css" rel="stylesheet">
<div id="page-wrapper">
  <div class ="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <h1 align="center">List Pelatihan UPT Puskom UNDIP</h1>
<table class="table" border=1>
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead>
<tr class="progress-bar-warning">
  <th><b>No</b></th>
  <th><b>Nama Kursus</b></th>
  <th><b>Nama Laboratorium</b></th>
  <th><b>Harga</b></th>
  <th><b>Kuota</b></th>
</tr>
</thead>
<tbody>
<?php
$no=1;
foreach($kursus as $b):?>
  <tr style="background-color:#FFE4B5">
  <td><?php echo $no++?></td>
  <td><?php echo $b->nama_kursus?></td>
  <td><?php echo $b->laboratorium?></td>
  <td><?php echo 'Rp. ' . number_format($b->harga,0, ',' , '.');?></td>
  <td><?php echo $b->kuota?></td>
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
