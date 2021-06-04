<?php if($_GET["nama"] == null){ ?>
<div style="padding-bottom:50px;padding-left:50px"><h3 class="text-left h4" style="margin-bottom:5px">Masukan Nama Pasien</h3></div>
<form action="" method="get" class="form-horizontal">
			
<input type="hidden" name="menu" value="history" required class="form-control" />
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Pasien</label>
							<div class="col-lg-4">
								<input type="text" name="nama" value="<?php echo $editDb["nm_pasien"];?>" required class="hiden" />
							</div>
						</div>
						
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit"  class="btn btn-primary" />
						</div>
					</form>


<?php }else{ ?>
<style>
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
<html>

<body >
	<?php
	include_once("../library/koneksi.php");

	$row = 20;
	$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
	$pageSql = "SELECT * FROM kunjungan";
	$pageQry = mysql_query($pageSql,$server) or die("error paging: " . mysql_error());
	$jml     = mysql_num_rows($pageQry);
    $max     = ceil($jml / $row);
    
    $kunjunganSql = "SELECT * FROM kunjungan WHERE nm_pasien='".$_GET['nama']."' ORDER BY kd_kunjungan DESC LIMIT $hal, $row";
		$kunjunganQry = mysql_query($kunjunganSql,$server)  or die("Query kunjungan salah : " . mysql_error());
		$nomor  = 0;
	?>
    
    
	<h2 align="center" size="25px">Laporan Kunjungan <?php echo($_GET['nama'])?></h2>
	<button class="btn btn-primary no-print" href ='window.print();'>Cetak</button>
	<hr>
	</hr>

	<table width="100%" cellspacing="0" cellpadding="2" border="1px" class="style1">
	<tr>
			<th width="6%" align="center" bgcolor="#CCCCCC">Tanggal Kunjungan</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nomor Rekam Medis</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nama Pasien</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Jam Kunjung</th>
		</tr>
		<?php
		$kunjunganSql = "SELECT * FROM kunjungan WHERE nm_pasien='".$_GET['nama']."' ORDER BY kd_kunjungan DESC LIMIT $hal, $row";
		$kunjunganQry = mysql_query($kunjunganSql,$server)  or die("Query kunjungan salah : " . mysql_error());
		$nomor  = 0;
		while ($kunjungan = mysql_fetch_array($kunjunganQry)) {
			$nomor++;
		?>
			<tbody>
				<tr>
					<td><?php echo $kunjungan['tgl_kunjungan']; ?></td>
					<td><?php echo $kunjungan['no_rm']; ?></td>
					<td><?php echo $kunjungan['nm_pasien']; ?></td>
					<td><?php echo $kunjungan['jam_kunjungan']; ?></td>

				</tr>
			</tbody>
		<?php } ?>
		

		</tbody>
	</table>

</body>

</html>
<?php }?>