<?php include '../components/top.php';

$sql = "SELECT * FROM blog";
$result = $conn->query($sql);
?>


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