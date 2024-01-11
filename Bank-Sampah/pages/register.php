<?php
include "../conn.php";

$name = '';
$email = '';
$password = '';

if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  // Validasi data input (sesuaikan dengan kebutuhan Anda)
  if (empty($name) || empty($email) || empty($password)) {
    $_SESSION['error_message'] = "Semua kolom harus diisi.";
  } else {
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    $result = $conn->query($sql);
    // var_dump($result);
    if ($result) {
      // Registrasi sukses
      header("Location: ./login.php");
      exit();
    } else {
      $_SESSION['error_message'] = "Gagal melakukan registrasi.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #d4edda;
      /* Hijau Lime */
    }

    .card {
      margin-top: 100px;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Register</h5>
            <!-- Form registrasi disini -->
            <form action="register.php" method="post">
              <!-- Isi form registrasi sesuai kebutuhan -->
              <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" name="register" class="btn btn-primary">Register</button>
              <a href="index.php" class="btn btn-danger"> kembali </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>