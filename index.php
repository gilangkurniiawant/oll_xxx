<?php
require_once('view/header.php');
session_start();
$_SESSION['alert']='';

var_dump($POST);

if(@$_GET['action']){
    $file ='view/'.$_GET['action'].'.php';
    if(file_exists($file)){   
    require_once($file);
    }

}

require_once('view/footer.php');



?>