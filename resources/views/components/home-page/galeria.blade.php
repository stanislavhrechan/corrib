<div class="mt-20 md:mt-30 flex flex-col gap-2 items-center">
    <h2 class="font-[header-font] text-center text-2xl md:text-5xl max-w-3xl">Galéria</h2>
</div>
<div class="flex flex-col md:flex-row justify-center items-center overflow-hidden w-full py-6 md:mb-10 gap-10">
    <div class="">
         <h2 class="font-[header-font] text-center text-xl md:text-3xl max-w-3xl mb-5">Exterier</h2>
        <a href="/gallery_img?category=exterier" class="relative group block mx-5">
            <img src="{{ asset('images/gallery/1.png') }}" alt=""
                class="w-full h-auto transition duration-300 group-hover:brightness-50">

            <div class="absolute inset-0 flex items-center justify-center 
                        opacity-0 group-hover:opacity-100 transition duration-300">
                <span class="text-white text-xl font-[header-font]">
                    Kliknite pre zobrazenie
                </span>
            </div>
        </a>
    </div>
   
    <div class="">
        <h2 class="font-[header-font] text-center text-xl md:text-3xl max-w-3xl mb-5">Interier</h2>
        <a href="/gallery_img?category=interier" class="relative group block mx-5">
            <img src="{{ asset('images/gallery/2.png') }}" alt=""
                class="w-full h-auto transition duration-300 group-hover:brightness-50">

            <div class="absolute inset-0 flex items-center justify-center 
                        opacity-0 group-hover:opacity-100 transition duration-300">
                <span class="text-white text-xl font-[header-font]">
                    Kliknite pre zobrazenie
                </span>
            </div>
        </a>
    </div>
    
    <div class="">
         <h2 class="font-[header-font] text-center text-xl md:text-3xl max-w-3xl mb-5">Videá</h2>
        <a href="/gallery_img?category=videa" class="relative group block mx-5">
            <img src="{{ asset('images/gallery/1.png') }}" alt=""
                class="w-full h-auto transition duration-300 group-hover:brightness-50">

            <div class="absolute inset-0 flex items-center justify-center 
                        opacity-0 group-hover:opacity-100 transition duration-300">
                <span class="text-white text-xl font-[header-font]">
                    Kliknite pre zobrazenie
                </span>
            </div>
        </a>
    </div>
    

</div>
<div class="flex flex-col justify-center items-center mt-10 md:mt-0 mb-20">
    <a href="{{route('gallery')}}" class="bg-black hover:bg-white text-gray-100 hover:text-black uppercase  px-6 py-2  transition cursor-pointer duration-300  text-sm tracking-[0.1em]">
        Otvoriť galériu
    </a>
</div>
