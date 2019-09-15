<!--Navigasi-->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Nama Aplikasi -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
<div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
</div>
<div class="sidebar-brand-text mx-3">Transkrip KampusKu</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Menu Halaman Utama -->
<li class="nav-item">
<a class="nav-link" href="../../index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Halaman Utama</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Menu Manajemen -->
    <div class="sidebar-heading">
        Manajemen
    </div>

    
    <!-- Menu Mahasiswa -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#navigasiMahasiswa" aria-expanded="true" aria-controls="navigasiMahasiswa">
            <i class="fas fa-fw fa-user"></i>
            <span>Mahasiswa</span>
        </a>
        <div id="navigasiMahasiswa" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu:</h6>
            <a class="collapse-item" href="../../admin/mahasiswa/view.php">Lihat</a>
            <a class="collapse-item" href="../../admin/mahasiswa/insert.php">Tambah Baru</a>
            </div>
        </div>
    </li>

    <!-- Menu Mata kuliah -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#navigasiMatKul" aria-expanded="true" aria-controls="navigasiMatKul">
            <i class="fas fa-fw fa-table"></i>
            <span>Mata Kuliah</span>
        </a>
        <div id="navigasiMatKul" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu:</h6>
            <a class="collapse-item" href="view.php">Lihat</a>
            <a class="collapse-item" href="insert.php">Tambah Baru</a>
            </div>
        </div>
    </li>

    <!-- Menu Transkrip Nilai -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#navigasiNilai" aria-expanded="true" aria-controls="navigasiNilai">
            <i class="fas fa-fw fa-edit"></i>
            <span>Transkrip Nilai</span>
        </a>
        <div id="navigasiNilai" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu:</h6>
            <a class="collapse-item" href="../../admin/nilai/view.php">Lihat</a>
            <a class="collapse-item" href="../../admin/nilai/insert.php">Tambah Baru</a>
            <a class="collapse-item" href="../../admin/nilai/ipk.php">IPK</a>
            </div>
        </div>
    </li>
<!-- Akhir Menu Manajemen -->

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!--Akhir bagian navigasi-->