<body onload="window.print()">
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
  	<td><img src="<?php echo base_url(); ?>assets/images/logo-undip-black.png" width="200" ></td>
    </tr>
</table>
<br>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
      <td align="center"><strong>REPORT PEMASUKAN UPT PUSKOM UNDIP</strong></td>
  </tr>
  <tr>
      <td align="center"><p>Jl. Prof. Soedarto, Tembalang, Semarang, 1269<br />Telp.(024)7465403</p></td>
  </tr>
</table>
<hr><br>
<table class="table table-striped table-bordered table-hover">
    <thead>
      <th>No</th>
      <th>Nama</th>
      <th>Institusi</th>
      <th>Periode</th>
      <th>Kuota</th>
      <th>Harga</th>
      <th>Total</th>
      <?php
      $no=1;
      foreach($peserta as $b):?>
        <tr>
        <td><?php echo $no++?></td>
        <td><?php echo $b->nama?></td>
        <td><?php echo $b->institusi?></td>
        <td><?php echo $b->periode?></td>
        <td><?php echo $b->kuota?></td>
        <td><?php echo 'Rp. ' . number_format($b->harga_pelatihan,0, ',' , '.');?></td>
        <td><?php echo 'Rp. ' . number_format($b->harga_pelatihan*$b->kuota,0, ',' , '.');?></td>
</thead>
<?php endforeach?>
</table>
<table width=100%>
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="230" align="center"></td>
    <td width="500"></td>
    <td align="center">Total Pemasukan : <?php foreach($total_pemasukan as $total): echo 'Rp. ' . number_format($total->total,0, ',' , '.'); endforeach ?>
    </td>
  </tr>
</table>
</body>
