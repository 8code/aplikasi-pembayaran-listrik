<section class="d9 t12">
<!-- History Pembayaran -->
    <div id="laporan-pembayaran"></div>
    <table id="page-content"></table>
    <div class="d12">
        <ul id="pagination" class="pagination"></ul>
    </div>
<br>
<br>
<br>
</section>
<script>
$('.collapse').collapse();
        $('#pagination').twbsPagination({
            totalPages: 1000,
            visiblePages: 4,
            next: 'Next',
            prev: 'Prev',
            onPageClick: function(event, page) {
                //fetch content and render here
            $.get("controller/GetController.php?History_Pembayaran&hal="+page,
              function(data){
                //menghitung jumlah data
                var jmlData = data.length;
                var mulai = 0;
                var selesai = jmlData;
                var nmr = page - 1;
                    nmr = nmr * 7;
                  //variabel untuk menampung tabel yang akan digenerasikan
                var Data_Pembayaran = 
                            '<tr>'+
                              '<th>No</th>'+
                              '<th>ID Pelanggan</th>'+
                              '<th>Bln/Thn</th>'+
                              '<th>Tgl</th>'+
                              '<th>B.Admin</th>'+
                              '<th>Action</th>'+
                            '</tr>';
                  //perulangan untuk menayangkan data dalam tabel
                  while(mulai < selesai){ 
                      //mencetak baris baru
                  Data_Pembayaran +=
                  '<tr>'+
                  '<td>'+ (nmr+1) + '</td>'+
                  '<td>'+ data[mulai]['IDpelanggan'] +'</td>'+
                  '<td class="hide-t">Bulan '+data[mulai]['Bulanbayar']+'Tahun '+data[mulai]['Tahun']+'</td>'+
                  '<td>'+ data[mulai]['Biayaadmin'] +'</td>'+
                  '<td >'+data[mulai]['Tanggal']+'</td>'+
                  '<td><a class="route-karyawan" target="_BLANK" href="print-struk?IDbayar='+data[mulai]['IDbayar']+'&IDpelanggan='+data[mulai]['IDpelanggan']+'">Cetak Struk</a>'+
                  '</td>'+
                  '</tr>';
                  mulai++;
                  nmr++;
                  }
                //mencetak tabel
              $('#page-content').html(Data_Pembayaran);
              $('.routejs').routejs();
            });
           }
        });
</script>