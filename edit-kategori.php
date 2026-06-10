<?php
include('akses.php');
include('../koneksi.php');

$id = $_GET['id'];
$pilih = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'");
$kategori = mysqli_fetch_assoc($pilih);
?>

<h4 class="text-center mt-2 mb-4">
    <i class="fa fa-tags"></i>Edit Kategori Pengaduan <?php echo $id ?>
</h4>

<form action="#" method="post">
    <div class="mb-3">
        <label class="form-label fw-bold text-muted">Kategori Pengaduan</label>
        <input value="<?php echo $kategori['ket_kategori']; ?>" type="text" name="ket_kategori" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success w-100" name="tombol">
        <i class="fa fa-save"></i>SIMPAN
    </button>
</form>

<?php
if(isset($_POST['tombol'])) {
    $ket = $_POST['ket_kategori'];
    $data = mysqli_query($koneksi, "UPDATE kategori SET ket_kategori='$ket' WHERE id_kategori='$id'");

    if($data) {
        echo "<script>alert('✅ Data sukses di update.'); window.location.assign('?page=kategori');</script>";
    } else {
        echo "<script>alert('❌ Data gagal di update'); window.location.assign('?page=kategori');</script>";
    }
}
?>