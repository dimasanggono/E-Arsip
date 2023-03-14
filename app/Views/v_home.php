    <div class="row">
        <div class="col-lg-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?= $total_arsip ?></h3>

                    <p>File Arsip</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file-pdf-o"></i>
                </div>
                <a href="<?= base_url('Arsip/DetailData') ?>" class="small-box-footer">Detail Data <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= $total_kategori ?></h3>

                    <p>Kategori</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bookmark-o"></i>
                </div>
                <a href="<?= base_url('Kategori') ?>" class="small-box-footer">Detail Data <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $total_dep ?></h3>

                    <p>Departemen</p>
                </div>
                <div class="icon">
                    <i class="fa fa-building-o"></i>
                </div>
                <a href="<?= base_url('Departement') ?>" class="small-box-footer">Detail Data <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-maroon">
                <div class="inner">
                    <h3><?= $total_user ?></h3>
                    <p>User</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?= base_url('User') ?>" class="small-box-footer">Detail Data <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="title-header text-center">
            <h1 class="text-bold">Hi, Selamat Datang <?= session()->get('nama_user') ?></h1>
        </div>
    </div>
    <br>