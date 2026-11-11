
<?php

date_default_timezone_set("Asia/Jakarta");

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_phpjohn"
);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

?>
