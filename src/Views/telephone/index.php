<?php $this->layout('layout') ?>

<header class="mb-2">
    <h1 class="mb-2">Daftar Nomor Telepon</h1>
    <button class="btn btn-primary d-inline my-3 me-2 px-3 py-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Item</button>
</header>

<main class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Dibuat Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['nama'] ?></td>
                    <td><?= $item['telepon'] ?></td>
                    <td><?= $item['created_at'] ?></td>
                    <td>
                        <div class="d-flex gap-2">
                            <div class="me-2">
                                <input style="display:none;" class="data-id" value="<?= $item['id'] ?>">
                                <input style="display:none;" class="data-nama" value="<?= $item['nama'] ?>">
                                <input style="display:none;" class="data-telepon" value="<?= $item['telepon'] ?>">
                                <button type="submit" class="btn btn-secondary px-3 py-2 bahrui-data"
                                    data-bs-toggle="modal" data-bs-target="#modalEdit">Edit Data</button>
                            </div>
                            <form class="ms-2" method="POST" action="./data/hapus">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button type="submit" class="btn btn-danger px-3 py-2">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<footer class="mt-3">
    <div class="py-3 mt-4 text-end">
        <p>&copy; 2025 Data Telephone</p>
    </div>
</footer>
<?php $this->insert('telephone/modal/tambah_data'); ?>
<?php $this->insert('telephone/modal/edit_data'); ?>
