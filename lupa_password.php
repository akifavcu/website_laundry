<?php
require_once "sweetalert.php";

// mengecek di tambahkan

if (isset($_GET['gagal'])) {
    $berhasil = $_GET['gagal'];
    if ($berhasil === 'add_gagal') {
        showAlert('error', 'Gagal', ' Email tidak ditemukan dalam database.');
    }
}



?>



<!DOCTYPE html>
<html lang="ind">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>De'UnguLaundry</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="../../../assets/img/logo-icon.png" rel="icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  =
    * Template Name: NiceAdmin
    * Updated: Sep 18 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
  
    ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  ===  == -->
    <style>
    /* Loading Overlay */
    .loading-overlay {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 9999;
        opacity: 1;
        transition: opacity 0.3s ease-in-out;
        color: darkorchid;
        font-family: "Roboto", sans-serif;
    }

    .loading-overlay.hidden {
        opacity: 0;
        pointer-events: none;
    }

    .loading-spinner {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        margin-bottom: 20px;
    }

    .loading-text {
        font-size: 18px;
        font-weight: bold;
        font-family: "Pacifico", cursive;
        /* Ganti 'Pacifico' dengan font yang diinginkan */
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Menyesuaikan ukuran SweetAlert */
    .swal2-popup {
        font-size: 1rem;

        width: auto !important;
        max-width: 300px;

    }

    .swal2-title {
        font-size: 1.3rem;

    }

    .swal2-content {
        font-size: 1rem;

    }
    </style>

</head>

<body>
    <main>
        <div class="loading-overlay" id="loading-overlay">
            <div class="loading-spinner"></div>
            <div class="loading-text">~ De'Ungu Laundry ~</div>
        </div>

        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">
                                <a class="logo d-flex align-items-center w-auto">
                                    <img class="d-none d-lg-block" src="assets/img/logo.jpg" alt="" />
                                    <span class="d-none d-lg-block" style="color: darkslateblue">De'ungu laundry</span>
                                </a>
                            </div>
                            <!-- End Logo -->

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">
                                            Masukkan email Anda
                                        </h5>
                                        <p class="text-center small">
                                            Masukkan nama email Anda untuk memvalidasi akun
                                        </p>
                                    </div>

                                    <form action="./pages/content/backend/reset_password.php" method="post"
                                        id="validateForm">
                                        <div class="form-group">
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="email" name="email" class="form-control" id="email"
                                                        required />
                                                    <div class="invalid-feedback">
                                                        Silakan masukkan alamat email Anda.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button type="submit" id="kode" class="btn btn-primary w-100">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                    <div class="col-12 mt-3">
                                        <a href="./login">Kembali ke halaman login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!-- End #main -->

    <!-- Vendor JS Files -->
    <script src='assets/vendor/apexcharts/apexcharts.min.js'></script>
    <script src='assets/vendor/bootstrap/js/bootstrap.bundle.min.js'>
    </script>
    <script src='assets/vendor/chart.js/chart.umd.js'></script>
    <script src='assets/vendor/echarts/echarts.min.js'></script>
    <script src='assets/vendor/quill/quill.min.js'></script>
    <script src='assets/vendor/simple-datatables/simple-datatables.js'>
    </script>
    <script src='assets/vendor/tinymce/tinymce.min.js'></script>
    <script src='assets/vendor/php-email-form/validate.js'></script>
    <!-- spinners -->
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const loadingOverlay = document.getElementById("loading-overlay");

        // Sembunyikan overlay loading setelah halaman sepenuhnya dimuat
        window.addEventListener("load", () => {
            // Secara opsional, tambahkan penundaan sebelum menyembunyikan overlay
            setTimeout(() => {
                loadingOverlay.classList.add("hidden");

                // Secara opsional, tambahkan penundaan sebelum mengatur display menjadi 'none'
                setTimeout(() => {
                    loadingOverlay.style.display = "none";
                }, 500);
            }, 400); // Sesuaikan penundaan ini (dalam milidetik) sesuai kebutuhan
        });
    });
    </script>

    <!-- Template Main JS File -->
    <script src='assets/js/main.js'></script>

</body>

</html>