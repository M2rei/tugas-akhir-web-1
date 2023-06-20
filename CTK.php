<!DOCTYPE html>
<html>
<head>
  <title>Buku Tabungan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    @media screen and (max-width: 770px) {
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
            <a href="login.php" class="btn btn-primary">halaman login</a>
        </nav>
    </header>
    <form id="Form" action="save.php" method="post">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h3>pendataan Catatan Tabungan</h3>
                    <div class="mb-3">
                        <label for="Pilih" class="form-label">Pilih:</label>
                        <select class="form-control" id="Pilih" name="Pilih">
                            <option value="Uang Masuk">Uang Masuk</option>
                            <option value="Uang Keluar">Uang Keluar</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi:</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Jumlah:</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </form>
    <form id="DeleteForm" action="delete.php" method="post">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h3>Hapus dataCatatan Tabungan</h3>
                    <div class="mb-3">
                        <label for="deleteIndex" class="form-label">Pilih:</label>
                        <select class="form-control" id="deleteIndex" name="deleteIndex">
                            <option value="Uang Masuk">Uang Masuk</option>
                            <option value="Uang Keluar">Uang Keluar</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deleteDate" class="form-label">Tanggal:</label>
                        <input type="date" class="form-control" id="deleteDate" name="deleteDate" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </form>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3>Lihat Hasil Catatan Tabungan</h3>
                <p>Silakan klik tombol "Hasil" untuk melanjutkan.</p>
                <a href="hasil.php" class="btn btn-primary">Hasil</a>
            </div>
        </div>
    </div>
    
    <script>
      // Menangani submit form tambah catatan
      document.getElementById("Form").addEventListener("submit", function(event) {
        event.preventDefault(); // Mencegah pengiriman form

        // Ambil nilai dari input
        const type = document.getElementById("Pilih").value;
        const date = document.getElementById("date").value;
        const description = document.getElementById("description").value;
        const amount = parseFloat(document.getElementById("amount").value);

        // Sambungkan ke server
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "save.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
          if (xhr.status === 200) {
            console.log(xhr.responseText);
            // Reset form
            document.getElementById("Form").reset();
          } else {
            console.error(xhr.statusText);
          }
        };
        xhr.send(`Pilih=${type}&date=${date}&description=${description}&amount=${amount}`);
      });

      // Menangani submit form hapus catatan
      document.getElementById("DeleteForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Mencegah pengiriman form

        // Ambil nilai indeks dari input
        const deleteIndex = document.getElementById("deleteIndex").value;
        const deleteDate = document.getElementById("deleteDate").value;

        // Sambungkan ke server
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "delete.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
          if (xhr.status === 200) {
            console.log(xhr.responseText);
            // Reset form
            document.getElementById("DeleteForm").reset();
          } else {
            console.error(xhr.statusText);
          }
        };
        xhr.send(`deleteIndex=${deleteIndex}&deleteDate=${deleteDate}`);
      });
    </script>
</body>
</html>
