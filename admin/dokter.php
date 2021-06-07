<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM dokter";
$pageQry = mysqli_query($server,$pageSql) or die ("error paging: ".mysqli_error());
$jml	 = mysqli_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="?menu=dokter_edit" class="btn btn-primary btn-rect" data-toggle="modal"><i class='icon icon-white icon-plus'></i> Tambah dokter</a><p>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar Dokter
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Dokter</th>
                        <th>Nama Dokter</th>
						<th>Jenis Kelamin</th>
						<th>Spesialis</th>
                        <th>Alamat</th>
						<th>No Telp.</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$dokterSql = "SELECT * FROM dokter  ORDER BY kd_dokter ASC LIMIT $hal, $row";
				$dokterQry = mysqli_query($server,$dokterSql)  or die ("Query dokter salah : ".mysqli_error());
				$nomor  = 0; 
				while ($dokter = mysqli_fetch_array($dokterQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $dokter['id_dokter'];?></td>
						<td><?php echo $dokter['kd_dokter'];?></td>
						<td><?php echo $dokter['nm_dokter'];?></td>
                        <td><?php echo $dokter['j_kelamin'];?></td>
						<td><?php echo $dokter['spesialis'];?></td>
                        <td><?php echo $dokter['alamat'];?></td>
                        <td><?php echo $dokter['no_telp'];?></td>
						<td>
						  <div class='btn-group'>
                          <a href="?menu=dokter_edit&aksi=edit&nmr=<?php echo $dokter['id_dokter']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
						  
						  <a href="?menu=dokter_del&aksi=hapus&nmr=<?php echo $dokter['id_dokter']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
						  </div>
						</td>
					</tr>
				</tbody>
			<?php } ?>
					<tr>
						<td colspan="8" align="right">
						<?php
						for($h = 1; $h <= $max; $h++){
							$list[$h] = $row*$h-$row;
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=dokter&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>