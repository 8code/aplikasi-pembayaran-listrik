<section class="d9 t12">

<?php if(isset($_GET['info'])){
      echo '<h5 class="center alert-info">'.$_GET['info'].'</h5>';
  } ?>

<a class="collapse" target="tambah-karyawan">
 <i class="material-icons left">edit</i>Tambah Tarif Baru
</a>

<article class="collapse-content" id="tambah-karyawan">  
<center><h3>Tambah Tarif Baru</h3></center>
  
  <form action="controller/controller.php" method="post" class="form-tambah">
      <div class="input-group">
          <i class="material-icons">account_box</i>
          <input class="input" type="text" name="Kodetarif" placeholder="Kode tarif" required="required" />
      </div>
      <div class="input-group">
          <i class="material-icons">account_box</i>
          <input class="input" type="text" name="Daya" placeholder="Daya" required/>
      </div>
      <div class="input-group">
          <i class="material-icons">monetization_on</i>
          <input class="input" type="text" name="Tarifperkwh" placeholder="Tarif/Kwh" required/>
      </div>

      <button type="submit" name="daftar_tarif" class="btn">
        Tambah Tarif<i class="material-icons right">send</i>
      </button>
  </form>
<br>
<br>
<br>
<br>
</article>

<br>
<br>        
<br>        
<?php
  include "../controller/koneksi.php";
  $q=mysqli_query($koneksi,"SELECT * FROM Tarif");

  if (isset($_GET['info'])) {
    echo "<center class='error' >".$_GET['info']."</center>";
  };?>
 <table>
    <tr>
      <th>Kode Tarif</th>
      <th>Daya</th>
      <th>Tarif/Kwh</th>
      <th>Action</th>
    </tr>
    <?php while($data = mysqli_fetch_array($q)){ ?>
    <tr>
      <td><?php echo $data['Kodetarif']; ?></td>
      <td><?php echo $data['Daya']; ?></td>
      <td><?php echo $data['Tarifperkwh']; ?></td>
      <td>
        <a class="route-tarif" href="#edit/tarif?<?php echo $data['Kodetarif']; ?>">
          <i class="material-icons">edit</i>
        Edit</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</section>


<script type="text/javascript">
  $('.route-tarif').routejs();
  $('.collapse').collapse();
</script>