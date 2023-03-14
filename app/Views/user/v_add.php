<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-8">
        <div class="box box-default  collapsed-box">
            <div class="box-header  with-border">
                <h3 class="box-title"><b> Data <?= $judul ?> </b></h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
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
                        <?php echo form_open_multipart('User/Insert/') ?>
                        <div class="form-group">
                            <label>Nama User</label>
                            <input name="nama_user" class="form-control" placeholder="Nama User">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" class="form-control" placeholder="password">
                        </div>
                        <div class="form-group">
                            <label for="">Level</label>
                            <select name="level" class="form-control">
                                <option value="">--Pilih level--</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Departemen</label>
                            <select name="id_dep" class="form-control">
                                <option value="">--Pilih Departemen--</option>
                                <?php foreach ($departement as $key => $value) { ?>
                                    <option value="<?= $value['id_dep'] ?>"><?= $value['nama_dep'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto">
                        </div>

                        <div class="modal-footer justify-content-between ">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Back</button>
                            <button type="submit" class="btn btn-primary ">Save</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>