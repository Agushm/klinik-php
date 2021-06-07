<?php
session_start();
	if($_POST["pasien"]){
			include_once("../library/koneksi.php");
			mysqli_query($server,"INSERT INTO pasien set no_rm='".$_POST["no_rm"]."', nm_pasien='".$_POST["nm_pasien"]."', j_kel='".$_POST["j_kel"]."', agama='".$_POST["agama"]."', alamat='".$_POST["alamat"]."', tgl_lhr='".$_POST["tgl_lhr"]."', ktp='".$_POST["ktp"]."', no_tlp='".$_POST["no_tlp"]."', nm_kel='".$_POST["nm_kel"]."', hub_kel='".$_POST["hub_kel"]."'")or die ("Query add pasien: ".mysqli_error());
			echo "<meta http-equiv='refresh' content='0; url=?menu=pasien'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["pasien"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}
?>
<div class="box">
	<header>
		<h5>Tambah Pasien</h5>
	</header>
		<div class="body">
			<form action="" method="post" class="form-horizontal">
			<div class="form-group">
							<label class="control-label col-lg-4">No Rekam Medis</label>
							<div class="col-lg-4">
								<input type="var" name="no_rm" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Pasien</label>
							<div class="col-lg-4">
								<input type="text" name="nm_pasien" autofocus required class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Jenis Kelamin</label>
							<div class="col-lg-2">
								<select name="j_kel" class="form-control">
									<option value="Pria">Pria</option>
									<option value="Wanita">Wanita</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Agama</label>
							<div class="col-lg-2">
								<select name="agama" class="form-control">
									<option value="Islam">Islam</option>
									<option value="Kristen">Kristen</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Alamat</label>
							<div class="col-lg-4">
								<input type="text" required name="alamat" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tanggal Lahir</label>
							<div class="col-lg-2">
								<input type="date" class="form-control" name="tgl_lhr" /> Tahun-Bulan-Tanggal
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">No.KTP/KK/Paspor</label>
							<div class="col-lg-4">
								<input type="text" required name="ktp" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nomor Telepone</label>
							<div class="col-lg-4">
								<input type="text" required name="no_tlp" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Kepala Keluarga</label>
							<div class="col-lg-4">
								<input type="text" required name="nm_kel" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Hubungan Keluarga</label>
							<div class="col-lg-2">
								<select name="hub_kel" class="form-control">
									<option value="Anak Kandung">Anak Kandung</option>
									<option value="Ibu">Ibu</option>
									<option value="Bapak">Bapak</option>
									<option value="Kakak">Kakak</option>
									<option value="Adek">Adek</option>
									<option value="Nenek">Nenek</option>
									<option value="Kakek">Kakek</option>
									<option value="Suami">Suami</option>
									<option value="Istri">Istri</option>
									<option value="Lainnya">Lainnya</option>
								</select>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="pasien" value="Simpan" class="btn btn-primary" />
						</div>

					</form>
	</div>
</div>