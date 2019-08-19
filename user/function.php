<?php
include('modul/modul.php');


function login($data = array())
{

    if (count($data) >= 1) {

        $data['data'] = "client_id=16&client_secret=abbf33a15fc3ef613894c406c20ea91301e7fd88&username=" . $data['user'] . "&password=" . $data['password'] . "&grant_type=password";
        $is = curl($data);
        if (json_decode($is['result'], true) != NULL) {
            $hasil =  json_decode($is['result'], true);
            if (array_key_exists('error', $hasil)) {
                $_SESSION['alert'] = $hasil['error_description'];
            } elseif (array_key_exists('access_token', $hasil)) {
                $_SESSION['token'] = $hasil['access_token'];
                $_SESSION['refresh_token'] = $hasil['refresh_token'];
                header('Location:index.php?action=dashboard');
            }
        } else {
            $_SESSION['alert'] = "Hasil Tidak Ditemukan";
        }
    } else {
        $_SESSION['alert'] = "Format Data Salah/Kurang";
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

function gambar_tmp($data = array())
{

    if (count($data) >= 1) {
        $is = curl($data);
        $hasil =  json_decode($is['result'], true);
        var_dump($hasil);
        die();
        if (array_key_exists('data', $hasil)) {
            if (count($hasil['data']) > 1) {
                $_SESSION['tmp_img'][] = array('key' => $hasil['data']['temporary_key'], 'url' => $hasil['data']['url']);
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
