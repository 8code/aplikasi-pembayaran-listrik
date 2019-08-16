<section class="d9 t12">
    <?php
  if (isset($_SESSION['Username_MSCC9'])) {
    if($_SESSION['Jabatan_MSCC9'] != "Peserta"){?>
      <a id="collapse-edit" class="collapse" target="edit-data">
        <i class="material-icons left">edit</i>Klik untuk Edit Data User
      </a>
<?php }else if ($_SESSION['Jabatan_MSCC9'] != "Panitia") { ?>
      <a id="collapse-edit" class="collapse" target="edit-data">
        <i class="material-icons left">edit</i>Klik untuk Edit Data User
      </a>
<?php }} ?>
<section class="d9 t12">
  <div id="alert"></div>
  <input type="hidden" id="Id-Login" />
  <article class="collapse-content" id="edit-data">
    <center><h3>Edit Panitia MSCC 9</h3></center>
    <div class="form-tambah">
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" id="Nama" placeholder="Nama Panitia"/>
        </div>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" id="Bagian" placeholder="Bagian Panitia"/>
        </div>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" id="No_hp" placeholder="No hp / WA"/>
        </div>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" disabled type="text" id="Username" placeholder="Username"/>
        </div>
        <div class="input-group">
            <i class="material-icons">remove_red_eye</i>
            <input class="input" type="password" id="Password" placeholder="Password" />
        </div>
        <button id="Edit_Panitia" class="btn">
          Simpan<i class="material-icons right">send</i>
        </button>
       
</article>
<br>
<br>
<!-- Daftar Karyawan -->
    <table id="Data_peserta"></table>
<br>
<br>
<br>
<br>
<br>
</section>

<script>
$('.collapse').collapse();
$('.route-edit').routejs();

  $.get("controller/GetController.php?Data_user",
    function(data){
        //variabel untuk menampung tabel yang akan digenerasikan
      var Data_peserta = "";
        //perulangan untuk menayangkan data dalam tabel
            //mencetak baris baru
        Data_peserta +=
        '<tr>'+
          '<td>Nama</td><td>'+data[0]["Nama"] + '</td>'+
        '</tr><tr>'+
          '<td>Jabatan</td><td>'+data[0]['Bagian'] +'</td>'+
        '</tr><tr>'+
          '<td>No_hp</td><td>'+data[0]['No_hp']+'</td>'+
        '</tr><tr>'+
          '<td>Username</td><td>'+data[0]['Username']+'</td>'+
        '</tr>';

       $('#Id-Login').val(data[0]['Id']);
       $('#Nama').val(data[0]['Nama']);
       $('#Bagian').val(data[0]['Bagian']);
       $('#No_hp').val(data[0]['No_hp']);
       $('#Username').val(data[0]['Username']);

      //mencetak tabel
    $('#Data_peserta').html(Data_peserta);
  });

$(document).ready(function() {
   $("#Edit_Panitia").click(function() {
          var Id = $('#Id-Login').val();
          var Nama = $('#Nama').val();
          var Bagian = $('#Bagian').val();
          var No_hp = $('#No_hp').val();
          var Username = $('#Username').val();
          var Password = $('#Password').val();

           $.post("controller/PostController.php",
             {
                Edit_Panitia_MSCC9 : "",
                Id : Id,
                Nama : Nama,
                Bagian : Bagian,
                No_hp : No_hp,
                Username : Username,
                Password : Password
            },
            function(data){
              if(data == "Berhasil"){
                  alert(data);
                  $("#user-login").click();
              }else{
                $('#alert').html('<h5 class="center alert-info"> '+data+' </h5>');
                alert(data);
              }
        });
   });
  $('.alert-info').click(function(){
    $(this).hide();
  });

});
</script>
</section>