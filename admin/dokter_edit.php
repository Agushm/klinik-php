<?php

include_once("../library/koneksi.php");
$edit = mysqli_query($server,"select * from dokter where id_dokter='".$_GET["nmr"]."'");
$editDb = mysqli_fetch_assoc($edit);

	if($_POST["dokter"]){
			include_once("../library/koneksi.php");
			if($_GET["nmr"] != null){
			mysqli_query($server,"update dokter set kd_dokter='".$_POST["kd_dokter"]."', nm_dokter='".$_POST["nm_dokter"]."', j_kelamin='".$_POST["j_kelamin"]."', spesialis='".$_POST["spesialis"]."', alamat='".$_POST["alamat"]."', no_telp='".$_POST["no_telp"]."' WHERE id_dokter='".$_GET["nmr"]."'")or die ("error update dokter: ".mysqli_error());
			}else{
				mysqli_query($server,"INSERT INTO dokter set kd_dokter='".$_POST["kd_dokter"]."', nm_dokter='".$_POST["nm_dokter"]."', j_kelamin='".$_POST["j_kelamin"]."', spesialis='".$_POST["spesialis"]."', alamat='".$_POST["alamat"]."', no_telp='".$_POST["no_telp"]."'")or die ("error insert dokter: ".mysqli_error());
			}
			echo "<meta http-equiv='refresh' content='0; url=?menu=dokter'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil mengedit data!!</b>
			</div><center>";
	}
?>
<div class="span9">
	<div class="well" style="fixed:center;">
		<b>SISTEM INFORMASI PENDAFTARAN KLINIK</b>
		<p style="margin-top:10px;">
			<form action="" method="post" class="form-horizontal">
			<div class="form-group">
							<label class="control-label col-lg-4">Kode Dokter</label>
							<div class="col-lg-4">
								<input type="var" name="kd_dokter" value="<?php echo $editDb["kd_dokter"];?>" required class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Dokter</label>
							<div class="col-lg-4">
								<input type="text" name="nm_dokter" value="<?php echo $editDb["nm_dokter"];?>" required class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Jenis Kelamin</label>
							<div class="col-lg-2">
								<select name="j_kelamin" class="form-control">
									<option value="P">Pria</option>
									<option value="W">Wanita</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4" for="dp1">Spesialis</label>
							<div class="col-lg-4">
								<input type="text" required name="spesialis" value="<?php echo $editDb["spesialis"];?>" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Alamat</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["alamat"];?>" required name="alamat" class="form-control" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-lg-4">Nomor Telepone</label>
							<div class="col-lg-4">
								<input type="text" required name="no_telp" value="<?php echo $editDb["no_telp"];?>" class="form-control" />
							</div>
						</div>
						
						
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="dokter" value="Simpan" class="btn btn-primary" />
						</div>

					</form>
	</div>
</div>