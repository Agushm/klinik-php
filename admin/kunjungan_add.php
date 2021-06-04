<?php
session_start();
	if($_POST["kjg"]){
			include_once("../library/koneksi.php");
			$result= mysqli_query($server,"INSERT INTO kunjungan set  no_rm='".$_POST['no_rm']."'")or die ("error insert: ".mysqli_error());
			$data = mysqli_fetch_assoc($result);
			$new_no_kunjungan = mysqli_insert_id($server);
			mysqli_query($server,"INSERT INTO periksa set  no_kunjungan = '".$new_no_kunjungan."'")or die ("error insert: ".mysqli_error());
			
			echo "<meta http-equiv='refresh' content='0; url=?menu=kunjungan'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["kjg"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}
?>

<div class="box">
	<header>
		<h5>Tambah Kunjungan</h5>
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