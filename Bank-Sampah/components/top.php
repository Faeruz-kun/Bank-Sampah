<?php
include "../conn.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bank Sampah</title>
  <link rel="stylesheet" href="../style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
  <?php
  session_start();

  $isLoggedIn = isset($_SESSION['user_id']);
  // var_dump($isLoggedIn);
  ?>

  <nav class="navbar navbar-dark navbar-expand-lg bg-nav">
    <div class="container">
      <a class="navbar-brand fw-bolder fs-2" href="#">MaPah.id</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="ms-auto">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../pages/index.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pages/article.php">Artikel</a>
            </li>
            <?php
            if ($isLoggedIn) {
              echo '
                <li class="nav-item">
                  <a class="nav-link" href="../article/index.php">Artikelmu</a>
                </li>
                ';
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="../pages/contact.php">Hubungi Kami</a>
            </li>
          </ul>
        </div>
        <div class="ms-auto">
          <ul class="navbar-nav">
            <li class="nav-item">
              <div class="nav-link ">
                <?php
                if ($isLoggedIn) {
                  // If logged in, show the Logout button
                  echo '<a class="btn btn-utama" href="../auth/logout.php">Logout</a>';
                } else {
                  // If not logged in, show the Daftar (Register) or Login button
                  echo '<a class="btn btn-utama ms-2" aria-current="page" href="../pages/register.php">Daftar</a>';
                  echo '<a class="btn btn-utama ms-2" href="../pages/login.php">Login</a>';
                }
                ?>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>