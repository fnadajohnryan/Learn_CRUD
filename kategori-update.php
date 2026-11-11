
<?php

require_once 'koneksi.php';

if (isset($_POST['update'])) {

    $id = filter_var(
        $_POST['id_kategori_buku'] ?? '',
        FILTER_VALIDATE_INT
    );

    $kategori = trim($_POST['kategori_buku'] ?? '');

    if (!$id || $kategori == "") {
        die("Data kategori tidak valid!");
    }

    $sql = "UPDATE tb_kategori_buku
            SET kategori_buku = ?
            WHERE id_kategori_buku = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "si", $kategori, $id);

    $query = mysqli_stmt_execute($stmt);

    if ($query) {

        echo "<script>
            alert('Kategori berhasil diperbarui!');
            window.location='kategori-buku.php';
        </script>";

    } else {

        echo "<script>
            alert('Kategori gagal diperbarui!');
            window.location='kategori-buku.php';
        </script>";

    }

    mysqli_stmt_close($stmt);

} else {

    header("Location: kategori-buku.php");
    exit;

}

?>
