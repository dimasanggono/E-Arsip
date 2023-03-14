<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <th width="100px">No Arsip</th>
                <th width="30px">:</th>
                <td><?= $arsip['no_arsip'] ?></td>
                <th width="140px">Tanggal Upload</th>
                <th width="30px">:</th>
                <td><?= $arsip['tgl_upload'] ?></td>
            </tr>
            <tr>
                <th width="100px">Nama Arsip</th>
                <th width="30px">:</th>
                <td><?= $arsip['nama_file'] ?></td>
                <th width="140px">Tanggal update</th>
                <th width="30px">:</th>
                <td><?= $arsip['tgl_update'] ?></td>
            </tr>
            <tr>
                <th width="100px">Deskripsi</th>
                <th width="30px">:</th>
                <td><?= $arsip['deskripsi'] ?></td>
                <th width="100px">Ukuran File</th>
                <th width="30px">:</th>
                <td><?= $arsip['ukuran_file'] ?> Byte</td>
            </tr>
            <tr>
                <th width="100px">Departemen</th>
                <th width="30px">:</th>
                <td><?= $arsip['nama_dep'] ?></td>
                <th width="100px">User</th>
                <th width="30px">:</th>
                <td><?= $arsip['nama_user'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-sm-12">
        <iframe src="<?= base_url('file_arsip/' . $arsip['file_arsip']) ?>" height="1000px" width="100%"></iframe>
    </div>

</div>