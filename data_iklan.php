<!DOCTYPE html>
<html lang="en">
<?php

function tampil_data($data=array()){
?>    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Iklan</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Kondisi</th>
            <th>Status</th>
        </tr>
        <?php foreach($data as $d){?>
        <tr>
             <td><?=$d['id']?></td>
            <td><a href="<?=$d['url']?>" target="_blank"><?=$d['title']?></a></td>
            <td><?=$d['category_id']?></td>
            <td><?=$d['params']['price']['value']?></td>
            <td><?=$d['params']['condition']['value']?></td>
            <td><?=$d['status']?></td>
            
        </tr>
        <?php }}?>
    </table>
</body>
</html>

