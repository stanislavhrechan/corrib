@extends('layouts.app')
@section('content')
<section class="relative w-full pb-12 mb-10">
    <div class="max-w-6xl mx-auto pt-30 px-3 mb-5 md:mb-10">
          <h2 class="font-[header-font] text-center text-3xl md:text-5xl">
              Vyberte si priestor pre vašu ambulanciu
          </h2>
          <p class="text-black text-center md:text-md"><span class="">Corrib Tower</span> - <span class="font-semibold ">{{$floor->name}}</span></p>
    </div>
    <div class="building-wrapper w-full md:px-10 md:max-w-7xl mx-auto">
      @if($floor->floor_number >= 6 && $floor->floor_number <=9)
         @includeIf('components.floor-svg.floor_6_9', ['apartments' => $apartments, 'floor' => $floor])
      @else
          @includeIf('components.floor-svg.floor_' . $floor->floor_number, ['apartments' => $apartments, 'floor' => $floor])
      @endif
    </div>
    <div id="apartment-info"
            class="absolute hidden bg-white  p-4 w-56 pointer-events-none z-40">
            <h3 id="info-name" class="font-semibold text-lg"></h3>
            <p id="info-rooms"></p>
            <p id="info-area"></p>
            <p id="info-status" class="font-medium mt-1"></p>
    </div>
     <div class="hidden md:block absolute -bottom-3 w-full">
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

<x-info.apartment-table :apartments="$apartments"></x-info.apartment-table>
 <x-info.parkovisko :buildings="$buildings"/>
<x-main-component.kontakt></x-main-component.kontakt>


<script>
document.addEventListener('DOMContentLoaded', () => {
  const zones = document.querySelectorAll('.zone');
  const infoBox = document.getElementById('apartment-info');

  const nameEl = document.getElementById('info-name');
  const roomsEl = document.getElementById('info-rooms');
  const areaEl = document.getElementById('info-area');
  const statusEl = document.getElementById('info-status');
  const statusMap = {
      free: {
          text: "Voľný",
          class: "bg-green-200 text-black"
      },
      occupied: {
          text: "Predaný",
          class: "bg-red-400 text-white"
      },
      reserved: {
          text: "Rezervovaný",
          class: "bg-yellow-400 text-black"
      },
      maintenance: {
          text: "Maintenance",
          class: "bg-gray-400 text-white"
      }
  }

  zones.forEach(zone => {

    zone.addEventListener('mouseenter', () => {

      const rect = zone.getBoundingClientRect();

      const name = zone.dataset.name;
      const rooms = zone.dataset.rooms;
      const area = zone.dataset.area;
      const status = zone.dataset.status;
      const s = statusMap[status] || statusMap['maintenance'];
      nameEl.textContent = name;
      areaEl.textContent = "Výmera: " + area + " m²";
      statusEl.innerHTML = `
          Stav:
          <span class="px-2 py-1 ml-2 text-sm  font-medium ${s.class}">
              ${s.text}
          </span>
      `;

      infoBox.style.display = 'block';

      const left = rect.left + rect.width / 10 + window.scrollX - infoBox.offsetWidth / 5;
      const top = rect.bottom + window.scrollY + 8; 

      infoBox.style.left = left + "px";
      infoBox.style.top = top + "px";
    });

    zone.addEventListener('mouseleave', () => {
      infoBox.style.display = 'none';
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