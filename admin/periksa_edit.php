<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysqli_query($server,"SELECT * from periksa WHERE id_periksa='".$_GET["nmr"]."'");
$editDb = mysqli_fetch_assoc($edit);

	if($_POST["dkt"]){
			include_once("../library/koneksi.php");
			
			mysqli_query($server,"update periksa set tensi='".$_POST["tensi"]."', nadi='".$_POST["nadi"]."', suhu='".$_POST["suhu"]."', bb='".$_POST["bb"]."', keluhan='".$_POST["keluhan"]."', napas='".$_POST["napas"]."' WHERE id_periksa='".$_GET["nmr"]."'")or die("Query Error Update".mysqli_error());
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
								<input type="var" name="id_periksa" class="form-control" value="<?php echo($editDb['id_periksa'])?>" disabled />
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
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="dkt" value="Simpan" class="btn btn-primary" />
							
						</div>

			</form>
		</div>
</div>
<?php } ?>