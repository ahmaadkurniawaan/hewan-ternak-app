<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 bg-light" style="height: 100vh">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3">
    </div>
    <h2>Voucher</h2>
    <!-- Buton Add Data -->
    <div class="row mt-4 mb-4">
        <div class="col">
            <button type="button" class="badge badge-pill  badge-primary p-3 border-0" data-toggle="modal" data-target="#voucherModal">
                Tambah Voucher
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
                        <th scope="col">Kode Voucher</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Di Buat</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($voucher)) {
                        $no = 1;
                        foreach ($voucher as $vcr) {
                    ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $vcr['voucher']; ?></td>
                                <td><?= $vcr['diskon']; ?></td>
                                <td><?= $vcr['date_created']; ?></td>
                                <td class="text-center">
                                    <!-- <a class="badge badge-warning p-2 mb-2" href="<?= base_url(); ?>administrator/voucher/update/<?= $vcr['id']; ?>">Ubah</a> -->
                                    <a class="badge badge-danger p-2 mb-2" onclick="return confirm('Apakah anda yakin ingin menghapus !');" href="<?= base_url(); ?>administrator/voucher/delete/<?= $vcr['id']; ?> ">Hapus</a>
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
    </div>

    <!-- Large modal -->

    <!-- Modal -->
    <div class="modal fade" id="voucherModal" tabindex="-1" aria-labelledby="voucherModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="voucherModalLabel">Isi Voucher Penjualan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>administrator/voucher/insert" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="voucher">Nama voucher</label>
                            <input type="text" class="form-control" name="voucher" id="voucher">
                            <?= form_error('voucher', '<small class="text-danger ">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="voucher">Diskon</label>
                            <input type="text" class="form-control" name="diskon" id="voucher">
                            <?= form_error('diskon', '<small class="text-danger ">', '</small>'); ?>
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