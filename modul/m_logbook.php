<?php
session_start();
error_reporting(0);

if (!$_SESSION[login]) header('location:index.php');
require_once '../config/koneksi.php';

$d = $_POST;
$aksi = $d['aksi'];
$data = '';

if ($aksi == 'input') {
    $q = "INSERT INTO logbook (id_logbook,no_urut,nama,jk_umur,jenis_spesimen,sampel_ke,diagnosa_followup,asal_faskes,pengirim,id_lab,tgl_ambil_sampel,tgl_terima_sampel,tgl_keluar_hasil,hasil_pcr,nik,ct_value,keterangan) values('$d[id_logbook]','$d[no_urut]','$d[nama]','$d[jk_umur]','$d[jenis_spesimen]','$d[sampel_ke]','$d[diagnosa_followup]','$d[asal_faskes]','$d[pengirim]','$d[id_lab]','$d[tgl_ambil_sampel]','$d[tgl_terima_sampel]','$d[tgl_keluar_hasil]','$d[hasil_pcr]','$d[nik]','$d[ct_value]','$d[keterangan]')";
    $sql = mysqli_query($con, $q);
    if ($sql) {
        $error = 0;
    } else {
        $error = 1;
    }
    $json = array("error" => $error);
    echo json_encode($json);
} else if ($aksi == 'delete') {
    $q = "DELETE FROM logbook WHERE id_logbook = '$d[id]'";
    $sql = mysqli_query($con, $q);
    echo $q;
    if (!$sql) {
        echo "a";
    }
} else if ($aksi == 'delete') {
        $q = "DELETE FROM logbook WHERE id_logbook = '$d[id]'";
        $sql = mysqli_query($con, $q);
        echo $q;
        if (!$sql) {
            echo "a";
    }
} else if ($aksi == 'get') {
    if ($d[id]) {
        $q = "SELECT * FROM logbook WHERE id_logbook = '$d[id]'";
        $sql = mysqli_query($con, $q);
        if ($sql) {
            $data = mysqli_fetch_object($sql);
            $error = 0;
        } else {
            $error = 1;
            $data = '';
        }
        $json = array("error" => $error, "data" => $data);
        echo json_encode($json);
    }
} else if ($aksi == 'update') {
        $q = "UPDATE logbook SET 
        -- id_logbook = '$d[id_logbook]',
        no_urut = '$d[no_urut]',
        nama = '$d[nama]',
        jk_umur = '$d[jk_umur]',
        jenis_spesimen = '$d[jenis_spesimen]', 
        sampel_ke = '$d[sampel_ke]', 
        diagnosa_followup = '$d[diagnosa_followup]', 
        asal_faskes = '$d[asal_faskes]', 
        pengirim = '$d[pengirim]', 
        id_lab = '$d[id_lab]', 
        tgl_ambil_sampel = '$d[tgl_ambil_sampel]', 
        tgl_terima_sampel = '$d[tgl_terima_sampel]', 
        tgl_keluar_hasil = '$d[tgl_keluar_hasil]', 
        hasil_pcr = '$d[hasil_pcr]', 
        nik = '$d[nik]', 
        ct_value = '$d[ct_value]', 
        keterangan = '$d[keterangan]'
        WHERE id_logbook = '$d[id]'";
        $sql = mysqli_query($con, $q);
        if ($sql) {
            $error = 0;
        } else {
            $error = 1;
        }
        $json = array("error" => $error, "data" => $data);
        echo json_encode($json);}