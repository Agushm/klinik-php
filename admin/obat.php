<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM obat";
$pageQry = mysqli_query($server,$pageSql) or die ("error paging: ".mysqli_error());
$jml	 = mysqli_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="#myModal" class="btn btn-primary btn-rect" data-toggle="modal"><i class='icon icon-white icon-plus'></i> Tambah Obat</a><p>
<?php
	if($_POST["obat"]){
			include_once("../library/koneksi.php");
			mysqli_query($server,"INSERT INTO obat SET kd_obat='".$_POST["kd_obat"]."', nm_obat='".$_POST["nm_obat"]."', ukuran='".$_POST["ukuran"]."', ket='".$_POST["ket"]."'")or die ("error tambah obat: ".mysqli_error());
			echo "<meta http-equiv='refresh' content='0; url=?menu=obat'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["obat"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}

add_obat(); //memanggil function add_obat
?>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar User
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Kode Obat</th>
						<th>Nama Obat</th>
						<th>Ukuran</th>
						<th>Keterangan</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$obatSql = "SELECT * FROM obat ORDER BY kd_obat DESC LIMIT $hal, $row";
				$obatQry = mysqli_query( $server,$obatSql)  or die ("Query Obat salah : ".mysqli_error());
				$nomor  = 1; 
				while ($obat = mysqli_fetch_array($obatQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $nomor;?></td>
						<td><?php echo $obat['kd_obat'];?></td>
						<td><?php echo $obat['nm_obat'];?></td>
						<td><?php echo $obat['ukuran'];?></td>
						<td><?php echo $obat['ket'];?></td>
						<td>
						  <div class='btn-group'>
                          <a href="?menu=obat_edit&aksi=edit&nmr=<?php echo $obat['kd_obat']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
                          <a href="?menu=obat_del&amp;aksi=hapus&amp;nmr=<?php echo $obat['kd_obat']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a>
						  </div>
						</td>
					</tr>
				</tbody>
			<?php $nomor++;} ?>
					<tr>
						<td colspan="6" align="right">
						<?php
						for($h = 1; $h <= $max; $h++){
							$list[$h] = $row*$h-$row;
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=obat&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>