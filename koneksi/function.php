<?php
$conn = new mysqli("localhost", "root", "", "db_sindycart");
if ($conn->connect_errno) {
  printf("Koneksi gagal: %s\n", $conn->connect_error);
  exit();
}
?>