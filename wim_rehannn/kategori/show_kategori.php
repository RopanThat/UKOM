<?php
session_start();
$_SESSION['menu'] = "Kategori";
include "../includes/header.php";
include "../includes/koneksi.php";
?>

<?php
if (isset($_SESSION['level'])) {
?>
    <!-- Ini tampilan untuk ADMIN -->
    <div class="container vh-custom">
        <h1>Selamat Datang <b><?= $_SESSION['username']; ?></b></h1>
        <hr>

        <!-- Awal Modal -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Kategori
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="input_kategori.php" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" id="" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label for="">Deskripsi Kategori</label>
                                    <textarea name="ket_kategori" id="" class="form-control" required></textarea>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Modal -->
        <table class="table mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Nomor</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi Kategori</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tb_kategori";
                $sql_eksekusi =  mysqli_query($koneksi, $sql);
                $nomor = 1;
                while ($data = mysqli_fetch_array($sql_eksekusi)) {
                    echo "<tr>";
                    echo "  <td>" . $nomor++ . "</td>";
                    echo "  <td>" . $data['nama_kategori'] . "</td>";
                    echo "  <td>" . $data['ket_kategori'] . "</td>";
                ?>
                    <td>
                        <!-- Awal Modal Ubah -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalubah<?= $nomor; ?>">
                            Ubah
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalubah<?= $nomor; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="update_kategori.php" method="post">

                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Kategori <?=  $data['nama_kategori']." | ID = ".$data['id_kategori']; ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="" class="mt-2">Nama kategori</label>
                                                    <input type="hidden" name="id_kategori" id="" value="<?= $data['id_kategori']; ?>">
                                                    <input type="text" name="nama_kategori" id="" class="form-control mt-1" value="<?= $data['nama_kategori']; ?>">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label for="" class="mt-2">Deskripsi</label>
                                                    <textarea name="ket_kategori" id="" class="form-control mt-1"><?= $data['ket_kategori']; ?></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <input type="submit" value="ubah data" class="btn btn-warning">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Ubah -->
                    </td>

                    <!-- Awal Modal Hapus -->
                    <!-- Button trigger modal -->
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $nomor; ?>">
                            Hapus
                        </button>
                    </td>

                    <!-- Modal -->
                    <div class="modal fade" id="modalhapus<?= $nomor; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus kategori <b><?= $data['nama_kategori']; ?></b>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <a href="hapus_kategori.php?id_kategori=<?= $data['id_kategori']; ?>" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Hapus -->
                <?php
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
    <!-- AKHIR ADMIN -->
<?php
} else {
?>
    <!-- Ini tampilan untuk UMUM -->
    <div class="container vh-custom">
        <h1>Website ini adalah website Official dari Wimcycle</h1>
    </div>
    <!-- AKHIR UMUM -->
<?php
}
?>

<?php                                                                                               
include "../includes/footer.php";
?>