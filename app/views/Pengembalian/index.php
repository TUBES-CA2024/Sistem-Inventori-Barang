<?php
if (!isset($_SESSION['login'])) {
    header("Location: " . BASEURL . "Login");
    exit;
}
?>
<!-- modal keluar -->
<div class="modal fade" id="konfirmasiKeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 15px;">
            <div class="modal-body"
                style="display: flex; justify-content: center; flex-direction: column; align-items: center;">

                <lottie-player src="https://lottie.host/48c004f8-57cd-4acb-a04a-de46793ba7dc/jUGVFL9qIO.json"
                    background="#FFFFFF" speed="1" style="width: 250px; height: 250px" loop autoplay></lottie-player>
                <p style="color:#385161; opacity: 0.6; font-weight: 500; font-size: medium;">Apakah Anda yakin ingin keluar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" style="width: 100px;" data-dismiss="modal">Batal</button>
                <button type="button" style="width: 100px;" class="btn btn-danger"
                    onclick="location.href='<?= BASEURL; ?>Logout'">Keluar</button>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="content-beranda" style="overflow: hidden;">
        <h1 id="title" style="margin: 40px 0px 40px 15px;">Pengembalian</h1>
        <div class="flash" style="width: 40%; margin-left: 15px;">
            <?php Flasher::flash(); ?>
        </div>

        <div style="max-height: 400px; overflow-y: auto; box-shadow: 5px 5px 10px 0 rgba(0, 0, 0, 0.5); border-radius: 5px; padding: 15px;">
            <div style="height: 80px; display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; position: sticky; top: 0; background-color: #fff; z-index: 10;">
                <div class="dataTables_length"
                    style="display: inline-block; font-size: 14px; display: flex; justify-content: space-between; align-items: center;">
                    <label>
                        Show
                        <select name="entries_length" aria-controls="example" class="form-control form-control-sm"
                            style="width: auto; display: inline-block; margin-left: 5px; margin-right: 5px;">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        entries
                    </label>
                </div>

                <div style="display: flex; align-items: center; justify-content: flex-end; box-shadow: 5px 5px 10px 0 rgba(0, 0, 0, 0.5); border-radius: 8px; overflow: hidden; width: 320px;">
                    <button style="background-color: #0d1a4a; border: none; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20">
                            <path d="M10 2a8 8 0 016.32 12.9l5.38 5.38a1 1 0 01-1.42 1.42l-5.38-5.38A8 8 0 1110 2zm0 2a6 6 0 100 12 6 6 0 000-12z"></path>
                        </svg>
                    </button>
                    <input type="text" id="customSearch" class="form-control" placeholder="Cari"
                        style="border: none; outline: none; padding: 10px 15px; font-size: 16px; flex-grow: 1; height: 40px;">
                </div>
            </div>
            
            <table id="myTable" class="table table-hover table-sm" style="width:100%;">
    <thead class="table-info">
        <tr>
            <th>No.</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Sub Barang</th>    
            <th>Status</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        if (!empty($data['pengembalian'])):
            foreach ($data['pengembalian'] as $pengembalian): ?>
                <tr data-id="<?= $pengembalian['id_pengembalian'] ?? '' ?>" style="cursor: pointer;">
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($pengembalian['nama_peminjam']) ?></td>
                    <td><?= htmlspecialchars($pengembalian['tanggal_peminjaman']) ?></td>
                    <td><?= htmlspecialchars($pengembalian['tanggal_pengembalian']) ?></td>
                    <td><?= htmlspecialchars($pengembalian['sub_barang']) ?></td>
                    <td><?= htmlspecialchars($pengembalian['status_pengembalian']) ?></td>
                    <td><?= htmlspecialchars($pengembalian['keterangan']) ?></td>
                </tr>
            <?php endforeach;
        endif; ?>
    </tbody>
</table>

        </div>
    </div>
</div>
