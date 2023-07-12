<?php
include'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="favicon1.png"/>

    <title>SISTEM PAKAR MENDETEKSI PENYAKIT PENYAKIT MENTAL METODE CERTAINTY FACTOR & DEMPSTER SHAFER</title>
    <link href="assets/css/herupralambang.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="assets/css/sweet/sweetalert.css">
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/css/sweet/sweetalert.min.js"></script>
	
  </head>
  <body background="back.png">
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><strong> SISTEM PAKAR CF-DS</strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">            
            <?php if($_SESSION['login']):?>
              <li><a href="?m=diagnosaCF"><span class="glyphicon glyphicon-briefcase"></span> Diagnosa Penyakit</a></li>
              <?php if(isset($_SESSION['login']) && !empty($_SESSION['login'])): ?>
                <li><a href="?m=riwayat"><span class="glyphicon glyphicon-briefcase"></span> Riwayat Konsultasi</a></li>
              <?php endif ?>
              <!-- <li class="dropdown"> -->
              <!-- <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-briefcase"></span> Diagnosa <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="?m=diagnosaCF"><span class="glyphicon glyphicon-arrow-right"></span> Diagnosa Penyakit</a></li> -->
					<!-- <li><a href="?m=diagnosaDS"><span class="glyphicon glyphicon-arrow-right"></span> Diagnosa DS</a></li> -->
				
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-tags"></span> Gejala <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="?m=gejalaCF"><span class="glyphicon glyphicon-arrow-right"></span> Gejala CF</a></li>
					<li><a href="?m=gejalaDS"><span class="glyphicon glyphicon-arrow-right"></span> Gejala DS</a></li>
				</ul>
            </li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-bookmark"></span> Relasi <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="?m=relasiCF"><span class="glyphicon glyphicon-arrow-right"></span> Relasi CF</a></li>
					<li><a href="?m=relasiDS"><span class="glyphicon glyphicon-arrow-right"></span> Relasi DS</a></li>
				</ul>
            </li>
			<li><a href="?m=konsultasiCF"><span class="glyphicon glyphicon-ok-sign"></span> Konsultasi</a></li>
			<!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-ok-sign"></span> Konsultasi <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="?m=konsultasiCF"><span class="glyphicon glyphicon-arrow-right"></span> Konsultasi CF</a></li>
					<li><a href="?m=konsultasiDS"><span class="glyphicon glyphicon-arrow-right"></span> Konsultasi DS</a></li>
				</ul>
            </li>-->		
            <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
            <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <?php else:?>
            <li><a href="?m=konsultasiCF"><span class="glyphicon glyphicon-ok-sign"></span> Konsultasi</a></li>		
            <li><a href="?m=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php endif?>               
          </ul>          
        </div>
    </nav>
    <div class="container">
    <?php
        if(file_exists($mod.'.php'))
            if(!$_SESSION[login] && in_array($mod, array('riwayat', 'diagnosaCF', 'gejalaCF', 'relasiCF', 'diagnosaDS', 'gejalaDS', 'relasiDS', 'password')))
                redirect_js('index.php?m=login');
            else
                include $mod.'.php';
        else
            include 'home.php';
    ?>
    </div>
    <footer class="footer bg-primary">
      <div class="container"><center>
        <p>Copyright &copy; 2023<a href="" target="_blank"> Universitas Bumigora</a></span></p></center>
      </div>
    </footer>	
   </body>
</html>