<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 bg-light" style="height: 100vh;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3">
    </div>
    <h2>Data Pelanggan</h2>

    <div class="row">
        <div class="col">
            <!-- <a class="badge badge-primary text-light p-3 mb-2" href="#">Tambah</a> -->
            <!-- <a class="badge badge-warning text-light p-3 mb-2" href="#">Export</a> -->
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-borderless table-light">
            <thead style="border:none !important;">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telpon</th>
                    <th scope="col">pesan</th>
                    <th scope="col" class="text-center">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($pelanggan)) {
                    $no = 1;
                    foreach ($pelanggan as $plg) {
                ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $plg['nama']; ?></td>
                            <td><a href="mailto:<?= $plg['email']; ?>"><?= $plg['email']; ?></a></td>
                            <td><?= $plg['alamat']; ?></td>
                            <td><?= $plg['telp']; ?></td>
                            <td><?= $plg['pesan']; ?></td>
                            <td class="text-center">
                                <a class="badge badge-danger p-2 mb-2" onclick="return confirm('Apakah anda yakin ingin menghapus !');" href="<?= base_url() ?>administrator/customer/delete/<?= $plg['id']; ?>">Hapus</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "";
                }
                ?>
            </tbody>
        </table>
    </div>

</main>