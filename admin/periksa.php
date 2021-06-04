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
						
						<th>No Kunjungan</th>
						<th>Nama Pasien</th>
						<th>Tanggal Kunjungan</th>
						<th>Tensi</th>
						<th>Nadi</th>
						<th>Suhu</th>
						<th>Pernapasan</th>
						<th>Berat Badan</th>
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
				$kjgSql = "SELECT * FROM periksa LEFT JOIN kunjungan ON kunjungan.no_kunjungan=periksa.no_kunjungan LEFT JOIN pasien ON pasien.no_rm=kunjungan.no_rm ORDER BY id_periksa DESC LIMIT $hal, $row";
				$kjgQry = mysqli_query($server,$kjgSql)  or die ("Query periksa salah : ".mysqli_error());
				$nomor  = 0; 
				while ($kjg = mysqli_fetch_array($kjgQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $kjg['no_kunjungan'];?></td>
						<td><?php echo $kjg['nm_pasien'];?></td>
						<td><?php echo $kjg['created_at'];?></td>
						<td><?php echo $kjg['tensi'];?></td>
						<td><?php echo $kjg['nadi'];?></td>
						<td><?php echo $kjg['suhu'];?></td>
						<td><?php echo $kjg['napas'];?></td>
						<td><?php echo $kjg['bb'];?></td>
						<td><?php echo $kjg['keluhan'];?></td>
						<td><?php echo $kjg['kd_diagnosa'];?></td>
						<td><?php echo $kjg['kd_tindakan'];?></td>
						<td><a href="?menu=periksa_edit&aksi=edit&nmr=<?php echo $kjg['id_periksa']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Tambah Diagnosa'> <i class="icon-stethoscope icon-white"></i> </a></td>
						<td><a href="?menu=periksa_edit&aksi=edit&nmr=<?php echo $kjg['id_periksa']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Tambah Diagnosa'> <i class="icon-stethoscope icon-white"></i> </a></td>
						<td><a href="?menu=periksa_edit&aksi=edit&nmr=<?php echo $kjg['id_periksa']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Tambah Diagnosa'> <i class="icon-stethoscope icon-white"></i> </a></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=periksa_del&aksi=hapus&nmr=<?php echo $kjg['id_periksa']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
						  <a href="?menu=periksa_edit&aksi=edit&nmr=<?php echo $kjg['id_periksa']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
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