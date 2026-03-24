<section class="relative w-full px-6 py-20 overflow-hidden">
  <div class="mb-16 md:mb-5 flex flex-col gap-2 items-center">
    <h2 class="font-[header-font] text-center text-4xl md:text-5xl max-w-3xl">
      Časový harmonogram
    </h2>
    <p class="text-gray-600 text-center max-w-xl">
      Prehľad hlavných fáz výstavby a odovzdávania bytov.
    </p>
  </div>

  <div class="hidden md:block relative max-w-6xl mx-auto">

    <div class="absolute top-1/2 left-0 w-full h-[1px] bg-gray-300 -translate-y-1/2"></div>

    <div class="timeline-progress absolute top-1/2 left-0 w-0 h-[1px] bg-black -translate-y-1/2"></div>

    <div class="flex justify-between">

      <div class="timeline-item relative flex flex-col items-center">
        <div class="absolute top-1/2 -translate-y-1/2 w-6 h-6 bg-black rounded-full z-10 transition hover:scale-125"></div>
        <div class="mt-24 text-center">
          <h4 class="uppercase">Výstavba</h4>
          <span class="text-gray-600 font-[header-font] text-xl">Q1 2026</span>
        </div>
      </div>

      <div class="timeline-item relative flex flex-col items-center">
        <div class="absolute top-1/2 -translate-y-1/2 w-6 h-6 border-2 border-black bg-white rounded-full z-10 transition hover:scale-125"></div>
        <div class="mt-24 text-center">
          <h4 class="uppercase">Ukončenie Výstavby</h4>
          <span class="text-gray-600 font-[header-font] text-xl">Q2 2026</span>
        </div>
      </div>

      <div class="timeline-item relative flex flex-col items-center">
        <div class="absolute top-1/2 -translate-y-1/2 w-6 h-6 bg-black rounded-full z-10 transition hover:scale-125"></div>
        <div class="mt-24 text-center">
          <h4 class="uppercase">Kolaudácia</h4>
          <span class="text-gray-600 font-[header-font] text-xl">Q3 2026</span>
        </div>
      </div>

      <div class="timeline-item relative flex flex-col items-center">
        <div class="absolute top-1/2 -translate-y-1/2 w-6 h-6 border-2 border-black bg-white rounded-full z-10 transition hover:scale-125"></div>
        <div class="mt-24 text-center">
          <h4 class="uppercase">Odovzdávanie bytov</h4>
          <span class="text-gray-600 font-[header-font] text-xl">Q4 2026</span>
        </div>
      </div>

    </div>
  </div>

  <div class="md:hidden relative max-w-6xl mx-auto">

    <div class="absolute left-1/2 top-0 -translate-x-1/2 w-[1px] h-full bg-gray-300"></div>

    <div class="timeline-progress absolute left-1/2 top-0 -translate-x-1/2 w-[1px] h-0 bg-black"></div>

    <div class="flex flex-col gap-16">

      <div class="timeline-item relative flex justify-start">
        <div class="w-1/2 pr-8 text-right">
          <h4 class="uppercase">Výstavba</h4>
          <span class="text-gray-600 font-[header-font] text-lg">Q1 2026</span>
        </div>
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 
                    w-6 h-6 bg-black rounded-full z-10 transition hover:scale-125"></div>
      </div>

      <div class="timeline-item relative flex justify-end">
        <div class="w-1/2 pl-8 text-left">
          <h4 class="uppercase">Ukončenie Výstavby</h4>
          <span class="text-gray-600 font-[header-font] text-lg">Q2 2026</span>
        </div>
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 
                    w-6 h-6 border-1 border-black bg-white rounded-full z-10 transition hover:scale-125"></div>
      </div>

      <div class="timeline-item relative flex justify-start">
        <div class="w-1/2 pr-8 text-right">
          <h4 class="uppercase">Kolaudácia</h4>
          <span class="text-gray-600 font-[header-font] text-lg">Q3 2026</span>
        </div>
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 
                    w-6 h-6 bg-black rounded-full z-10 transition hover:scale-125"></div>
      </div>

      <div class="timeline-item relative flex justify-end">
        <div class="w-1/2 pl-8 text-left">
          <h4 class="uppercase">Odovzdávanie bytov</h4>
          <span class="text-gray-600 font-[header-font] text-lg">Q4 2026</span>
        </div>
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 
                    w-6 h-6 border-1 border-black bg-white rounded-full z-10 transition hover:scale-125"></div>
      </div>

    </div>
  </div>

</section>
