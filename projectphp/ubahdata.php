<?php
// Panggil koneksi database
include "koneksidb.php";
$tampil = mysqli_query($koneksidb, "SELECT * FROM tb_member where id = '$_GET[id]'");
$data = mysqli_fetch_array($tampil);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>Ubah Data</title>
</head>

<body>
    <form method="POST" name="ubah">
        <div class="col-md-6 mx-auto">
            <h2 class="text-center">Ubah Data Member</h2>
            <div class="col-md-6 mx-auto">
                <div class="mb-2">
                    <label for="Nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="Nama" value="<?php echo $data['Nama']; ?>">
                </div>
                <div class="mb-2">
                    <label for="Alamat">Alamat</label>
                    <input type="text" class="form-control" name="Alamat" value="<?php echo $data['Alamat']; ?>">
                </div>
                <div class="mb-2">
                    <label for="Telp">Telp</label>
                    <input type="number" class="form-control" name="Telp" value="<?php echo $data['Telp']; ?>">
                </div>
                <div class="mb-2">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name="Email" value="<?php echo $data['Email']; ?>">
                </div>
                <div class="mb-2">
                    <label for="Hobi">Hobi</label>
                    <input type="text" class="form-control" name="Hobi" value="<?php echo $data['Hobi']; ?>">
                </div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" name="btubah" type="submit">Simpan</button>
                <a href="datamember.php">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-danger" type="button">Batal</button>
                    </div>
                </a>
            </div>
        </div>
    </form>
</body>

</html>
<?php
include "koneksidb.php";
// Uji jika tombol ubah diklik
if (isset($_POST['btubah'])) {
    // Persiapan ubah data
    $ubah = mysqli_query($koneksidb, "UPDATE tb_member SET
    Nama = '$_POST[Nama]',
    Alamat = '$_POST[Alamat]',
    Telp = '$_POST[Telp]',
    Email = '$_POST[Email]',
    Hobi = '$_POST[Hobi]'
    Where id = '$_GET[id]'
    ");

    // Jika ubah sukses
    if ($ubah) {
        echo "<script> alert ('Ubah Data Berhasil');
    document.location='datamember.php';
    </script>";
    } else {
        echo "<script> alert ('Ubah Data Gagal');
    document.location='datamember.php';
    </script>";
    }
}
?>