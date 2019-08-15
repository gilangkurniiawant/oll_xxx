<?php
include('../modul/modul.php');
$user = '"access_token":"29a98ebbbbdc8c83eef2973adb6880029cd0db05","expires_in":2592000,"token_type":"bearer","scope":"read write","refresh_token":"25260cbc708a5f558aed1619e277aeea1505aad0"}';
$data['header']='Host: api.olx.co.id
user-agent: Android App Ver 7.16.7 (Android 5.1;)
device: Android
build-version: 7.16.7
build-number: 663
content-type: application/x-www-form-urlencoded; charset=UTF-8
content-length: 140
accept-encoding: gzip
cookie: PHPSESSID=lk1urpmuc3kv864ki91m565cr1';

$data['cookie']=1;
$data['url']='https://api.olx.co.id/api/v2/oauth/token/';
$data['data']='client_id=16&client_secret=abbf33a15fc3ef613894c406c20ea91301e7fd88&username=spirilunahm%40gmail.com&password=haitayo123&grant_type=password';

$is = curl($data);

echo $is['result'];



?>