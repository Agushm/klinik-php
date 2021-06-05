<html>

<body onLoad="window.print();">
	<?php
	include_once("../library/koneksi.php");


	$row = 20;
	$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
	$pageSql = "SELECT * FROM resep_obt";
	$pageQry = mysqli_query($server,$pageSql) or die("error paging: " . mysqli_error());
	$jml     = mysqli_num_rows($pageQry);
	$max     = ceil($jml / $row);
	?>


	<p align="center" size="25px">LAPORAN DATA PENERIMA RESEP</p>

	<hr>
	</hr>

	<table width="100%" cellspacing="0" cellpadding="2" border="1px" class="style1">

		<tr>
			<th width="1%" align="center" bgcolor="#CCCCCC">No Pemeriksaan</th>
			
			<th width="1%" align="center" bgcolor="#CCCCCC">Nama Pasien</th>
			<th width="1%" align="center" bgcolor="#CCCCCC">Kode Obat</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nama Obat</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Aturan Minum</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Takaran</th>
			<th width="1%" align="center" bgcolor="#CCCCCC">Tanggal</th>
		</tr>

		<?php
		$obatSql = "SELECT * FROM resep_obt LEFT JOIN obat ON obat.kd_obat = resep_obt.kd_obat  ORDER BY no_kunjungan ASC LIMIT $hal, $row";
		$obatQry = mysqli_query($server,$obatSql)  or die("Query obat salah : " . mysqli_error());
		
		
		$nomor  = 0;
		while ($obat = mysqli_fetch_array($obatQry)) {
			$pas = "SELECT * FROM kunjungan LEFT JOIN pasien ON pasien.no_rm=kunjungan.no_rm WHERE no_kunjungan = '".$obat["no_kunjungan"]."'";
		$pasDb = mysqli_query($server,$pas) or die("Query Error get pasien".mysqli_error());
		$pasien = mysqli_fetch_assoc($pasDb);
			$nomor++;
		?>
			<tbody>
				<tr>
					<td><?php echo $obat['no_kunjungan']; ?></td>
					
					<td><?php echo $pasien['nm_pasien']; ?></td>
					<td><?php echo $obat['kd_obat']; ?></td>
					<td><?php echo $obat['nm_obat']; ?></td>
					<td><?php echo $obat['aturan']; ?></td>
					<td><?php echo $obat['takaran']; ?></td>
					<td><?php echo $obat['created_at']; ?></td>
				</tr>
			</tbody>
		<?php } ?>

		</tbody>
	</table>

</body>

</html>