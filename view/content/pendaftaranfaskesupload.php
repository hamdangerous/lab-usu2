<?php
require_once 'config/koneksi.php';
$q = "select * from faskes";
$sql = mysqli_query($con, $q);
$q_faskes = "SELECT id_faskes,nama_faskes,informsai,file,tipe_file,ukuran,tgl_upload FROM faskes";
$sql_faskes = mysqli_query($con, $q_faskes);
?>
<div class="container-fluid">

    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Daftar</strong> Faskes </h2>
                    <ul class="header-dropdown">
                        <li>
                            <!-- <button type="button" class="btn btn-primary waves-effect btn-sm" id="btn-tambah">Tambah
                            Faskes</button> -->
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                    <form enctype="multipart/form-data" method="POST" action="upload.php">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="">Nama Faskes</label>
                                 <input type="text" id="nama_faskes" class="form-control" placeholder="Ketikan ID Faskes anda.." name="nama_faskes" required/>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="">Informasi Data</label>
                                 <input type="text" id="informasi" class="form-control" placeholder="Ketikan Informasi data..." name="informasi" required/>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="">Pilih File</label>
                                 <input type="file" name="file" id="file" class="form-control" name="file" required/>
                                 
                              </div>
                           </div>
                        </div>
                        <center>
                        <input type="submit" class="btn btn-lg btn-success" value="Upload">
                        </center>
                     </form>
</div>

<div class="col-lg"></div>
               </div>
            </div>
            <div class="card-body">
               <hr>
               <div class="table-responsive">
                  <table style="width:100%" class="table table-flush">
                     <thead class="bg-success text-white">
                        <tr>
                           <th style="width:20%">Nama Faskes</th>
                           <th style="width:20%">Informasi Data</th>
                           <th style="width:20%">Nama File</th>
                           <th style="width:20%">Type File</th>
                           <th style="width:20%">Ukuran File</th>
                           <th style="width:20%">Tgl Upload</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php
                                while ($d = mysqli_fetch_object($sql)) {
                                    echo "<tr>
                           <td>$d->nama_faskes</td>
                           <td>$d->informasi</td>
                           <td>$d->file</td>
                           <td>$d->tipe_file</td>
                           <td>$d->ukuran</td>
                           <td>$d->tgl_upload</td>
                           </td>
                        </tr>";
                     }
                     ?>
                     </tbody>
                  </table>
               </div>
            </div>

<!-- Jquery DataTable Plugin Js -->
<script src="assets/bundles/datatablescripts.bundle.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="assets/js/pages/tables/jquery-datatable.js"></script>
<script src="assets/plugins/select2/select2.min.js"></script> <!-- Select2 Js -->
<script src="assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js -->
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src="assets/plugins/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js -->
<script>
    
</script>
