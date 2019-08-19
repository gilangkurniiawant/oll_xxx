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
            <a href="index.php?action=add_iklan" class="btn btn-primary">Tambah Iklan</a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover m-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $d) { ?>
                        <tr>
                            <td><?= $d['id'] ?></td>
                            <td><a href="<?= $d['url'] ?>" target="_blank"><?= $d['title'] ?></a></td>
                            <td><?= $kategori[$d['category_id']] ?></td>
                            <td><?= $d['params']['price']['value'] ?></td>
                            <td><?= $d['params']['condition']['value'] ?></td>
                            <td><?= $d['status'] ?></td>
                        </tr>
                        <?php }
                        } ?>
                </table>
            </div>
        </div>
    </div>
</div>
</div>