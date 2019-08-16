<?php 
  include "../controller/koneksi.php";
  $q=mysqli_query($koneksi,"SELECT * FROM pelanggan");

?>
<section class="d9 t12">
  <?php if(isset($_GET['info'])){
      echo '<h5 class="center alert-info">'.$_GET['info'].'</h5>';
  } ?>

  <a class="collapse" target="tambah-pelanggan">
    <i class="material-icons left">edit</i> Tambah pelanggan Baru
  </a>
  <article class="collapse-content" id="tambah-pelanggan">
    
   <center><h3>Tambah pelanggan Baru</h3></center>
  
    <form action="controller/controller.php" method="post" class="form-tambah">
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" name="IDpelanggan" placeholder="IDpelanggan" required="required" />
        </div>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" name="No_meter" placeholder="No_meter" required/>
        </div>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" name="Nama" placeholder="Nama" required/>
        </div>
        <div class="input-group">
            <i class="material-icons">place</i>
            <input class="input" type="text" name="Alamat" placeholder="Alamat" required/>
        </div>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <select name="Kodetarif" class="input" required>
                <option value="">Kode Tarif</option>

                <?php $q_tarif=mysqli_query($koneksi,"SELECT * FROM tarif");
                      while($tarif = mysqli_fetch_array($q_tarif)){ ?> 
                <option value="<?php echo $tarif['Kodetarif'] ?>">
                  Daya : <?php echo $tarif['Daya'] ?>
                  Tarif/Kwh : <?php echo $tarif['Tarifperkwh'] ?>
                </option>
                <?php } ?>

            </select>
        </div>
        <button type="submit" name="daftar_pelanggan" class="btn">
          Daftar<i class="material-icons right">send</i>
        </button>
       
    </form>
</article>

<br>
<br>
<br>

<!-- Daftar pelanggan -->
  <table>
      <tr>
        <th>ID pelanggan</th>
        <th>No Meter</th>
        <th>Nama</th>
        <th class="hide-t">Alamat</th>
        <th class="hide-t">Kode Tarif</th>
        <th>Action</th>
      </tr>
      <?php while($data = mysqli_fetch_array($q)){ ?>
      <tr>
        <td><?php echo $data['IDpelanggan']; ?></td>
        <td><?php echo $data['Nometer']; ?></td>
        <td><?php echo $data['Nama']; ?></td>
        <td class="hide-t"><?php echo $data['Alamat']; ?></td>
        <td class="hide-t"><?php echo $data['Kodetarif']; ?></td>
        <td>
          <a class="route-pelanggan" href="#edit/pelanggan?<?php echo $data['IDpelanggan']; ?>">
            <i class="material-icons">edit</i>
          Edit</a>
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
  $('.route-pelanggan').routejs();
  $('.collapse').collapse();
  $('.alert-info').click(function(){
    $(this).remove();
  });
</script>