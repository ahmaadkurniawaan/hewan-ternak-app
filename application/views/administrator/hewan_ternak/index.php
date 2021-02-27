<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 bg-light" style="height: 100vh">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3">
    </div>
    <h2>Hewan ternak</h2>
    <!-- Buton Add Data -->
    <div class="row mt-4 mb-4">
        <div class="col">
            <a class="btn btn-primary" href="<?= base_url() ?>administrator/hewanternak/insert">Tambah Data Hewan</a>
        </div>
    </div>
    <!-- End Buton Add Data -->
    <div class="row mb-3">
        <div class="col">
            <a class="badge badge-pill  badge-secondary p-3 mr-2" href="">Sapi</a>
            <a class="badge badge-pill  badge-secondary p-3 mr-2" href="">Kambing</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-borderless table-light">
            <thead style="border:none !important;">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">image</th>
                    <th scope="col">Nama Hewan</th>
                    <th scope="col">Nama Pemilik</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($hewan)) {
                    $no = 1;
                    foreach ($hewan as $hwn) {
                ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td> <img class="img-fluid" style="width:70px" src="<?= base_url() ?>/uploads/hewan/<?= $hwn['img_hewan']; ?>" class="mr-3" alt="image"></td>
                            <td><?= $hwn['nama_hewan']; ?></td>
                            <td><?= $hwn['nama_pemilik']; ?></td>
                            <td><?= $hwn['stok']; ?></td>
                            <td><?= $hwn['harga']; ?></td>
                            <td class="text-center">
                                <a class="badge badge-success p-2 mb-2" href="#">Detail</a>
                                <a class="badge badge-warning p-2 mb-2" href="<?= base_url() ?>administrator/hewanternak/update/<?= $hwn['idhewan']; ?>">Ubah</a>
                                <a class="badge badge-danger p-2 mb-2" onclick="return confirm('Apakah anda yakin ingin menghapus !');" href="<?= base_url(); ?>administrator/hewanternak/delete/<?= $hwn['idhewan']; ?> ">Hapus</a>
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