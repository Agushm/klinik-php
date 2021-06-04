<html>

<body onLoad="window.print();">
	<?php
	include_once("../library/koneksi.php");


	$row = 20;
	$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
	$pageSql = "SELECT * FROM dokter";
	$pageQry = mysqli_query( $server,$pageSql) or die("error paging: " . mysqli_error());
	$jml     = mysqli_num_rows($pageQry);
	$max     = ceil($jml / $row);
	?>


	<p align="center" size="25px">LAPORAN DATA PERIKSA</p>

	<hr>
	</hr>

	<table width="100%" cellspacing="0" cellpadding="2" border="1px" class="style1">

		<tr>
			<th width="6%" align="center" bgcolor="#CCCCCC">No Pemeriksaan</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nama Pasien</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Tanggal Kunjungan</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Tensi</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nadi</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Suhu</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Pernapasan</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Berat Badan</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Keluhan</th>
		</tr>

		<?php
		$periksaSql = "SELECT * FROM dokter ORDER BY no_periksa DESC LIMIT $hal, $row";
		$periksaQry = mysqli_query($periksaSql, $server)  or die("Query dokter salah : " . mysqli_error());
		$nomor  = 0;
		while ($dokter = mysqli_fetch_array($periksaQry)) {
			$nomor++;
		?>
			<tbody>
				<tr>
					<td><?php echo $dokter['no_periksa']; ?></td>
					<td><?php echo $dokter['nm_pasien']; ?></td>
					<td><?php echo $dokter['tgl_kunjungan']; ?></td>
					<td><?php echo $dokter['tensi']; ?></td>
					<td><?php echo $dokter['nadi']; ?></td>
					<td><?php echo $dokter['suhu']; ?></td>
					<td><?php echo $dokter['napas']; ?></td>
					<td><?php echo $dokter['beratbdn']; ?></td>
					<td><?php echo $dokter['keluhan']; ?></td>
				</tr>
			</tbody>
		<?php } ?>

		</tbody>
	</table>

</body>

</html>