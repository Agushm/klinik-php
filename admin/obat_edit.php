<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysqli_query($server,"select * from obat where kd_obat='".$_GET["nmr"]."'");
$editDb = mysqli_fetch_assoc($edit);
	if($_POST["obat"]){
			include_once("../library/koneksi.php");
			mysqli_query($server ,"update obat set nm_obat='".$_POST["nm_obat"]."', ukuran='".$_POST["ukuran"]."', ket='".$_POST["ket"]."'  where kd_obat='".$_GET["nmr"]."'")or die ("error update: ".mysqli_error());
			echo "<meta http-equiv='refresh' content='0; url=?menu=obat'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil mengedit data!!</b>
			</div><center>";
	}
?>
<div class="span9">
	<div class="well" style="fixed:center;">
		<b>Edit Obat</b>
		<p style="margin-top:10px;">
			<form action="" method="post" class="form-horizontal">
			<div class="form-group">
							<label class="control-label col-lg-4">Kode Obat</label>
							<div class="col-lg-4">
								<input type="var" name="kd_obat" value="<?php echo $editDb["kd_obat"];?>" required class="form-control" disabled/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama obat</label>
							<div class="col-lg-4">
								<input type="text" name="nm_obat" value="<?php echo $editDb["nm_obat"];?>" required class="form-control" />
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-lg-4">Ukuran</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["ukuran"];?>" required name="ukuran" class="form-control" />
							</div>
						</div>
						
                        <div class="form-group">
							<label class="control-label col-lg-4">Keterangan</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["ket"];?>" required name="ket" class="form-control" />
							</div>
						</div>
						
					
						
						
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="obat" value="Simpan" class="btn btn-primary" />
						</div>

					</form>
	</div>
</div>
<?php } ?>