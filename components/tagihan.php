<?php 
  include "../controller/koneksi.php";
  $q=mysqli_query($koneksi,"SELECT * FROM tagihan Where Status = 'Belum Lunas'");
?>
<section class="d9 t12">
<br>
<br>

<!-- Daftar tagihan -->
  <table>
      <tr>
        <th>ID</th>
        <th>No Meter</th>
        <th>Bulan </th>
        <th>Tahun</th>
        <th class="hide-t">Jumlah Meter</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      <?php while($data = mysqli_fetch_array($q)){ ?>
      <tr>
        <td><?php echo $data['IDpelanggan']; ?></td>
        <?php
          $q1=mysqli_query($koneksi,"SELECT * FROM pelanggan Where IDpelanggan = '$data[IDpelanggan]'");
          $Nometer = mysqli_fetch_array($q1);
         ?>
        <td><?php echo $Nometer['Nometer']; ?></td>
        <td><?php echo $data['Bulan']; ?></td>
        <td><?php echo $data['Tahun']; ?></td>
        <td class="hide-t"><?php echo $data['Jumlahmeter']; ?></td>
        <td ><?php echo $data['Status']; ?></td>
        <td>
          <a class="route-tagihan" href="#home?Nometer=<?php echo $Nometer['Nometer']; ?>">
            <i class="material-icons">send</i>Bayar</a>
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
  $('.route-tagihan').routejs();
</script>