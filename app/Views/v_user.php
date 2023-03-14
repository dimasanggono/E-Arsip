<div class="col-md-12">
    <div class="box box-default collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Data <?= $judul ?></h3>

            <div class="box-tools pull-right">
                <a href="<?= base_url('User/Add') ?>" class="btn btn-sm btn-success"><i class="fa fa-user-plus"> Add</i>
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
                    <tr class="text-center">
                        <th class="text-center">No</th>
                        <th class="text-center">Nama User</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Departemen</th>
                        <th class="text-center">level</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-bold text-center"> <?= $value['nama_user'] ?></td>
                            <td class=" text-bold text-center"> <?= $value['email'] ?></td>
                            <td class="text-bold text-center"> <?= $value['nama_dep'] ?></td>
                            <td class=" text-bold text-center">
                                <?php if ($value['level'] == 1) {
                                    echo 'Admin';
                                } else {
                                    echo 'User';
                                }  ?></td>
                            <td class="text-center"><img src="<?= base_url('foto/' . $value['foto']) ?>" width="50px"></td>
                            <td class="text-center">
                                <a href="<?= base_url('User/Edit/' . $value['id_user']) ?>" class="btn btn-sm btn-warning""><i class=" fa fa-pencil"></i></a>
                                <a href="<?= base_url('User/Delete/' . $value['id_user']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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