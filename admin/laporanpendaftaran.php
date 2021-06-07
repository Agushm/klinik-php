<html>

<body onLoad="window.print();">
	<?php
	include_once("../library/koneksi.php");


	$row = 20;
	$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
	$pageSql = "SELECT * FROM pendaftaran";
	$pageQry = mysqli_query($server,$pageSql) or die("error paging: " . mysqli_error());
	$jml     = mysqli_num_rows($pageQry);
	$max     = ceil($jml / $row);
	?>


	<p align="center" size="25px">LAPORAN DATA pendaftaran</p>

	<hr>
	</hr>

	<table width="100%" cellspacing="0" cellpadding="2" border="1px" class="style1">

		<tr>
		<th width="1%" align="center" bgcolor="#CCCCCC">No</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Tanggal pendaftaran</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nomor RMIK</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nama Pasien</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Tanggal Lahir</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Jenis Kelamin</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Alamat</th>
		</tr>

		<?php
		$pendaftaranSql = "SELECT * FROM pendaftaran LEFT JOIN pasien ON pasien.no_rm=pendaftaran.no_rm ORDER BY no_pendaftaran ASC LIMIT $hal, $row";
		$pendaftaranQry = mysqli_query( $server,$pendaftaranSql)  or die("Query pendaftaran salah : " . mysqli_error());
		$nomor  = 0;
		while ($pendaftaran = mysqli_fetch_array($pendaftaranQry)) {
			$nomor++;
		?>
			<tbody>
				<tr>
					<td><?php echo $pendaftaran['no_pendaftaran']; ?></td>
					<td><?php echo $pendaftaran['created_at']; ?></td>
					<td><?php echo $pendaftaran['no_rm']; ?></td>
					<td><?php echo $pendaftaran['nm_pasien']; ?></td>
					<td><?php echo $pendaftaran['tgl_lhr']; ?></td>
					<td><?php echo $pendaftaran['j_kel']; ?></td>
					<td><?php echo $pendaftaran['alamat']; ?></td>

				</tr>
			</tbody>
		<?php } ?>

		</tbody>
	</table>

</body>

</html>