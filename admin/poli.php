<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM poli";
$pageQry = mysqli_query($server,$pageSql) or die ("error paging: ".mysqli_error());
$jml	 = mysqli_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="?menu=poli_edit" class="btn btn-primary btn-rect" data-toggle="modal"><i class='icon icon-white icon-plus'></i> Tambah poli</a><p>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar poli
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode poli</th>
                        <th>Nama poli</th>
						
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$poliSql = "SELECT * FROM poli  ORDER BY kd_poli ASC LIMIT $hal, $row";
				$poliQry = mysqli_query($server,$poliSql)  or die ("Query poli salah : ".mysqli_error());
				$nomor  = 0; 
				while ($poli = mysqli_fetch_array($poliQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $poli['id_poli'];?></td>
						<td><?php echo $poli['kd_poli'];?></td>
						<td><?php echo $poli['nm_poli'];?></td>
						<td>
						  <div class='btn-group'>
                          <a href="?menu=poli_edit&aksi=edit&nmr=<?php echo $poli['id_poli']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
						  
						  <a href="?menu=poli_del&aksi=hapus&nmr=<?php echo $poli['id_poli']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
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
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=poli&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>