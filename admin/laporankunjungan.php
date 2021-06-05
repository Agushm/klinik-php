<html>

<body onLoad="window.print();">
	<?php
	include_once("../library/koneksi.php");


	$row = 20;
	$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
	$pageSql = "SELECT * FROM kunjungan";
	$pageQry = mysqli_query($server,$pageSql) or die("error paging: " . mysqli_error());
	$jml     = mysqli_num_rows($pageQry);
	$max     = ceil($jml / $row);
	?>


	<p align="center" size="25px">LAPORAN DATA KUNJUNGAN</p>

	<hr>
	</hr>

	<table width="100%" cellspacing="0" cellpadding="2" border="1px" class="style1">

		<tr>
		<th width="1%" align="center" bgcolor="#CCCCCC">No</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Tanggal Kunjungan</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nomor RMIK</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nama Pasien</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Tanggal Lahir</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Jenis Kelamin</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Alamat</th>
		</tr>

		<?php
		$kunjunganSql = "SELECT * FROM kunjungan LEFT JOIN pasien ON pasien.no_rm=kunjungan.no_rm ORDER BY no_kunjungan ASC LIMIT $hal, $row";
		$kunjunganQry = mysqli_query( $server,$kunjunganSql)  or die("Query kunjungan salah : " . mysqli_error());
		$nomor  = 0;
		while ($kunjungan = mysqli_fetch_array($kunjunganQry)) {
			$nomor++;
		?>
			<tbody>
				<tr>
					<td><?php echo $kunjungan['no_kunjungan']; ?></td>
					<td><?php echo $kunjungan['created_at']; ?></td>
					<td><?php echo $kunjungan['no_rm']; ?></td>
					<td><?php echo $kunjungan['nm_pasien']; ?></td>
					<td><?php echo $kunjungan['tgl_lhr']; ?></td>
					<td><?php echo $kunjungan['j_kel']; ?></td>
					<td><?php echo $kunjungan['alamat']; ?></td>

				</tr>
			</tbody>
		<?php } ?>

		</tbody>
	</table>

</body>

</html>