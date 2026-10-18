<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
</head>
<body>
    <h2>Katalog Data Produk</h2>
    <a href="index.php?page=produk&action=create">+ Tambah Produk Baru</a>
    <br><br>

    <?php if (isset($_SESSION['msg'])): ?>
        <div style="padding: 10px; margin-bottom: 15px; color: white; background-color: <?= $_SESSION['msg_type'] === 'success' ? 'green' : 'red'; ?>;">
            <?= $_SESSION['msg']; ?>
        </div>
        <?php unset($_SESSION['msg'], $_SESSION['msg_type']); ?>
    <?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($produk)): ?>
                <?php $no = 1; foreach ($produk as $item): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($item['kode_barang']); ?></td>
                        <td><?= htmlspecialchars($item['nama_produk']); ?></td>
                        <td><?= htmlspecialchars($item['kategori']); ?></td>
                        <td>Rp <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                        <td><?= htmlspecialchars($item['stok']); ?></td>
                        <td>
                            <a href="index.php?page=produk&action=edit&id=<?= $item['id']; ?>">Edit</a> | 
                            <a href="index.php?page=produk&action=delete&id=<?= $item['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Data produk masih kosong.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>