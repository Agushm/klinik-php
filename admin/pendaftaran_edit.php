<?php

include_once("../library/koneksi.php");
$edit = mysqli_query($dosen,"select * from pendaftaran where no_pendaftaran='".$_GET["nmr"]."'");
$editDb = mysqli_fetch_assoc($edit);
	if($_POST["pendaftaran"]){
			include_once("../library/koneksi.php");
			if($_GET["nmr"] != null){
				mysqli_query($server,"update pendaftaran set no_rm='".$_POST["no_rm"]."', kd_dokter='".$_POST["kd_dokter"]."', kd_poli='".$_POST["kd_poli"]."' where no_pendaftaran='".$_GET["nmr"]."'");
			}else{
				mysqli_query($server,"INSERT INTO pendaftaran set no_rm='".$_POST["no_rm"]."', kd_dokter='".$_POST["kd_dokter"]."', kd_poli='".$_POST["kd_poli"]."' ");
				$new_no_pendaftaran = mysqli_insert_id($server);
				mysqli_query($server,"INSERT INTO periksa set  no_pendaftaran = '".$new_no_pendaftaran."'")or die ("error insert periksa: ".mysqli_error());
			
			}
			echo "<meta http-equiv='refresh' content='0; url=?menu=pendaftaran'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil mengedit data!!</b>
			</div><center>";
	}
?>

<div class="box">
	<header>
		<h5>Edit pendaftaran</h5>
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
						<div class="form-group">
							<label class="control-label col-lg-4">Dokter</label>
							<?php
								include_once("../library/koneksi.php");
								$dokter = "SELECT * FROM dokter";
								$dokterDb = mysqli_query($server,$dokter) or die(mysqli_error());
								$dokterR = mysqli_fetch_assoc($dokterDb);
							?>
							<div class="col-lg-4">
								<select name="kd_dokter" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $dokterR['kd_dokter'];?>"><?php echo $dokterR['kd_dokter'];?> - <?php echo $dokterR['nm_dokter'];?></option>
							<?php
							} while($dokterR=mysqli_fetch_assoc($dokterDb));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Poli</label>
							<?php
								include_once("../library/koneksi.php");
								$poli = "SELECT * FROM poli";
								$poliDb = mysqli_query($server,$poli) or die(mysqli_error());
								$poliR = mysqli_fetch_assoc($poliDb);
							?>
							<div class="col-lg-4">
								<select name="kd_poli" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $poliR['kd_poli'];?>"><?php echo $poliR['kd_poli'];?> - <?php echo $poliR['nm_poli'];?></option>
							<?php
							} while($poliR=mysqli_fetch_assoc($poliDb));
							?>	
								</select>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="pendaftaran" value="Simpan" class="btn btn-primary" />
						</div>

			</form>
		</div>
</div>