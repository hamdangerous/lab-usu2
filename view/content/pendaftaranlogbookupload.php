<?php
require_once 'config/koneksi.php';

if( $_SESSION[level] == 0 || $_SESSION[level] == 1) {
    }else {
    echo "<h3> Access Denied ! </h3>";
    echo '<script language="javascript">';
    echo 'alert("Access Denied !")';
    echo '</script>';
    echo '<script>window.location = "index.php";</script>';
    die();
  exit();
}
?>
<div class="container-fluid">

    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Import</strong> Logbook </h2>
                    <!-- <ul class="header-dropdown">
                        <li>
                            <button type="button" class="btn btn-primary waves-effect btn-sm" id="btn-tambah">Tambah
                            Logbook</button>
                        </li>
                    </ul> -->
                </div>

                
                
                <div class="body">
                    <div class="table-responsive">
                        <!-- Start Import -->

                        <form id="upload_csv" method="post" enctype="multipart/form-data">
                            <div class="col-md-3">
                            <br />
                            <label>Select the file, make sure the file is in csv format (.csv)</label>
                            </div>  
                                        <div class="col-md-4">  
                                            <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;" required />
                                        </div>  
                                        <br>
                                        <div class="col-md-5">  
                                            <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />
                                        </div>  
                                        <div style="clear:both"></div>
                        </form>
                        <br />
                        <br />
                        <div id="csv_file_data"></div>

                        <!-- End Import -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Script Import -->
<script>

$(document).ready(function(){
 $('#upload_csv').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"modul/m_fetchlogbookupload.php",
   method:"post",
   data:new FormData(this),
   dataType:'json',
   contentType:false,
   cache:false,
   processData:false,
   success:function(data)
   {
    var html = '<table class="table table-striped table-bordered">';
    if(data.column)
    {
     html += '<tr>';
     for(var count = 0; count < data.column.length; count++)
     {
      html += '<th>'+data.column[count]+'</th>';
     }
     html += '</tr>';
    }

    if(data.row_data)
    {
     for(var count = 0; count < data.row_data.length; count++)
     {
      html += '<tr>';
      html += '<td class="no_urut" contenteditable>'+data.row_data[count].no_urut+'</td>';
      html += '<td class="nama" contenteditable>'+data.row_data[count].nama+'</td>';
      html += '<td class="jk_umur" contenteditable>'+data.row_data[count].jk_umur+'</td>';
      html += '<td class="jenis_spesimen" contenteditable>'+data.row_data[count].jenis_spesimen+'</td>';
      html += '<td class="sampel_ke" contenteditable>'+data.row_data[count].sampel_ke+'</td>';
      html += '<td class="diagnosa_followup" contenteditable>'+data.row_data[count].diagnosa_followup+'</td>';
      html += '<td class="asal_faskes" contenteditable>'+data.row_data[count].asal_faskes+'</td>';
      html += '<td class="pengirim" contenteditable>'+data.row_data[count].pengirim+'</td>';
      html += '<td class="id_lab" contenteditable>'+data.row_data[count].id_lab+'</td>';
      html += '<td class="tgl_ambil_sampel" contenteditable>'+data.row_data[count].tgl_ambil_sampel+'</td>';
      html += '<td class="tgl_terima_sampel" contenteditable>'+data.row_data[count].tgl_terima_sampel+'</td>';
      html += '<td class="tgl_keluar_hasil" contenteditable>'+data.row_data[count].tgl_keluar_hasil+'</td>';
      html += '<td class="hasil_pcr" contenteditable>'+data.row_data[count].hasil_pcr+'</td>';
      html += '<td class="nik" contenteditable>'+data.row_data[count].nik+'</td>';
      html += '<td class="ct_value" contenteditable>'+data.row_data[count].ct_value+'</td>';
      html += '<td class="keterangan" contenteditable>'+data.row_data[count].keterangan+'</td></tr>';
     }
    }
    html += '<table>';
    html += '<div align="center"><button type="button" id="import_data" class="btn btn-success">Import</button></div>';

    $('#csv_file_data').html(html);
    $('#upload_csv')[0].reset();
   }
  })
 });

 $(document).on('click', '#import_data', function(){
  var no_urut = [];
  var nama = [];
  var jk_umur = [];
  var jenis_spesimen = [];
  var sampel_ke = [];
  var diagnosa_followup = [];
  var asal_faskes = [];
  var pengirim = [];
  var id_lab = [];
  var tgl_ambil_sampel = [];
  var tgl_terima_sampel = [];
  var tgl_keluar_hasil = [];
  var hasil_pcr = [];
  var nik = [];
  var ct_value = [];
  var keterangan = [];

  $('.no_urut').each(function(){
   no_urut.push($(this).text());
  });
  $('.nama').each(function(){
   nama.push($(this).text());
  });
  $('.jk_umur').each(function(){
   jk_umur.push($(this).text());
  });
  $('.jenis_spesimen').each(function(){
   jenis_spesimen.push($(this).text());
  });
  $('.sampel_ke').each(function(){
   sampel_ke.push($(this).text());
  });
  $('.diagnosa_followup').each(function(){
   diagnosa_followup.push($(this).text());
  });
  $('.asal_faskes').each(function(){
   asal_faskes.push($(this).text());
  });
  $('.pengirim').each(function(){
   pengirim.push($(this).text());
  });
  $('.id_lab').each(function(){
   id_lab.push($(this).text());
  });
  $('.tgl_ambil_sampel').each(function(){
   tgl_ambil_sampel.push($(this).text());
  });
  $('.tgl_terima_sampel').each(function(){
   tgl_terima_sampel.push($(this).text());
  });
  $('.tgl_keluar_hasil').each(function(){
   tgl_keluar_hasil.push($(this).text());
  });
  $('.hasil_pcr').each(function(){
   hasil_pcr.push($(this).text());
  });
  $('.nik').each(function(){
   nik.push($(this).text());
  });
  $('.ct_value').each(function(){
   ct_value.push($(this).text());
  });
  $('.keterangan').each(function(){
   keterangan.push($(this).text());
  });
  $.ajax({
   url:"modul/m_logbookupload.php",
   method:"post",
   data:{no_urut:no_urut, nama:nama, jk_umur:jk_umur, jenis_spesimen:jenis_spesimen, sampel_ke:sampel_ke, diagnosa_followup:diagnosa_followup, asal_faskes:asal_faskes, pengirim:pengirim, id_lab:id_lab, tgl_ambil_sampel:tgl_ambil_sampel, tgl_terima_sampel:tgl_terima_sampel, tgl_keluar_hasil:tgl_keluar_hasil, hasil_pcr:hasil_pcr, nik:nik, ct_value:ct_value, keterangan:keterangan},
   success:function(data)
   {
    $('#csv_file_data').html('<div class="alert alert-success">Data Imported Successfully</div>');
   }
  })
 });
});

</script>
<!-- End Script Import -->
