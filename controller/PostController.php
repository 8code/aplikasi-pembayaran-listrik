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
         $query = mysqli_query($koneksi,$sql);
           if($query){
                $last_id = mysqli_insert_id($koneksi);
                $data[] = array(
                        "Status" => "True",
                        "Message" => "Pembayaran Berhasil",
                        "IDbayar" => $last_id,
                        "IDpelanggan" => $IDpelanggan,
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
                if($query1){
                    echo "Berhasil";
                }else{
                   echo "Gagal";
                }
            }else{
               echo "Gagal Semua";
            }
    }
    $koneksi->close();
    die();
}
?>