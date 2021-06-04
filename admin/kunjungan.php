<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM kunjungan";
$pageQry = mysqli_query($server,$pageSql) or die ("error paging: ".mysqli_error());
$jml	 = mysqli_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="?menu=kunjungan_add" class="btn btn-primary btn-rect" data-toggle="modal"><i class='icon icon-white icon-plus'></i> Tambah Kunjungan</a><p>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar Kunjungan
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Nomor Kunjungan</th>
						<th>No RMIK</th>
						<th>Nama Pasien</th>
						<th>Tangal Kenjungan</th>
						
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$kjgSql = "SELECT * FROM kunjungan LEFT JOIN pasien ON pasien.no_rm=kunjungan.no_rm ORDER BY no_kunjungan DESC LIMIT $hal, $row";
				$kjgQry = mysqli_query($server,$kjgSql)  or die ("Query Kunjungan salah : ".mysqli_error());
				$nomor  = 0; 
				while ($kjg = mysqli_fetch_array($kjgQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $kjg['no_kunjungan'];?></td>
						<td><?php echo $kjg['no_rm'];?></td>
						<td><?php echo $kjg['nm_pasien'];?></td>
						<td><?php echo $kjg['created_at'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=kunjungan_del&aksi=hapus&nmr=<?php echo $kjg['no_kunjungan']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
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
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=kunjungan&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>