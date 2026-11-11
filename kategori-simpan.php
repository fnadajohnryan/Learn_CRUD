
<?php

require_once 'koneksi.php';

if (isset($_POST['simpan'])) {

    $kategori = trim($_POST['kategori_buku'] ?? '');

    if ($kategori == "") {
        die("Kategori buku tidak boleh kosong!");
    }

    $sql = "INSERT INTO tb_kategori_buku (kategori_buku)
            VALUES (?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $kategori);

    $query = mysqli_stmt_execute($stmt);

    if ($query) {

        echo "<script>
            alert('Kategori berhasil ditambahkan!');
            window.location='kategori-buku.php';
        </script>";

    } else {

        echo "<script>
            alert('Kategori gagal ditambahkan!');
            window.location='kategori-buku.php';
        </script>";

    }

    mysqli_stmt_close($stmt);

} else {

    header("Location: kategori-buku.php");
    exit;

}

?>
