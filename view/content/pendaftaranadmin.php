<?php
require_once 'config/koneksi.php';
$q = "select * from admin";
$sql = mysqli_query($con, $q);
$q_admin = "SELECT username,password,nama,no_hp,alamat,level,keterangan FROM admin";
$sql_admin = mysqli_query($con, $q_admin);
?>
<div class="container-fluid">

    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Daftar</strong> Admin </h2>
                    <ul class="header-dropdown">
                        <li>
                            <button type="button" class="btn btn-primary waves-effect btn-sm" id="btn-tambah">Tambah
                                Admin</button>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                     <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>                                   
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Nama</th>
                                    <th>No Hp</th>
                                    <th>Alamat</th>
                                    <th>Level</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($d = mysqli_fetch_object($sql)) {
                                    echo "<tr>                                                
                                                <td>$d->username</td>
                                                <td>$d->password</td>
                                                <td>$d->nama</td>
                                                <td>$d->no_hp</td>
                                                <td>$d->alamat</td>
                                                <td>$d->level</td>
                                                <td>$d->keterangan</td>
                                                <td>
                                                    <button class=\"btn btn-primary btn-sm btn-icon\"  onclick=\"edit('$d->id_admin','pendaftaranadmin')\"><i class=\"zmdi zmdi-edit\"></i></button>
                                                    <button class=\"btn btn-primary btn-sm btn-icon\"  onclick=\"hapus('$d->id_admin','pendaftaranadmin')\"><i class=\"zmdi zmdi-close-circle-o\"></i></button>
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
                <form id="form-submit" data-modul="pendaftaranadmin">
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
                                                    <input type="hidden" name="id">
                                                    <input type="number" class="form-control" placeholder="Id Admin" name="id_admin" readonly />
                                                </div>
                                                <div class="form-group">
                                                <label for="no">Username</label>
                                                    <input type="text" class="form-control" placeholder="Username" name="username" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="no">Password</label>
                                                    <input type="password" class="form-control" placeholder="Password" name="password" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="no">Nama</label>
                                                    <input type="text" class="form-control" placeholder="Nama" name="nama" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="no">No Hp</label>
                                                    <input type="number" class="form-control" placeholder="No Hp" name="no_hp" required />
                                                </div>
                                                <div class="form-group">
                                                <label for="ket">Alamat</label>
                                                    <textarea class="form-control" placeholder="Alamat" name="alamat" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                <label for="level">Level admin</label>
                                                    <select name="level" class="form-control">
                                                        <option selected>Pilihan</option>
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>             
                                                        <option>3</option>     
                                                        <option>4</option>                                            
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                    <select name="keterangan" class="form-control">
                                                        <option selected>Pilihan</option>
                                                        <option>Superadmin</option>
                                                        <option>Admin Logbook</option>
                                                        <option>Admin Ekstraksi</option>             
                                                        <option>Admin Preparasi</option>     
                                                        <option>Faskes</option>                                            
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
        $('#tbl-admin').DataTable();

        $('#btn-tambah').click((e) => {
            var modal = $('#modal-form')
            modal.find('.modal-header').text('Tambah Data Admin')
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
        modal.find('.modal-header').text('Edit Data Admin')
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
                    modal.find('[name="id_admin"]').val(data.id_admin);
                    modal.find('[name="username"]').val(data.username);
                    modal.find('[name="password"]').val(data.password);
                    modal.find('[name="nama"]').val(data.nama);
                    modal.find('[name="no_hp"]').val(data.no_hp);
                    modal.find('[name="alamat"]').val(data.alamat);
                    modal.find('[name="level"]').val(data.level);
                    modal.find('[name="keterangan"]').val(data.keterangan);
                    modal.find('[name="id"]').val(data.id_admin);
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