@extends('layouts.app')
@section('content')
    <section class="relative w-full pt-34 mb-12">
        <div class="px-6 text-center mb-5">
          <h2 class="font-[header-font] text-center text-4xl md:text-5xl">Vyberte si váš nový domov</h2>
          <p class="text-md max-w-6xl mx-auto  text-gray-600">Od útulných dvojizbových bytov až po veľkorysé rodinné rezidencie.</p>
        </div>
        <div class="building-wrapper">
            @includeIf('components.floor-svg.home')
            <div id="mapTooltip"></div>
        </div>
        <div class="hidden md:block absolute bottom-5 w-full">
            <div class="flex justify-between mx-10">
                <a id="scroll-kontakt"
                  class="z-30 px-4 py-2 bg-black text-white cursor-pointer">
                    Obhliadka
                </a>
                <a id="scroll-parkovisko"
                  class="z-30 px-4 py-2 bg-[#575757] text-white cursor-pointer">
                    Parkovacie miesta
                </a>
            </div>
        </div>
    </section>
    <x-info.parkovisko :buildings="$buildings"/>
    <x-main-component.kontakt></x-main-component.kontakt>

<style>
  .building-map {
  shape-rendering: geometricPrecision;
  transform: translateZ(0);
  backface-visibility: hidden;
}
</style>

<script>
 document.addEventListener('DOMContentLoaded', () => {

  const zones = document.querySelectorAll('.zone');
  const tooltip = document.getElementById('mapTooltip');

  zones.forEach(zone => {

    zone.addEventListener('mouseenter', () => {
      const info = zone.dataset.info;
      tooltip.innerHTML = info;
      tooltip.classList.add('active');
    });

    zone.addEventListener('mousemove', (e) => {
      const offsetX = 20;
      const offsetY = 20;

      tooltip.style.left = e.clientX + offsetX + 'px';
      tooltip.style.top = e.clientY + offsetY + 'px';
    });

    zone.addEventListener('mouseleave', () => {
      tooltip.classList.remove('active');
    });

    zone.addEventListener('click', () => {
      const url = zone.dataset.url;
      if (url) window.location.href = url;
    });

  });

});


document.getElementById("scroll-kontakt").addEventListener("click", () => {
    gsap.to(window, {duration: 1, scrollTo: "#kontakt", ease: "power2.out"});
});
document.getElementById("scroll-parkovisko").addEventListener("click", () => {
    gsap.to(window, {duration: 1, scrollTo: "#parkovisko", ease: "power2.out"});
});
</script>
@endsection