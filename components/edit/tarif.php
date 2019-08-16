<?php

   $a_url = $_SERVER['REQUEST_URI'];
   $p_url = explode('/', $a_url);
   $url1 = $p_url['4'];
   $url2 = explode('?', $url1);
   $id = $url2['1'];
   include "../../controller/koneksi.php";
   $q=mysqli_query($koneksi,"SELECT * FROM tarif where Kodetarif = '$id'");
   $data = mysqli_fetch_array($q);
?>

<section class="d9 t12">

<center>
  <h3>Edit Tarif </h3>
</center>

<!-- Hapus Data Karyawan -->
<div class="right">
    <form method="post" action="controller/controller.php">
      <input type="hidden" name="Kodetarif" value="<?php echo $data['Kodetarif']; ?>">
      <button type="submit" class="btn red" name="hapus_tarif">
        <i class="material-icons">delete</i>Hapus
      </button>
  </form>
</div>
    <form action="controller/controller.php"" method="post" class="form-tambah">
      <a class="route-tarif" href="#tarif">
          <i class="material-icons left">arrow_back</i>Kembali
        </a>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" name="Kodetarif" placeholder="Kode tarif" required value="<?php echo $data['Kodetarif'] ?>" />
        </div>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" name="Daya" placeholder="Daya" required 
            value="<?php echo $data['Daya'] ?>"/>
        </div>
        <div class="input-group">
            <i class="material-icons">monetization_on</i>
            <input class="input" type="text" name="Tarifperkwh" placeholder="Tarif/Kwh" required value="<?php echo $data['Tarifperkwh'] ?>"/>
        </div>

        <button type="submit" class="btn" name="edit_tarif">
            <i class="material-icons">edit</i> Edit Tarif
        </button>
  </form>

</section>


<script type="text/javascript">
  $('.route-tarif').routejs();
</script>