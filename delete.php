<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai dari input
    if (isset($_POST['deleteIndex'])) {
        $deleteIndex = $_POST['deleteIndex'];
    } else {
        echo "Pilihan penghapusan tidak valid";
        exit();
    }

    if (isset($_POST['deleteDate'])) {
        $deleteDate = $_POST['deleteDate'];
    } else {
        echo "Tanggal penghapusan tidak valid";
        exit();
    }

    // Sambungkan ke database
    $conn = mysqli_connect("localhost", "root", "", "tugasakhir");

    // Cek koneksi
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }

    // Escape string untuk mencegah SQL Injection
    $deleteIndex = mysqli_real_escape_string($conn, $deleteIndex);
    $deleteDate = mysqli_real_escape_string($conn, $deleteDate);

    // Query SQL untuk menghapus catatan keuangan
    $deleteQuery = "DELETE FROM catatan_keuangan WHERE Pilih = '$deleteIndex' AND date = '$deleteDate'";

    // Eksekusi query penghapusan
    if (mysqli_query($conn, $deleteQuery)) {
        echo "Catatan keuangan berhasil dihapus";
    } else {
        echo "Error: " . $deleteQuery . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi ke database
    mysqli_close($conn);
}
?>
