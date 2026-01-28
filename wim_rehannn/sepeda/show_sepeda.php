<?php
session_start();
$_SESSION['menu'] = "Sepeda";
include "../includes/header.php";
include "../includes/koneksi.php";
?>
<?php
if (isset($_SESSION['level'])) {
    ?>
    <!-- Awal Konten User -->
    <div class="container vh-custom">
        <h1>Daftar Sepeda</h1>
        <table class="table tb-dark">
            <tr>
                <td>NO</td>
                <td>Tipe Sepeda</td>
                <td>Harga</td>
                <td>Keterangan</td>
                <td colspan="2">Aksi</td>
            </tr>
            <?php
                $sql = "SELECT * FROM tb_sepeda";
                $sql_eksekusi = mysqli_query($koneksi, $sql);
                $no = 1;
                while ($data = mysqli_fetch_array($sql_eksekusi)) {
                    ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['tipe_sepeda']; ?></td>
                    <td><?= $data['harga']; ?></td>
                    <td><?= $data['ket_sepeda']; ?></td>
                    <td>ubah</td>
                    <td>hapus</td>
                </tr>
            <?php
                }
                ?>
        </table>
    </div>
    <!-- Akhir Konten User -->


<?php
} else {
    ?>
    <!-- Awal Konten  -->
    <div class="container vh-custom">
        <h1>Halaman ini akan menampilkan Sepeda
            <i class="bi bi-bicycle"></i>
        </h1>
    </div>
    <!-- Akhir Konten -->



<?php
}

include "../includes/footer.php";
?>