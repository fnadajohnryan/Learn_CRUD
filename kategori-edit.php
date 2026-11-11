
<?php

require_once 'koneksi.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    die("ID kategori tidak valid!");
}

$sql = "SELECT * FROM tb_kategori_buku
        WHERE id_kategori_buku = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data kategori tidak ditemukan!");
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Kategori Buku</title>
</head>

<body>

    <h2>Edit Kategori Buku</h2>

    <form method="POST" action="kategori-update.php">

        <input
            type="hidden"
            name="id_kategori_buku"
            value="<?= $data['id_kategori_buku']; ?>"
        >

        <label>Kategori Buku</label>

        <br>

        <input
            type="text"
            name="kategori_buku"
            value="<?= htmlspecialchars($data['kategori_buku'], ENT_QUOTES, 'UTF-8'); ?>"
            maxlength="255"
            required
        >

        <br><br>

        <button type="submit" name="update">
            Update
        </button>

        <a href="kategori-buku.php">Kembali</a>

    </form>

</body>
</html>
