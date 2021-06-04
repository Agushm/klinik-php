<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysqli_query($server,"SELECT * from periksa LEFT JOIN diagnosa ON diagnosa.id_periksa=periksa.id_periksa WHERE periksa.id_periksa='".$_GET["nmr"]."'")or die("Error get periksa".mysqli_error());

$editDb = mysqli_fetch_assoc($edit);

	if($_POST["dkt"]){
			include_once("../library/koneksi.php");
			if($editDb["id_periksa"]==null){
				mysqli_query($server,"INSERT INTO diagnosa set kd_diag='".$_POST["kd_diag"]."', id_periksa='".$_GET["nmr"]."', nm_diag='".$_POST["nm_diag"]."'")or die("Query Error Insert".mysqli_error());
			}else{
				mysqli_query($server,"UPDATE diagnosa set kd_diag='".$_POST["kd_diag"]."',nm_diag='".$_POST["nm_diag"]."' WHERE id_periksa='".$_GET["nmr"]."'")or die("Query Error Update".mysqli_error());
			}
			echo "<meta http-equiv='refresh' content='0; url=?menu=periksa'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil mengedit data!!</b>
			</div><center>";
	}
?>

<div class="box">
	<header>
		<h5>Tambah Diagnosa</h5>
	</header>
		<div class="body">
			<form action="" method="post" class="form-horizontal">
			<div class="form-group">
							<label class="control-label col-lg-4">No Periksa</label>
							<div class="col-lg-4">
								<input type="var" name="id_periksa" class="form-control" value="<?php echo($_GET["nmr"])?>" disabled />
							</div>
							</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Pasien</label>
							<?php
								include_once("../library/koneksi.php");
								$pas = "SELECT * FROM kunjungan LEFT JOIN pasien ON pasien.no_rm=kunjungan.no_rm WHERE no_kunjungan = '".$editDb["no_kunjungan"]."'";
								$pasDb = mysqli_query($server,$pas) or die("Query Error get pasien".mysqli_error());

								$pasR = mysqli_fetch_assoc($pasDb);
								
							?>
							<div class="col-lg-4">
							<input type="text" required class="form-control" name="nm_pasien" value="<?php echo($pasR['nm_pasien'])?>" disabled/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Kode Diagnosa</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="kd_diag" value="<?php echo($editDb['kd_diag'])?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Diagnosa</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="nm_diag" value="<?php echo($editDb['nm_diag'])?>"/>
							</div>
						</div>
						
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="dkt" value="Simpan" class="btn btn-primary" />
							
						</div>

			</form>
		</div>
</div>
<?php } ?>