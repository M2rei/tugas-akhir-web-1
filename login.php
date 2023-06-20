<!DOCTYPE html>
<html>
<head>
  <title>Masuk - Catatan Tabungan</title>
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
            <div class="container">
                <a class="navbar-brand" href="#">
                    <h1 class="m-0">Catatan Tabungan</h1>
                </a>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
        <div class="row"> 
            <div class="col-md-12">
                <h3>Masuk ke Catatan Tabungan</h3>
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Masuk</button>
                    <a href="baru.php" class="btn btn-primary">Buat Akun</a>
                </form>
            </div>
        </div>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil nilai dari input
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
        } else {
            exit();
        }
        
        if(isset($_POST['password'])){
            $password = $_POST['password'];
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

        // Query SQL untuk memeriksa username dan password
        $query = "SELECT * FROM akun WHERE username = '$username'";

        // Eksekusi query
        $result = mysqli_query($conn, $query);

        // Periksa apakah username ditemukan
        if (mysqli_num_rows($result) === 1) {
            // Ambil data pengguna dari hasil query
            $user = mysqli_fetch_assoc($result);

            // Periksa kecocokan password
            if (password_verify($password, $user['password'])) {
                // Login berhasil
                session_start();
                $_SESSION['username'] = $username;
                header("Location: CTK.php"); // Ganti dengan halaman tujuan setelah login berhasil
                exit();
            } else {
                // Password tidak cocok
                echo "Password salah";
            }
        } else {
            // Username tidak ditemukan
            echo "Username tidak ditemukan";
        }

        // Tutup koneksi ke database
        mysqli_close($conn);
    }
    ?>
</body>
</html>
