<div class="row">
    <div class="col-md-12">
        <div class="box box-default collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $judul ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('Arsip/AddData/') ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"> Add</i>
                    </a>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="card-body">
                <?php
                if (session()->getFlashdata('message')) {
                    echo
                    '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i>';
                    echo session()->getFlashdata('message');
                    echo '</div>';
                } ?>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="70px" class="text-center">No</th>
                            <th width="100px" class="text-center">No Arsip</th>
                            <th width="100px">Nama Arsip</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th width="100px" class="text-center">Upload</th>
                            <th class="text-center">Upgrade</th>
                            <th width="100px">User</th>
                            <th>Departemen</th>
                            <th class="text-center">File</th>
                            <th width="100px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($arsip as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-bold" width="100px"> <?= $value['no_arsip'] ?></td>
                                <td class="text-bold" width="100px"> <?= $value['nama_file'] ?></td>
                                <td class="text-bold"> <?= $value['nama_kategori'] ?></td>
                                <td class="text-bold"> <?= $value['deskripsi'] ?></td>
                                <td class="text-bold"> <?= $value['tgl_upload'] ?></td>
                                <td class="text-bold"> <?= $value['tgl_update'] ?></td>
                                <td class="text-bold"> <?= $value['nama_user'] ?></td>
                                <td class="text-bold text-center"> <?= $value['nama_dep'] ?></td>
                                <td class="text-center" width="100px">
                                    <a href="<?= base_url('arsip/ViewpdfAdmin/' . $value['id_arsip']) ?>">
                                        <i class="fa fa-file-pdf-o fa-2x label-danger"></i> </a> <br>
                                    <?= number_format($value['ukuran_file']) ?> Byte
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('Arsip/EditData/' . $value['id_arsip']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value['id_arsip'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- Update -->


<!-- Delete -->
<!-- Model Delete -->
<?php foreach ($arsip as $key => $value) { ?>
    <div class="modal fade" id="delete-data<?= $value['id_arsip'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Apakah Anda Yakin Ingin Menghapus Data <b> <?= $value['nama_file'] ?> </b> ?</h4>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Arsip/Delete/' . $value['id_arsip']) ?>" class="btn btn-danger btn-flat">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>