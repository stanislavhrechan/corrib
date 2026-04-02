<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600" rel="stylesheet" />

</head>

<body class="bg-[#0B0B0F] text-white overflow-hidden">

<div class="relative flex h-screen">

    <aside class="absolute bottom-6 left-1/2 -translate-x-1/2 z-50">

        <nav class="flex items-center gap-1 bg-white/5 backdrop-blur-md 
                    border border-white/10 rounded-full p-1 shadow-lg z-50">

           <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-2 px-4 py-2 rounded-full text-sm
            {{ request()->routeIs('admin.dashboard') ? 'bg-white text-black' : 'text-white/70 hover:text-white hover:bg-white/10' }}">

                <span class="flex items-center justify-center w-8 h-8 
                            bg-white rounded-full text-black">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-4">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>

                </span>

                <span>Poschodie</span>
            </a>

            <a href="{{ route('admin.dashboard.build_park') }}"
            class="flex items-center gap-2 px-4 py-2 rounded-full text-sm
            {{ request()->routeIs('admin.dashboard.build_park') ? 'bg-white text-black' : 'text-white/70 hover:text-white hover:bg-white/10' }}">

                <span class="flex items-center justify-center w-8 h-8 
                            bg-white rounded-full text-black">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                </span>

                <span>Parkovanie</span>
            </a>

            <a href="/admin/settings"
            class="flex items-center gap-2 px-4 py-2 rounded-full text-sm
            {{ request()->is('admin/settings') ? 'bg-white text-black' : 'text-white/70 hover:text-white hover:bg-white/10' }}">

                <span class="flex items-center justify-center w-8 h-8 
                            bg-white rounded-full text-black">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </span>
                <span>Nastavenia</span>
            </a>

        </nav>

    </aside>

    <main class="flex-1 overflow-y-auto">

        <div class="h-14 border-b border-white/10 flex items-center justify-between px-6">

            <div class="text-white/50 text-sm">
                @yield('breadcrumb', 'Admin panel')
            </div>

            <div class="flex items-center gap-3">

                <div class="text-xs text-white/50">
                    Benard
                </div>

                <div class="w-8 h-8 rounded-full bg-white/10"></div>

            </div>

        </div>

        <!-- PAGE CONTENT -->
        <div class="min-h-[calc(100vh-3.5rem)]">
            @yield('content')
        </div>

    </main>

</div>

<!-- GLOBAL JS -->
<script>
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            console.log('ESC pressed (modal close hook)');
        }
    });
</script>

</body>
</html>