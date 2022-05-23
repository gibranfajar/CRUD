<?php

$conn = new mysqli("localhost", "root", "", "db_crud");


if(isset($_POST['simpan'])){

    if( isset($_GET['hal']) && $_GET['hal'] == "edit") {
        // Edit data
        $edit = mysqli_query($conn, "UPDATE siswa SET nama='$_POST[nama]', kelas='$_POST[kelas]', jurusan='$_POST[jurusan]', jenis_kelamin='$_POST[jeniskelamin]', updated_at=now() WHERE id='$_GET[id]' ");
        if($edit) {
            echo '<div class="alert alert-success alert-dismissible fade show container d-flex flex-column jusfify-content-center col-md-7 mt-2" role="alert">
                    Edit data SUKSES!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } else {
            echo '<div class="alert alert-success alert-dismissible fade show container d-flex flex-column jusfify-content-center col-md-7 mt-2" role="alert">
                    Edit data GAGAL!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
        }
    } else {
        // Simpan data baru
        $save = mysqli_query($conn, "INSERT INTO siswa (nama,kelas,jurusan,jenis_kelamin) VALUES ('$_POST[nama]','$_POST[kelas]','$_POST[jurusan]','$_POST[jeniskelamin]')");
        if($save){
            echo '<div class="alert alert-success alert-dismissible fade show container d-flex flex-column jusfify-content-center col-md-7 mt-2" role="alert">
                    Simpan data SUKSES!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show col-md-7" role="alert">
                    Simpan data GAGAL!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
}

// Pengujian apakah data akan diedit atau dihapus
if(isset($_GET['hal'])){
    if($_GET['hal']=="edit") {
        // menampilkan data yang akan diedit
        $tampil = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);
        if($data){
            $vnama = $data['nama'];
            $vkelas = $data['kelas'];
            $vjurusan = $data['jurusan'];
            $vjeniskelamin = $data['jenis_kelamin'];
        }
    } else if($_GET['hal']=="hapus"){
        // jika data akan dihapus
        $hapus = mysqli_query($conn, "UPDATE siswa SET deleted_at=now() WHERE id='$_GET[id]' ");
        if($hapus){
            echo '<div class="alert alert-success alert-dismissible fade show container d-flex flex-column jusfify-content-center col-md-7 mt-2" role="alert">
                    Hapus data SUKSES!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
        }
    }
}
