<?php if($_GET["cetak"] != null){ 
	include_once("../library/koneksi.php");
	
	$obtSql = "SELECT * FROM resep_obt LEFT JOIN obat ON obat.kd_obat = resep_obt.kd_obat WHERE id_resep ='".$_GET['cetak']."'";
	$result = mysqli_query($server,$obtSql) or die ("Query obat salah: ".mysqli_error());
	$data_obat= mysqli_fetch_assoc($result);

	$pasienSql = "SELECT * FROM kunjungan LEFT JOIN pasien ON pasien.no_rm=kunjungan.no_rm WHERE kunjungan.no_kunjungan = '".$data_obat['no_kunjungan']."'";
	$pasienResult = mysqli_query($server,$pasienSql) or die ("Query obat salah: ".mysqli_error());
	
	
	$data_pasien= mysqli_fetch_assoc($pasienResult);

	?>
	<style>
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
	<body onLoad="window.print();" >
	<div class="panel panel-default" >
	<!-- onLoad="window.print();" -->
	<button class="btn btn-primary no-print" onclick="window.print();">Cetak</button>
	
	<div class="panel-heading">
		Resep Obat
	</div>
	<div class="panel-body">
	<div class='summary'>
          <table class="table table-bordered table-hover">
            <tbody>
              <tr>
                <td class="left">
                  <strong>Nomer Periksa</strong>
                </td>
                <td class="right"><?php echo($data_obat['no_kunjungan']);?></td>
              </tr>
              <tr>
                <td class="left">
                  <strong>Nama Pasien</strong>
                </td>
                <td class="right"><?php echo($data_pasien["nm_pasien"]);?></td>
              </tr>
              <tr>
                <td class="left">
                  <strong>Nama Obat</strong>
                </td>
                <td class="right"><?php echo($data_obat['nm_obat']);?></td>
              </tr>
              <tr>
                <td class="left">
                  <strong>Aturan Minum</strong>
                </td>
                <td class="right"><?php echo($data_obat['aturan']);?></td>
              </tr>
			  <tr>
                <td class="left">
                  <strong>Takaran</strong>
                </td>
                <td class="right"><?php echo($data_obat['takaran']);?></td>
              </tr>
			  <tr>
                <td class="left">
                  <strong>Tanggal Periksa</strong>
                </td>
                <td class="right"><?php echo($data_obat['created_at']);?></td>
              </tr>
            </tbody>
          </table>
        </div>
	</div>
	<div>
	
	</div>
</div>
</body>

<?php }else{ ?>
<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM resep_obt";
$pageQry = mysqli_query($server,$pageSql) or die ("error paging: ".mysqli_error());
$jml	 = mysqli_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<?php
	if($_POST["obt"]){
			include_once("../library/koneksi.php");
			mysqli_query($server,"INSERT INTO obat SET kd_obat='".$_POST["kd_obat"]."',nm_obat='".$_POST["nm_obat"]."', no_periksa='".$_POST["no_periksa"]."', nm_pasien='".$_POST["nm_pasien"]."', aturan='".$_POST["aturan"]."'")or die("error insert".mysqli_error());
			echo "<meta http-equiv='refresh' content='0; url=?menu=obat'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["obt"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}

obat(); //memanggil function obat
?>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar Resep Obat
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>No Periksa</th>
						<th>Tanggal Periksa</th>
						<th>Nama Pasien</th>
						<th>Kode Obat</th>		
						<th>Nama Obat</th>
						<th>Aturan minum</th>
						<th>Takaran</th>
						<th>Buat Resep</th>
						<th>Cetak Resep</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$obtSql = "SELECT * FROM resep_obt ORDER BY no_kunjungan DESC LIMIT $hal, $row";
				$obtQry = mysqli_query($server,$obtSql)  or die ("Query Obat salah : ".mysqli_error());
				$nomor  = 0;
				while ($obat = mysqli_fetch_array($obtQry)) {
			?>
				<tbody>
					<tr>
						
						<td><?php echo $obat['no_kunjungan'];?></td>
						<td><?php echo $obat['created_at'];?></td>
						<td>
							 <?php 
							$pasienSql = "SELECT * FROM kunjungan LEFT JOIN pasien ON pasien.no_rm=kunjungan.no_rm WHERE kunjungan.no_kunjungan = '".$obat['no_kunjungan']."'";
							$pasienQry = mysqli_query($server,$pasienSql)  or die ("Query Obat salah : ".mysqli_error());
							$pasien = mysqli_fetch_assoc($pasienQry);
							
							echo $pasien['nm_pasien'];?> 
							
							</td>
						<td><?php echo $obat['kd_obat'];?></td>
						
						<td><?php 
						$d_obtSql = "SELECT * FROM obat WHERE kd_obat = '".$obat['kd_obat']."'";
						$d_obtQry = mysqli_query($server,$d_obtSql)  or die ("Query Obat salah : ".mysqli_error());
						$d_obt = mysqli_fetch_assoc($d_obtQry);
						
						echo $d_obt['nm_obat'];?>
						</td>
						<td><?php echo $obat['aturan'];?></td>
						<td><?php echo $obat['takaran'];?></td>
						<td><a href="?menu=resep_obat_edit&nmr=<?php echo $obat['no_kunjungan']; ?>" class="btn btn-xs btn-primary tipsy-kiri-atas" title="Buat Resep Obat" ><i class="icon-plus icon-white"></td>
						<td><a href="?menu=resep_obat&cetak=<?php echo $obat['id_resep']; ?>" class="btn btn-xs btn-green tipsy-kiri-atas" title="Cetak Resep Obat" onclick="return confirm('Anda akan mencetak resep obat kunjungan ke <?php echo $obat['no_kunjungan'];?> ?')"><i class="icon-print icon-white"></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=resep_obat_del&aksi=hapus&nmr=<?php echo $obat['id_resep']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
						  </div>
						</td>
					</tr>
				</tbody>
			<?php } ?>
					<tr>
						<td colspan="10" align="right">
						<?php
						for($h = 1; $h <= $max; $h++){
							$list[$h] = $row*$h-$row;
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=obat&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>
<?php }?>