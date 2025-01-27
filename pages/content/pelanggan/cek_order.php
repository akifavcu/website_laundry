<?php
session_start();

if ($_SESSION['role'] != 'pelanggan') {
    header('Location: ../../../');
    exit();
}

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '../../../') . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
require_once("{$base_dir}pages{$ds}content{$ds}backend{$ds}proses.php");

require_once "../backend/cek_resi.php";
?>

<main id='main' class='main animated'>

    <div class='pagetitle'>
        <h1>Cek Order Pesanan</h1>
        <nav>
            <ol class='breadcrumb'>
                <li class='breadcrumb-item'><a href='../../content/dashboard/dashboard'>Home</a></li>
                <li class=' breadcrumb-item active'>Cek Order Pesanan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class='section dashboard'>
        <div class='row'>

            <!-- Start Ngoding Disini -->

            <div class='col-lg-12'>

                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>CEK ORDER</h5>

                        <!-- Custom Styled Validation -->
                        <form action='' method='post' enctype='multipart/form-data' class='row g-3 needs-validation'
                            novalidate>

                            <div class='col-md-12'>
                                <label for='validationCustom02' class='form-label'>Resi Pesanan</label>
                                <input type='text' class='form-control' name='resi_pesanan'
                                    placeholder="masukan resi anda" required>
                                <div class='invalid-feedback'>
                                    Harap Berikan Resi Pesanan Yang Valid
                                </div>
                            </div>



                            <div class='col-12'>
                                <button class='btn btn-primary' name='cek_order' type='submit'>check order</button>
                            </div>

                        </form><!-- End Custom Styled Validation -->

                        <?php
                        // menampilkan pesan eror resi tidak terdaftar
                        if (isset($error_message)) {
                            echo "<p class='mt-2' style='color: red; font-size:medium;'><strong>~$error_message~</strong></p>";
                        }
                        ?>

                    </div>
                </div>

                <!-- Start Ngoding Disini -->

                <div class='col-lg-12'>
                    <div class='card'>
                        <div class='card-body'>
                            <div class="table-responsive">
                                <table class='table table-hover <?php echo (empty($order)) ? 'hidden' : ''; ?>'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>No</th>
                                            <th scope='col'>Nama Pelanggan</th>
                                            <th scope='col'>Jenis Layanan</th>
                                            <th scope='col'>Jenis Laundry</th>
                                            <th scope='col'>Resi Pesanan</th>
                                            <th scope='col'>Jumlah Kilo/Satuan</th>
                                            <th scope='col'>Total Harga</th>
                                            <th scope='col'>layanan antar</th>
                                            <th scope='col'>Alamat</th>
                                            <th scope='col'>proses laundry</th>
                                            <th scope='col'>status pembayaran</th>
                                            <th scope='col'>Total Bayar</th>

                                            <!-- Kolom untuk ikon edit dan delete -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        //Periksa apakah ada baris yang akan diambil
                                        if (!empty($order)) {
                                            foreach ($order as $row) {
                                                // Tampilkan detail pesanan
                                                $no++;
                                                echo '<tr>';
                                                echo "<th scope='row'>" . $no . '</th>';
                                                echo '<td>' . $row['nama_pelanggan'] . '</td>';
                                                echo '<td>' . $row['jenis_layanan'] . '</td>';
                                                echo '<td>' . $row['jenis_laundry'] . '</td>';
                                                echo '<td>' . $row['resi_pesanan'] . '</td>';
                                                echo '<td>' . $row['jumlah_kilo'] . '</td>';
                                                echo '<td>' . $row['total_harga'] . '</td>';
                                                echo '<td>' . $row['layanan_antar'] . '</td>';
                                                echo '<td>' . $row['alamat'] . '</td>';
                                                echo '<td>' . $row['proses_laundry'] . '</td>';
                                                echo '<td>' . $row['status_pembayaran'] . '</td>';
                                                echo '<td>' . $row['jumlah_bayar'] . '</td>';

                                                // Kolom aksi dengan ikon edit dan delete
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo "<tr><td colspan='10' style='color:red; font-size:smaller;' >input data resi terlebih dahulu!!</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



    </section>

</main><!-- End #main -->

<?php
require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>