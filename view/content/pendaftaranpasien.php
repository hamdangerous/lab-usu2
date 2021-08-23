<?php
require_once 'config/koneksi.php';
$q = "select * from pasien";
$sql = mysqli_query($con, $q);
$q_pasien = "SELECT no,nama,umur,spesimen,sampel,diagnosa,profesi,tgl_ambil,tgl_kirim,rekam,nik,ket,status FROM pasien";
$sql_pasien = mysqli_query($con, $q_pasien);

if( $_SESSION[level] == 0 ){
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
                    <h2><strong>Daftar</strong> Pasien </h2>
                    <ul class="header-dropdown">
                        <li>
                            <button type="button" class="btn btn-primary waves-effect btn-sm" id="btn-tambah">Tambah
                                Pasien</button>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>No. Urut</th>
                                    <th>Nama</th>
                                    <th>JK/Umur</th>
                                    <th>Jenis Spesimen</th>
                                    <th>Sampel Ke</th>
                                    <th>Diagnosa</th>
                                    <th>Profesi</th>
                                    <th>Tgl Ambil Sampel</th>
                                    <th>Tgl Pengiriman Sampel</th>
                                    <th>No. Rekam Medis</th>
                                    <th>NIK</th>
                                    <th>Keterangan/Riwayat Kontak Erat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($d = mysqli_fetch_object($sql)) {
                                    echo "<tr>

                                                <td>$d->no</td>
                                                <td>$d->nama</td>
                                                <td>$d->umur</td>
                                                <td>$d->spesimen</td>
                                                <td>$d->sampel</td>
                                                <td>$d->diagnosa</td>
                                                <td>$d->profesi</td>
                                                <td>$d->tgl_ambil</td>
                                                <td>$d->tgl_kirim</td>
                                                <td>$d->rekam</td>
                                                <td>$d->nik</td>
                                                <td>$d->ket</td>
                                                <td>$d->status</td>
                                                <td>
                                                    <button class=\"btn btn-primary btn-sm btn-icon\"  onclick=\"edit('$d->id_pasien','pendaftaranpasien')\"><i class=\"zmdi zmdi-edit\"></i></button>
                                                    <button class=\"btn btn-primary btn-sm btn-icon\"  onclick=\"hapus('$d->id_pasien','pendaftaranpasien')\"><i class=\"zmdi zmdi-close-circle-o\"></i></button>
                                                </td>
                                            </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-submit" data-modul="pendaftaranpasien">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel"><?= $form ?></h4>
                    </div>
                    <div class="modal-body">
                        <!-- Input -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-group">                                                    
                                                    <input type="hidden" name="id">                                                    
                                                    <input type="number" class="form-control" placeholder="Id Pasien" name="id_pasien" readonly />
                                                </div>                                                                                                 
                                                <div class="form-group">
                                                <label for="no">No. Urut</label>                          
                                                    <input type="number" class="form-control" placeholder="No. Urut" name="no" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="nama">Nama Pasien</label>
                                                    <input type="text" class="form-control" placeholder="Nama" name="nama" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="umur">Jenis Kelamin/Umur</label>
                                                    <input type="text" class="form-control" placeholder="Jenis Kelamin/Umur" name="umur" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="spesimen">Jenis Spesimen</label>
                                                    <select name="spesimen" class="form-control">
                                                        <option selected>Pilihan</option>
                                                        <option>NS TS</option>
                                                        <option>NS</option>
                                                        <option>TS</option>                                                    
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                <label for="sampel">Sampel Ke</label>
                                                    <input type="number" class="form-control" placeholder="Sampel Ke" name="sampel" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="diagnosa">Diagnosa</label>
                                                    <input type="text-area" class="form-control" placeholder="Diagnosa" name="diagnosa" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="profesi">Profesi</label>
                                                    <input type="text-area" class="form-control" placeholder="Profesi" name="profesi" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="tgl_ambil">Tgl Ambil Sampel</label>
                                                    <input type="date" class="form-control" placeholder="Tgl Ambil Sampel" name="tgl_ambil" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="tgl_kirim">Tgl Kirim Sampel</label>
                                                    <input type="date" class="form-control" placeholder="Tgl Kirim Sampel" name="tgl_kirim" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="rekam">No. Rekam Medis</label>
                                                    <input type="number" class="form-control" placeholder="No. Rekam Medis" name="rekam" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="nik">NIK</label>
                                                    <input type="number" class="form-control" placeholder="NIK" name="nik" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="ket">Ket./Riwatar Kontak Erat</label>
                                                    <textarea class="form-control" placeholder="Ket./Riwatar Kontak Erat" name="ket" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                <label for="status">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option selected>Pilihan</option>
                                                        <option>Pending</option>
                                                        <option>Valid</option>
                                                        <option>Completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default btn-round waves-effect">Simpan</button>
                        <button type="button" class="btn btn-danger waves-effect" onclick="formreset()">Reset</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Jquery DataTable Plugin Js -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-html5-1.7.1/datatables.min.js"></script>
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
    $(document).ready((e) => {
        $('#tbl-pasien').DataTable();

        $('#btn-tambah').click((e) => {
            var modal = $('#modal-form')
            modal.find('.modal-header').text('Tambah Data Pasien')
            modal.find('input').val('');
            modal.modal('show');
        })

        $('#form-submit').submit((e) => {
            var fdata = new FormData(e.target)
            var src = e.target.dataset.modul;
            var id = $('[name="id"]').val();
            var pesan = '';
            console.log(id)
            if (id == '') {
                // alert('tambah')
                fdata.append("aksi", "input")
                pesan = "Tambah"
            } else {
                // alert('update')
                fdata.append("aksi", "update")
                pesan = "Edit"
            }
            $.ajax({
                url: "modul/" + src + ".php",
                data: fdata,
                method: "post",
                contentType: false,
                processData: false,
                success: (data) => {
                    swal("data berhasil di " + pesan + "!", {
                        icon: "success",
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 100)
                },
                error: (data) => {
                    swal("data gagal di Tambah!", {
                        icon: "error",
                    });
                }
            })
        })
    })

    function edit(id, src) {
        var modal = $('#modal-form')
        modal.find('.modal-header').text('Edit Data Pasien')
        $.ajax({
            url: "modul/" + src + ".php",
            method: "post",
            dataType: "json",
            data: {
                aksi: "get",
                id: id
            },
            success: (data) => {
                console.log(data.data)
                if (data.error == 0) {
                    var data = data.data;
                    modal.find('[name="id_pasien"]').val(data.id_pasien);
                    modal.find('[name="no"]').val(data.no);
                    modal.find('[name="nama"]').val(data.nama);
                    modal.find('[name="umur"]').val(data.umur);
                    modal.find('[name="spesimen"]').val(data.spesimen);
                    modal.find('[name="sampel"]').val(data.sampel);
                    modal.find('[name="diagnosa"]').val(data.diagnosa);
                    modal.find('[name="profesi"]').val(data.profesi);
                    modal.find('[name="tgl_ambil"]').val(data.tgl_ambil);
                    modal.find('[name="tgl_kirim"]').val(data.tgl_kirim);
                    modal.find('[name="rekam"]').val(data.rekam);
                    modal.find('[name="nik"]').val(data.nik);
                    modal.find('[name="ket"]').val(data.ket);
                    modal.find('[name="status"]').val(data.status);
                    modal.find('[name="id"]').val(data.id_pasien);

                }
            }

        })
        modal.find('input').val('');
        modal.modal('show');
        // setTimeout(() => {
        //     location.reload();
        // }, 100)
    }

    function hapus(id, src) {
        swal({
                title: "Apakah anda yakin?",
                text: "Jika dihapus, data tidak bisa di kembalikan lagi!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "modul/" + src + ".php",
                        method: "post",
                        data: {
                            aksi: "delete",
                            id: id
                        },
                        success: (data) => {
                            swal("data berhasil di hapus!", {
                                icon: "success",
                            });
                            setTimeout(() => {
                                location.reload();
                            }, 100)
                        },
                        error: (err) => {
                            swal("data gagal di hapus!", {
                                icon: "error",
                            });
                        }
                    })
                } else {
                    swal("Data tidak jadi di hapus!");
                }
            });
    }

    function formreset() {
        $('input').val('');
    }
</script>