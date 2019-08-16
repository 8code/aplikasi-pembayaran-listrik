<section class="d9 t12">
  <div id="alert"></div>
  <a id="collapse-edit" class="collapse" target="tambah-karyawan">
    <i class="material-icons left">edit</i> Tambah Karyawan Baru
  </a>
  <article class="collapse-content" id="tambah-karyawan">
   <center><h3>Tambah Karyawan Baru</h3></center>
    <div class="form-tambah">
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" id="IDkaryawan" placeholder="IDkaryawan" required="required" />
        </div>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <input class="input" type="text" id="Nama" placeholder="Nama" required/>
        </div>
        <div class="input-group">
            <i class="material-icons">place</i>
            <input class="input" type="text" id="Alamat" placeholder="Alamat" required/>
        </div>
        <div class="input-group">
            <i class="material-icons">account_box</i>
            <select id="Jabatan" class="input" required>
                <option value="">Pilih Jabatan</option>
                <option value="Karyawan">Karyawan</option>
                <option value="Agen">Agen</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
        <div class="input-group">
            <i class="material-icons">remove_red_eye</i>
            <input class="input" type="password" id="Password" placeholder="Password" required="required" />
        </div>
        <button id="Daftar_karyawan" name="Daftar_karyawan" class="btn">
          Daftar<i class="material-icons right">send</i>
        </button>
       
    </div>
</article>

<br>
<br>
<br>

<!-- Daftar Karyawan -->
    <table id="page-content"></table>
    <div class="d12">
        <ul id="pagination" class="pagination"></ul>
    </div>
<br>
<br>
<br>
<br>
<br>
</section>

<script>

$('.collapse').collapse();


  $.get("controller/Getcontroller.php?Jumlah_karyawan",
      function(d){
        var Jumlah_hal = d/6;
        var x = Jumlah_hal.toFixed(0); 
        
        $('#pagination').twbsPagination({
            totalPages: x,
            visiblePages: 4,
            next: 'Next',
            prev: 'Prev',
            onPageClick: function(event, page) {
                //fetch content and render here
            $.get("controller/Getcontroller.php?Data_karyawan&hal="+page,
              function(data){
                //menghitung jumlah data
                var jmlData = data.length;
                var mulai = 0;
                var selesai = jmlData;

                  //variabel untuk menampung tabel yang akan digenerasikan
                var Data_karyawan = 
                            '<tr>'+
                              '<th>ID Karyawan</th>'+
                              '<th>Nama</th>'+
                              '<th class="hide-t">Alamat</th>'+
                              '<th class="hide-t">Jabatan</th>'+
                              '<th>Action</th>'+
                            '</tr>'+
                            '<tr id="Data_karyawan"></tr>';
                  //perulangan untuk menayangkan data dalam tabel
                  while(mulai < selesai){ 
                      //mencetak baris baru
                  Data_karyawan +=
                  '<tr>'+
                  '<td>'+ data[mulai]["IDkaryawan"] + '</td>'+
                  '<td>'+ data[mulai]['Nama'] +'</td>'+
                  '<td class="hide-t">'+data[mulai]['Alamat']+'</td>'+
                  '<td class="hide-t">'+data[mulai]['Jabatan']+'</td>'+
                  '<td><a class="route-karyawan" href="#edit/karyawan?'+data[mulai]['IDkaryawan'] +'">'+
                     '<i class="material-icons">edit</i>Edit</a>'+
                  '</td>'+
                  '</tr>'
                  mulai++
                  }
                //mencetak tabel
              $('#page-content').html(Data_karyawan);
              $('.route-karyawan').routejs();
            });
           }
        });
    });


$(document).ready(function() {
  $("#Daftar_karyawan").click(function() {

          var IDkaryawan = $('#IDkaryawan').val();
          var Nama = $('#Nama').val();
          var Alamat = $('#Alamat').val();
          var Jabatan = $('#Jabatan').val();
          var Password = $('#Password').val();

           $.post("controller/controller.php",
             {
                Daftar_karyawan : "",
                IDkaryawan : IDkaryawan,
                Nama : Nama,
                Alamat : Alamat,
                Jabatan : Jabatan,
                Password : Password
              },
            function(data){
              alert(data);
              var Input_karyawan = "";
              Input_karyawan +=
                  '<td>'+ IDkaryawan + '</td>'+
                  '<td>'+ Nama +'</td>'+
                  '<td class="hide-t">'+ Alamat +'</td>'+
                  '<td class="hide-t">'+ Jabatan +'</td>'+
                  '<td><a class="route-karyawan" href="#edit/karyawan?'+ IDkaryawan +'">'+
                     '<i class="material-icons">edit</i>Edit</a>'+
                  '</td>'
                  $('#Data_karyawan').html(Input_karyawan);
                  $('#alert').html('<h5 class="center alert-info"> Data Berhasil Di Tambahkan </h5>');

                 $('#IDkaryawan').val("");
                 $('#Nama').val("");
                 $('#Alamat').val("");
                 $('#Jabatan').val("");
                 $('#Password').val("");

                 $('#collapse-edit').click();
                 $('.alert-info').click(function(){
                        $(this).remove();
                  });
            });
   });
  $('.alert-info').click(function(){
    $(this).hide();
  });

});
</script>