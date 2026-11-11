
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori Buku</title>
</head>

<body>

    <h2>Tambah Kategori Buku</h2>

    <form method="POST" action="kategori-simpan.php">

        <label>Kategori Buku</label>

        <br>

        <input
            type="text"
            name="kategori_buku"
            maxlength="255"
            required
        >

        <br><br>

        <button type="submit" name="simpan">
            Simpan
        </button>

        <a href="kategori-buku.php">Kembali</a>

    </form>

</body>
</html>
