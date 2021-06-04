<?php
function tindakan(){ 
?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Tindakan</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post">
	 <div class="form-group">
        <label class="control-label col-lg">Kode ICD-9CM</label>
        <input type="text" autofocus required class="form-control" name="nama"/>
	 </div>
     <div class="form-group">
        <label class="control-label col-lg">Nama Tindakan</label>
        <textarea type="text" required class="form-control" name="ket"></textarea>
      </div>
		<input type="submit" class="btn btn-primary" name="tdk" value="Tambah"/>
        <input type="reset" class="btn btn-warning" value="Close" data-dismiss="modal"/>
</form>
            </div>
        </div>
    </div>
</div><!-- Akhir Tindakan -->
  
<?php
}
function obat(){
    include_once("koneksi.php");

								$pas = "SELECT * FROM pasien";
								$pasDb = mysql_query($pas,$server) or die ("error get pasien".mysql_error());
								$pasR = mysql_fetch_assoc($pasDb);
?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Obat</h4>
            </div>
            <div class="modal-body">
				<form action="" method="post">
				<div class="form-group">
						<label class="control-label col-lg">Kode Obat</label>
						<input type="text"  required class="form-control" name="kd_obat"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Nama Obat</label>
						<input type="text"  required class="form-control" name="nm_obat"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Nomor Periksa</label>
						<input type="text"  required class="form-control" name="no_periksa"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Pasien</label>
						
								<select name="nm_pasien" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $pasR['nm_pasien'];?>"><?php echo $pasR['no_rm'];?> - <?php echo $pasR['nm_pasien'];?></option>
							<?php
							} while($pasR=mysql_fetch_assoc($pasDb));
							?>	
								</select>
							
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Aturan Minum</label>
						<input type="text" required class="form-control" name="aturan"/>
					</div>
					
						<input type="submit" class="btn btn-primary" name="obt" value="Tambah"/>
						<input type="reset" class="btn btn-warning" value="Close" data-dismiss="modal"/>
				</form>
            </div>
        </div>
    </div>
</div>
<?php
}


function poli(){
?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Diagnosa</h4>
            </div>
            <div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label class="control-label col-lg">Kode Diagnosa</label>
						<input type="text"  required class="form-control" name="kd_diag"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Nama Diagnosa</label>
						<input type="text" required class="form-control" name="nm_diag"/>
					</div>
						<input type="submit" class="btn btn-primary" name="pol" value="Tambah"/>
						<input type="reset" class="btn btn-warning" value="Close" data-dismiss="modal"/>
				</form>
            </div>
        </div>
    </div>
</div>
<?php }
function tanggal($tgl){
		$hari = date("D",$tgl);
		$bulan = date("m",$tgl);
		$hariEn = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
		$hariId = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
		$hariRep = str_replace($hariEn,$hariId,$hari); /*(dari apa,menjadi apa,apa yang akan diganti)*/
		$bulanEn = array("01","02","03","04","05","06","07","08","09","10","11","12");
		$bulanId = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$bulanRep = str_replace($bulanEn,$bulanId,$bulan); /*(dari apa,menjadi apa,apa yang akan diganti)*/
		echo date("d",$tgl) . " " . $bulanRep . " " . date("Y",$tgl);
}
function user(){
?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah User</h4>
            </div>
            <div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label class="control-label col-lg">Username</label>
						<input type="text"  required class="form-control" name="usr"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Password</label>
						<input type="password" required class="form-control" name="pas"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Nama Lengkap</label>
						<input type="text" required class="form-control" name="nma"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Alamat</label>
						<input type="text" required class="form-control" name="alt"/>
					</div>
						<input type="submit" class="btn btn-primary" name="user" value="Tambah"/>
						<input type="reset" class="btn btn-warning" value="Close" data-dismiss="modal"/>
				</form>
            </div>
        </div>
    </div>
</div>
<?php
}
?>