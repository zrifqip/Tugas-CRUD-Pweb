<?php

include("config.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];
    $sql = $pdo->prepare("SELECT foto FROM siswa WHERE id=:id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $data = $sql->fetch();
    // buat query hapus
    $sql = "DELETE FROM calon_siswa WHERE id=$id";

    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: list-siswa.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>