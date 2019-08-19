<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user"></i> Ayo Ngiklan</h3>
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
            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="index.php?action=make_iklan" method="POST">
                <div class="form-group">
                    <label class="col-md-2 control-label">Judul Ilan</label>

                    <div class="col-md-10">
                        <input type="text" name="judul" class="form-control" required>
                        15 - 75 karakter
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Lokasi</label>
                    <div class="col-md-10">
                        <a class="btn btn-primary" onclick="lokasi()">Ambil Lokasi Saat Ini</a><br>
                        Latitude <input type="text" name="latitude" id="latitude" class="form-control">
                        Longitude <input type="text" name="longitude" id="longitude" class=" form-control">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Kategori</label>
                    <div class="col-md-10">
                        <select name="kategori" id="" class="form-control" required>
                            <?php foreach ($kategori as $ka) { ?>
                            <option value="<?= array_search($ka, $kategori) ?>"><?= $ka ?></option>
                            <?php } ?>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Deskripsi</label>
                    <div class="col-md-10">
                        <textarea name="deskripsi" class="form-control" cols="30" rows="10" required></textarea>
                        Minimal 25 karakter

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Foto</label>

                    <div class="col-md-10">
                        <input type="file" name="foto" class="form-control" required>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">No HP</label>

                    <div class="col-md-10">
                        <input type="text" name="hp" class="form-control" required>
                        Contoh : +6281.....

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Harga</label>

                    <div class="col-md-10">
                        <input type="number" name="harga" class="form-control" required>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Harga</label>

                    <div class="col-md-10">
                        <select name="kondisi" class="form-control">
                            <option value="baru">Baru</option>
                            <option value="bekas">Bekas</option>
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <div class="pull-right">
                            <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-paper-plane-o"></i> Buat Iklan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>