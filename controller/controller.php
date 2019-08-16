<?php
session_start();
if (!isset($_SESSION['IDkaryawan'])) {
    header("location:../login");
}else{
include"koneksi.php";
// Bayar Tagihan
    if (isset($_POST['Bayar_tagihan'])) {
        $IDpelanggan = $_POST['IDpelanggan'];
        $bulan = $_POST['Bulan'];
        $tahun = $_POST['Tahun'];
        $Biayaadmin = $_POST['Biayaadmin'];
        $IDkaryawan = $_SESSION['IDkaryawan'];
        $Tanggal=date("Y/m/d");
        $sql = "Insert Into pembayaran
        (IDpelanggan,Bulanbayar,Tahun,Tanggal,Biayaadmin,IDkaryawan)
        values(
            '$IDpelanggan',
            '$bulan',
            '$tahun',
            '$Tanggal',
            '$Biayaadmin',
            '$IDkaryawan')";
        $query = $koneksi->query($sql);
           if($query){
                $last_id = mysqli_insert_id($koneksi);
                
                $data[] = array(
                        "Status" => "True",
                        "Message" => "Pembayaran Berhasil",
                        "IDbayar" => $last_id,
                    );
            }
           else{
                $data[] = array(
                        "Status" => "False",
                        "Message" => "Pembayaran Gagal",
                    );
           }
            header('content-type: application/json');
            echo json_encode($data);
    }

// Tambah penggunaan
    if (isset($_POST['tambah_penggunaan'])) {
        $IDpelanggan = $_POST['IDpelanggan'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $meterawal = $_POST['meterawal'];
        $meterakhir = $_POST['meterakhir'];
        $IDkaryawan = $_SESSION['IDkaryawan'];
        $sql = "Insert Into penggunaan 
        values(
                '$IDpelanggan',
                '$bulan',
                '$tahun',
                '$meterawal',
                '$meterakhir',
                '$IDkaryawan')";
        $query = $koneksi->query($sql);
           if($query){
                header("location:../#penggunaan?info=Data Berhasil Ditambahkan");
            }
           else{
                header("location:../#penggunaan?info=Data Gagal Ditambahkan");
            }
    }


  // Hapus Penggunaan
    if (isset($_POST['hapus_penggunaan'])) {
        $IDpelanggan = $_POST['IDpelanggan'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $query = mysqli_query($koneksi, "delete from penggunaan
        WHERE IDpelanggan = '$IDpelanggan' AND
              Bulan = '$bulan' AND 
              Tahun = '$tahun'
        ");
        $query2 = mysqli_query($koneksi, "delete from tagihan
        WHERE IDpelanggan = '$IDpelanggan' AND
              Bulan = '$bulan' AND 
              Tahun = '$tahun'
        ");
          if($query){
                if($query2){
                    header("location:../#penggunaan?info=Data Berhasil Dihapus");
                }else{
                   header("location:../#penggunaan?info=Data Gagal Dihapus");
                }
            }
           else{
               header("location:../#tagihan?info=Data Gagal Semua Dihapus");
            }
    }


    // Daftar Karyawan
    if (isset($_POST['Daftar_karyawan'])) {
        $IDkaryawan = $_POST['IDkaryawan'];
        $Nama = $_POST['Nama'];
        $Alamat = $_POST['Alamat'];
        $Jabatan = $_POST['Jabatan'];
        $i_pass = $_POST['Password'];

        if($IDkaryawan == ""){
            echo "IDkaryawan Harus Diisi";
        }elseif($Nama == ""){
            echo "Nama Harus Diisi";
        }elseif($Alamat == ""){
            echo "Alamat Harus Diisi";
        }elseif($Jabatan == ""){
            echo "Jabatan Harus Diisi";
        }elseif($i_pass == ""){
            echo "Password Harus Diisi";
        }else{
            $Password = password_hash($i_pass,PASSWORD_DEFAULT); 
            $sql = "Insert Into login values('$IDkaryawan','$Nama','$Alamat','$Password','$Jabatan')";
            $query = $koneksi->query($sql);
               if($query){
                    echo "Berhasil";
                }
               else{
                    echo "Gagal Di isi";
                }
        }
    }


     // edit Karyawan
    if (isset($_POST['edit_karyawan'])) {
        $IDkaryawan = $_POST['IDkaryawan'];
        $Nama = $_POST['Nama'];
        $Alamat = $_POST['Alamat'];
        $Jabatan = $_POST['Jabatan'];
        $i_pass = $_POST['Password'];
        $Password = password_hash($i_pass,PASSWORD_DEFAULT); 
        $query = mysqli_query($koneksi, "update login set 
        Nama = '$Nama',
        Alamat = '$Alamat',
        Password = '$Password',
        Jabatan = '$Jabatan' 
        WHERE IDkaryawan = '$IDkaryawan'
        ");
          if($query){
                header("location:../#karyawan?info=Data Berhasil Diedit");
            }
           else{
                header("location:../#karyawan?info=Data Gagal Diedit");
            }
    }

     // Hapus Karyawan
    if (isset($_POST['hapus_karyawan'])) {
        $IDkaryawan = $_POST['IDkaryawan'];
        $query = mysqli_query($koneksi, "delete from login
        WHERE IDkaryawan = '$IDkaryawan'
        ");
          if($query){
                header("location:../#karyawan?info=Data Berhasil Dihapus");
            }
           else{
               header("location:../#karyawan?info=Data Gagal Dihapus");
            }
    }

    // Tambah Tarif

    if (isset($_POST['daftar_tarif'])) {
        $Kodetarif = $_POST['Kodetarif'];
        $Daya = $_POST['Daya'];
        $Tarifperkwh = $_POST['Tarifperkwh'];
        $IDkaryawan = $_SESSION['IDkaryawan'];
        $sql = "Insert Into tarif values('$Kodetarif','$Daya','$Tarifperkwh','$IDkaryawan')";
        $query = $koneksi->query($sql);
           if($query){
                header("location:../#tarif?info=Data Berhasil Ditambahkan");
            }
           else{
                header("location:../#tarif?info=Data Gagal Ditambahkan");
            }
    }

    // edit Tarif

    if (isset($_POST['edit_tarif'])) {
        $Kodetarif = $_POST['Kodetarif'];
        $Daya = $_POST['Daya'];
        $Tarifperkwh = $_POST['Tarifperkwh'];
        $IDkaryawan = $_SESSION['IDkaryawan'];
        $query = mysqli_query($koneksi, "update tarif set 
            Daya = '$Daya',
            Tarifperkwh = '$Tarifperkwh',
            IDkaryawan = '$IDkaryawan'
            WHERE Kodetarif= '$Kodetarif'
        ");
          if($query){
                header("location:../#tarif?info=Data Berhasil Diedit");
            }
           else{
                header("location:../#tarif?info=Data Gagal Diedit");
            }
    }

// Hapus Tarif
    if (isset($_POST['hapus_tarif'])) {
    $id = $_GET['id'];
        $query = mysqli_query($koneksi, "delete from tarif
        WHERE Kodetarif = '$id'
        ");
          if($query){
                header("location:../#tarif?info=Data Berhasil Dihapus");
            }
           else{
                header("location:../#tarif?info=Data Gagal Dihapus");
            }
    }


// Daftar pelanggan
    if (isset($_POST['daftar_pelanggan'])) {
        $IDkaryawan = $_SESSION['IDkaryawan'];
        $No_meter = $_POST['No_meter'];
        $IDpelanggan = $_POST['IDpelanggan'];
        $Nama = $_POST['Nama'];
        $Alamat = $_POST['Alamat'];
        $Kodetarif = $_POST['Kodetarif'];
        $sql = "Insert Into pelanggan 
                values('$IDpelanggan','$No_meter','$Nama','$Alamat','$Kodetarif','$IDkaryawan')";
        $query = $koneksi->query($sql);
           if($query){
                header("location:../#pelanggan?info=Data Berhasil Ditambahkan");
            }
           else{
                header("location:../#pelanggan?info=Data Gagal Ditambahkan");
            }
    }


     // edit Karyawan
    if (isset($_POST['edit_pelanggan'])) {

        $IDkaryawan = $_SESSION['IDkaryawan'];
        $No_meter = $_POST['No_meter'];
        $IDpelanggan = $_POST['IDpelanggan'];
        $Nama = $_POST['Nama'];
        $Alamat = $_POST['Alamat'];
        $Kodetarif = $_POST['Kodetarif'];

        $query = mysqli_query($koneksi, "update pelanggan set 
        Nama = '$Nama',
        Alamat = '$Alamat',
        Kodetarif = '$Kodetarif'
        WHERE IDpelanggan = '$IDpelanggan'
        ");
          if($query){
                header("location:../#pelanggan?info=Data Berhasil Diedit");
            }
           else{
                header("location:../#pelanggan?info=Data Gagal Diedit");
            }
    }

     // Hapus Karyawan
    if (isset($_POST['hapus_pelanggan'])) {
        $IDpelanggan = $_POST['IDpelanggan'];
        $query = mysqli_query($koneksi, "delete from pelanggan
        WHERE IDpelanggan = '$IDpelanggan'
        ");
          if($query){
                header("location:../#pelanggan?info=Data Berhasil Dihapus");
            }
           else{
               header("location:../#pelanggan?info=Data Gagal Dihapus");
            }
    }








    $koneksi->close();
     die();
}
?>