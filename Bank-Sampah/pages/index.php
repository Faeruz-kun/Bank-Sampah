<?php include '../components/top.php';
$sql = "SELECT * FROM blog";
$result = $conn->query($sql);
?>
<section class="hero">
  <div class="container p-4">
    <div class="row">
      <div class="col-md-6 order-sm-2 order-md-1" style="margin-top: 95px;">
        <h2 class="me-auto">
          <strong class="text-uppercase">Welcome To <span> MaPah.id </span></strong>
        </h2>
        <p class="fs-4"></p>
        <p>
          Sistem Informasi Manajemen Bank Sampah
        </p>
        <a href="#about" class="btn">Explore</a>
      </div>
      <div class="col-md-6 order-sm-1 order-md-2 ">
        <img src="../assets/logo.png" alt="" width="100%" />
      </div>
    </div>
  </div>
</section>
<div class="container-fluid bg-regul">
  <div class="overlay"></div>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col-md-9">
      <div class="heading-text">
        <h2>Regulasi Peraturan</h2>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="card card-regulasi" style="height: 100%;">
            <div class="card-body">
              <h5 class="card-title">Peraturan Presiden Republik Indonesia Nomor 83 tahun 2018</h5>
              <hr>
              <p class="card-t">Penanganan Sampah Laut</p>

            </div>
            <div class="card-footer">
              <button class="btn btn-ijo w-100">Download</button>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-regulasi" style="height: 100%;">
            <div class="card-body">
              <h5 class="card-title">Undang-undang Republik Indonesia Nomor 18 Tahun 2008 </h5>
              <hr>
              <p class="card-t">Pengelolaan Sampah </p>

            </div>
            <div class="card-footer">
              <button class="btn btn-ijo w-100">Download</button>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-regulasi" style="height: 100%;">
            <div class="card-body">
              <div class="card-title">Permen Lingkungan Hidup dan Kehutanan Nomor 14 Tahun 2021</div>
              <hr>
              <p class="card-t">Pengelolaan Sampah Pada Bank Sampah</p>

            </div>
            <div class="card-footer">
              <button class="btn btn-ijo w-100">Download</button>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-regulasi" style="height: 100%;">
            <div class="card-body">
              <h5 class="card-title">Peraturan Menteri Lingkungan Hidup dan Kehutanan Nomor 6 Tahun 2022</h5>
              <hr>
              <p class="card-t">Sistem Informasi Pengelolaan Sampah Nasional</p>

            </div>
            <div class="card-footer">
              <button class="btn btn-ijo w-100">Download</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="about" class="container px-5 mt-5 mb-5">
  <div class="me-auto text-center" style="padding-left: 150px;padding-right:150px">
    <h2 class="mb-4 fw-bolder">Tentang Kami</h2>
    <p class="fs-5">
      MaPa.id adalah aplikasi online resmi untuk mengintegrasikan database Bank Sampah di seluruh Indonesia.
    </p>
    <p class="fs-5">
      Bank Sampah adalah fasilitas untuk mengelola sampah dengan prinsip 3R (Reduce, Reuse, dan Recycle), sebagai sarana edukasi, perubahan perilaku dalam pengelolaan sampah, dan pelaksanaan ekonomi sirkular, yang dibentuk dan dikelola oleh masyarakat, badan usaha, dan/atau pemerintah daerah (Peraturan Menteri LH No. 14 Tahun 2021).
    </p>
  </div>
</div>
<div id="artikel" class="container px-5 mt-5 mb-5">
  <h2 class="mb-4 text-center fw-bolder">Artikel Kami</h2>
  <?php
  // Check if any articles were fetched
  if ($result->num_rows > 0) {
  ?>
    <div class="row">
      <?php
      // Loop through the fetched articles
      while ($row = $result->fetch_assoc()) {
      ?>
        <div class="col-md-3">
          <div class="card mb-3">
            <img src="../assets/upload/blog/<?php echo $row['photo']; ?>" class="card-img-top" alt="Article Image" />
            <div class="card-body">
              <h5 class="card-title mb-4">
                <?php echo $row['name']; ?>
              </h5>
              <p><?php echo $row['description']; ?></p>
              <a href="article_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-ijo w-100">Baca</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  <?php
  } else {
    // Display a message if there are no articles
  ?>
    <p class="text-center">Tidak ada artikel saat ini.</p>
    <div class="text-center">
      <img src="../assets/void.png" alt="No Article Image" class="img-fluid" style="max-width: 300px; margin-top: 20px;">
    </div>

  <?php
  }
  ?>
</div>


<?php include '../components/bottom.php' ?>