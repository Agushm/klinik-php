<html>

<body onLoad="window.print();">
	<?php
	include_once("../library/koneksi.php");


	$row = 20;
	$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
	$pageSql = "SELECT * FROM pasien";
	$pageQry = mysqli_query($pageSql, $server) or die("error paging: " . mysqli_error());
	$jml     = mysqli_num_rows($pageQry);
	$max     = ceil($jml / $row);
	?>


	<p align="center" size="25px">LAPORAN DATA PASIEN</p>

	<hr>
	</hr>

	<table width="100%" cellspacing="0" cellpadding="2" border="1px" class="style1">

		<tr>
			<th width="6%" align="center" bgcolor="#CCCCCC">No Rekam Medis</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nama Pasien</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Jenis Kelamin</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Alamat</th>
		</tr>

		<?php
		$pasienSql = "SELECT * FROM pasien ORDER BY no_rm DESC LIMIT $hal, $row";
		$pasienQry = mysqli_query($pasienSql, $server)  or die("Query pasien salah : " . mysqli_error());
		$nomor  = 0;
		while ($pasien = mysqli_fetch_array($pasienQry)) {
			$nomor++;
		?>
			<tbody>
				<tr>
					<td><?php echo $pasien['no_rm']; ?></td>
					<td><?php echo $pasien['nm_pasien']; ?></td>
					<td><?php echo $pasien['j_kel']; ?></td>
					<td><?php echo $pasien['alamat']; ?></td>
				</tr>
			</tbody>
		<?php } ?>

		</tbody>
	</table>

</body>

</html>