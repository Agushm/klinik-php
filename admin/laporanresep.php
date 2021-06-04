<html>

<body onLoad="window.print();">
	<?php
	include_once("../library/koneksi.php");


	$row = 20;
	$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
	$pageSql = "SELECT * FROM obat";
	$pageQry = mysqli_query($pageSql, $server) or die("error paging: " . mysqli_error());
	$jml     = mysqli_num_rows($pageQry);
	$max     = ceil($jml / $row);
	?>


	<p align="center" size="25px">LAPORAN DATA PENERIMA RESEP</p>

	<hr>
	</hr>

	<table width="100%" cellspacing="0" cellpadding="2" border="1px" class="style1">

		<tr>
			<th width="6%" align="center" bgcolor="#CCCCCC">No Pemeriksaan</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nama Pasien</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nama Obat</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Aturan Minum</th>
		</tr>

		<?php
		$obatSql = "SELECT * FROM obat ORDER BY no_periksa DESC LIMIT $hal, $row";
		$obatQry = mysqli_query($obatSql, $server)  or die("Query obat salah : " . mysqli_error());
		$nomor  = 0;
		while ($obat = mysqli_fetch_array($obatQry)) {
			$nomor++;
		?>
			<tbody>
				<tr>
					<td><?php echo $obat['no_periksa']; ?></td>
					<td><?php echo $obat['nm_pasien']; ?></td>
					<td><?php echo $obat['nm_obat']; ?></td>
					<td><?php echo $obat['aturan']; ?></td>
				</tr>
			</tbody>
		<?php } ?>

		</tbody>
	</table>

</body>

</html>