<?php
session_start();
require_once('view/header.php');
if (!@$_SESSION['alert']) {
    $_SESSION['alert'] = '';
}
$aksi = '';



if (@$_GET['action']) {
    $aksi = $_GET['action'];
    $file = 'view/' . $_GET['action'] . '.php';
    require_once('user/action.php');
    if (file_exists($file)) {
        require_once($file);
    }
} else {
    header('Location:index.php?action=dashboard');
}
require_once('view/footer.php');
