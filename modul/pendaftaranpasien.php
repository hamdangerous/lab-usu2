<?php
error_reporting(0);
session_start();

if (!$_SESSION[login]) header('location:index.php');
require_once '../config/koneksi.php';

$d = $_POST;
$aksi = $d['aksi'];
$data = '';

if ($aksi == 'input') {
    $q = "INSERT INTO pasien (no,nama,umur,spesimen,sampel,diagnosa,profesi,tgl_ambil,tgl_kirim,rekam,nik,ket,status) values('$d[no]','$d[nama]','$d[umur]','$d[spesimen]','$d[sampel]','$d[diagnosa]','$d[profesi]','$d[tgl_ambil]','$d[tgl_kirim]','$d[rekam]','$d[nik]','$d[ket]','$d[status]')";
    $sql = mysqli_query($con, $q);
    if ($sql) {
        $error = 0;
    } else {
        $error = 1;
    }
    $json = array("error" => $error);
    echo json_encode($json);
} else if ($aksi == 'delete') {
    $q = "DELETE FROM pasien WHERE id_pasien = '$d[id]'";
    $sql = mysqli_query($con, $q);
    echo $q;
    if (!$sql) {
        echo "a";
    }
} else if ($aksi == 'get') {
    if ($d[id]) {
        $q = "SELECT * FROM pasien WHERE id_pasien = '$d[id]'";
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
    $q = "UPDATE pasien SET id_pasien = '$d[id_pasien]', no = '$d[no]', nama = '$d[nama]', umur = '$d[umur]', spesimen = '$d[spesimen]', sampel = '$d[sampel]', diagnosa = '$d[diagnosa]', profesi = '$d[profesi]', tgl_ambil = '$d[tgl_ambil]', tgl_kirim = '$d[tgl_kirim]', rekam = '$d[rekam]', nik = '$d[nik]', ket = '$d[ket]', status = '$d[status]' WHERE id_pasien = '$d[id]'";
    $sql = mysqli_query($con, $q);
    if ($sql) {
        $error = 0;
    } else {
        $error = 1;
    }
    $json = array("error" => $error, "data" => $data);
    echo json_encode($json);
}
