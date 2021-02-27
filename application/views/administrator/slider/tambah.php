<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <h2 class="mt-4">Tambah Slider</h2>
    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="row mt-4 mb-4">

        <div class="col-md-8 mb-5">
            <?php echo form_open_multipart('administrator/slider/insert'); ?>
            <div class="form-group">
                <label>Pilih Foto</label>
                <input type="file" class="form-control" name="image" id="image" size="20">
                <?= form_error('image', '<small class="text-danger ">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Link Slider <small>- Opsional</small></label>
                <input type="text" class="form-control" name="link" id="link">
                <?= form_error('link', '<small class="text-danger ">', '</small>'); ?>
            </div>

            <button type="submit" value="upload" class="btn btn-primary">Simpan</button>
            <?php echo form_close(); ?>
        </div>
    </div>

</main>