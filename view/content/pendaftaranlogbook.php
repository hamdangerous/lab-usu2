<?php
require_once 'config/koneksi.php';
$q = "select * from logbook";
$sql = mysqli_query($con, $q);
// $q_logbook = "SELECT id_logbook,no_urut,nama,jk_umur,jenis_spesimen,sampel_ke,diagnosa_followup,asal_faskes,pengirim,id_lab,tgl_ambil_sampel,tgl_terima_sampel,tgl_keluar_hasil,hasil_pcr,nik,ct_value,keterangan FROM logbook";
$q_logbook = "SELECT * FROM logbook";
$sql_logbook = mysqli_query($con, $q_logbook);
?>

<div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Daftar</strong> Logbook </h2>
                    <ul class="header-dropdown">
                        <li>
                            <button type="button" class="btn btn-primary waves-effect btn-sm" id="btn-tambah">Tambah
                            Logbook</button>
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
                                    <th>Diagnosa/Follow Up</th>
                                    <th>Asal Faskes</th>
                                    <th>Pengirim</th>
                                    <th>ID LAB</th>
                                    <th>Tgl Ambil Sampel</th>
                                    <th>Tgl Terima Sampel</th>
                                    <th>Tgl Keluar Hasil</th>
                                    <th>Hasil PCR</th>
                                    <th>NIK</th>
                                    <th>CT Value</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($d = mysqli_fetch_object($sql)) {
                                    echo "<tr>
                                                <td>$d->no_urut</td>
                                                <td>$d->nama</td>
                                                <td>$d->jk_umur</td>
                                                <td>$d->jenis_spesimen</td>
                                                <td>$d->sampel_ke</td>
                                                <td>$d->diagnosa_followup</td>
                                                <td>$d->asal_faskes</td>
                                                <td>$d->pengirim</td>
                                                <td>$d->id_lab</td>
                                                <td>$d->tgl_ambil_sampel</td>
                                                <td>$d->tgl_terima_sampel</td>
                                                <td>$d->tgl_keluar_hasil</td>
                                                <td>$d->hasil_pcr</td>
                                                <td>$d->nik</td>
                                                <td>$d->ct_value</td>
                                                <td>$d->keterangan</td>
                                                <td>
                                                    <button class=\"btn btn-primary btn-sm btn-icon\"  onclick=\"edit('$d->id_logbook','m_logbook')\"><i class=\"zmdi zmdi-edit\"></i></button>
                                                    <button class=\"btn btn-primary btn-sm btn-icon\"  onclick=\"hapus('$d->id_logbook','m_logbook')\"><i class=\"zmdi zmdi-close-circle-o\"></i></button>
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
                <form id="form-submit" data-modul="m_logbook">
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
                                                    <input type="number" class="form-control" placeholder="Id Logbook" name="id_logbook" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" placeholder="No. Urut" name="no_urut" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Nama" name="nama" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="JK/Umur" name="jk_umur" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Jenis Spesimen" name="jenis_spesimen" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Sampel Ke" name="sampel_ke" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Diagnosa/Follow Up" name="diagnosa_followup" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Asal Faskes" name="asal_faskes" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Pengirim" name="pengirim" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="ID LAB" name="id_lab" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="date" class="form-control" placeholder="Tanggal Ambil Sampel" name="tgl_ambil_sampel" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="date" class="form-control" placeholder="Tanggal Terima Sampel" name="tgl_terima_sampel" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="date" class="form-control" placeholder="Tanggal Keluar Hasil" name="tgl_keluar_hasil" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Hasil PCR" name="hasil_pcr" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" placeholder="NIK" name="nik" maxlength="16" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="CT Value" name="ct_value" required />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" required />
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

<!-- Export DataTable Excel -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-html5-1.7.1/datatables.min.js"></script>
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
    $(document).ready((e) => {
        $('#tbl-logbook').DataTable();

        $('#btn-tambah').click((e) => {
            var modal = $('#modal-form')
            modal.find('.modal-header').text('Tambah Data Logbook')
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
        modal.find('.modal-header').text('Edit Data Logbook')
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
                    modal.find('[name="id_logbook"]').val(data.id_logbook);
                    modal.find('[name="no_urut"]').val(data.no_urut);
                    modal.find('[name="nama"]').val(data.nama);
                    modal.find('[name="jk_umur"]').val(data.jk_umur);
                    modal.find('[name="jenis_spesimen"]').val(data.jenis_spesimen);
                    modal.find('[name="sampel_ke"]').val(data.sampel_ke);
                    modal.find('[name="diagnosa_followup"]').val(data.diagnosa_followup);
                    modal.find('[name="asal_faskes"]').val(data.asal_faskes);
                    modal.find('[name="pengirim"]').val(data.pengirim);
                    modal.find('[name="id_lab"]').val(data.id_lab);
                    modal.find('[name="tgl_ambil_sampel"]').val(data.tgl_ambil_sampel);
                    modal.find('[name="tgl_terima_sampel"]').val(data.tgl_terima_sampel);
                    modal.find('[name="tgl_keluar_hasil"]').val(data.tgl_keluar_hasil);
                    modal.find('[name="hasil_pcr"]').val(data.hasil_pcr);
                    modal.find('[name="nik"]').val(data.nik);
                    modal.find('[name="ct_value"]').val(data.ct_value);
                    modal.find('[name="keterangan"]').val(data.keterangan);
                    modal.find('[name="id"]').val(data.id_logbook);
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