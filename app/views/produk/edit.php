<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Data Produk</h2>
    <form action="index.php?page=produk&action=update" method="POST">
        <input type="hidden" name="id" value="<?= $produk['id']; ?>">
        <p><label>Kode Barang:</label><br><input type="text" name="kode_barang" value="<?= htmlspecialchars($produk['kode_barang']); ?>" required></p>
        <p><label>Nama Produk:</label><br><input type="text" name="nama_produk" value="<?= htmlspecialchars($produk['nama_produk']); ?>" required></p>
        <p><label>Kategori:</label><br><input type="text" name="kategori" value="<?= htmlspecialchars($produk['kategori']); ?>" required></p>
        <p><label>Harga (Rp):</label><br><input type="number" name="harga" value="<?= htmlspecialchars($produk['harga']); ?>" required></p>
        <p><label>Stok:</label><br><input type="number" name="stok" value="<?= htmlspecialchars($produk['stok']); ?>" required></p>
        <button type="submit">Update Produk</button>
        <a href="index.php?page=produk&action=index">Batal</a>
    </form>
</body>
</html>