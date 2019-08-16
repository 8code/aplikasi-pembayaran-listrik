<!DOCTYPE html>
  <html>
    <head>
      <title>Pembayaran Listrik</title>
      <link href="struk.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
<body>
  <div id="print-data"></div>
  <input type="hidden" id="IDbayar" value="<?php echo $_GET['IDbayar'] ?>">
  <input type="hidden" id="IDpelanggan" value="<?php echo $_GET['IDpelanggan'] ?>">
  <!--Import Javascript-->
  <script type="text/javascript" src="assets/js/aristyle.min.js"></script>
  <script type="text/javascript">
    $("#btn-print-data").click(function(){
       $("#data-print").printMe({ "path": ["struk.css"] });
    });
    var IDbayar = $("#IDbayar").val();
    var IDpelanggan = $("#IDpelanggan").val();
    // Ambil Data Untuk Struk Bayar
          $.get("controller/GetController.php?Print-Struk&IDbayar="+IDbayar+"&IDpelanggan="+IDpelanggan,
            function(d){
                        var Data_Bayar = "";
                        var totalbayar = (parseInt(d[0]['Jumlahmeter']) * parseInt(d[0]['Tarifperkwh'])) + parseInt(d[0]['Biayaadmin']);
                            Data_Bayar += `
                            <div id="data-print" class="struk-pembayaran">
                              <div class="w-100 jd-struk">
                                  <img src="assets/img/logo.png">
                                  <h2 class="t-center">PT PLN Indonesia</h2>
                              </div>
                                <h4 class="w-100">STRUK PEMBAYARAN TAGIHAN LISTRIK</h4>
                              <div class="w-100">
                                <div class="w-2">ID Pelanggan</div>
                                <div class="w-3">: ` + IDpelanggan + `</div>
                                <div class="w-2">Bln/Thn</div>
                                <div class="w-3">: `+d[0]['Bulan']+`/`+d[0]['Tahun']+`</div>
                              </div>
                              <div class="w-100">
                                  <div class="w-2">Nama</div>
                                  <div class="w-3">: `+d[0]['Nama']+`</div>
                                  <div class="w-2">No Meter</div>
                                  <div class="w-3">: `+d[0]['Nometer']+`</div>
                                  <div class="w-2">Tarif/kwh</div>
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
                                  <div class="w-3">: Rp `+ totalbayar+`</div>
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
  </script>

</body>
</html>
