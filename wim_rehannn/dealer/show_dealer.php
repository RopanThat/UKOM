<?php
session_start();
$_SESSION['menu'] = "Dealer";
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
            Tambah dealer
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah dealer</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="input_dealer.php" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Nama dealer</label>
                                    <input type="text" placeholder="Masukkan Nama Dealer" name="nama_dealer" id="" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label for="">No Telephone</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">+62</span>
                                        <input type="number" class="form-control" placeholder="Masukkan No Telephone" name="no_telp" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" placeholder="Masukkan Alamat" class="form-control"></textarea>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Tambah" class="btn btn-primary">
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
                    <th>Nama dealer</th>
                    <th>Nomor Telephone</th>
                    <th>Alamat</th>
                    <th colspan='3'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM tb_dealer";
                    $sql_eksekusi =  mysqli_query($koneksi, $sql);
                    $nomor = 1;
                    while ($data = mysqli_fetch_array($sql_eksekusi)) {
                        echo "<tr>";
                        echo "  <td>" . $nomor++ . "</td>";
                        echo "  <td>" . $data['nama_dealer'] . "</td>";
                        echo "  <td>" . $data['no_telp'] . "</td>";
                        echo "  <td>" . $data['alamat'] . "</td>";
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
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Dealer <?=  $data['nama_dealer']." | ID = ".$data['id_dealer']; ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="update_dealer.php" method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="">Nama dealer</label>
                                                    <input type="hidden" name="id_dealer" id="" value="<?= $data['id_dealer']; ?>">
                                                    <input type="text" value="<?= $data['nama_dealer']; ?>" name="nama_dealer" id="" class="form-control">
                                                </div>
                                                <div class="col-12">
                                                    <label for="">No Telephone</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">+62</span>
                                                        <input type="number" class="form-control" value="<?= $data['no_telp']; ?>" name="no_telp" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="">Alamat</label>
                                                    <textarea name="alamat" class="form-control"><?= $data['alamat']; ?></textarea>
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
                                    Apakah anda yakin ingin menghapus dealer <b><?= $data['nama_dealer']; ?></b>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <a href="hapus_dealer.php?id_dealer=<?= $data['id_dealer']; ?>" class="btn btn-danger">Hapus</a>
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