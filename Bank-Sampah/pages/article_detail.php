<?php
include '../components/top.php';



// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
  $blogId = $_GET['id'];

  // Fetch article details from the database
  $sql = "SELECT * FROM blog WHERE id = $blogId";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
    <div id="artikel-detail" class="container px-5 mt-5 mb-5">
      <div class="text-center">
        <img src="../assets/upload/blog/<?php echo $row['photo']; ?>" class="img-fluid mb-4" alt="Article Image" />
      </div>
      <h2 class="mb-4 text-center fw-bolder"><?php echo $row['name']; ?></h2>
      <p><?php echo $row['description']; ?></p>
    </div>
  <?php
  } else {
    // Display a message if the article with the given ID is not found
  ?>
    <p class="text-center">Artikel tidak ditemukan.</p>
  <?php
  }
} else {
  // Display a message if the 'id' parameter is not set in the URL
  ?>
  <p class="text-center">Artikel tidak ditemukan.</p>
<?php
}

// Close the database connection
$conn->close();

include '../components/bottom.php';
?>