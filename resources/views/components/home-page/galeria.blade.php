<div class="mt-20 flex flex-col items-center">
    <h2 class="font-[header-font] text-center text-2xl md:text-5xl max-w-3xl">
        Galéria
    </h2>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-10 py-10  mx-auto">

    <a href="/gallery_img?category=exterier" class="relative group overflow-hidden   shadow-lg">
        <img src="{{ asset('images/gallery/1.png') }}"
            class="w-full h-[60vh] object-cover transition duration-500 group-hover:scale-110 group-hover:brightness-50">

        <div class="absolute inset-0 flex flex-col items-center justify-center text-white">
            <span class="text-2xl md:text-3xl font-[header-font] tracking-wide">
                Exteriér
            </span>
            <span class="text-sm mt-2 opacity-0 group-hover:opacity-100 transition">
                Kliknite pre zobrazenie
            </span>
        </div>
    </a>

    <a href="/gallery_img?category=interier" class="relative group overflow-hidden  shadow-lg">
        <img src="{{ asset('images/gallery/2.png') }}"
            class="w-full h-[60vh] object-cover transition duration-500 group-hover:scale-110 group-hover:brightness-50">

        <div class="absolute inset-0 flex flex-col items-center justify-center text-white">
            <span class="text-2xl md:text-3xl font-[header-font] tracking-wide">
                Interiér
            </span>
            <span class="text-sm mt-2 opacity-0 group-hover:opacity-100 transition">
                Kliknite pre zobrazenie
            </span>
        </div>
    </a>

    <a href="/gallery_img?category=videa" class="relative group overflow-hidden  shadow-lg">
        <img src="{{ asset('images/gallery/1.png') }}"
            class="w-full h-[60vh] object-cover transition duration-500 group-hover:scale-110 group-hover:brightness-50">

        <div class="absolute inset-0 flex flex-col items-center justify-center text-white">
            <span class="text-2xl md:text-3xl font-[header-font] tracking-wide">
                Videá
            </span>
            <span class="text-sm mt-2 opacity-0 group-hover:opacity-100 transition">
                Kliknite pre zobrazenie
            </span>
        </div>
    </a>

</div>

<div class="flex justify-center mb-20">
    <a href="{{route('gallery')}}"
       class="bg-black hover:bg-white text-gray-100 hover:text-black uppercase px-6 py-3 transition duration-300 text-sm tracking-[0.1em]">
        Otvoriť galériu
    </a>
</div>