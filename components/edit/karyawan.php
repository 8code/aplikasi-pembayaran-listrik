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

<!-- Hapus Data Karyawan -->
<div class="right">
    <form method="post" action="controller/controller.php">
      <input type="hidden" name="IDkaryawan" value="<?php echo $data['IDkaryawan']; ?>">
      <button type="submit" class="btn red" name="hapus_karyawan">
        <i class="material-icons">delete</i>Hapus
      </button>
  </form>
</div>
  
<!-- Edit Data Karyawan -->
  <form action="controller/controller.php" method="post" class="form-tambah">
      <a class="route-karyawan" href="#karyawan">
        <i class="material-icons left">arrow_back</i>Kembali
      </a>
              
      <input type="hidden" name="IDkaryawan" value="<?php echo $data['IDkaryawan']; ?>" required />

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
          <select name="Jabatan" class="input" required>
              <option value="">Pilih Jabatan</option>
              <option  <?php if ($data['Jabatan'] == 'Karyawan'){echo "selected";} ?> value="Karyawan">Karyawan</option>
              <option  <?php if ($data['Jabatan'] == 'Agen'){echo "selected";} ?> value="Agen">Agen</option>
              <option  <?php if ($data['Jabatan'] == 'Admin'){echo "selected";} ?> value="Admin">Admin</option>
          </select>
      </div>
      <div class="input-group">
          <i class="material-icons">remove_red_eye</i>
          <input class="input" type="password" name="Password" placeholder="Password" required/>
      </div>
      
      <button type="submit" class="btn" name="edit_karyawan">
          <i class="material-icons">edit</i> Edit karyawan
      </button>
     
  </form>
</section>

<script type="text/javascript">
  $('.route-karyawan').routejs();
</script>