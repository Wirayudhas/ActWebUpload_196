<?php
// Batasi folder target
$target_dir = "uploads/";

// Validasi parameter file
if (isset($_GET['file'])) {
    $filename = basename($_GET['file']); // Hindari path traversal
    $filepath = $target_dir . $filename;

    if (file_exists($filepath)) {
        if (unlink($filepath)) {
            echo "Berkas berhasil dihapus.";
        } else {
            echo "Gagal menghapus berkas.";
        }
    } else {
        echo "Berkas tidak ditemukan.";
    }
} else {
    echo "Parameter tidak lengkap.";
}
?>
