<?php
// Panggil koneksi database
include "koneksidb.php";
// Persiapan hapus data
if (isset($_POST['bhapus'])) {
    // Persiapan ubah data
    $hapus = mysqli_query($koneksidb, "DELETE FROM tb_member WHERE Nama = '$_POST[Nama]'");
    // Jika ubah sukses
    if ($hapus) {
        echo "<script> alert ('Hapus Data Berhasil');
        document.location='datamember.php';
        </script>";
    } else {
        echo "<script> alert ('Hapus Data Gagal');
        document.location='datamember.php';
        </script>";
    }
}
?>