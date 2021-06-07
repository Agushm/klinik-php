<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM pendaftaran";
$pageQry = mysqli_query($server,$pageSql) or die ("error paging: ".mysqli_error());
$jml	 = mysqli_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="?menu=pendaftaran_edit" class="btn btn-primary btn-rect" data-toggle="modal"><i class='icon icon-white icon-plus'></i> Tambah pendaftaran</a><p>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar pendaftaran
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Nomor Pendaftaran</th>
						<th>No RMIK</th>
						<th>Nama Pasien</th>
						<th>Tangal Kenjungan</th>
						<th>Kode Dokter</th>
						<th>Nama Dokter</th>
						<th>Kode Poli</th>
						<th>Nama Poli</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$kjgSql = "SELECT * FROM pendaftaran LEFT JOIN pasien ON pasien.no_rm=pendaftaran.no_rm LEFT JOIN dokter ON dokter.kd_dokter=pendaftaran.kd_dokter LEFT JOIN poli ON poli.kd_poli=pendaftaran.kd_poli ORDER BY no_pendaftaran ASC LIMIT $hal, $row";
				$kjgQry = mysqli_query($server,$kjgSql)  or die ("Query pendaftaran salah : ".mysqli_error());
				$nomor  = 0; 
				while ($kjg = mysqli_fetch_array($kjgQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $kjg['no_pendaftaran'];?></td>
						<td><?php echo $kjg['no_rm'];?></td>
						<td><?php echo $kjg['nm_pasien'];?></td>
						<td><?php echo $kjg['created_at'];?></td>
						<td><?php echo $kjg['kd_dokter'];?></td>
						<td><?php echo $kjg['nm_dokter'];?></td>
						<td><?php echo $kjg['kd_poli'];?></td>
						<td><?php echo $kjg['nm_poli'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=pendaftaran_edit&aksi=edit&nmr=<?php echo $poli['no_pendaftaran']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
						  
						  <a href="?menu=pendaftaran_del&aksi=hapus&nmr=<?php echo $kjg['no_pendaftaran']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
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
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=pendaftaran&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>