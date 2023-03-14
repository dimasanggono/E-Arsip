<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Arsip</h3>
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

                <?php echo form_open_multipart('Arsip/Insert/');
                helper('text');
                ?>

                <div class="form-group">
                    <label for="">No Arsip</label>
                    <input name="no_arsip" class="form-control" value="<?= $no_arsip ?>" placeholder="No Arsip" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama Arsip</label>
                    <input name="nama_file" class="form-control" placeholder="Nama File">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="id_kategori" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="5" placeholder="Deskripsi"></textarea>
                </div>

                <div class="form-group">
                    <label>File</label>
                    <input type="file" name="file_arsip" class="form-control">
                    <label class="label-danger"> *File Harus Format .PDF</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="<?= base_url('Arsip') ?>" class="btn pull-right btn-default">Back</a>
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