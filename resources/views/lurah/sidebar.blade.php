<ul class="space-y-2 font-medium">
    <li>
        <a href="{{ route('lurah.dashboard') }}" class="flex items-center p-3 text-gray-700 rounded-lg group {{ Request::routeIs('lurah.dashboard') ? 'bg-green-50 text-[#1B4332]' : 'hover:bg-gray-50 hover:text-[#1B4332]' }} transition-colors">
            <svg class="w-5 h-5 {{ Request::routeIs('lurah.dashboard') ? 'text-[#1B4332]' : 'text-gray-400 group-hover:text-[#1B4332]' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
            </svg>
            <span class="ms-3 font-medium">Dashboard</span>
        </a>
    </li>

    <li class="px-3 pt-4 pb-2 text-xs font-medium text-gray-400 uppercase tracking-wider">
        Verifikasi
    </li>

    <li>
        <a href="{{ route('lurah.letters.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg group {{ Request::routeIs('lurah.letters.*') ? 'bg-green-50 text-[#1B4332]' : 'hover:bg-gray-50 hover:text-[#1B4332]' }} transition-colors">
             <svg class="flex-shrink-0 w-5 h-5 {{ Request::routeIs('lurah.letters.*') ? 'text-[#1B4332]' : 'text-gray-400 group-hover:text-[#1B4332]' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="flex-1 ms-3">Tanda tangan digital</span>
            @php
                $pendingCount = \App\Models\Letter::where('status', 'processed')->count();
            @endphp
            @if($pendingCount > 0)
                <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-white bg-[#1B4332] rounded-full">{{ $pendingCount }}</span>
            @endif
        </a>
    </li>

    <li class="px-3 pt-4 pb-2 text-xs font-medium text-gray-400 uppercase tracking-wider">
        Laporan
    </li>

    <li>
        <a href="{{ route('lurah.reports.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg group {{ Request::routeIs('lurah.reports.*') ? 'bg-green-50 text-[#1B4332]' : 'hover:bg-gray-50 hover:text-[#1B4332]' }} transition-colors">
            <svg class="flex-shrink-0 w-5 h-5 {{ Request::routeIs('lurah.reports.*') ? 'text-[#1B4332]' : 'text-gray-400 group-hover:text-[#1B4332]' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M5 20h14a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v14H2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1zm2-16h8v12H7V4zm2 2h4v8H9V6z"/>
            </svg>
            <span class="flex-1 ms-3">melihat laporan surat pengajuan</span>
        </a>
    </li>
</ul>
