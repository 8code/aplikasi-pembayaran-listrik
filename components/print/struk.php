<?php
   $a_url = $_SERVER['REQUEST_URI'];
   $p_url = explode('/', $a_url);
   $url1 = $p_url['4'];
   $url2 = explode('?', $url1);
   $id = $url2['1'];
   include "../../controller/koneksi.php";
   $q=mysqli_query($koneksi,"SELECT * FROM login where IDkaryawan = '$id'");
   $data = mysqli_fetch_array($q);
?>

<section class="d9 t12">
<center>
      <h3>Edit Karyawan <?php echo $data['IDkaryawan']; ?></h3>
</center>

<a class="route-home" href="#home">
        <i class="material-icons left">arrow_back</i>Kembali
      </a>
</section>

<script type="text/javascript">
  $('.route-home').routejs();
</script>