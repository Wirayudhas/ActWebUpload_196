<?php
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true);
}

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Cek file sudah ada atau belum
if (file_exists($target_file)) {
    echo "Maaf, file sudah ada.";
    $uploadOk = 0;
}

// Cek ukuran file max 5MB (5 * 1024 * 1024)
if ($_FILES["fileToUpload"]["size"] > 5 * 1024 * 1024) {
    echo "Maaf, ukuran file terlalu besar.";
    $uploadOk = 0;
}

// Izinkan tipe tertentu (contoh: jpg, png, gif, pdf)
$allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
if (!in_array($fileType, $allowedTypes)) {
    echo "Maaf, hanya file JPG, JPEG, PNG, GIF, dan PDF yang diperbolehkan.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "File tidak dapat diupload.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " berhasil diupload.";
    } else {
        echo "Terjadi kesalahan saat upload file.";
    }
}
?>
