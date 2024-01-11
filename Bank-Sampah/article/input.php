<?php
include '../components/top.php';

$id = '';
$name = '';
$description = '';
$photo = '';
$id_user = $_SESSION['user_id'];
$actionUrl = 'input.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Fetch data for editing
  $result = mysqli_query($conn, "SELECT * FROM blog WHERE id='$id'");
  $data = mysqli_fetch_assoc($result);

  if ($data) {
    $name = $data['name'];
    $description = $data['description'];
    $photo = $data['photo'];
    $actionUrl = 'input.php?id=' . $id; // Update action URL for editing
  } else {
    // Handle invalid blog id, redirect to index or show an error message
    $_SESSION['error_message'] = "Blog not found.";
    header("location:index.php");
    exit();
  }
}

if (isset($_POST['simpan'])) {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $photo = $_FILES['photo'];

  // Validations and error handling
  if (empty($name) || empty($description)) {
    $_SESSION['error_message'] = "Judul dan Deskripsi wajib diisi.";
    header("location:$actionUrl");
    exit();
  }

  // Check if it's an update or insert
  if ($id != '') {
    handleUpdate($conn, $id, $name, $description, $photo);
  } else {
    handleInsert($conn, $name, $description, $photo, $id_user);
  }
}

function handleUpdate($conn, $id, $name, $description, $photo)
{
  if ($photo['error'] == UPLOAD_ERR_NO_FILE) {
    // Update without changing the photo
    $result = mysqli_query($conn, "UPDATE blog SET name='$name', description='$description' WHERE id='$id'");
  } else {
    // Update with a new photo
    $md_image_ext = handleFileUpload($conn, $id, $name, $description, $photo);
    $result = mysqli_query($conn, "UPDATE blog SET name='$name', description='$description', photo='$md_image_ext' WHERE id='$id'");
  }

  redirectToIndex($result);
}

function handleInsert($conn, $name, $description, $photo, $id_user)
{
  // Generate a unique name for the file
  $md_image_ext = handleFileUpload($conn, null, $name, $description, $photo);

  $result = mysqli_query($conn, "INSERT INTO blog (name, description, photo, id_user) VALUES ('$name','$description','$md_image_ext','$id_user')");
  redirectToIndex($result);
}

function handleFileUpload($conn, $id, $name, $description, $photo)
{
  // File upload logic, similar to the previous code
  // ...

  // Define the destination path
  $md_image_ext = md5(uniqid()) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
  $destinationPath = '../assets/upload/blog/' . $md_image_ext;

  if ($photo['size'] < 1044070) {
    move_uploaded_file($photo['tmp_name'], $destinationPath);
  }

  return $md_image_ext; // Return the generated image filename
}

function redirectToIndex($result)
{
  if ($result) {
    $_SESSION['message'] = "Blog berhasil disimpan";
  } else {
    $_SESSION['error_message'] = "Blog gagal disimpan";
  }
  header("location:index.php");
  exit();
}
?>

<div id="artikel" class="container px-5 mt-5 mb-5">
  <h2 class="mb-4 text-center fw-bolder">Buat / Edit</h2>
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
  <!-- Form for creating and editing articles -->
  <form method="post" action="<?= $actionUrl ?>" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="name" class="form-label">Judul</label>
      <input type="text" class="form-control" name="name" value="<?= $name ?? '' ?>" required>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Deskripsi</label>
      <textarea class="form-control" name="description" rows="3" required><?= $description ?? '' ?></textarea>
    </div>
    <div class="mb-3">
      <label for="photo" class="form-label">Foto</label>
      <input type="file" class="form-control" name="photo" <?= isset($photo) ? '' : 'required' ?>>
    </div>
    <button type="submit" class="btn btn-ijo" name="simpan">Simpan</button>
  </form>
</div>

<?php include '../components/bottom.php';
?>