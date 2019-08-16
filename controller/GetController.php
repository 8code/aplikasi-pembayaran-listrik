<?php
session_start();
if (!isset($_SESSION['IDkaryawan'])) {
    header("location:../login");
}else{
    include"koneksi.php";
    $data = [];
    // Jumlah Karyawan
    if (isset($_GET['Jumlah_karyawan'])) {
        $query=mysqli_query($koneksi,"SELECT * FROM login"); 
        $jumlah = mysqli_num_rows($query);
        echo $jumlah;

    }
    // Data Karyawan
    if (isset($_GET['Data_karyawan'])) {
        $mulai = 0;
        $selesai = 7;
        if(isset($_GET['hal'])){
            $hal =$_GET['hal'];
            $hal--;
            $mulai =  $hal * 7;
        }
        $q=mysqli_query($koneksi,"SELECT * FROM login limit $mulai, $selesai"); 
        while($r = mysqli_fetch_array($q)){
            $data[] = array(
                "IDkaryawan" => $r['IDkaryawan'],
                "Nama" => $r['Nama'],
                "Alamat" => $r['Alamat'],
                "Jabatan" => $r['Jabatan'],
            );
        }
        header('content-type: application/json');
        echo json_encode($data);
    }
    // Data Tagihan
    if (isset($_GET['Tagihan'])) {
        $Nometer = $_GET['Id'];
        $query = mysqli_query($koneksi, "Select * from view_tagihan
        WHERE (Nometer = '$Nometer' OR IDpelanggan = '$Nometer') AND Status = 'Belum Lunas'");
        if(mysqli_num_rows($query) > 0){
            while($r = mysqli_fetch_array($query)){
                $data[] = array(
                    "Status" => "Success",
                    "IDpelanggan" => $r['IDpelanggan'],
                    "Nometer" => $r['Nometer'],
                    "Nama" => $r['Nama'],
                    "Alamat" => $r['Alamat'],
                    "Tarifperkwh" => $r['Tarifperkwh'],
                    "Bulan" => $r['Bulan'],
                    "Tahun" => $r['Tahun'],
                    "Jumlahmeter" => $r['Jumlahmeter'],
                );
            }
        }else{
            $data[] = array(
                "Status" => "Error",
                "Message" => "Data Tidak Ditemukan",
            );
        }
        header('content-type: application/json');
        echo json_encode($data);
    }
    
     // Data History Pembayaran
    if (isset($_GET['History_Pembayaran'])) {
        $Id =$_SESSION['IDkaryawan'];
        $mulai = 0;
        $selesai = 7;
        if(isset($_GET['hal'])){
            $hal =$_GET['hal'];
            $hal--;
            $mulai =  $hal * 7;
        }
        $q=mysqli_query($koneksi,"Select * from pembayaran WHERE IDkaryawan ='$Id' limit $mulai, $selesai"); 
        if(mysqli_num_rows($q) > 0){
            while($r = mysqli_fetch_array($q)){
                $data[] = array(
                    "Status" => "Success",
                    "IDbayar" => $r['IDbayar'],
                    "IDpelanggan" => $r['IDpelanggan'],
                    "Bulanbayar" => $r['Bulanbayar'],
                    "Tahun" => $r['Tahun'],
                    "Tanggal" => $r['Tanggal'],
                    "Biayaadmin" => $r['Biayaadmin'],
                );
            }
        }else{
            $data[] = array(
                "Status" => "Error",
                "Message" => "Data Tidak Ditemukan",
            );
        }
        header('content-type: application/json');
        echo json_encode($data);
    }
    // Print Struk
    if (isset($_GET['Print-Struk'])) {
        $IDpelanggan = "";
        if (isset($_GET['IDbayar'])) {
            $IDbayar = $_GET['IDbayar'];
        }
        if (isset($_GET['IDpelanggan'])) {
            $IDpelanggan = $_GET['IDpelanggan'];
        }
        $qbayar = mysqli_query($koneksi, "Select * from pembayaran
        WHERE IDbayar = '$IDbayar'");
        if(mysqli_num_rows($qbayar) > 0){
            $p = mysqli_fetch_array($qbayar);
        }
        $q = mysqli_query($koneksi, "Select * from view_tagihan
        WHERE IDpelanggan = '$IDpelanggan' AND Status = 'Lunas' AND Bulan = '$p[Bulanbayar]' AND Tahun = '$p[Tahun]'");
        if(mysqli_num_rows($q) > 0){
            $r = mysqli_fetch_array($q);
                $data[] = array(
                    "Status" => "Success",
                    "IDpelanggan" => $r['IDpelanggan'],
                    "Nometer" => $r['Nometer'],
                    "Nama" => $r['Nama'],
                    "Alamat" => $r['Alamat'],
                    "Tarifperkwh" => $r['Tarifperkwh'],
                    "Daya" => $r['Daya'],
                    "Bulan" => $r['Bulan'],
                    "Tahun" => $r['Tahun'],
                    "Biayaadmin" => $p['Biayaadmin'],
                    "Jumlahmeter" => $r['Jumlahmeter'],
                );
        }else{
            $data[] = array(
                "Status" => "Error",
                "Message" => "Data Tidak Ditemukan",
            );
        }
        header('content-type: application/json');
        echo json_encode($data);
    }
    $koneksi->close();
    die();
}
?>