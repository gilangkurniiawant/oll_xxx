<?php
$token = @$_SESSION['token'] ? $_SESSION['token'] : '';
$d['header'] = 'Host:api.olx.co.id
user-agent:Android App Ver 7.16.7 (Android 5.1;)
device:Android
build-version:7.16.7
build-number:663
Connection: keep-alive
authorization: Bearer ' . $token;



$d['cookie'] = 1;

$base = "https://api.olx.co.id/api/v2/";


if ($aksi == 'login') {
    if ($_SESSION['token'] != '') {
        header('Location:index.php?action=dashboard');
        die();
    }
    if (@$_POST) {

        if (@$_POST['email'] && @$_POST['password']) {

            $user = $_POST['email'];
            $password = $_POST['password'];
            $d['url'] = $base . 'oauth/token';
            $d['user'] = $user;
            $d['password'] = $password;
            include('function.php');
            login($d);
        }
    }
}

if ($aksi == 'dashboard') {
    $d['url'] = $base . 'account/adverts';
    include('function.php');
    data_iklan($d, $file);
}

if ($aksi == 'tambah_gambar_tmp') {
    $img = file_get_contents('../gambar/a.jpg');
    $d['header'] .= '
Content-Type: text/plain
Content-Length: ' . strlen($img);
    $d['data'] = $img;
    $d['url'] = $base . 'account/temporary-image-storage';
    include('function.php');
    gambar_tmp($d);
}
