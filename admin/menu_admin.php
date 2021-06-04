       <div id="left">
            <ul id="menu" class="collapse">
                <li class="panel active"><a href="index.php"><i class="icon-home"></i> Dashboard</a></li>
                <li><a href="?menu=user"><i class="icon-user "></i> Daftar User</a></li>
                <li><a href="?menu=obat"><i class="icon-medkit"></i> Obat</a></li>
				<li><a href="?menu=pasien"><i class="icon-user-md "></i> Pasien</a></li>
                <li><a href="?menu=periksa"><i class="icon-stethoscope "></i> Periksa</a></li>
				<li><a href="?menu=resep_obt"><i class="icon-medkit"></i> Resep Obat</a></li>
				<li><a href="?menu=kunjungan"><i class="icon-hospital"></i> Kunjungan</a></li>
				<li><a href="?menu=laporanpasien"><i class="icon-paper-clip"></i> Laporan Data Pasien</a></li>
                <li><a href="?menu=laporanperiksa"><i class="icon-paper-clip"></i> Laporan Data Periksa</a></li>
                <li><a href="?menu=laporankunjungan"><i class="icon-paper-clip"></i> Laporan Data Kunjungan</a></li>
                <li><a href="?menu=laporanresep"><i class="icon-paper-clip"></i> Laporan Data resep</a></li>
            </ul>
        </div>
		<div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
						<h1>SISTEM INFORMASI PENDAFTARAN KLINIK</h1>
                    </div>
                </div>
                <hr/>
                 <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-12">
						<?php
						if($_GET["menu"]){
							include_once("load.php");
						}else{
							echo "<div class='col-lg-12'>
										<div class='panel panel-default'>
											<div class='panel-heading'>
												Tentang Aplikasi
											</div>
											<div class='panel-body'>
												<ul class='nav nav-tabs'>
													<li class='active'><a href='#home' data-toggle='tab'>Home</a>
													</li>
													<li><a href='#profile' data-toggle='tab'>Profil</a>
													</li>
													<li><a href='#messages' data-toggle='tab'>Pesan</a>
													</li>
													<li><a href='#kontak' data-toggle='tab'>Kontak</a>
													</li>
												</ul>

												<div class='tab-content'>
													<div class='tab-pane fade in active' id='home'>
													<center>
														<p><img src='../img/klinik.png' class='img-responsive' alt='Header SIRS'/></p></center>
													</div>
													<div class='tab-pane fade' id='profile'>
														
													</div>
													<div class='tab-pane fade' id='messages'>
														
													</div>
													<div class='tab-pane fade' id='kontak'>
														
													</div>
												</div>
											</div>
										</div>
									</div>";
						}
						?>
					</div>
                </div>
                  <!--END BLOCK SECTION -->
                <hr />
            </div>
        </div>
