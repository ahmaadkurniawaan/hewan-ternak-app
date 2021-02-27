<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 bg-light" style="height: 100vh;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3">
    </div>
    <h2>Data Transaksi/Order</h2>

    <div class="row">
        <div class="col">
            <!-- <a class="badge badge-warning text-light p-3 mb-2" href="#">Export</a> -->
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-borderless table-light">
            <thead style="border:none !important;">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Order</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Hewan</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Pelanggan</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($order)) {
                    $no = 1;
                    foreach ($order as $ord) {
                ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $ord['order_id']; ?></td>
                            <td><?= $ord['tanggal']; ?></td>
                            <td><?= $ord['nama_hewan']; ?></td>
                            <td><?= $ord['qty']; ?></td>
                            <td><?= $ord['harga']; ?></td>
                            <td><?= $ord['nama']; ?></td>

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