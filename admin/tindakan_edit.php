<?php
if($_GET["aksi"] && $_GET["nmr"]){

include_once("../library/koneksi.php");
$edit = mysqli_query($server,"SELECT * from periksa LEFT JOIN tindakan ON tindakan.id_periksa=periksa.id_periksa WHERE periksa.id_periksa='".$_GET["nmr"]."'")or die("Error get periksa".mysqli_error());
$editDb = mysqli_fetch_assoc($edit);

	if($_POST["tdk"]){
			include_once("../library/koneksi.php");
			if($editDb["id_periksa"]==null){
				mysqli_query($server,"INSERT INTO tindakan set nm_tindakan='".$_POST["nm_tindakan"]."', ket='".$_POST["ket"]."', id_periksa='".$_GET["nmr"]."'")or die("Query Error Insert".mysqli_error());
				mysqli_query($server,"INSERT INTO resep_obt set  no_kunjungan = '".$editDb["no_kunjungan"]."'")or die ("error insert resep_obt: ".mysqli_error());
			}else{
				mysqli_query($server,"UPDATE tindakan set nm_tindakan='".$_POST["nm_tindakan"]."', ket='".$_POST["ket"]."' WHERE id_periksa='".$_GET["nmr"]."'")or die("Query Error Update".mysqli_error());
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
		<h5>Edit Tindakan</h5>
	</header>
		<div class="body">
			<form action="" method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-lg-4">No Pemeriksaan</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $_GET['nmr'];?>" required name="id_periksa" class="form-control" disabled/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Tindakan</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["nm_tindakan"];?>" required name="nm_tindakan" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Keterangan</label>
							<div class="col-lg-4">
								<textarea type="text" required name="ket" class="form-control"><?php echo $editDb["ket"];?></textarea>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="tdk" value="Simpan" class="btn btn-primary" />
						</div>

					</form>
		</div>
</div>
<?php } ?>