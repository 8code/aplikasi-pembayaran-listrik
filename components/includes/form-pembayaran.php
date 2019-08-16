<?php
     // Ambil Data Pelangggan
        $Nometer = $_POST['Nometer'];
        $query = mysqli_query($koneksi, "Select * from view_tagihan
        WHERE Nometer = '$Nometer' AND Status = 'Belum Lunas'");

    if($query){
    // Ambil ID Pelanggan
    $query_id = mysqli_query($koneksi, "Select * from pelanggan
            WHERE Nometer = '$Nometer'
    ");
    $data_id = mysqli_fetch_array($query_id);
    $id = $data_id['IDpelanggan'];
    
   if(mysqli_num_rows($query) > 0){
    while ($data = mysqli_fetch_array($query)) {
?>
<article class="form-tambah" id="tagihan<?php echo $data['Bulan'].$data['Tahun'] ?>">
        <input type="hidden" id="IDpelanggan" value="<?php echo $id ?>">
        <input type="hidden" id="Nometer" value="<?php echo $data['Nometer'];?>">
        <input type="hidden" id="Bulan" value="<?php echo $data['Bulan'];?>">
        <input type="hidden" id="Tahun" value="<?php echo $data['Tahun'];?>">
    <br>
    <div class="d4">Nama </div>
        <div class="d8">: <?php echo $data['Nama'];?></div>
    <div class="d4">Tarif per Kwh</div>
        <div class="d8">: Rp. <?php echo $data['Tarifperkwh']; ?></div>
    <div class="d4">Penggunaan</div>
        <div class="d8">: <?php echo $data['Jumlahmeter'];?> Kwh</div>
    <div class="d4">Periode </div>
        <div class="d8">: Bulan 

            <?php echo $data['Bulan'];?> Tahun <?php echo $data['Tahun'];?></div>
    <div class="d4">Jumlah Bayar</div>
        <div class="d8">: Rp. <?php
            $jumlah_bayar = $data['Jumlahmeter'] *  $data['Tarifperkwh'];
            echo $jumlah_bayar;
           ?></div>
        <div class="d12"> Biaya Admin :</div>
          <div class="d12">
            <div class="input-group">
                <i class="material-icons">attach_money</i>
                <input class="input" id="Biayaadmin" placeholder="Biaya Admin" type="text">
            </div>
          </div>
    <br>
    <div class="d12">
        <button class="btn" id="Bayar_tagihan">
          <i class="material-icons right">send</i>Bayar
        </button>
    </div>
</article>

<br>
<br>
<br>
<?php

                }
            }
        }
?>