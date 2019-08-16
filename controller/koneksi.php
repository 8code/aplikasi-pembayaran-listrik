<?php
$koneksi = new mysqli("localhost", "id5543830_pembayaranlistrik", "arideveloper", "id5543830_pembayaranlistrik");
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
?>