<?php
require_once __DIR__ . '/../app/controllers/ProdukController.php';

$page   = $_GET['page'] ?? 'produk';
$action = $_GET['action'] ?? 'index';

$controller = new ProdukController();

if ($page === 'produk') {
    switch ($action) {
        case 'create':
            $controller->create();
            break;
        case 'store':
            $controller->store();
            break;
        case 'edit':
            $controller->edit();
            break;
        case 'update':
            $controller->update();
            break;
        case 'delete':
            $controller->delete();
            break;
        default:
            $controller->index();
            break;
    }
} else {
    echo "Halaman tidak ditemukan.";
}