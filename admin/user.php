<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM users";
$pageQry = mysqli_query($server,$pageSql) or die ("error paging: ".mysqli_error());
$jml	 = mysqli_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="#myModal" class="btn btn-primary btn-rect" data-toggle="modal"><i class='icon icon-white icon-plus'></i> Tambah User</a><p>
<?php
	if($_POST["user"]){
			include_once("../library/koneksi.php");
			mysqli_query($server,"INSERT INTO users SET username='".$_POST["username"]."', password='".md5($_POST["password"])."', nama='".$_POST["nama"]."', alamat='".$_POST["alamat"]."',role ='".$_POST["role"]."'")or die ("error login: ".mysqli_error());
			echo "<meta http-equiv='refresh' content='0; url=?menu=user'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["user"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}

user(); //memanggil function user
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
						<th>Kode User</th>
						<th>Username</th>
						<th>Nama Lengkap</th>
						<th>Alamat</th>
						<th>Role</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$usSql = "SELECT * FROM users ORDER BY id_user DESC LIMIT $hal, $row";
				$usQry = mysqli_query( $server,$usSql)  or die ("Query Obat salah : ".mysqli_error());
				$nomor  = 1; 
				while ($us = mysqli_fetch_array($usQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $nomor;?></td>
						<td><?php echo $us['username'];?></td>
						<td><?php echo $us['nama'];?></td>
						<td><?php echo $us['alamat'];?></td>
						<td><?php echo $us['role'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=user_del&amp;aksi=hapus&amp;nmr=<?php echo $us['id_user']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a>
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