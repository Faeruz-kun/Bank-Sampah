<?php
include "../conn.php";
session_start();
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $_SESSION['login'] = TRUE;
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['message'] = "Login successfully";
    header("Location: ../article/index.php");
    exit();
  } else {
    $_SESSION['error_message'] = "Failed to login";
    header("Location: ./login.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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
            <h5 class="card-title">Login</h5>
            <!-- Form login disini -->
            <?php


            if (isset($_SESSION['error_message'])) {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
                . $_SESSION['error_message'] .
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
              unset($_SESSION['error_message']);
            }
            ?>
            <form action="login.php" method="post">
              <!-- Isi form login sesuai kebutuhan -->
              <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" name="login" class="btn btn-primary">Login</button>
              <a href="index.php" class="btn btn-danger"> kembali </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>