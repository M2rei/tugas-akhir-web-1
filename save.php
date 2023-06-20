<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai dari input
    if (isset($_POST['Pilih'])) {
        $type = $_POST['Pilih'];
    } else {
        exit();
    }
    
    if(isset($_POST['date'])){
        $date = $_POST['date'];
    } else {
        exit();
    }

    if(isset($_POST['description'])){
        $description = $_POST['description'];
    } else {
        exit();
    }

    if(isset($_POST['amount'])){
        $amount = $_POST['amount'];
    } else {
        exit();
    }

    // Sambungkan ke database
    $conn = mysqli_connect("localhost", "root", "", "tugasakhir");

    // Cek koneksi
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }

    // Query SQL untuk menyimpan catatan keuangan
    $query = "INSERT INTO catatan_keuangan (Pilih, date, description, amount) VALUES ('$type', '$date', '$description', '$amount')";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        echo "Catatan keuangan berhasil disimpan";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi ke database
    mysqli_close($conn);
}
?>
