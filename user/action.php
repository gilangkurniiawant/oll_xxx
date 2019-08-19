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
if ($aksi !== 'login') {
    if ($token == '') {
        header('Location:index.php?action=login');
    }
}
if ($aksi == 'logout') {
    session_destroy();
    session_unset();
}
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





if ($aksi == 'add_iklan') {
    $kategori = json_decode(file_get_contents('files/kategori.json'), true);
}

if ($aksi == 'make_iklan') {
    // var_dump($_POST);
    $img = file_get_contents($_FILES['foto']['tmp_name']);

    //die();
    include('function.php');
    $d['header'] .= '
Content-Type: text/plain
Content-Length: ' . strlen($img);
    $d['data'] = $img;
    $d['url'] = $base . 'account/temporary-image-storage';

    if (gambar_tmp($d) == 'ok') {
        $_SESSION['post'] = $_POST;
        header('Location:index.php?action=publish');
        die();
    } else {
        $_SESSION['alert'] = "Gambar gagal di upload";
        header('Location:index.php?action=add_iklan');
        die();
    }
}

if ($aksi == 'publish') {
    include('function.php');
    $key = $_SESSION['tmp_img']['key'];

    $d['data'] = '{
            "category_id": ' . $_SESSION['post']["kategori"] . ',
            "coordinates": {
                "latitude": ' . $_SESSION['post']["latitude"] . ',
                "longitude":' . $_SESSION['post']["longitude"] . '
            },
            "description": "' . $_SESSION['post']["deskripsi"] . '",
            "escrow": null,
            "photos_group_key": ' . $key . ',
            "whatsapp": true,
            "order_mapping": [1, 2],
            "params": {
            "condition": "' . $_SESSION['post']["kondisi"] . '",
            "price": ["price", "' . $_SESSION['post']["harga"] . '"]
             },
            "phone": "' . $_SESSION['post']["hp"] . '",
             "title": "' . $_SESSION['post']["judul"] . '"
            }';

    $d['url'] = $base . 'account/advert';
    make_iklan($d);
}
