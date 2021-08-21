<?php
error_reporting(0);
session_start();

if (!$_SESSION[login]) header('location:index.php');
require_once '../config/koneksi.php';

$d = $_POST;
$aksi = $d['aksi'];
$data = '';

if ($aksi == 'input') {
    $q = "INSERT INTO transaksi (id_transaksi,id_spp,jmlh_bayar,tunggakan,tgl_transaksi) values('$d[id_transaksi]','$d[id_spp]','$d[jmlh_bayar]','$d[tunggakan]','$d[tgl_transaksi]')";
    $sql = mysqli_query($con, $q);
    if ($sql) {
        $error = 0;
    } else {
        $error = 1;
    }
    $json = array("error" => $error);
    echo json_encode($json);
} else if ($aksi == 'delete') {
    $q = "DELETE FROM transaksi WHERE id_transaksi = '$d[id]'";
    $sql = mysqli_query($con, $q);
    echo $q;
    if (!$sql) {
        echo "a";
    }
} else if ($aksi == 'get') {
    if ($d[id]) {
        $q = "SELECT * FROM transaksi WHERE id_transaksi = '$d[id]'";
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
    $q = "UPDATE transaksi SET id_transaksi = '$d[id_transaksi]', id_spp = '$d[id_spp]', jmlh_bayar = '$d[jmlh_bayar]', tunggakan = '$d[tunggakan]', tgl_transaksi = '$d[tgl_transaksi]' WHERE id_transaksi = '$d[id]'";
    $sql = mysqli_query($con, $q);
    if ($sql) {
        $error = 0;
    } else {
        $error = 1;
    }
    $json = array("error" => $error, "data" => $data);
    echo json_encode($json);
}
