<div class="col-lg-12">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
                <th class="text-center">Data Arsip</th>
                <th class="text-center">Data Kategori</th>
                <th class="text-center">Data Departement</th>
                <th class="text-center">Data User</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center"><?= $total_arsip ?></td>
                <td class="text-center"><?= $total_kategori ?></td>
                <td class="text-center"><?= $total_dep ?></td>
                <td class="text-center"><?= $total_user ?></td>
            </tr>
        </tbody>
        <span> <b> Print Date : <?= date('d M Y /  H:i:s') ?></b></span>
        <br>
    </table>
</div>