<?php
include('modul/modul.php');
refresh_token();

function login($data = array())
{

    if (count($data) >= 1) {

        //   $data['data'] = "client_id=16&client_secret=abbf33a15fc3ef613894c406c20ea91301e7fd88&username=" . $data['user'] . "&password=" . $data['password'] . "&grant_type=password";
        $data['data'] = '{"email":"' . $data['user'] . '","grantType":"email","password":"' . $data['password'] . '"}';

        $is = curl($data);

        if (json_decode($is['result'], true) != NULL) {
            $hasil =  json_decode($is['result'], true);
            if (array_key_exists('error_type', $hasil)) {
                $_SESSION['alert'] = $hasil['error_type'];
            } elseif (array_key_exists('access_token', $hasil)) {
                $_SESSION['token'] = $hasil['access_token'];
                $_SESSION['refresh_token'] = $hasil['refresh_token'];

                header('Location:index.php?action=users');
            }
        } else {
            $_SESSION['alert'] = "Hasil Tidak Ditemukan";
        }
    } else {
        $_SESSION['alert'] = "Format Data Salah/Kurang";
    }
}

function refresh_token($data = array())
{

    $data['header'] = 'User-Agent:android 13.21.04 olxid
x-origin-panamera:Production
Content-Type:application/json; charset=UTF-8
Host:api.olx.co.id
Connection:Keep-Alive
Accept-Encoding:gzip';
    $token =  $_SESSION['refresh_token'];
    $data['header'] .= '
Authorization: Bearer ' . $token;
    $data['url'] = 'https://api.olx.co.id/v1/auth/refresh';
    $data['data'] = ' ';
    $is = curl($data);
    $hasil =  json_decode($is['result'], true);


    if (count($hasil) > 1) {
        if (array_key_exists('access_token', $hasil)) {
            $_SESSION['token'] = $hasil['access_token'];
            $_SESSION['refresh_token'] = $hasil['refresh_token'];
        } else {
            $_SESSION['alert'] = "Hasil Tidak Ditemukan";
        }
    } else {
        $_SESSION['alert'] = "Hasil Tidak Ditemukan";
    }
}

function data_iklan($data = array(), $file)
{
    if (count($data) >= 1) {

        $is = curl($data);

        $hasil =  json_decode($is['result'], true);

        if (count($hasil) > 1) {
            if (array_key_exists('data', $hasil)) {
                if (count($hasil['data']) > 1) {
                    $kategori = json_decode(file_get_contents('files/kategori.json'), true);
                    include($file);
                    /*
                    //var_dump($kategori);
                    $a = array();
                    foreach ($kategori as $k) {
                        $a[$k['id']] = $k['name'];
                    }
                    $has = json_encode($a);
                    echo $has;
                    die();
                    */
                    tampil_data($hasil['data'], $kategori);
                } else {
                    $_SESSION['alert'] = "Tidak ada iklan";
                }
            } else {
                $_SESSION['alert'] = "Hasil Tidak Ditemukan";
            }
        } else {
            $_SESSION['alert'] = "Hasil Tidak Ditemukan";
        }
    } else {
        $_SESSION['alert'] = "Format Data Salah/Kurang";
    }
}
function get_user($data = array())
{
    if (count($data) >= 1) {


        $is = curl($data);
        $hasil =  json_decode($is['result'], true);

        if (array_key_exists('data', $hasil)) {
            if (count($hasil['data']) > 1) {
                $_SESSION['email'] = $hasil['data']['contacts']['email'];
                $_SESSION['hp'] = $hasil['data']['phone'];
                $_SESSION['id'] = $hasil['data']['id'];
                $_SESSION['nama'] = $hasil['data']['name'];
                //header('Location:index.php?action=dashboard');
            } else {
                $_SESSION['alert'] = "Gagal";
            }
        } else {
            $_SESSION['alert'] = "Hasil Tidak Ditemukan";
        }
    } else {
        $_SESSION['alert'] = "Format Data Salah/Kurang";
    }
}
function gambar_tmp($data = array())
{

    if (count($data) >= 1) {
        $is = curl($data);
        $hasil =  json_decode($is['result'], true);
        if (array_key_exists('data', $hasil)) {
            if (count($hasil['data']) > 1) {
                $_SESSION['tmp_img'] = array('key' => $hasil['data']['temporary_key'], 'url' => $hasil['data']['url']);
                return 'ok';
            } else {
                $_SESSION['alert'] = "Gagal";
            }
        } else {
            $_SESSION['alert'] = "Hasil Tidak Ditemukan";
        }
    } else {
        $_SESSION['alert'] = "Format Data Salah/Kurang";
    }
}

function make_iklan($data = array())
{

    if (count($data) >= 1) {
        $is = curl($data);
        $hasil =  json_decode($is['result'], true);

        if (array_key_exists('error', $hasil)) {
            $_SESSION['alert'] = $hasil['error']['title'];
            header('Location:index.php?action=dashboard');
            die();
        }
        if (array_key_exists('data', $hasil)) {
            if (count($hasil['data']) > 1) {
                $_SESSION['tmp_img'] = '';
                $_SESSION['post'] = '';
                $_SESSION['alert'] = "Ikan berhasil diterbitkan";
                header('Location:index.php?action=dashboard');
            } else {
                $_SESSION['alert'] = "Gagal";
            }
        } else {
            $_SESSION['alert'] = "Hasil Tidak Ditemukan";
        }
    } else {
        $_SESSION['alert'] = "Format Data Salah/Kurang";
    }
}
