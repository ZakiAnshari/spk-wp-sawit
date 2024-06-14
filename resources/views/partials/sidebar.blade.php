<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li>
              <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                <i class="fas fa-bars"></i>
              </a>
            </li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('back_end/dist/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->username }} </div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="/logout" onclick="return confirm('anda yakin mau keluar?')" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand my-3">
            <a href="/dashboard" style="font-size: x-large;"> UD GALANG</a>
            <div style="margin-top: -35px" id="current-time"></div>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">UG</a>
          </div>
          <ul class="sidebar-menu">
            @if(Auth::user()->role_id == 1)
              <li  @if(request()->route()->uri == 'dashboard') class='dropdown active' @else class='dropdown' @endif >
                  <a href="/dashboard" class="nav-link">
                      <i class="fas fa-fire"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
             
              <li  @if(request()->route()->uri == 'user' || request()->route()->uri == 'user-add'|| request()->route()->uri == 'user/{id}' ||request()->route()->uri == 'user-edit/{slug}' ) class='dropdown active' @else class='dropdown' @endif >
                <a class="nav-link " href="/user">
                    <i class="far fa-square"></i> 
                    <span>Data User</span>
                </a>
              </li>

              <li  @if(request()->route()->uri == 'karyawan' || request()->route()->uri == '{id_karyawan}/gaji' || request()->route()->uri == 'karyawan/{id}' ||request()->route()->uri == 'karyawan-add'||request()->route()->uri == 'karyawan-edit/{slug}' ) class='dropdown active' @else class='dropdown' @endif >
                <a class="nav-link " href="/karyawan">
                    <i class="far fa-square"></i> 
                    <span>Data Supplier </span>
                </a>
              </li>
              
              <li  @if(request()->route()->uri == 'kriteria' || request()->route()->uri == '{id_kriteria}/gaji' || request()->route()->uri == 'kriteria/{id}' ||request()->route()->uri == 'kriteria-add'||request()->route()->uri == 'kriteria-edit/{slug}' ) class='dropdown active' @else class='dropdown' @endif >
                <a class="nav-link " href="/kriteria">
                    <i class="far fa-square"></i> 
                    <span>Data Kriteria</span>
                </a>
              </li>

              <li  @if(request()->route()->uri == 'alternatif' || request()->route()->uri == '{id_kriteria}/gaji' || request()->route()->uri == 'alternatif/{id}' ||request()->route()->uri == 'alternatif-add'||request()->route()->uri == 'alternatif-edit/{slug}' ) class='dropdown active' @else class='dropdown' @endif >
                <a class="nav-link " href="/alternatif">
                    <i class="far fa-square"></i> 
                    <span>Data Alternatif</span>
                </a>
              </li>

              <li  @if(request()->route()->uri == 'perhitungan' || request()->route()->uri == '{id_kriteria}/gaji' || request()->route()->uri == 'perhitungan/{id}' ||request()->route()->uri == 'perhitungan-add'||request()->route()->uri == 'perhitungan-edit/{slug}' ) class='dropdown active' @else class='dropdown' @endif >
                <a class="nav-link " href="/perhitungan">
                    <i class="far fa-square"></i> 
                    <span>Data Perhitungan</span>
                </a>
              </li>

              

            @else
            {{-- <li  @if(request()->route()->uri == 'dashboard-pemesanan' || request()->route()->uri == 'pesanan-add'||request()->route()->uri == 'pesanan-edit/{slug}'|| request()->route()->uri == 'dashboard-make' || request()->route()->uri == 'dashboard-pemesanan/{id}' )  class='dropdown active' @else class='dropdown' @endif >
              <a class="nav-link " href="/dashboard-pemesanan">
                  <i class="far fa-square"></i> 
                  <span>Pemesanan</span>
              </a>
            </li>
            <li  @if(request()->route()->uri == 'dashboard-pesanan-saya' || request()->route()->uri == 'dashboard-pesanan-saya'||request()->route()->uri == 'dashboard-pesanan-saya' ) class='dropdown active' @else class='dropdown' @endif >
              <a class="nav-link " href="/dashboard-pesanan-saya">
                  <i class="far fa-square"></i> 
                  <span>Pesanan Saya</span>
              </a>
            </li> --}}
            @endif
        </ul>
        </aside>
    </div>

    <script>
      // Mendapatkan elemen div untuk menampilkan waktu
      var timeDisplay = document.getElementById("current-time");
      // Fungsi untuk mendapatkan waktu saat ini dalam format yang diinginkan
      function getCurrentTime() {
          var now = new Date();
          var hours = now.getHours();
          var minutes = now.getMinutes();
          var timezone = "WIB";
  
          // Membuat format jam:menit WIB
          var timeString = hours + ":" + (minutes < 10 ? "0" + minutes : minutes) + " " + timezone;
  
          // Mengatur isi dari elemen div dengan waktu saat ini
          timeDisplay.textContent = timeString;
      }
  
      // Memanggil fungsi untuk menampilkan waktu saat ini
      getCurrentTime();
  
      // Memperbarui waktu setiap detik
      setInterval(getCurrentTime, 1000);
  </script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      // Ambil elemen yang akan diklik
      var dropdownToggle = document.querySelector('.nav-link-user');

      // Tambahkan event listener untuk menangani klik
      dropdownToggle.addEventListener('click', function(event) {
          event.preventDefault(); // Menghentikan perilaku default dari link

          // Ambil dropdown menu terkait
          var dropdownMenu = dropdownToggle.nextElementSibling;

          // Toggle tampilan dropdown menu
          dropdownMenu.classList.toggle('show');
      });
  });
</script>

