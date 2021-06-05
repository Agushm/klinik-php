<?php 
    include_once("../library/koneksi.php");
    $queryPasien = mysqli_query($server, "SELECT COUNT(no_rm) FROM pasien");
    $queryPeriksa = mysqli_query($server, "SELECT COUNT(id_periksa) FROM periksa");
    $queryDiagnosaCase = mysqli_query($server, "SELECT COUNT(id_diag) FROM diagnosa WHERE kd_diag IS not NULL");
    $queryTindakanCase = mysqli_query($server, "SELECT COUNT(kd_tindakan) FROM tindakan WHERE nm_tindakan IS not NULL");
    $queryResepObat = mysqli_query($server, "SELECT COUNT(id_resep) FROM resep_obt WHERE kd_obat IS not NULL");
    

    $totalPasien = mysqli_fetch_row($queryPasien);
    $totalPeriksa = mysqli_fetch_row($queryPeriksa);
    $totalDiagnosa = mysqli_fetch_row($queryDiagnosaCase);
    $totalTindakan = mysqli_fetch_row($queryTindakanCase);
    $totalResep = mysqli_fetch_row($queryResepObat);
?>
<style>
.card-counter{
    margin-top:10px;
    margin-bottom:10px;
    box-shadow: 2px 2px 10px #DADADA;
    margiasienn: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
</style>
<div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-users"></i>
        <span class="count-numbers"><?php echo($totalPasien[0]);?></span>
        <span class="count-name">Total Pasien</span>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card-counter warning">
        <i class="fa fa-stethoscope"></i>
        <span class="count-numbers"><?php echo($totalPeriksa[0]);?></span>
        <span class="count-name">Total Periksa</span>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-flask"></i>
        <span class="count-numbers"><?php echo($totalDiagnosa[0]);?></span>
        <span class="count-name">Terdiagnosa</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-medkit"></i>
        <span class="count-numbers"><?php echo($totalTindakan[0]);?></span>
        <span class="count-name">Tindakan</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-file-text"></i>
        <span class="count-numbers"><?php echo($totalResep[0]);?></span>
        <span class="count-name">Resep Obat</span>
      </div>
    </div>
  </div>
</div>