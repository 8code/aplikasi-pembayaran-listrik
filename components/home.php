<link href="struk.css" rel="stylesheet">
<section class="d9 t12">
<form class="form-tambah">
    <center><h3>Cek Tagihan dan Bayar Listrik</h3></center>
        <div class="input-group">
            <i class="material-icons">flash_on</i>
            <input class="input" id="nometer"
            <?php if (isset($_GET['Nometer'])) {
              echo 'value ="'.$_GET['Nometer'].'" autofocus';
            } ?>
             type="text" placeholder="Masukkan ID Pelanggan Atau No Meter" required/>
        </div>
  </form>
  <br>
  <br>
  <div id="print-data"></div>
  <div id="datatagihan"></div>
  <br>
  <br>
  <br>
  <br>
  <br>
</section>
<script type="text/javascript">
   $("#nometer").keyup(function() {
       var Nometer = $('#nometer').val();
       if (Nometer == "") {
           $("#datatagihan").html("");
       }
       else{
           $("#datatagihan").html(" Loading...");
           $.get("controller/GetController.php?Tagihan&Id="+Nometer,
            function(data){
              if(data[0]['Status'] == "Success"){
                 var Data_Tagihan = "";
                 var i = 0; 
                 Data_Tagihan += 
                `<h4 class="d12">Jumlah Tagihan `+ data.length +`</h4>
                <div class="form-tambah">
                        <input type="hidden" id="IDpelanggan" value="`+data[i]['IDpelanggan']+`">
                        <input type="hidden" id="Nometer" value="`+data[i]['Nometer']+`">
                        <input type="hidden" id="Bulan" value="`+data[i]['Bulan']+`">
                        <input type="hidden" id="Tahun" value="`+data[i]['Tahun']+`">
                    <br>
                    <div class="d4">Nama </div>
                        <div class="d8">: `+data[i]['Nama']+`</div>
                    <div class="d4">Tarif per Kwh</div>
                        <div class="d8">: Rp. `+data[i]['Tarifperkwh']+`</div>
                    <div class="d4">Penggunaan</div>
                        <div class="d8">: `+data[i]['Jumlahmeter']+` Kwh</div>
                    <div class="d4">Periode </div>
                        <div class="d8">: Bulan `+data[i]['Bulan']+` Tahun `+data[i]['Tahun']+`</div>
                        <div class="d12"> Biaya Admin :
                          <div class="d12">
                            <div class="input-group">
                                <i>Rp.</i>
                                <input class="input" id="Biayaadmin" placeholder="Biaya Admin" type="text">
                            </div>
                          </div>
                        </div>
                    <div class="d12">
                        <button class="btn" id="Bayar_tagihan">
                          <i class="material-icons right">send</i>Bayar
                        </button>
                    </div>
                </div><br><br><br><br>`
                $("#datatagihan").html(Data_Tagihan);
                // Bayar Tagihan

                $("#Bayar_tagihan").click(function() {
                   $.post("controller/PostController.php",
                     {
                        Bayar_tagihan : "",
                        IDpelanggan :  $('#IDpelanggan').val(),
                        Bulan :  $('#Bulan').val(),
                        Tahun :  $('#Tahun').val(),
                        Biayaadmin :  $('#Biayaadmin').val()
                      },
                    function(data){
                  var IDbayar1 = data[0]['IDbayar'];
                  var IDpelanggan1 = data[0]['IDpelanggan'];
                  $("#datatagihan").hide();
        // Ambil Data Untuk Struk Bayar
        $.get("controller/GetController.php?Print-Struk&IDbayar="+IDbayar1 +"&IDpelanggan="+ IDpelanggan1,
            function(d){
                        var Data_Bayar = "";
                        var totalbayar = (parseInt(d[0]['Jumlahmeter']) * parseInt(d[0]['Tarifperkwh']))
                        + parseInt(d[0]['Biayaadmin']);
                            Data_Bayar += `
                            <div id="data-print" class="struk-pembayaran">
                              <div class="w-100 jd-struk">
                                  <img src="assets/img/logo.png">
                                  <h2 class="t-center">PT PLN Indonesia</h2>
                              </div>
                                <h4 class="w-100">STRUK PEMBAYARAN TAGIHAN LISTRIK</h4>
                              <div class="w-100">
                                <div class="w-2">ID Pelanggan</div>
                                <div class="w-3">: ` + d[0]['IDpelanggan'] + `</div>
                                <div class="w-2">Bln/Thn</div>
                                <div class="w-3">: `+d[0]['Bulan']+`/`+d[0]['Tahun']+`</div>
                              </div>
                              <div class="w-100">
                                  <div class="w-2">Nama</div>
                                  <div class="w-3">: `+d[0]['Nama']+`</div>
                                  <div class="w-2">No Meter</div>
                                  <div class="w-3">: `+d[0]['Nometer']+`</div>
                                  <div class="w-2">Tarif /kwh</div>
                                  <div class="w-3">: `+d[0]['Tarifperkwh']+`</div>
                              </div>
                              <div class="w-100">
                                <div class="w-2">Daya</div>
                                <div class="w-3">: `+d[0]['Daya']+`VA</div>
                              </div>
                              <div class="w-100">
                                  <div class="w-2">Jumlah Meter</div>
                                  <div class="w-3">: `+d[0]['Jumlahmeter']+` Kwh</div>
                              </div>
                              <h4 class="w-100 t-center">
                                  PLN menyatakan struk ini sebagai bukti pembayaran yang sah, mohon disimpan.
                              </h4>
                              <div class="w-100">
                                  <div class="w-2">Biaya Admin</div>
                                  <div class="w-3">: Rp `+d[0]['Biayaadmin']+`</div>
                              </div>
                              <div class="w-100">
                                  <div class="w-2">Total Bayar</div>
                                  <div class="w-3">: Rp `+ totalbayar +`</div>
                              </div>
                              <div class="w-100 t-center">
                                  <h3 class="t-center">TERIMAKASIH</h3>
                                  <h5 class="t-center">"Rincian tagihan dapat dilihat di www.pln.co.id atau Agen dan Kantor PLN Terdekat"</h5><h4 class="t-center">INFORMASI HUB : 123</h4>
                              </div>
                            </div>
                            <button id="btn-print-data" class="btn w-100">Cetak Struk</button>
                      `
                          $("#print-data").html(Data_Bayar);
                          $("#btn-print-data").click(function(){
                             $("#data-print").printMe({ "path": ["struk.css"] });
                          });

          });


                  });
                });
              }else{
                $("#datatagihan").html("Tidak Ada Tagihan Untuk ID Pelanggan/ Nometer" + Nometer);
              }
            });
       }
   });
</script>