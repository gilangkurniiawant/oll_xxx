<?php
require_once('view/header.php');
session_start();
$_SESSION['alert']='';
$aksi='';


if(@$_GET['action']){
    $aksi = $_GET['action'];
    require_once('user/action.php');
    $file ='view/'.$_GET['action'].'.php';
    if(file_exists($file)){   
    require_once($file);
    }

} 
require_once('view/footer.php');



?>