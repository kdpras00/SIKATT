<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistem Manajemen Aset Kelurahan Tanah Tinggi')</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/images/logo-tanah-tinggi.png') }}?v={{ time() }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rubik:wght@400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .font-rubik { font-family: 'Rubik', sans-serif; }

        /* Custom Premium Forest Green Theme */
        nav.fixed {
            background-color: #0D2A1C !important;
            border-bottom-color: #05140e !important;
        }
        
        #notification-btn {
            color: #d1fae5 !important; /* text-emerald-100 */
        }
        #notification-btn:hover {
            background-color: #065f46 !important; /* hover:bg-emerald-800 */
            color: #ffffff !important;
        }

        /* Sidebar styles */
        #logo-sidebar {
            background-color: #0D2A1C !important;
            border-right-color: #05140e !important;
        }
        #logo-sidebar .overflow-y-auto {
            background-color: #0D2A1C !important;
        }
        
        /* Inactive sidebar links */
        #logo-sidebar a {
            color: #d1fae5 !important; /* text-emerald-100 */
            transition: all 0.2s ease-in-out;
        }
        #logo-sidebar a:hover {
            background-color: #065f46 !important; /* bg-emerald-800 */
            color: #ffffff !important;
        }
        #logo-sidebar a svg {
            color: #34d399 !important; /* text-emerald-400 */
            transition: all 0.2s ease-in-out;
        }
        #logo-sidebar a:hover svg {
            color: #ffffff !important;
        }

        /* Active sidebar links */
        #logo-sidebar a.bg-green-50, 
        #logo-sidebar a[class*="bg-green-50"] {
            background-color: #065f46 !important; /* bg-emerald-800 */
            color: #ffffff !important;
            box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        }
        #logo-sidebar a.bg-green-50 svg,
        #logo-sidebar a[class*="bg-green-50"] svg {
            color: #ffffff !important;
        }

        /* Category headers in sidebar */
        #logo-sidebar li.text-gray-400,
        #logo-sidebar li[class*="text-gray-400"] {
            color: #34d399 !important; /* text-emerald-400 */
            font-weight: bold !important;
            opacity: 0.85;
        }

        /* Badge/Pill (pending count) */
        #logo-sidebar span.bg-\[\#1B4332\], 
        #logo-sidebar span[class*="bg-[#1B4332]"] {
            background-color: #34d399 !important; /* text-emerald-400 badge */
            color: #0D2A1C !important;
            font-weight: bold !important;
        }

        /* ==========================================
           GLOBAL BLUE-TO-GREEN ACCENT OVERRIDES 
           ========================================== */
        
        /* Text color overrides */
        .text-blue-500,
        .text-blue-600,
        .text-blue-700,
        .text-blue-800 {
            color: #059669 !important; /* emerald-600 */
        }
        .text-blue-900 {
            color: #064e3b !important; /* emerald-900 */
        }
        .hover\:text-blue-500:hover,
        .hover\:text-blue-600:hover,
        .hover\:text-blue-700:hover,
        .hover\:text-blue-800:hover,
        .hover\:text-blue-900:hover {
            color: #047857 !important; /* emerald-700 */
        }

        /* Background color overrides */
        .bg-blue-50 {
            background-color: #ecfdf5 !important; /* emerald-50 */
        }
        .bg-blue-100 {
            background-color: #d1fae5 !important; /* emerald-100 */
        }
        .bg-blue-500,
        .bg-blue-600,
        .bg-blue-700,
        .bg-blue-800 {
            background-color: #059669 !important; /* emerald-600 */
        }
        .bg-blue-900 {
            background-color: #064e3b !important; /* emerald-900 */
        }
        
        /* Hover background overrides */
        .hover\:bg-blue-50:hover {
            background-color: #ecfdf5 !important;
        }
        .hover\:bg-blue-600:hover,
        .hover\:bg-blue-700:hover,
        .hover\:bg-blue-800:hover {
            background-color: #047857 !important; /* emerald-700 */
        }

        /* Border color overrides */
        .border-blue-200 {
            border-color: #a7f3d0 !important; /* emerald-200 */
        }
        .border-blue-300 {
            border-color: #6ee7b7 !important; /* emerald-300 */
        }
        .border-blue-500,
        .border-blue-600 {
            border-color: #10b981 !important; /* emerald-500 */
        }

        /* Focus states */
        .focus\:ring-blue-500:focus {
            --tw-ring-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.5) !important;
        }
        .focus\:border-blue-500:focus {
            border-color: #10b981 !important;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    
    <!-- Navbar -->
    <nav class="fixed top-0 z-50 w-full bg-[#0D2A1C] border-b border-[#05140e] text-white">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-emerald-100 rounded-lg sm:hidden hover:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-emerald-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <a href="{{ route('home') }}" class="flex ms-2 md:me-24 items-center">
                        <img src="{{ asset('storage/images/logo-tanah-tinggi.png') }}" class="h-8 me-3" alt="Logo Kelurahan Tanah Tinggi" />
                        <span class="self-center text-lg font-bold font-rubik sm:text-xl uppercase tracking-widest whitespace-nowrap text-white">Tanah Tinggi</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <!-- Notification Bell -->
                    @include('components.notification-bell')

                    <div class="flex items-center ms-3 relative">
                        <div>
                            <button type="button" onclick="toggleUserDropdown(event)" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false">
                                <span class="sr-only">Open user menu</span>
                                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                                    <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('storage/images/default-profile.png') }}" 
                                         class="w-full h-full object-cover" 
                                         alt="{{ auth()->user()->name }}">
                                </div>
                            </button>
                        </div>
                        <div class="z-50 hidden absolute right-0 top-8 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600 min-w-max" id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm font-bold text-[#0D2A1C] dark:text-white whitespace-nowrap" role="none">
                                    @if(auth()->user()->hasRole('staff'))
                                        Staff Kelurahan Tanah Tinggi
                                    @elseif(auth()->user()->hasRole('lurah'))
                                        Lurah Tanah Tinggi
                                    @elseif(auth()->user()->hasRole('masyarakat'))
                                        Warga Tanah Tinggi
                                    @endif
                                </p>
                                <p class="text-xs text-gray-500 truncate dark:text-gray-300 mt-0.5" role="none">
                                    {{ auth()->user()->email }}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                        Pengaturan Profil
                                    </a>
                                </li>
                                <li>
                                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            @yield('sidebar')
        </div>
    </aside>

    <!-- Main Content -->
    <div class="p-4 sm:ml-64 relative">
        <div class="p-4 mt-14 max-w-full overflow-x-hidden">
            @yield('content')
        </div>
    </div>

    @stack('scripts')
    


    <!-- Global Loading Overlay (Premium Smooth Transition) -->
    <div id="global-loading-overlay" class="fixed inset-0 z-[100] bg-[#0D2A1C] flex flex-col items-center justify-center transition-all duration-700 ease-in-out opacity-100 visibility-visible">
        <div class="relative flex flex-col items-center">
            <div class="bg-white/10 backdrop-blur-md border border-white/10 p-6 rounded-3xl shadow-2xl mb-6">
                <img src="{{ asset('storage/images/logo-tanah-tinggi.png') }}" alt="Loading..." class="w-20 h-20 object-contain">
            </div>
            <div class="flex flex-col items-center space-y-3">
                <h3 class="text-xl font-bold text-white tracking-[0.2em] uppercase font-rubik">Memproses...</h3>
                <div class="w-16 h-1 bg-emerald-400 rounded-full animate-progress shadow-[0_0_8px_rgba(52,211,153,0.8)]"></div>
            </div>
        </div>
    </div>

    <style>
        @keyframes progress {
            0% { width: 0; opacity: 0.2; }
            50% { width: 100%; opacity: 1; }
            100% { width: 0; opacity: 0.2; }
        }
        .animate-progress {
            animation: progress 2s infinite ease-in-out;
        }
        .visibility-hidden { visibility: hidden; pointer-events: none; }
        .visibility-visible { visibility: visible; pointer-events: auto; }
    </style>

    <script>
        // Global Loader Functions
        window.showLoading = function() {
            var loader = document.getElementById('global-loading-overlay');
            if(loader) {
                loader.classList.remove('opacity-0', 'visibility-hidden');
                loader.classList.add('opacity-100', 'visibility-visible');
            }
        };

        window.hideLoading = function() {
            var loader = document.getElementById('global-loading-overlay');
            if(loader) {
                loader.classList.remove('opacity-100', 'visibility-visible');
                loader.classList.add('opacity-0', 'visibility-hidden');
            }
        };

        // Smooth Page Entry Logic
        window.addEventListener('load', function() {
            setTimeout(function() {
                window.hideLoading();
            }, 600); // Minimum display time for premium feel
        });

        // Handle Page Navigation Loading
        document.addEventListener('DOMContentLoaded', function() {
            // Attach to all links
            var links = document.querySelectorAll('a');
            links.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    var href = this.getAttribute('href');
                    var target = this.getAttribute('target');
                    
                    if (href && 
                        href !== '#' && 
                        href.indexOf('javascript:') !== 0 && 
                        href.indexOf('tel:') !== 0 && 
                        href.indexOf('mailto:') !== 0 && 
                        target !== '_blank' && 
                        !this.hasAttribute('download') &&
                        !this.classList.contains('no-loader')) {
                        
                        window.showLoading();
                    }
                });
            });

            // Attach to forms
            var forms = document.querySelectorAll('form');
            forms.forEach(function(form) {
                form.addEventListener('submit', function() {
                   if(!this.classList.contains('no-loader')) {
                       window.showLoading();
                   }
                });
            });

            // Mobile Sidebar Toggle
            var toggleBtn = document.querySelector('[data-drawer-toggle="logo-sidebar"]');
            var sidebar = document.getElementById('logo-sidebar');
            
            if(toggleBtn && sidebar) {
                toggleBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                });
            }
        });
        
        // Toggle User Dropdown & Close Notifications
        function toggleUserDropdown(e) {
            e.stopPropagation();
            const userDropdown = document.getElementById('dropdown-user');
            
            // Close notification dropdown if open
            if (typeof window.closeNotificationDropdown === 'function') {
                window.closeNotificationDropdown();
            }

            userDropdown.classList.toggle('hidden');
        }

        // Close dropdowns on click outside
        document.addEventListener('click', function(e) {
            const userDropdown = document.getElementById('dropdown-user');
            const userBtn = document.querySelector('[onclick="toggleUserDropdown(event)"]');
            
            if (userDropdown && !userDropdown.classList.contains('hidden')) {
                if (!userDropdown.contains(e.target) && !userBtn.contains(e.target)) {
                    userDropdown.classList.add('hidden');
                }
            }
        });

        // Hide loader when page is fully loaded
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                window.hideLoading();
            }
        });
    </script>

    @stack('scripts')
    
    <script>
        // Handle Session Flash Messages (using Swal from app.js)
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                window.hideLoading(); // Ensure loader is hidden
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: "{{ session('success') }}",
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif

            @if(session('error'))
                window.hideLoading(); // Ensure loader is hidden
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: "{{ session('error') }}",
                });
            @endif

            @if(session('warning'))
                window.hideLoading(); // Ensure loader is hidden
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: "{{ session('warning') }}",
                });
            @endif
        });



        // Global Delete Confirmation
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }

        // Auto Logout Script
        document.addEventListener('DOMContentLoaded', function() {
            @auth
                // Session lifetime in minutes from config
                const lifetimeMinutes = {{ config('session.lifetime') }};
                // Warn 5 minutes before (or 1 minute if session is short)
                const warningMinutes = 5; 
                
                const lifetimeMs = lifetimeMinutes * 60 * 1000;
                let warningMs = warningMinutes * 60 * 1000;

                // Adjust warning time if session is too short
                if (lifetimeMs <= warningMs) {
                    warningMs = 60 * 1000; // 1 minute
                }
                
                const timeUntilWarning = lifetimeMs - warningMs;

                // Only enable if time is valid
                if (timeUntilWarning > 0) {
                    setTimeout(function() {
                        Swal.fire({
                            title: 'Sesi Akan Berakhir!',
                            text: 'Anda tidak aktif dalam waktu lama. Sesi Anda akan berakhir dalam beberapa menit. Klik tombol di bawah agar tidak logout.',
                            icon: 'warning',
                            timer: warningMs,
                            timerProgressBar: true,
                            showConfirmButton: true,
                            confirmButtonText: 'Saya Masih Aktif',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Reload to refresh session
                                window.location.reload();
                            }
                        });

                        // Final logout timer
                        setTimeout(function() {
                            const form = document.getElementById('logout-form');
                            if (form) {
                                form.submit();
                            } else {
                                window.location.reload(); // Fallback
                            }
                        }, warningMs);

                    }, timeUntilWarning);
                }
            @endauth
        });

    </script>

</body>
</html>
