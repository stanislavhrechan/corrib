@extends('layouts.guest')

@section('content')

<div class="w-[300px] md:w-[400px] relative z-10">

    <div class="p-8 
                bg-white/10 backdrop-blur-2xl
                border border-white/10
                shadow-2xl">

        <div class="flex justify-center mb-8">
            <img src="/images/logo_carrib.svg" alt="Corrib Tower Logo" class="w-21 md:w-21">
        </div>
    
        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
            @csrf

            <div class="relative">
                <input
                    type="email"
                    name="email"
                    id="email"
                    required
                    class="peer w-full px-4 pt-5 pb-2 
                           bg-white/5 border border-white/10
                           text-white placeholder-transparent
                           focus:outline-none focus:ring-2 focus:ring-white/20
                           focus:border-white/30 transition"
                    placeholder="Email"
                >

                <label for="email"
                    class="absolute left-4 top-2 text-white/50 text-sm
                           transition-all
                           peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base
                           peer-placeholder-shown:text-white/30
                           peer-focus:top-2 peer-focus:text-sm peer-focus:text-white/60">
                    Email
                </label>

                @error('email')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative">
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    class="peer w-full px-4 pt-5 pb-2 
                           bg-white/5 border border-white/10
                           text-white placeholder-transparent
                           focus:outline-none focus:ring-2 focus:ring-white/20
                           focus:border-white/30 transition "
                    placeholder="Heslo"
                >

                <label for="password"
                    class="absolute left-4 top-2 text-white/50 text-sm
                           transition-all
                           peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base
                           peer-placeholder-shown:text-white/30
                           peer-focus:top-2 peer-focus:text-sm peer-focus:text-white/60">
                    Heslo
                </label>

                @error('password')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-3 
                       bg-[#2B2B2B] text-white font-light
                       hover:bg-[#2B2B2B]/90 active:scale-[0.98]
                       transition duration-200 shadow-lg cursor-pointer">
                PRIHLÁSIŤ SA
            </button>

        </form>
    </div>

    <p class="text-center text-white/50 text-xs mt-4">
       Bezpečné prihlásenie chránené šifrovaním
    </p>

</div>

@endsection