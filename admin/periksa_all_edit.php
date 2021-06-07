<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysqli_query($server,"SELECT * from periksa LEFT JOIN diagnosa ON diagnosa.id_periksa = periksa.id_periksa LEFT JOIN tindakan ON tindakan.id_periksa = periksa.id_periksa WHERE periksa.id_periksa='".$_GET["nmr"]."'")or die("Query Error periksa".mysqli_error());
$editDb = mysqli_fetch_assoc($edit);

	if($_POST["dkt"]){
			include_once("../library/koneksi.php");
			
			mysqli_query($server,"update periksa set tensi='".$_POST["tensi"]."', nadi='".$_POST["nadi"]."', suhu='".$_POST["suhu"]."', bb='".$_POST["bb"]."', keluhan='".$_POST["keluhan"]."', napas='".$_POST["napas"]."' WHERE id_periksa='".$_GET["nmr"]."'")or die("Query Error Update".mysqli_error());
			if($editDb["kd_diag"]==null){
				mysqli_query($server,"INSERT INTO diagnosa set kd_diag='".$_POST["kd_diag"]."', id_periksa='".$_GET["nmr"]."', nm_diag='".$_POST["nm_diag"]."'")or die("Query Error Insert".mysqli_error());
			}else{
				mysqli_query($server,"UPDATE diagnosa set kd_diag='".$_POST["kd_diag"]."',nm_diag='".$_POST["nm_diag"]."' WHERE id_periksa='".$_GET["nmr"]."'")or die("Query Error Update".mysqli_error());
			}
			if($editDb["nm_tindakan"] == null){
				mysqli_query($server,"INSERT INTO tindakan set nm_tindakan='".$_POST["nm_tindakan"]."', ket='".$_POST["ket"]."', id_periksa='".$_GET["nmr"]."'")or die("Query Error Insert".mysqli_error());
				mysqli_query($server,"INSERT INTO resep_obt set  no_pendaftaran = '".$editDb["no_pendaftaran"]."'")or die ("error insert resep_obt: ".mysqli_error());
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
		<h5>Tambah Periksa</h5>
	</header>
		<div class="body">
			<form action="" method="post" class="form-horizontal">
			<div class="form-group">
							<label class="control-label col-lg-4">No Periksa</label>
							<div class="col-lg-4">
								<input type="var" name="id_periksa" class="form-control" value="<?php echo($_GET['nmr'])?>" disabled />
							</div>
							</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Pasien</label>
							<?php
								include_once("../library/koneksi.php");
								$pas = "SELECT * FROM pendaftaran LEFT JOIN pasien ON pasien.no_rm=pendaftaran.no_rm WHERE no_pendaftaran = '".$editDb["no_pendaftaran"]."'";
								$pasDb = mysqli_query($server,$pas) or die("Query Error get pasien".mysqli_error());

								$pasR = mysqli_fetch_assoc($pasDb);
								
							?>
							<div class="col-lg-4">
							<input type="text" required class="form-control" name="nm_pasien" value="<?php echo($pasR['nm_pasien'])?>" disabled/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tensi</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="tensi" value="<?php echo($editDb['tensi'])?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nadi</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="nadi" value="<?php echo($editDb['nadi'])?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Suhu</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="suhu" value="<?php echo($editDb['suhu'])?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Pernapasan</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="napas" value="<?php echo($editDb['napas'])?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Berat Badan</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="bb" value="<?php echo($editDb['bb'])?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Keluahan</label>
							<div class="col-lg-4">
								<textarea id="keluhan"  class="form-control" name="keluhan" rows="4" cols="50"><?php echo($editDb['keluhan'])?></textarea>
							</div>
						</div>
                        <div class="control-label" style="padding:20px 0px"></div>
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
                        <div class="control-label" style="padding:20px 0px"></div>
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
							<input type="submit" name="dkt" value="Simpan" class="btn btn-primary" />
							
						</div>

			</form>
		</div>
</div>
<?php } ?>