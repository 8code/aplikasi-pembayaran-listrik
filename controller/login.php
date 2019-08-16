<?php
session_start();
if (isset($_POST['Login'])) {
    include"koneksi.php";
    $IDkaryawan = $_POST['IDkaryawan'];
    $Password = $_POST['Password'];    
    $query = mysqli_query($koneksi, "select * from login where IDkaryawan='$IDkaryawan'");
    $ada = mysqli_num_rows($query);
    if($ada){
       if($query){
           $row=$query->fetch_array();
           $pass_db =$row['Password'];
           if(password_verify($Password, $pass_db)){
                $_SESSION['IDkaryawan']=$row['IDkaryawan'];
                $_SESSION['Nama']=$row['Nama'];
                $_SESSION['Jabatan']=$row['Jabatan'];
                header("location:../index");
            }else{
                
                header("location:../login?info=password anda salah");
            }
        }
       else {
            header("location:../login?info=Maaf Ada gangguan Teknis");
        }
    }else{
      header("location:../login?info=username belum terdaftar");
    }
    $koneksi->close();
    die();
}
?>