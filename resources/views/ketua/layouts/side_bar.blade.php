 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title" data-key="t-menu">Menu</li>

                 <li>
                     <a href="{{ route('ketua.dashboard') }}">
                         <i data-feather="home"></i>
                         <span data-key="t-dashboard">Dashboard</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('ketua.surat_masuk') }}">
                         <i data-feather="file-plus"></i>
                         <span data-key="t-Surat_Masuk">Surat Masuk</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('ketua.surat_keluar') }}">
                         <i data-feather="file-minus"></i>
                         <span data-key="t-Surat_Keluar">Surat Keluar</span>
                     </a>
                 </li>
             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
