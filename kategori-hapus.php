
<?php

require_once 'koneksi.php';

if (isset($_POST['hapus'])) {

    $id = filter_var(
        $_POST['id_kategori_buku'] ?? '',
        FILTER_VALIDATE_INT
    );

    if (!$id) {
        die("ID kategori tidak valid!");
    }

    $sql = "DELETE FROM tb_kategori_buku
            WHERE id_kategori_buku = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    $query = mysqli_stmt_execute($stmt);

    if ($query) {

        echo "<script>
            alert('Kategori berhasil dihapus!');
            window.location='kategori-buku.php';
        </script>";

    } else {

        echo "<script>
            alert('Kategori gagal dihapus!');
            window.location='kategori-buku.php';
        </script>";

    }

    mysqli_stmt_close($stmt);

} else {

    header("Location: kategori-buku.php");
    exit;

}

?>
