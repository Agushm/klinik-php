<?php
if($_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysqli_query($server,"select * from resep_obt where no_kunjungan='".$_GET["nmr"]."'")or die ("Query obat salah: ".mysqli_error());
$editDb = mysqli_fetch_assoc($edit);

$pasienSql = "SELECT * FROM kunjungan LEFT JOIN pasien ON pasien.no_rm=kunjungan.no_rm WHERE kunjungan.no_kunjungan = '".$_GET['nmr']."'";
							$pasienQry = mysqli_query($server,$pasienSql)  or die ("Query Obat salah : ".mysqli_error());
							$pasien = mysqli_fetch_assoc($pasienQry);
	if($_POST["obt"]){
			include_once("../library/koneksi.php");
			mysqli_query($server,"UPDATE resep_obt set kd_obat='".$_POST["kd_obat"]."', aturan='".$_POST["aturan"]."', takaran='".$_POST["takaran"]."' WHERE no_kunjungan ='".$_GET["nmr"]."'")  or die ("Update Resep Obat salah : ".mysqli_error());
			echo "<meta http-equiv='refresh' content='0; url=?menu=resep_obat'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil mengedit data!!</b>
			</div><center>";
	}
?>

<div class="box">
	<header>
		<h5>Tambah Resep Obat</h5>
	</header>
		<div class="body">
			<form action="" method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-lg-4">Nomor Kunjungan</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $_GET["nmr"];?>" required name="no_kunjungan" class="form-control" disabled/>
							</div>
						</div>
						<div class="form-group">			
							<label class="control-label col-lg-4">Nama Pasien </label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $pasien["nm_pasien"];?>" required name="nm_pasien" class="form-control" disabled/>
							</div>
						</div>
						<div class="form-group">			
							<label class="control-label col-lg-4">Tanggal Lahir</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $pasien["tgl_lhr"];?>" required name="ttl" class="form-control" disabled/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Obat</label>
							<?php
								include_once("../library/koneksi.php");
								$obt = "SELECT * FROM obat";
								$obtDb = mysqli_query($server,$obt) or die(mysqli_error());
								$obtR = mysqli_fetch_assoc($obtDb);
							?>
							<div class="col-lg-4">
								<select name="kd_obat" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $obtR['kd_obat'];?>"><?php echo $obtR['kd_obat'];?> - <?php echo $obtR['nm_obat'];?></option>
							<?php
							} while($obtR=mysqli_fetch_assoc($obtDb));
							?>	
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-lg-4">Aturan</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["aturan"];?>" required name="aturan" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Takaran</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["takaran"];?>" required name="takaran" class="form-control" />
							</div>
						</div>
						
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="obt" value="Simpan" class="btn btn-primary" />
						</div>

					</form>
		</div>
</div>
<?php } ?>