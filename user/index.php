<?php

$file='../gambar/a.jpg';
$token = @$_SESSION['token'] ? $_SESSION['token'] :'';
$d['header']='Host:api.olx.co.id
user-agent:Android App Ver 7.16.7 (Android 5.1;)
device:Android
build-version:7.16.7
build-number:663
Connection: keep-alive
authorization: Bearer '.$token;


$d['cookie']=1;

$base = "https://api.olx.co.id/api/v2/";
$user ="spirilunahm@gmail.com";
$password ="haitayo123";
//$aksi = "tambah_gambar_tmp";
var_dump($_SESSION); die();
if($aksi=='login'){
    $d['url']=$base.'oauth/token';
    $d['user'] = $user;
    $d['password']= $password;
    include('function.php');
    login($d);
    if($_SESSION['alert']!==''){
        echo $_SESSION['alert'];

    }
}

if($aksi=='data_iklan'){
    $d['url']=$base.'account/adverts';
    include('function.php');
    data_iklan($d);

}

if($aksi=='tambah_gambar_tmp'){
$img = file_get_contents('../gambar/a.jpg');
$d['header'] .= '
Content-Type: text/plain
Content-Length: '.strlen($img);
$d['data'] = $img;
$d['url']=$base.'account/temporary-image-storage';
    include('function.php');
    gambar_tmp($d);

}



?>