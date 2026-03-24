<section class="relative h-[85vh] md:h-screen w-full flex items-center justify-center text-center">
    <div class="absolute inset-0 w-full h-full">
      <video 
        id="heroVideo" 
        class="w-full h-full object-cover" 
        autoplay 
        muted 
        playsinline 
        loop>
        <source src="/videos/corrib_hero.mp4" type="video/mp4">
      </video>
    </div>

    <div class="absolute inset-0 bg-gradient-to-b from-[#383737]/50 to-[#383737]/14"></div>

    <div class="relative z-10 flex flex-col items-center px-6">
      <h1 class="text-5xl md:text-6xl  max-w-3xl font-[header-font] uppercase text-white mb-6 md:leading-15" >
        Moderný domov s Tatrami ako na dlani
      </h1>
      <a href="" class="bg-black hover:bg-white text-gray-100 hover:text-black uppercase  px-6 py-2  transition cursor-pointer duration-300">
        Vybrať byt
       
      </a>
    </div>
    <div class="absolute flex flex-col bottom-10 md:right-1/2 md:translate-x-1/2 flex items-center gap-4 z-10">
      <span class="text-white text-xs tracking-[0.3em] uppercase">
        Preskúmajte viac
      </span>
      <div class="relative w-[1px] h-24 bg-white/30 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-6 bg-white animate-scroll-line"></div>
      </div>
    </div>
</section>

<style>
  @keyframes scroll-line {
  0% {
    transform: translateY(-100%);
    opacity: 0;
  }
  20% {
    opacity: 1;
  }
  80% {
    opacity: 1;
  }
  100% {
    transform: translateY(400%);
    opacity: 0;
  }
}

.animate-scroll-line {
  animation: scroll-line 3s ease-in-out infinite;
}
</style>