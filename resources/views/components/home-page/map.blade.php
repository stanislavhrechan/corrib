 <div class="flex my-10 md:my-30 flex-col gap-2 items-center">
    <h2 class="font-[header-font] text-center text-4xl md:text-5xl max-w-3xl">Localita</h2>
</div>
<section class="relative w-full h-full">
  <div class="building-wrapper relative flex justify-center">
    <img src="./images/about/mapik.png" alt="">   
  </div>
  <div class="relative flex flex-col justify-center items-center mt-30">
    <h2 class="font-[header-font] text-center text-4xl md:text-5xl max-w-6xl">
      Architektúra, ktorá myslí na vaše pohodlie a 
      investícia do budúcnosti
    </h2>
    <p class="max-w-3xl mx-auto text-center mt-10">
      Byt v <strong>Corrib Tower</strong> nie je len miestom na bývanie, ale aj <strong>výhodnou investíciou</strong>. Lokalita
      v centre Popradu a <strong>výhľad na Vysoké Tatry</strong> zaručujú dlhodobú hodnotu nehnuteľnosti.
      <br>
      Naším cieľom bolo vytvoriť miesto, kde máte všetko na dosah, a pritom si zachovávate svoje
      <strong>súkromie a pokoj</strong>.
    </p>
  </div>
</section>

<style>
  
#mapTooltipMap {
   position: fixed;
    background: white;
    color: black;
    padding: 6px 10px;
    font-size: 14px;
    text-align: center;
    width: 8%;
    pointer-events: none;
    opacity: 0;
    transition: 0.2s;
    z-index: 999;
}

.building-wrapper svg {
    position: relative;
    z-index: 1;
}

#mapTooltipMap {
    z-index: 9999;
}

#mapTooltipMap.active {
    opacity: 1;
}
.icon_map:hover path:first-child {
    fill: black;
}
.icon_map {
    cursor: pointer;
    pointer-events: all;
}

rect {
    pointer-events: none;
}
</style>


<script>
document.addEventListener('DOMContentLoaded', () => {
    const icons_map = document.querySelectorAll('.icon_map');
    const tooltip = document.getElementById('mapTooltipMap');

    icons_map.forEach(icon_map => {
        icon_map.addEventListener('mouseenter', (e) => {
            tooltip.innerHTML = icon_map.dataset.info;
            tooltip.classList.add('active');
        });

        icon_map.addEventListener('mousemove', (e) => {
            tooltip.style.left = e.pageX - 50 + 'px';
            tooltip.style.top = e.pageY - 100 + 'px';
        });

        icon_map.addEventListener('mouseleave', () => {
            tooltip.classList.remove('active');
        });
    });
});
</script>