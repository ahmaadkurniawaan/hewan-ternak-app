<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 bg-light" style="height: 100vh">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3">
    </div>
    <h2>Slider</h2>
    <!-- Buton Add Data -->
    <div class="row mt-4 mb-4">
        <div class="col">
            <a class="badge badge-pill  badge-primary p-3" href="<?= base_url() ?>administrator/slider/insert">Tambah Gambar</a>
        </div>

        <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
        </div>

        <div class="table-responsive mt-4">
            <table class="table table-borderless table-light">
                <thead style="border:none !important;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">image</th>
                        <th scope="col">Link Image</th>
                        <th scope="col">Tanggal Upload</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($slider)) {
                        $no = 1;
                        foreach ($slider as $sld) {
                    ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td> <img class="img-fluid" style="width:70px" src="<?= base_url() ?>/uploads/slider/<?= $sld['img_slider']; ?>" class="mr-3" alt="image"></td>
                                <td> <a href="<?= $sld['link_slider']; ?>" target="_blank"><?= word_limiter($sld['link_slider'], 5); ?></a> </td>
                                <td><?= $sld['date_created']; ?></td>
                                <td class="text-center">
                                    <!-- <a class="badge badge-success p-2 mb-2" data-toggle="modal" data-target=".bd-privew" href="<?= base_url(); ?>administrator/slider/index/<?= $sld['idslider']; ?>">Detail</a> -->
                                    <a class="badge badge-warning p-2 mb-2" href="<?= base_url(); ?>administrator/slider/update/<?= $sld['idslider']; ?>">Ubah</a>
                                    <a class="badge badge-danger p-2 mb-2" onclick="return confirm('Apakah anda yakin ingin menghapus !');" href="<?= base_url(); ?>administrator/slider/delete/<?= $sld['idslider']; ?> ">Hapus</a>
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


    <!-- <div class="modal fade bd-privew mt-5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div>
                    <img class="img-fluid" src="<?= base_url() ?>/uploads/slider/<?= $sld['img_slider']; ?>" class="mr-3" alt="image">
                </div>
            </div>
        </div>
    </div> -->


</main>