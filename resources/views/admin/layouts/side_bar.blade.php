 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title" data-key="t-menu">Menu</li>

                 <li>
                     <a href="{{ route('admin.dashboard') }}">
                         <i data-feather="home"></i>
                         <span data-key="t-dashboard">Dashboard</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('admin.surat_masuk') }}">
                         <i data-feather="upload-cloud"></i>
                         <span data-key="t-picture">Surat Masuk</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('admin.surat_keluar') }}">
                         <i data-feather="download-cloud"></i>
                         <span data-key="t-picture">Surat Keluar</span>
                     </a>
                 </li>
                 {{-- <li>
                     <a href="{{ route('project') }}">
                         <i data-feather="cloud-snow"></i>
                         <span data-key="t-project">Project</span>
                     </a>
                 </li> --}}
             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
