<?php
session_start();
include "../conn.php";
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM blog WHERE id=$id");
if ($result) {
  $_SESSION['message'] = "Blog Berhasil Dihapus";
  header("location:index.php");
} else {
  $_SESSION['error_message'] = "Blog Gagal Dihapus";
  header("location:index.php");
}
