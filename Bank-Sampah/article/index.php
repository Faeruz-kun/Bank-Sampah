<?php
include '../components/top.php';

// session_start();
if($_SESSION['login'] == null){
  header("Location: ../pages/index.php");
}
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM blog WHERE id_user = $id;
";
$result = $conn->query($sql);
?>

<div id="artikel" class="container px-5 mt-5 mb-5">
  <h2 class="mb-4 text-center fw-bolder">Artikel Kami</h2>
  <a href="input.php" class="btn btn-ijo mb-2">Buat Artikel</a>

  <?php

  if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
      . $_SESSION['message'] .
      '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    unset($_SESSION['message']);
  }

  if (isset($_SESSION['error_message'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
      . $_SESSION['error_message'] .
      '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    unset($_SESSION['error_message']);
  }
  ?>

  <?php
  // Check if any articles were fetched
  if ($result->num_rows > 0) {
  ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Judul</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Foto</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Loop through the fetched articles
        while ($row = $result->fetch_assoc()) {
        ?>
          <tr>
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><img src="../assets/upload/blog/<?php echo $row['photo']; ?>" alt="Article Image" style="max-width: 100px; max-height: 100px;"></td>
            <td>
              <a href="input.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
              <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  <?php
  } else {
    // Display a message if there are no articles
  ?>
    <p class="text-center">Tidak ada artikel saat ini.</p>
  <?php
  }
  ?>
</div>

<?php include '../components/bottom.php' ?>