<?php

   $a_url = $_SERVER['REQUEST_URI'];
   $p_url = explode('/', $a_url);
   $url1 = $p_url['4'];
   $url2 = explode('?', $url1);
   $id = $url2['1'];
   include "../../controller/koneksi.php";
   $q=mysqli_query($koneksi,"SELECT * FROM pelanggan where IDpelanggan = '$id'");
   $data = mysqli_fetch_array($q);
?>

<section class="d9 t12">
<center>
      <h3>Edit pelanggan <?php echo $data['IDpelanggan']; ?></h3>
</center>

<!-- Hapus Data pelanggan -->
<div class="right">
    <form method="post" action="controller/controller.php">
      <input type="hidden" name="IDpelanggan" value="<?php echo $data['IDpelanggan']; ?>">
      <button type="submit" class="btn red" name="hapus_pelanggan">
        <i class="material-icons">delete</i>Hapus
      </button>
  </form>
</div>
  
<!-- Edit Data pelanggan -->
  <form action="controller/controller.php" method="post" class="form-tambah">
      <a class="route-pelanggan" href="#pelanggan">
        <i class="material-icons left">arrow_back</i>Kembali
      </a>
              
      <input type="hidden" name="IDpelanggan" value="<?php echo $data['IDpelanggan']; ?>" required />
      <div class="input-group">
            <i class="material-icons">account_box</i>
            <input disabled class="input" type="text" name="No_meter" placeholder="No_meter" value="<?php echo $data['Nometer']; ?>" />
      </div>
      <div class="input-group">
          <i class="material-icons">account_box</i>
          <input value="<?php echo $data['Nama']; ?>" class="input" type="text" name="Nama" placeholder="Nama" required/>
      </div>
      <div class="input-group">
          <i class="material-icons">place</i>
          <input value="<?php echo $data['Alamat']; ?>" class="input" type="text" name="Alamat" placeholder="Alamat" required/>
      </div>
      <div class="input-group">
            <i class="material-icons">account_box</i>
            <select name="Kodetarif" class="input" required>
                <option value="">Kode Tarif</option>

                <?php $q_tarif=mysqli_query($koneksi,"SELECT * FROM tarif");
                      while($tarif = mysqli_fetch_array($q_tarif)){ ?> 
                <option value="<?php echo $tarif['Kodetarif'] ?>" 
                  <?php if($tarif['Kodetarif'] == $data['Kodetarif']){ echo "selected";} ?>>
                  Daya : <?php echo $tarif['Daya'] ?>
                  Tarif/Kwh : <?php echo $tarif['Tarifperkwh'] ?>
                </option>
                <?php } ?>

            </select>
        </div>
      
      <button type="submit" class="btn" name="edit_pelanggan">
          <i class="material-icons">edit</i> Edit pelanggan
      </button>
     
  </form>
</section>

<script type="text/javascript">
  $('.route-pelanggan').routejs();
</script>