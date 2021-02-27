<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 bg-light" style="height: 100vh">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3">
    </div>
    <h2>Kategori</h2>
    <!-- Buton Add Data -->
    <div class="row mt-4 mb-4">
        <div class="col">
            <button type="button" class="badge badge-pill  badge-primary p-3 border-0" data-toggle="modal" data-target="#kategoriModal">
                Tambah Kategori
            </button>

        </div>

        <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
        </div>

        <div class="table-responsive mt-4">
            <table class="table table-borderless table-light">
                <thead style="border:none !important;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($kategori)) {
                        $no = 1;
                        foreach ($kategori as $ktg) {
                    ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $ktg['nama_kategori']; ?></td>
                                <td class="text-center">
                                    <!-- <a class="badge badge-warning p-2 mb-2" href="<?= base_url(); ?>administrator/kategori/update/<?= $ktg['id']; ?>">Ubah</a> -->
                                    <a class="badge badge-danger p-2 mb-2" onclick="return confirm('Apakah anda yakin ingin menghapus !');" href="<?= base_url(); ?>administrator/kategori/delete/<?= $ktg['id']; ?> ">Hapus</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "Tidak Ada Gambar";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Large modal -->

    <!-- Modal -->
    <div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kategoriModalLabel">Isi Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>administrator/kategori/insert" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kategori">Nama kategori</label>
                            <input type="text" class="form-control" name="kategori" id="kategori">
                            <?= form_error('kategori', '<small class="text-danger ">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


</main>