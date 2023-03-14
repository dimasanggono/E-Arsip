<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $judul ?> </h3>
                <div class="box-tools pull-right">

                </div>
                <!-- /.     box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <h4>Ada Kesalahan !!!</h4>
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>

                    </div>
                <?php } ?>

                <?php echo form_open_multipart('User/Update/' . $user['id_user']) ?>
                <div class="form-group">
                    <label for="">Nama User</label>
                    <input name="nama_user" value="<?= $user['nama_user'] ?>" class="form-control" placeholder="Nama user">
                </div>
                <div class="form-group">
                    <label for="">E-Mail</label>
                    <input name="email" value="<?= $user['email'] ?>" class="form-control" placeholder="Email" readonly>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" value="<?= $user['password'] ?>" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="">Level</label>
                    <select name="level" class="form-control">
                        <option value="<?= $user['level'] ?>">
                            <?php if ($user['level'] == 1) {
                                echo 'Admin';
                            } else {
                                echo 'User';
                            } ?></option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Departement</label>
                    <select name="id_dep" class="form-control">
                        <option value="<?= $user['id_dep'] ?>"><?= $user['nama_dep'] ?></option>
                        <?php foreach ($departement as $key => $value) { ?>
                            <option value="<?= $value['id_dep'] ?>"><?= $value['nama_dep'] ?></option>
                        <?php } ?>
                    </select>
                </div>


                <div class="row">
                    <div class="col-sm-4 pull-right">
                        <img src="<?= base_url('foto/' . $user['foto']) ?>" width="90px">
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="<?= base_url('User') ?>" class="btn btn-default">Back</a>
                </div>
                <?php echo form_close() ?>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-3">

    </div>
</div>