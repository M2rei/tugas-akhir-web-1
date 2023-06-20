<!DOCTYPE html>
<html>
<head>
  <title>hasil Catatan Tabungan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    @media screen and (max-width: 770px) {
      .container {
        width: 400px;
        margin-top: 4px;
      }
      .mt-4 {
        margin-top: 4px;
      }
    }
  </style>
</head>
<body>
  <header>
    <nav class="navbar navbar-dark bg-primary">
      <div class="container text-center">
        <a class="navbar-brand" href="#">
          <h1 class="m-0">Catatan Tabungan</h1>
        </a>
      </div>
    </nav>
  </header>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <h3>Tabel Catatan Tabungan</h3>
        <?php
          // Sambungkan ke database
          $conn = mysqli_connect("localhost", "root", "", "tugasakhir");

          // Cek koneksi
          if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
          }

          // Query SQL untuk mengambil semua catatan keuangan
          $query = "SELECT * FROM catatan_keuangan";

          // Eksekusi query
          $result = mysqli_query($conn, $query);

          // Tampilkan data dalam bentuk tabel
          if (mysqli_num_rows($result) > 0) {
            echo "<table class='table'>
                    <thead>
                      <tr>
                      <th>keterangan</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                        <td>{$row['Pilih']}</td>
                      <td>{$row['date']}</td>
                      <td>{$row['description']}</td>
                      <td>{$row['amount']}</td>
                    </tr>";
            }
            echo "</tbody></table>";
          } else {
            echo "Tidak ada catatan keuangan.";
          }

          // Tutup koneksi ke database
          mysqli_close($conn);
        ?>
      </div>
    </div>
  </div>
  <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3>Kembali ke halaman Pendataan tabungan</h3>
                <p>Silakan klik tombol "kembali" untuk melanjutkan.</p>
                <a href="CTK.php" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</body>
</body>
</html>
