<?php
include('akses.php');
include('../koneksi.php');
?>

<h4 class="text-center">
    <i class="fa fa-tags"></i>Kategori Pengaduan
</h4>

<a href="?page=tambah-kategori" class="btn btn-secondary mt-2 mb-2">
    <i class="fa fa-plus"></i>Tambah Kategori
</a>

<table class="table table-bordered table-light mt-2">
    <tr class="fw-bold">
        <td>No.</td>
        <td>Kategori</td>
        <td>Kelola</td>
    </tr>

    <?php
    $no = 1;
    $data = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");

    foreach($data as $kategori) {?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $kategori['ket_kategori']; ?></td>

        <td>
            <a href="?page=edit-kategori&id=<?php echo $kategori['id_kategori']; ?>" class="btn btn-outline-warning text-warning">
                <i class="fa fa-pencil"></i>
            </a>

            <a href="#" class="btn btn-outline-danger text-danger" onclick="hapus('Hapus data <?php echo $kategori['ket_kategori']; ?>?', <?php echo $kategori['id_kategori']; ?>)">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
    <?php } ?>
</table>

<script>
    function hapus(pesan, id_kategori) {
        if (confirm(pesan)) {
            window.location.href = '?page=hapus-kategori&id=' + id_kategori;
        }
    }
</script>