<html>
<!-- onLoad="window.print();" -->
<body onLoad="window.print();" >
	<?php
	include_once("../library/koneksi.php");


	$row = 20;
	$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
	$pageSql = "SELECT * FROM periksa";
	$pageQry = mysqli_query( $server,$pageSql) or die("error paging: " . mysqli_error());
	$jml     = mysqli_num_rows($pageQry);
	$max     = ceil($jml / $row);
	?>


	<p align="center" size="25px">LAPORAN DATA PERIKSA</p>

	<hr>
	</hr>

	<table width="100%" cellspacing="0" cellpadding="2" border="1px" class="style1">

		<tr>
			<th width="1%" align="center" bgcolor="#CCCCCC">No</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nama Pasien</th>
			
			<th width="6%" align="center" bgcolor="#CCCCCC">Tensi</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Nadi</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Suhu</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Pernapasan</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Berat Badan</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Keluhan</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Diagnosa</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Tindakan</th>
			<th width="6%" align="center" bgcolor="#CCCCCC">Tanggal Kunjungan</th>
		</tr>

		<?php
		$periksaSql = "SELECT * FROM periksa LEFT JOIN diagnosa ON diagnosa.id_periksa = periksa.id_periksa LEFT JOIN tindakan ON tindakan.id_periksa = periksa.id_periksa ORDER BY periksa.id_periksa DESC LIMIT $hal, $row";
		$periksaQry = mysqli_query($server,$periksaSql )  or die("Query periksa salah : " . mysqli_error());
		$nomor  = 0;
		while ($periksa = mysqli_fetch_array($periksaQry)) {
			$nomor++;
		?>
			<tbody>
				<tr>
					<td><?php echo $periksa['id_periksa']; ?></td>
					<td><?php 
					$pas = "SELECT * FROM kunjungan LEFT JOIN pasien ON pasien.no_rm=kunjungan.no_rm WHERE no_kunjungan = '".$periksa["no_kunjungan"]."'";
					$pasDb = mysqli_query($server,$pas) or die("Query Error get pasien".mysqli_error());

					$pasien = mysqli_fetch_assoc($pasDb);
					
					echo $pasien['nm_pasien']; ?></td>
					
					<td><?php echo $periksa['tensi']; ?></td>
					<td><?php echo $periksa['nadi']; ?></td>
					<td><?php echo $periksa['suhu']; ?></td>
					<td><?php echo $periksa['napas']; ?></td>
					<td><?php echo $periksa['bb']; ?></td>
					<td><?php echo $periksa['keluhan']; ?></td>
					<td><?php echo($periksa["kd_diag"]." - ".$periksa["nm_diag"]); ?></td>
					<td><?php echo($periksa["nm_tindakan"]." - ".$periksa["ket"]); ?></td>
					<td><?php echo $periksa['created_at']; ?></td>
				</tr>
			</tbody>
		<?php } ?>

		</tbody>
	</table>

</body>

</html>