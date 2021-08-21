<?php
error_reporting(0);
session_start();

if (!$_SESSION[login]) header('location:index.php');
require_once '../config/koneksi.php';

$d = $_POST;
$aksi = $d['aksi'];
$data = '';

if ($aksi == 'input') {
    $q = "INSERT INTO wali_kelas (id_wali,nip,nm_wali,no_hp,alamat) values('$d[id_wali]','$d[nip]','$d[nm_wali]','$d[no_hp]','$d[alamat]')";
    $sql = mysqli_query($con, $q);
    if ($sql) {
        $error = 0;
    } else {
        $error = 1;
    }
    $json = array("error" => $error);
    echo json_encode($json);
} else if ($aksi == 'delete') {
    $q = "DELETE FROM wali_kelas WHERE id_wali = '$d[id]'";
    $sql = mysqli_query($con, $q);
    echo $q;
    if (!$sql) {
        echo "a";
    }
} else if ($aksi == 'get') {
    if ($d[id]) {
        $q = "SELECT * FROM wali_kelas WHERE id_wali = '$d[id]'";
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
    $q = "UPDATE wali_kelas SET id_wali = '$d[id_wali]', nip = '$d[nip]', nm_wali = '$d[nm_wali]', no_hp = '$d[no_hp]', alamat = '$d[alamat]' WHERE id_wali = '$d[id]'";
    $sql = mysqli_query($con, $q);
    if ($sql) {
        $error = 0;
    } else {
        $error = 1;
    }
    $json = array("error" => $error, "data" => $data);
    echo json_encode($json);
}
