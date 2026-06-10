<?php
include('akses.php');
include('../koneksi.php');

$id = $_GET['id'];

$hapus = mysqli_query(
    $koneksi,
    "DELETE FROM kategori WHERE id_kategori='$id'"
);

if($hapus){
    echo "<script>
            alert('Data berhasil dihapus');
            window.location='?page=kategori';
          </script>";
}else{
    echo mysqli_error($koneksi);
}
?>