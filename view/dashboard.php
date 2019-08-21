<div class="col-md-12">

    <?php
    function tampil_data($data = array(), $kategori)
    {


        ?>


    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-history"></i> Daftar Ikan</h3>
        </div>
        <div class="panel-body">
            <?php
                if ($_SESSION['alert'] !== '') { ?>
            <div class="alert alert-info" role="alert">
                <?php
                        echo $_SESSION['alert'];
                        $_SESSION['alert'] = ''; ?>
            </div>
            <?php } ?>
            <a href="index.php?action=add_iklan" class="btn btn-primary">Tambah Iklan</a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Ganbar</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($data as $d) { ?>
                        <tr>
                            <td><?= $d['id'] ?></td>
                            <td><a href="<?= $d['url'] ?>" target="_blank"><?= $d['title'] ?></a></td>
                            <td><?= $kategori[$d['category_id']] ?></td>
                            <td><?= $d['price']['value']['raw'] ?></td>
                            <td><img src="<?= $d['images'][0]['medium']['url'] ?>" height="50px" weight="50px"></td>
                            <td><?php if (@$d['parameters'][0]['value_name']) echo $d['parameters'][0]['value_name'] ?></td>
                            <td><?= $d['status']['translated_display'] . " - " . $d['status']['message'] ?></td>
                        </tr>
                        <?php }
                        } ?>
                </table>
            </div>
        </div>
    </div>
</div>
</div>