<?php
session_start();
	if($_POST["dkt"]){
			include_once("../library/koneksi.php");
			mysqli_query($server,"insert into dokter set no_periksa='".$_POST["no_periksa"]."', nm_pasien='".$_POST["nm_pasien"]."',tgl_kunjungan='".time()."',  tensi='".$_POST["tensi"]."', nadi='".$_POST["nadi"]."', suhu='".$_POST["suhu"]."', beratbdn='".$_POST["beratbdn"]."', keluhan='".$_POST["keluhan"]."', napas='".$_POST["napas"]."'")or die ("Query obat salah: ".mysqli_error());
			echo "<meta http-equiv='refresh' content='0; url=?menu=dokter'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["dkt"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
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
								<input type="var" name="no_periksa" class="form-control" />
							</div>
							</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Pasien</label>
							<?php
								include_once("../library/koneksi.php");
								$pas = "SELECT * FROM pasien";
								$pasDb = mysqli_query($server,$pas) or die(mysqli_error());
								$pasR = mysqli_fetch_assoc($pasDb);
							?>
							<div class="col-lg-4">
								<select name="nm_pasien" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $pasR['nm_pasien'];?>"><?php echo $pasR['nm_pasien'];?></option>
							<?php
							} while($pasR=mysqli_fetch_assoc($pasDb));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tensi</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="tensi"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nadi</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="nadi"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Suhu</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="suhu"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Pernapasan</label>
							<div class="col-lg-2">
								<input type="text" required class="form-control" name="napas"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Berat Badan</label>
							<div class="col-lg-2">
								<input type="text" required class="form-control" name="beratbdn"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Keluahan</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="keluhan"/>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="dkt" value="Simpan" class="btn btn-primary" />
						</div>

			</form>
		</div>
</div>