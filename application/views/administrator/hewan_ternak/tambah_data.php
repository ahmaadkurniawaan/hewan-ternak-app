<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 bg-light">

    <h2>Tambah Data Hewan ternak</h2>
    <div class="row mt-4 mb-4">

        <div class="col-md-8 mb-5">
            <!-- <form action="<?= base_url() ?>administrator/hewanternak/insert" enctype="multipart/form-data" method="POST"> -->
            <?php echo form_open_multipart('administrator/hewanternak/insert'); ?>
            <div class="form-group">
                <label>Pilih Foto</label>
                <input type="file" class="form-control" name="image" id="image">
                <?= form_error('image', '<small class="text-danger ">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Nama Hewan</label>
                <input type="text" class="form-control" name="nama_hewan" id="nama_hewan">
                <?= form_error('nama_hewan', '<small class="text-danger ">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Nama Pemilik</label>
                <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik">
                <?= form_error('nama_pemilik', '<small class="text-danger ">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat">
                <?= form_error('alamat', '<small class="text-danger ">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Link Alamat</label>
                <small> - Opsional</small>
                <input type="text" class="form-control" name="link_alamat" id="link_alamat">
                <?= form_error('alamat', '<small class="text-danger ">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Berat Hewan</label>
                <input type="text" class="form-control" name="berat" id="berat">
                <?= form_error('berat', '<small class="text-danger ">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Harga Hewan</label>
                <input type="text" class="form-control" name="harga" id="harga">
                <?= form_error('harga', '<small class="text-danger ">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Jumlah Ketersediaan</label>
                <input type="text" class="form-control" name="stok" id="stok">
                <?= form_error('stok', '<small class="text-danger ">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Umur Hewan</label>
                <input type="text" class="form-control" name="umur" id="umur">
                <?= form_error('umur', '<small class="text-danger ">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Deskripsi Hewan</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
                <?= form_error('deskripsi', '<small class="text-danger ">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin Hewan</label>
                <select id="inputKelamin" class="form-control" name="kelamin">
                    <option selected>Pilih...</option>
                    <option value="Jantan">Jantan</option>
                    <option value="Betina">Betina</option>
                </select>
            </div>
            <div class="form-group">
                <label>kondisi Hewan</label>
                <select id="inputKondisi" class="form-control" name="kondisi">
                    <option selected>Pilih...</option>
                    <option value="Baik">Baik</option>
                    <option value="Sangat Baik">sangat Baik</option>
                </select>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <div class="form-group">
                    <select name="kategori" class="form-control" required>
                        <option>-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $data) : ?>
                            <option value="<?php echo $data['id'] ?>"><?php echo $data['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


            <button type="submit" value="upload" class="btn btn-primary">Simpan</button>
            <?php echo form_close(); ?>
        </div>
    </div>
    <!-- End Buton Add Data -->

</main>