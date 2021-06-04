<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM periksa";
$pageQry = mysqli_query($server,$pageSql) or die ("error paging: ".mysqli_error());
$jml	 = mysqli_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar periksa
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pasien</th>
						<th>TTD</th>
						<th>Nadi</th>
						<th>Suhu</th>
						<th>Pernapasan</th>
						<th>BB</th>
						<th>Keluhan</th>
						<th>Hasil Diagnosa</th>
						<th>Hasil Tindakan</th>
						<th>Periksa</th>
						<th>Diagnosa</th>
						<th>Tindakan</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$periksaSql = "SELECT * FROM periksa LEFT JOIN kunjungan ON kunjungan.no_kunjungan=periksa.no_kunjungan LEFT JOIN pasien ON pasien.no_rm=kunjungan.no_rm ORDER BY id_periksa DESC LIMIT $hal, $row";
				$periksaQry = mysqli_query($server,$periksaSql)  or die ("Query periksa salah : ".mysqli_error());
				$nomor  = 0; 
				while ($periksa = mysqli_fetch_array($periksaQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $periksa['no_kunjungan'];?></td>
						<td><?php echo $periksa['nm_pasien'];?></td>
						<td><?php echo $periksa['tensi'];?></td>
						<td><?php echo $periksa['nadi'];?></td>
						<td><?php echo $periksa['suhu'];?></td>
						<td><?php echo $periksa['napas'];?></td>
						<td><?php echo $periksa['bb'];?></td>
						<td><?php echo $periksa['keluhan'];?></td>
						<td><?php 
						include_once("../library/koneksi.php");
						$query = "SELECT * FROM diagnosa WHERE id_periksa = '".$periksa["id_periksa"]."'";
						$diag = mysqli_query($server,$query) or die("Query Error get pasien".mysqli_error());

						$data = mysqli_fetch_assoc($diag);
						if($data==null){
							echo('-');
						}else{

						echo($data["kd_diag"]." - ".$data["nm_diag"]);
						}
						?>
						</td>
						<td><?php 
						include_once("../library/koneksi.php");
						$query_tindakan = "SELECT * FROM tindakan WHERE id_periksa = '".$periksa["id_periksa"]."'";
						$tindakan = mysqli_query($server,$query_tindakan) or die("Query Error get pasien".mysqli_error());

						$data_tindakan = mysqli_fetch_assoc($tindakan);
						if($data_tindakan == null ){
							echo('-');
						}else{
						echo($data_tindakan["nm_tindakan"]." - ".$data_tindakan["ket"]);
						}
						?></td>
						<td><a href="?menu=periksa_edit&aksi=edit&nmr=<?php echo $periksa['id_periksa']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Tambah Periksa'> <i class="icon-stethoscope icon-white"></i> </a></td>
						<td><a href="?menu=diagnosa_edit&aksi=edit&nmr=<?php echo $periksa['id_periksa']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Tambah Diagnosa'> <i class="icon-stethoscope icon-white"></i> </a></td>
						<td><a href="?menu=tindakan_edit&aksi=edit&nmr=<?php echo $periksa['id_periksa']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Tambah Tindakan'> <i class="icon-stethoscope icon-white"></i> </a></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=periksa_del&aksi=hapus&nmr=<?php echo $periksa['id_periksa']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
						  <a href="?menu=periksa_edit&aksi=edit&nmr=<?php echo $periksa['id_periksa']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
						  </div>
						</td>
					</tr>
				</tbody>
			<?php } ?>
					<tr>
						<td colspan="6" align="right">
						<?php
						for($h = 1; $h <= $max; $h++){
							$list[$h] = $row*$h-$row;
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=periksa&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>