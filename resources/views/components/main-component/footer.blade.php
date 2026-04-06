<footer class="bg-black/60 text-black relative overflow-hidden p-4">

  <div class="flex flex-col h-full justify-center items-center">
    <div class="flex justify-center">
      <img src="../images/logo_carrib.svg" alt="Corrib Tower" class="h-full w-full opacity-[0.8]">
    </div>
    <nav class="flex flex-col md:flex-row items-center justify-center mt-6 text-white uppercase text-md  tracking-wider">
      <a href="/" class="hover:text-gray-400 transition font-[header-font] z-10 md:after:content-['•'] md:after:mx-2 md:after:text-gray-400">Domov</a>
      <a href="{{route('corrib.bild')}}" class="hover:text-gray-400 transition font-[header-font] z-10  md:after:content-['•'] md:after:mx-2 md:after:text-gray-400">Ponuka bytov</a>
      <a href="{{ url('/') }}#benefity" class="hover:text-gray-400 transition font-[header-font] z-10 md:after:content-['•'] md:after:mx-2 md:after:text-gray-400">Benefity</a>
      <a href="{{ url('/') }}#financovanie" class="hover:text-gray-400 transition font-[header-font] z-10 md:after:content-['•'] md:after:mx-2 md:after:text-gray-400">Financovanie</a>
      <a href="{{route('gallery')}}" class="hover:text-gray-400 transition font-[header-font] z-10 md:after:content-['•'] md:after:mx-2 md:after:text-gray-400">Galéria</a>
      <a href="#kontakt" class="hover:text-gray-400 transition font-[header-font] z-10">Kontakt</a>
    </nav>

    <p class="text-center text-xs text-gray-300 mt-6 pb-6">
      Všetky práva vyhradené © {{date('Y')}} corrib.sk
    </p>
  </div>
  

  <div class="absolute bottom-0 right-0">
    <img src="../images/corrib_footer.png" alt="" class="h-96 opacity-80 z-5">
  </div>
</footer>