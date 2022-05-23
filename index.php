<?php
include 'function.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD RPL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .background {
            background: rgb(27, 83, 210);
            background: linear-gradient(90deg, rgba(27, 83, 210, 1) 0%, rgba(9, 21, 121, 1) 50%, rgba(0, 219, 255, 1) 100%);
        }

        .background-data {
            background: rgb(136, 0, 255);
            background: linear-gradient(90deg, rgba(136, 0, 255, 1) 0%, rgba(255, 38, 38, 1) 45%, rgba(255, 0, 254, 1) 100%);
        }
    </style>
</head>

<body class="bg-light">
    <!-- Create Data -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header background text-light">
                    <h3>Tambah/Edit Data</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-2">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" value="<?= @$vnama ?>" name="nama" id="nama" required>
                        </div>
                        <div class="mb-2">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" value="<?= @$vkelas ?>" name="kelas" id="kelas" required>
                        </div>
                        <div class="mb-2">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" value="<?= @$vjurusan ?>" name="jurusan" id="jurusan" required>
                        </div>
                        <div class="mb-2">
                            <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="<?= @$vjeniskelamin ?>" name="jeniskelamin" id="jeniskelamin" required>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- View Data -->
    <div class="row justify-content-center mt-4 mb-5">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header background-data text-light">
                    <h3>Data Siswa</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Tanggal Dibuat</th>
                                    <th scope="col">Tanggal Diupdate</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $tampil = mysqli_query($conn, "SELECT * FROM siswa order by id asc");
                                while ($data = mysqli_fetch_array($tampil)) :
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['kelas']; ?></td>
                                        <td><?= $data['jurusan']; ?></td>
                                        <td><?= $data['jenis_kelamin']; ?></td>
                                        <td><?= $data['created_at']; ?></td>
                                        <td><?= $data['updated_at']; ?></td>
                                        <td>
                                            <a href="index.php?hal=edit&id=<?= $data['id'] ?>" class="btn btn-warning text-dark m-1"> Edit </a>
                                            <a href="index.php?hal=hapus&id=<?= $data['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
                                        </td>
                                    </tr>

                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>