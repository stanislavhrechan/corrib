<section class="relative w-full pt-34  pb-12">
    <div class="px-6 text-center mb-10">
      <h2 class="font-[header-font] text-center text-4xl md:text-5xl">Vyberte si váš nový domov</h2>
      <p class="text-md max-w-6xl mx-auto  text-gray-600">Od útulných dvojizbových bytov až po veľkorysé rodinné rezidencie.</p>
    </div>
    <div class="building-wrapper">
        @includeIf('components.floor-svg.home')
        <div id="mapTooltip"></div>
    </div>

</section>

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
</script>