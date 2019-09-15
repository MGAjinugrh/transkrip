<?php

    /**
     * Halaman ipk.php untuk melihat ipk seorang mahasiswa
    */

    //memanggil connect.php untuk connect
    require_once "../config/connect.php";
    //memanggil check_login.php untuk check status login
    require_once "../config/check_login.php";
?>
<!DOCTYPE html>
<html lang="en">

<!--bagian kepala-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>Transkrip Univ | Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<!--bagian body-->
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <!--memanggil navigasi-->
    <?php include "navigasi.php";?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Bagian atas -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Menu User -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['nim']?></span>
                            <img class="img-profile rounded-circle" src="https://static.thenounproject.com/png/17241-200.png">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- Akhir bagian atas -->

            <!-- Isi Utama Index Admin -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Lihat IPK Mahasiswa :</h1>

                <!-- Tabel Mata Kuliah -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pilih Nama Mahasiswa : </h6>
                    </div>
                    <div class="card-body">
                        <?php
                        
                            /**
                             * Menampilkan identitas mahasiswa
                             */
                            if(!empty($_SESSION)){
                                $nim = $_SESSION['nim'];
                                $mahasiswa = "SELECT * FROM mahasiswa WHERE nim='$nim' ORDER BY nama ASC";
                                $result = $conn->query($mahasiswa);
                                
                                if ($result->num_rows > 0) {
                                    $no = 1;
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                            ?>
                                <div class="form-group">
                                    <h3 style="text-align:center;">Kartu Hasil Studi Mahasiswa</h3>
                                    <p><b>NIM :</b> <?=$row['nim'];?></p>
                                    <p><b>Nama :</b> <?=$row['nama'];?></p>
                                </div>
                            <?php 
                                    }
                                }
                            }
                            ?>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Nilai</th>
                                    <th>Mutu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    /**
                                     * mengeluarkan data nilai mahasiswa dari database
                                     * dengan menggabungkan isi ketiga tabel dengan join
                                     * menggunakan tabel nilai sebagai acuan utama
                                     */
                                    if(!empty($_SESSION)){
                                        $nim = $_SESSION['nim'];
                                        $nilai = "SELECT 
                                            c.nama AS matkul,
                                            c.sks,
                                            a.nilai
                                        FROM nilai AS a 
                                        LEFT OUTER JOIN mahasiswa AS b
                                        ON b.nim = a.nim 
                                        LEFT OUTER JOIN matkul AS c 
                                        ON c.kd_matkul = a.kd_matkul
                                        WHERE b.nim = '$nim'
                                        ORDER BY b.nama ASC";
                                        $result = $conn->query($nilai);
                                        
                                        if ($result->num_rows > 0) {
                                            $no = 1;
                                            $mutu = 0;
                                            $atas = 0;
                                            $totSKS = 0;
                                            $totNilai = 0;
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>".$no.".</td>";
                                                echo "<td>".$row['matkul']."</td>";
                                                echo "<td>".$row['sks']."</td>";
                                                echo "<td>".$row['nilai']."</td>";
                                                echo "<td>";
                                                    //mengecek isi nilai untuk mengeluarkan grade
                                                    if($row['nilai'] > 80){
                                                        echo "A";
                                                        $mutu = 4;
                                                    }else if($row['nilai'] > 70 && $row['nilai'] <= 80 ){
                                                        echo "B";
                                                        $mutu = 3;
                                                    }else if($row['nilai'] > 59 && $row['nilai'] <= 70){
                                                        echo "C";
                                                        $mutu = 2;
                                                    }else if($row['nilai'] > 49 && $row['nilai'] < 59){
                                                        echo "D";
                                                        $mutu = 1;
                                                    }else{
                                                        echo "E";
                                                        $mutu = 0;
                                                    }
                                                echo "</td>";
                                                echo "</tr>";
                                                $atas = $atas + ($row['sks'] * $mutu);
                                                $totSKS = $totSKS + $row['sks'];
                                                $totNilai = $totNilai + $row['nilai'];
                                                $no++;
                                            }
                                            $ipk = $atas/$totSKS;
                                        }
                                    }
                                ?>
                            </tbody>
                            </table>
                        </div>
                        <div class="form-group" style="text-align:right;">
                        <?php if(!empty($_SESSION)){?>
                            <p><b>Jumlah SKS :</b> <?=$totSKS;?></p>
                            <p><b>Total Nilai Kumulatif :</b> <?=$totNilai;?></p>
                            <p><b>IPK:</b> <?=$ipk;?></p>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="window.print()">Cetak</button>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                <span>Copyright &copy; Pelatihan BPPTIK JWP 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" untuk mengakhiri sesi login sekarang.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php
        /**
         * load library yang dibutuhkan
         */
    ?>
    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    
    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>
    
    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
</body>

</html>

