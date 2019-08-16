<?php
include('../modul/modul.php');
$user = '"access_token":"29a98ebbbbdc8c83eef2973adb6880029cd0db05","expires_in":2592000,"token_type":"bearer","scope":"read write","refresh_token":"25260cbc708a5f558aed1619e277aeea1505aad0"}';


$data['cookie']=1;
$data['url']='https://www.olx.co.id/pasang/';
$data['data']='login%5Bemail%5D=spirilunahm%40gmail.com&login%5Bpassword%5D=haitayo123&login%5Bremember-me%5D=on';

$is = curl($data);

echo $is['result'];



?>