<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Data Produk</h2>

    <?php if (isset($_SESSION['msg'])): ?>
        <p style="color: red;"><?= $_SESSION['msg']; ?></p>
        <?php unset($_SESSION['msg'], $_SESSION['msg_type']); ?>
    <?php endif; ?>

    <form action="index.php?page=produk&action=store" method="POST">
        <p><label>Kode Barang:</label><br><input type="text" name="kode_barang" required></p>
        <p><label>Nama Produk:</label><br><input type="text" name="nama_produk" required></p>
        <p><label>Kategori:</label><br><input type="text" name="kategori" required></p>
        <p><label>Harga (Rp):</label><br><input type="number" name="harga" required></p>
        <p><label>Stok:</label><br><input type="number" name="stok" required></p>
        <button type="submit">Simpan Produk</button>
        <a href="index.php?page=produk&action=index">Batal</a>
    </form>
</body>
</html>