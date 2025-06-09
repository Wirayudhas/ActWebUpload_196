<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['filename'])) {
        $filename = basename($_POST['filename']); // amankan nama file

        $filepath = "uploads/" . $filename;

        if (file_exists($filepath)) {
            if (unlink($filepath)) {
                echo "File '$filename' berhasil dihapus.";
            } else {
                echo "Gagal menghapus file '$filename'.";
            }
        } else {
            echo "File '$filename' tidak ditemukan.";
        }
    } else {
        echo "Nama file tidak diberikan.";
    }
} else {
    echo "Metode request tidak didukung.";
}
?>
