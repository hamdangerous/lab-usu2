<?php
session_start();
error_reporting(0);
require_once '../config/koneksi.php';
$d = $_POST;
$u = $d['username'];
$p = $d['password'];

$q = "SELECT * FROM admin WHERE username = '" . $u . "' and password = ('" . $p . "')";
$sql = mysqli_query($con, $q);
$data = mysqli_fetch_object($sql);
$ldata = mysqli_num_rows($sql); 
 
if ($ldata > 0) {
    $_SESSION[login] = true;
    $_SESSION[username] = $data->username;
    $_SESSION[nama] = $data->nama;
    $_SESSION[keterangan] = $data->keterangan;
    $_SESSION[level] = $data->level;
    $json = [error => 0];
} else {
    $json = [error => 1];
}

echo json_encode($json);
