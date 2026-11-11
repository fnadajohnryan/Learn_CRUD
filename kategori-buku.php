
<?php

require_once 'koneksi.php';

$sql = "SELECT * FROM tb_kategori_buku
        ORDER BY id_kategori_buku DESC";

$query = mysqli_query($conn, $sql);

if (!$query) {
    die("Query gagal: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Kategori Buku</title>
</head>

<body>

    <h2>Data Kategori Buku</h2>

    <a href="kategori-tambah.php">+ Tambah Kategori</a>

    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">

        <thead>
            <tr>
                <th>No</th>
                <th>ID Kategori</th>
                <th>Kategori Buku</th>
                <th>Created At</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php

            $no = 1;

            if (mysqli_num_rows($query) > 0) {

                while ($data = mysqli_fetch_assoc($query)) {

            ?>

            <tr>

                <td><?= $no++; ?></td>

                <td>
                    <?= $data['id_kategori_buku']; ?>
                </td>

                <td>
                    <?= htmlspecialchars($data['kategori_buku']); ?>
                </td>

                <td>
                    <?= htmlspecialchars($data['created_at']); ?>
                </td>

                <td>

                    <a href="kategori-edit.php?id=<?= $data['id_kategori_buku']; ?>">
                        Edit
                    </a>

                    |

                    <form method="POST"
                          action="kategori-hapus.php"
                          style="display:inline;"
                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">

                        <input type="hidden"
                               name="id_kategori_buku"
                               value="<?= $data['id_kategori_buku']; ?>">

                        <button type="submit" name="hapus">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            <?php

                }

            } else {

            ?>

            <tr>
                <td colspan="5">Belum ada data kategori buku.</td>
            </tr>

            <?php } ?>

        </tbody>

    </table>

</body>
</html>
