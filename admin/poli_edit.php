<?php

include_once("../library/koneksi.php");
$edit = mysqli_query($server,"select * from poli where id_poli='".$_GET["nmr"]."'");
$editDb = mysqli_fetch_assoc($edit);

	if($_POST["poli"]){
			include_once("../library/koneksi.php");
			if($_GET["nmr"] != null){
			mysqli_query($server,"update poli set kd_poli='".$_POST["kd_poli"]."', nm_poli='".$_POST["nm_poli"]."' WHERE id_poli='".$_GET["nmr"]."'")or die ("error update poli: ".mysqli_error());
			}else{
				mysqli_query($server,"INSERT INTO poli set kd_poli='".$_POST["kd_poli"]."', nm_poli='".$_POST["nm_poli"]."'")or die ("error insert poli: ".mysqli_error());
			}
			echo "<meta http-equiv='refresh' content='0; url=?menu=poli'>";
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
							<label class="control-label col-lg-4">Kode poli</label>
							<div class="col-lg-4">
								<input type="var" name="kd_poli" value="<?php echo $editDb["kd_poli"];?>" required class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama poli</label>
							<div class="col-lg-4">
								<input type="text" name="nm_poli" value="<?php echo $editDb["nm_poli"];?>" required class="form-control" />
							</div>
						</div>
						
						
						
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="poli" value="Simpan" class="btn btn-primary" />
						</div>

					</form>
	</div>
</div>