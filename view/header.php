<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='true' name='MSSmartTagsPreventParsing' />

    <title>OLX</title>
    <link rel="shortcut icon" href="assets/log.jpg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">

    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom.css" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Quicksand', sans-serif;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <?php
    /*
    if ($_SESSION['alert'] !== '') {

        echo "<script>alert('" . $_SESSION['alert'] . "')</script>";
    } */ ?>
    <nav class="navbar navbar-default">
        <div class="container-fluid container-fluid-spacious">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">OLX Tool</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if (@$_SESSION['token']) {

                        if ($_SESSION['token'] !== '') {
                            ?>

                    <li class=""><a href="index.php?action=dashboard" title="Dashboard" data-toggle="" class="no-submenu">
                            <span class="item-text">Dashboard</span>
                        </a>
                    </li>
                    <li class=""><a href="index.php?action=add_iklan" title="Dashboard" data-toggle="" class="no-submenu">
                            <span class="item-text">Buat Iklan</span>
                        </a>
                    </li>
                    <li class=""><a href="index.php?action=logout" title="Dashboard" data-toggle="" class="no-submenu">
                            <span class="item-text">Logout</span>
                        </a>
                    </li>

                </ul>
                <?php }
                } ?>
            </div>
        </div>
        </div>
    </nav>
    <div class="container">