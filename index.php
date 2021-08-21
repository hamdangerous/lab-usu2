<?php
error_reporting(0);
session_start();
$ses = $_SESSION;
$page = '';
if ($ses[login]) {
    $page = 'view/menuutama.php';
    $title = 'Menu Utama';
} else {
    $page = 'view/masuk.php';
    $title = 'Masuk';
}

$g = $_GET;
$pageo = ucwords($g[page]);
$form = ucwords($g[form]);
if (!$g[page]) {
    $breadcrumb = '<li class="breadcrumb-item active">Menu Utama</li>';
    $content = 'menuutama';
    $title = 'Menu Utama';
} else {
    $title = $form;
    $breadcrumb = '
        <li class="breadcrumb-item">' . $pageo . '</li>
        <li class="breadcrumb-item active">' . $form . '</li>
        ';
    $content = strtolower($pageo . $form);
}

?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Lab. USU <?= $title ?> </title>
    <link rel="icon" href="favicon.png" type="image/png"> <!-- Favicon-->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css" />
    <link rel="stylesheet" href="assets/plugins/charts-c3/plugin.css" />

    <link rel="stylesheet" href="assets/plugins/morrisjs/morris.min.css" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="assets/plugins/select2/select2.css" />
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/plugins/sweetalert/sweetalert.css" />

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
    <script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
    <script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
    <script src="assets/bundles/c3.bundle.js"></script>

    <script src="assets/bundles/mainscripts.bundle.js"></script>
    <script src="assets/js/pages/index.js"></script>
</head>

<body class="theme-blush right_icon_toggle">
    <?php
    include $page;
    ?>
</body>

</html>