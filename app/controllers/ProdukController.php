<?php
require_once __DIR__ . '/../models/ProdukModel.php';

class ProdukController {
    private $model;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->model = new ProdukModel();
    }

    public function index() {
        $produk = $this->model->getAll();
        require_once __DIR__ . '/../views/produk/index.php';
    }

    public function create() {
        require_once __DIR__ . '/../views/produk/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['kode_barang']) || empty($_POST['nama_produk']) || empty($_POST['kategori']) || empty($_POST['harga']) || empty($_POST['stok'])) {
                $_SESSION['msg'] = "Semua field wajib diisi!";
                $_SESSION['msg_type'] = "error";
                header("Location: index.php?page=produk&action=create");
                exit;
            }

            $data = [
                'kode_barang' => trim($_POST['kode_barang']),
                'nama_produk' => trim($_POST['nama_produk']),
                'kategori'    => trim($_POST['kategori']),
                'harga'       => $_POST['harga'],
                'stok'        => $_POST['stok']
            ];

            if ($this->model->create($data)) {
                $_SESSION['msg'] = "Data produk berhasil ditambahkan!";
                $_SESSION['msg_type'] = "success";
            } else {
                $_SESSION['msg'] = "Gagal menambahkan data produk.";
                $_SESSION['msg_type'] = "error";
            }

            header("Location: index.php?page=produk&action=index");
            exit;
        }
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $produk = $this->model->getById($id);
            require_once __DIR__ . '/../views/produk/edit.php';
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $data = [
                'kode_barang' => trim($_POST['kode_barang']),
                'nama_produk' => trim($_POST['nama_produk']),
                'kategori'    => trim($_POST['kategori']),
                'harga'       => $_POST['harga'],
                'stok'        => $_POST['stok']
            ];

            if ($this->model->update($id, $data)) {
                $_SESSION['msg'] = "Data produk berhasil diperbarui!";
                $_SESSION['msg_type'] = "success";
            } else {
                $_SESSION['msg'] = "Gagal memperbarui data produk.";
                $_SESSION['msg_type'] = "error";
            }

            header("Location: index.php?page=produk&action=index");
            exit;
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            if ($this->model->delete($id)) {
                $_SESSION['msg'] = "Data produk berhasil dihapus!";
                $_SESSION['msg_type'] = "success";
            } else {
                $_SESSION['msg'] = "Gagal menghapus data produk.";
                $_SESSION['msg_type'] = "error";
            }
            header("Location: index.php?page=produk&action=index");
            exit;
        }
    }
}