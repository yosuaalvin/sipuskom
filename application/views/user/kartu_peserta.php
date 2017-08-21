<body onload="window.print()">
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
  	<td><img src="<?php echo base_url(); ?>assets/images/logo-undip-black.png" width="200" ></td>
    </tr>
</table>
<br>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
      <td align="center"><strong>KARTU TANDA PESERTA PELATIHAN UPT PUSKOM UNDIP</strong></td>
  </tr>
  <tr>
      <td align="center"><p>Jl. Prof. Soedarto, Tembalang, Semarang, 1269<br />Telp.(024)7465403</p></td>
  </tr>
</table>
<hr><br>
<table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
          <th>Institusi</th>
          <th>:</th>
          <th><?php echo $dt_peserta->institusi?></th>
      </tr>
      <tr>
          <th>Jenis Pelatihan</th>
          <th>:</th>
          <th><?php echo $dt_peserta->nm_kursus?></th>
      </tr>
      <tr>
          <th>Jumlah Peserta</th>
          <th>:</th>
          <th><?php echo $dt_peserta->kuota?></th>
      </tr>
      <tr>
          <th>Periode</th>
          <th>:</th>
          <th><?php echo $dt_peserta->periode?></th>
      </tr>
        </thead>
    </table>
<!--
<table width=100%>
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="230" align="center"></td>
    <td width="500"></td>
    <td align="center">Semarang, <?php echo date('d-m-Y');?><br>Yang menyatakan, <br> Staff UPT Puskom UNDIP</td>
  </tr>
  <tr>
    <td align="center"><br /><br /><br /><br /><br /><br /></td>
    <td>&nbsp;</td>
    <td align="center" valign="top"><br /><br /><br /><br /><br />
      ( .................................................... )<br />
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
-->
</body>
