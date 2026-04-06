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

                <span class="hidden md:block">Poschodie</span>
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

                <span class="md:block hidden">Parkovanie</span>
            </a>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf

                <button type="submit"
                    class="flex items-center gap-2 px-4 py-2 rounded-full text-sm text-white/70 hover:text-white hover:bg-white/10 cursor-pointer">

                    <span class="flex items-center justify-center w-8 h-8 
                                bg-white rounded-full text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                            </svg>
                    </span>

                    <span class="md:block hidden">Log out</span>
                </button>
            </form>

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