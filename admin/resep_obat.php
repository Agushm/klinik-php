<?php if($_GET["resep"] != null){ 
	include_once("../library/koneksi.php");
	
	$obtSql = "SELECT * FROM obat WHERE kd_obat ='".$_GET['resep']."'";
	$result = mysqli_query($server,$obtSql) or die ("Query obat salah: ".mysqli_error());
	
	$data= $result->fetch_row();

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
	<body onLoad="window.print();">
	<div class="panel panel-default" >
	<button class="btn btn-primary no-print" onclick ='window.print();'>Cetak</button>
	
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
                <td class="right"><?php echo($data[1]);?></td>
              </tr>
              <tr>
                <td class="left">
                  <strong>Nama Pasien</strong>
                </td>
                <td class="right"><?php echo($data[2]);?></td>
              </tr>
              <tr>
                <td class="left">
                  <strong>Nama Obat</strong>
                </td>
                <td class="right"><?php echo($data[3]);?></td>
              </tr>
              <tr>
                <td class="left">
                  <strong>Aturan Minum</strong>
                </td>
                <td class="right"><?php echo($data[4]);?></td>
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
$pageSql = "SELECT * FROM obat";
$pageQry = mysqli_query($server,$pageSql) or die ("error paging: ".mysqli_error());
$jml	 = mysqli_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="#myModal" class="btn btn-primary btn-rect" data-toggle="modal"><i class='icon icon-white icon-plus'></i> Tambah Obat</a><p>
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
						<th width="140">Kode Obat</th>
						<th>No Periksa</th>
						<th>Nama Pasien</th>
						<th>Nama Obat</th>
						<th>Aturan minum</th>
						<th>Resep Obat</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$obtSql = "SELECT * FROM obat ORDER BY kd_obat DESC LIMIT $hal, $row";
				$obtQry = mysqli_query($server,$obtSql)  or die ("Query Obat salah : ".mysqli_error());
				$nomor  = 0; 
				while ($obat = mysqli_fetch_array($obtQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $obat['kd_obat'];?></td>
						<td><?php echo $obat['no_periksa'];?></td>
						<td><?php echo $obat['nm_pasien'];?></td>
						<td><?php echo $obat['nm_obat'];?></td>
						<td><?php echo $obat['aturan'];?></td>
						<td><a href="?menu=obat&resep=<?php echo $obat['kd_obat']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Cetak Resep Obat" onclick="return confirm('Anda akan mencetak resep obat kode <?php echo $obat['kd_obat'];?> ?')"><i class="icon-print icon-white"></td>
						
						<td>
						  <div class='btn-group'>
						  <a href="?menu=obat_del&aksi=hapus&nmr=<?php echo $obat['kd_obat']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
						  <a href="?menu=obat_edit&aksi=edit&nmr=<?php echo $obat['kd_obat']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
						  </div>
						</td>
					</tr>
				</tbody>
			<?php } ?>
					<tr>
						<td colspan="6" align="right">
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