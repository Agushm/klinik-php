<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysqli_query("select * from kunjungan where kd_kunjungan='".$_GET["nmr"]."'");
$editDb = mysqli_fetch_assoc($edit);
	if($_POST["kjg"]){
			include_once("../library/koneksi.php");
			mysqli_query("update kunjungan set no_pasien='".$_POST["nama"]."', kd_poli='".$_POST["pol"]."', tgl_kunjungan='".$_POST["tgl"]."', jam_kunjungan='".$_POST["jam"]."' where kd_kunjungan='".$_GET["nmr"]."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=kunjungan'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil mengedit data!!</b>
			</div><center>";
	}
?>

<div class="box">
	<header>
		<h5>Edit Kunjungan</h5>
	</header>
		<div class="body">
			<form action="" method="post" class="form-horizontal">
			
			
						<div class="form-group">
							<label class="control-label col-lg-4">Pasien</label>
							<?php
								include_once("../library/koneksi.php");
								$pas = "SELECT * FROM pasien";
								$pasDb = mysqli_query($server,$pas) or die(mysqli_error());
								$pasR = mysqli_fetch_assoc($pasDb);
							?>
							<div class="col-lg-4">
								<select name="no_rm" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $pasR['no_rm'];?>"><?php echo $pasR['no_rm'];?> - <?php echo $pasR['nm_pasien'];?></option>
							<?php
							} while($pasR=mysqli_fetch_assoc($pasDb));
							?>	
								</select>
							</div>
						</div>
						
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="kjg" value="Simpan" class="btn btn-primary" />
						</div>

			</form>
		</div>
</div>
<?php } ?>