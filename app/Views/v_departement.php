<div class="col-md-12">
    <div class="box box-default collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Data <?= $judul ?></h3>

            <div class="box-tools pull-right">
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#add-data"><i class="fa fa-plus"> Add</i>
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
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Departement</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($dep as $key => $value) { ?>
                        <tr>
                            <td class="text-center"> <?= $no++ ?></td>
                            <td class="text-center"> <?= $value['nama_dep'] ?></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit-data<?= $value['id_dep'] ?>"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-data<?= $value['id_dep'] ?>"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php    } ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<!-- Add Data  -->
<div class="modal fade" id="add-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Departement</h4>
            </div>

            <div class="modal-body">
                <?= form_open('Departement/AddData') ?>
                <label>Departement</label>
                <input name="nama_dep" class="form-control" placeholder="Nama Departemen" required>
            </div>
            <div class="modal-footer justify-content-between ">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat">Save</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>


<!-- Update -->
<?php foreach ($dep as $key => $value) { ?>
    <div class="modal fade" id="edit-data<?= $value['id_dep']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Data</h4>
                </div>

                <div class="modal-body">
                    <?php echo form_open('Departement/Updatedata/' . $value['id_dep']) ?>
                    <div class="form-group">
                        <label>Nama Departemen</label>
                        <input name="nama_dep" value="<?= $value['nama_dep'] ?>" class="form-control" placeholder="Nama Departemen">
                    </div>
                </div>
                <div class="modal-footer justify-content-between ">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

<?php  } ?>

<!-- Delete -->

<?php foreach ($dep as $key => $value) { ?>
    <div class="modal fade" id="delete-data<?= $value['id_dep'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Apakah Anda Yakin Ingin Menghapus Data <b> <?= $value['nama_dep'] ?> </b> ?</h4>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Departement/Deletedata/' . $value['id_dep']) ?>" class="btn btn-danger btn-flat">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>