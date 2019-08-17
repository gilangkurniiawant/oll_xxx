<?php
session_start();
$_SESSION['alert']='';
$file='../gambar/a.jpg';
$token = @$_SESSION['token'] ? $_SESSION['token'] :'';
$d['header']='Host:api.olx.co.id
user-agent:Android App Ver 7.16.7 (Android 5.1;)
device:Android
build-version:7.16.7
build-number:663
authorization: Bearer '.$token;

$d['cookie']=1;

$base = "https://api.olx.co.id/api/v2/";
$user ="spirilunahm@gmail.com";
$password ="haitayo123";
$aksi = "tambah_gambar_tmp";

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

$filename  = "../gambar/a.jpg";
 $handle    = fopen($filename, "r");
 $img      = fread($handle, filesize($filename));
$d['url']=$base.'account/temporary-image-storage';
$fields = "a.jpg";
$files = file_get_contents('../gambar/a.jpg');
$boundary = uniqid();
$d['data'] = get_img($boundary, $fields, $files);


//echo $d['data']; die();

    include('function.php');
    gambar_tmp($d);

}

function get_img($boundary, $fields, $files){
    $es = "\n";

   $data = '--7cac034e-44dd-4d45-9ee3-24d65f3b2363
   Content-Disposition: form-data; name="file"; filename="OLX_local_transformation_20190816_180330178_0_0_.jpg"
   Content-Type: multipart/form-data
   Content-Length: 48113
   Content-Transfer-Encoding: binary
   
   '.$files.'
   --7cac034e-44dd-4d45-9ee3-24d65f3b2363';


    return $data;
}


?>