<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysql_query("SELECT * from dokter WHERE no_periksa='".$_GET["nmr"]."'",$server);
$editDb = mysql_fetch_row($edit);

	if($_POST["dkt"]){
			include_once("../library/koneksi.php");
			mysql_query("update dokter set nm_pasien='".$_POST["nm_pasien"]."',tgl_kunjungan='".time()."',  tensi='".$_POST["tensi"]."', nadi='".$_POST["nadi"]."', suhu='".$_POST["suhu"]."', beratbdn='".$_POST["beratbdn"]."', keluhan='".$_POST["keluhan"]."', napas='".$_POST["napas"]."' where no_periksa='".$_GET["nmr"]."'",$server);
			echo "<meta http-equiv='refresh' content='0; url=?menu=dokter'>";
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
								<input type="var" name="no_periksa" class="form-control" value="<?php echo($editDb[0])?>" disabled />
							</div>
							</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Pasien</label>
							<?php
								include_once("../library/koneksi.php");
								$pas = "SELECT * FROM pasien";
								$pasDb = mysql_query($pas,$server) or die(mysql_error());
								$pasR = mysql_fetch_assoc($pasDb);
							?>
							<div class="col-lg-4">
								<select name="nm_pasien" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $pasR['nm_pasien'];?>"><?php echo $pasR['nm_pasien'];?></option>
							<?php
							} while($pasR=mysql_fetch_assoc($pasDb));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tensi</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="tensi" value="<?php echo($editDb[3])?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nadi</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="nadi" value="<?php echo($editDb[4])?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Suhu</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="suhu" value="<?php echo($editDb[5])?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Pernapasan</label>
							<div class="col-lg-2">
								<input type="text" required class="form-control" name="napas" value="<?php echo($editDb[6])?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Berat Badan</label>
							<div class="col-lg-2">
								<input type="text" required class="form-control" name="beratbdn" value="<?php echo($editDb[7])?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Keluahan</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="keluhan" value="<?php echo($editDb[8])?>"/>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="dkt" value="Simpan" class="btn btn-primary" />
						</div>

			</form>
		</div>
</div>
<?php } ?>