<?php 
require_once 'assets\phpqrcode\qrlib.php';

$path = 'qrcode/';
$file = $path.uniqid().".png";

$text ="anjeng kurap";
QRcode::png($text,$file);