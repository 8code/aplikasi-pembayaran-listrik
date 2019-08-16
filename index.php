<?php 
session_start();
if (!isset($_SESSION['IDkaryawan'])) {header("location:login");
}else{
?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Pembayaran Listrik</title>
      <link href="assets/css/aristyle.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
<body >
<header class="navbar-fixed">  
  <nav class="navbar cyan">
    <div class="judul d12">
      <h1 class="center">Aplikasi pembayaran Listrik</h1>
    </div>
      <a class="routejs" href="#home">
      <img src="assets/img/logo.png" class="logo"> </a>
      <a class="btn-sidenav" target="docmenu"><i class="material-icons">menu</i></a>
      <div class="left hide-t">
      </div>
      <div class="right">
        <a class="hide-t" id="fullscreen" href="#"><i class="material-icons left">aspect_ratio</i></a>
        <a class="btn-sidenav" target="settings"><i class="material-icons">settings</i></a>
        <a class="hide-t" href="logout"><i class="material-icons left">exit_to_app</i> Logout</a>
      </div>
  </nav>
</header>
<!--Navigasi Mobile-->
<nav id="docmenu" class="sidenav active-sidenav">
    <a class="routejs" href="#user">
        <div class="user-sidebar">
            <img src="assets/img/man.png" class="image-icon">
            <div class="sidebar-name"><?php echo $_SESSION['Nama']; ?>
                <br> <small><?php echo $_SESSION['IDkaryawan']; ?></small>
            </div> 
        </div>
    </a>
    <div class="border-"></div>
    <div class="d12 menu-">
      <a class="routejs" href="#home"><i class="material-icons left">home</i>home</a>

      <?php if($_SESSION['Jabatan'] == 'Admin'){ ?>
      <a class="routejs" href="#penggunaan">
        <i class="material-icons left">flash_on</i>Penggunaan
      </a>
       <?php } ?>
      <a class="routejs" href="#tagihan">
        <i class="material-icons left">flash_on</i>Tagihan
      </a>
      <a class="routejs" href="#history">
        <i class="material-icons left">assessment</i>History
      </a>
      <?php if($_SESSION['Jabatan'] == 'Admin'){ ?>
      <a class="routejs" href="#pelanggan">
        <i class="material-icons left">contacts</i> Data Pelanggan
      </a>
      <a id="linkkaryawan" class="routejs" href="#karyawan">
        <i class="material-icons left">contacts</i> Data Karyawan
      </a>
      <a class="routejs" href="#tarif">
        <i class="material-icons left">account_box</i>Tarif Listrik
      </a>
      <!-- <a class="routejs" href="#laporan">
        <i class="material-icons left">account_box</i>Laporan
      </a> -->
       <?php } ?>
      <a href="logout">
        <i class="material-icons left">exit_to_app</i>Logout
      </a>
    </div>
</nav>
<nav id="settings" class="sidenav active-sidenav sidenav-right">
     <div class="d12">
         Iklan Banner
     </div>
</nav>
<main class="container push-sidenav" id="routejs">
  
</main>
  <!--Import Javascript-->
  <script type="text/javascript" src="assets/js/aristyle.min.js"></script>
  <script type="text/javascript" src="assets/js/aristyle.js"></script>
  <script type="text/javascript" src="route-aristyle.js"></script>
<script>
</script>
</body>
</html>

<?php } ?>