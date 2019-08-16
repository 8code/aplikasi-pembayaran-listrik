<?php 
  include "../controller/koneksi.php";
  $q=mysqli_query($koneksi,"SELECT * FROM penggunaan");
?>
<section class="d9 t12">

  <?php if(isset($_GET['info'])){
      echo '<h5 class="center alert-info">'.$_GET['info'].'</h5>';
  } ?>

  <a class="collapse" target="tambah-penggunaan">
    <i class="material-icons left">edit</i> Tambah penggunaan Baru
  </a>

  <article class="collapse-content" id="tambah-penggunaan">
   <center><h3>Tambah penggunaan Baru</h3></center>
  
    <form action="controller/controller.php" method="post" class="form-tambah">
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" name="IDpelanggan" placeholder="IDpelanggan" required="required" />
        </div>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <select name="bulan" class="input" required>
                <option value="">Bulan</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Matet</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" name="tahun" placeholder="Tahun" required />
        </div>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" name="meterawal" placeholder="Meter Awal" required />
        </div>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" name="meterakhir" placeholder="Meter Akhir" required />
        </div>
        <button type="submit" name="tambah_penggunaan" class="btn">
          Tambah <i class="material-icons right">send</i>
        </button>
       
    </form>
</article>

<br>
<br>
<br>

<!-- Daftar penggunaan -->
  <table id="printData">
      <tr>
        <th>ID penggunaan</th>
        <th>Bulan</th>
        <th class="hide-t">Tahun</th>
        <th class="hide-t">Meter Awal</th>
        <th class="hide-t">Meter Akhir</th>
        <th class="hide-t">ID Karyawan</th>
        <th>Action</th>
      </tr>
      <?php while($data = mysqli_fetch_array($q)){ ?>
      <tr>
        <td><?php echo $data['IDpelanggan']; ?></td>
        <td><?php echo $data['Bulan']; ?></td>
        <td class="hide-t"><?php echo $data['Tahun']; ?></td>
        <td class="hide-t"><?php echo $data['Meterawal']; ?></td>
        <td class="hide-t"><?php echo $data['Meterakhir']; ?></td>
        <td class="hide-t"><?php echo $data['IDkaryawan']; ?></td>
        <td>
          <form method="post" action="controller/controller.php">
            <input type="hidden" name="IDpelanggan" value="<?php echo $data['IDpelanggan']; ?>">
            <input type="hidden" name="bulan" value="<?php echo $data['Bulan']; ?>">
            <input type="hidden" name="tahun" value="<?php echo $data['Tahun']; ?>">
            <button type="submit" class="red" name="hapus_penggunaan">
              <i class="material-icons">delete</i>
            </button>
        </form>
        </td>
      </tr>
      <?php } ?>
    </table>
<br>
<br>
<br>
<br>
<br>
</section>

<script type="text/javascript">
  $('.route-penggunaan').routejs();
  $('.collapse').collapse();
  $('.collapse').click();
</script>