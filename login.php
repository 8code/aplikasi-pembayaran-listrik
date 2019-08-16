<?php 
session_start();
if (isset($_SESSION['IDkaryawan'])) {header("location:index");
}?>
<!DOCTYPE html>
<html>
<head>
    <title>Listrik Pasca Bayar</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/aristyle.css">
</head>
<body class="body-login">
   <div class="d4 t12 login" style="float: none;">
    <h1 class="d12 center">Login</h1> <br><br><br>
       <?php
        if (isset($_GET['info'])) {
          echo "<p class='error' >".$_GET['info']."</p>";
        };?>
      <form action="controller/login.php" method="post">
      <div class="input-group">
          <i class="material-icons">account_box</i>
          <input class="input" type="text" name="IDkaryawan" placeholder="IDkaryawan" required="required" />
      </div>
      <div class="input-group">
          <i class="material-icons">remove_red_eye</i>
          <input class="input" type="password" name="Password" placeholder="Password" required="required" />
      </div>
          <button type="submit" name="Login" class="btn">
            Login<i class="material-icons">send</i>
          </button>
      </form>
  </div>
</body>
</html>