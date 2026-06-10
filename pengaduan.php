<?php
include('akses.php');
include('../koneksi.php');

function status($status) {
    if ($status == 'Menunggu') {
        echo '<div class="badge bg-warning">⏳ '.$status.'</div>';
    } elseif ($status == 'Proses') {
        echo '<div class="badge bg-info">🔄 '.$status.'</div>';
    } else {
        echo '<div class="badge bg-success">✅ '.$status.'</div>';
    }
}
?>

<h4 class="text-center"><i class="fa fa-message"></i> Daftar Pengaduan</h4>

<table class="table table-bordered table-striped">
    <tr class="fw-bold">
        <td>No.</td>
        <td>NISN</td>
        <td>Kelas</td>
        <td>Kategori</td>
        <td>Keterangan</td>
        <td>Status</td>
        <td>Tanggapi</td>
    </tr>

    <?php
    $no = 1;

    $sql = "SELECT * FROM input_aspirasi, aspirasi, kategori WHERE 
    input_aspirasi.id_kategori=kategori.id_kategori AND
    input_aspirasi.id_pelaporan=aspirasi.id_pelaporan";

    $data = mysqli_query($koneksi, $sql);

    foreach($data as $pengaduan) { ?>
    <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $pengaduan['nis']; ?></td>

        <?php
        $pilih_kelas = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$pengaduan[nis]'");

        $data_kelas = mysqli_fetch_array($pilih_kelas);
        ?>

        <td><?php echo $data_kelas['kelas']?></td>
        <td><?php echo $pengaduan['ket_kategori']; ?></td>
        <td><?php echo $pengaduan['ket']; ?></td>
        <td><?php status($pengaduan['status']); ?></td>
        <td>
            <?php
            $cek = ($pengaduan['status'] == "Selesai")?'disabled':'';
            ?>
            <a href="?page=tanggapi&id=<?php echo $pengaduan['id_pelaporan']; ?>" class="btn btn-primary <?php echo $cek; ?>">
                🔄 Tanggapi
            </a>
        </td>
    </tr>
    <?php } ?>
</table>