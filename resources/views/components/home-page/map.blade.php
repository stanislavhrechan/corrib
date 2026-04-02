<div class="interactive-map">

  <div class="map-viewer">
    <div class="map-wrapper">

      <div class="map-zoom-0">
        <img src="./images/for_map/mapik_corrib.webp" class="object-cover">
      </div>

      <div class="map-zoom-1">
        <img src="./images/for_map/Group 613.jpg">
      </div>

    </div>
  </div>

  <div class="scroll-area bg-[#F2F1EC] space-y-12">
    <div class="content-wrapper space-y-8 pt-10">
      <h3 class="text-3xl font-[header-font]">Zelená oáza v meste.</h3>
      <p class="text-md">Hoci ste v srdci diania, v okolí domu sme zachovali dostatok zelene pre oddych a regeneráciu.
      <br>Priamo v areáli sme kládli dôraz na parkovú úpravu a estetickú výsadbu, ktorá vytvára
      prirodzenú bariéru od mestského prostredia. Je to priestor, kde si môžete v pokoji prečítať
      knihu na lavičke, zatiaľ čo vaše deti sa hrajú na modernom a bezpečnom ihrisku.</p>
      <img src="./images/for_map/1.webp" alt="" class="w-full">
       <div class="h-[1px] w-full bg-black/80"></div>
    </div>

    <div class="content-wrapper space-y-8">
      <h3 class="text-3xl font-[header-font]">Všetko dôležité pre vaše zdravie.</h3>
      <p class="text-md">Veríme, že skutočný komfort bývania sa meria aj tým, ako rýchlo a pohodlne vybavíte
      dôležité záležitosti spojené so zdravím.<br>Zabudnite na štartovanie auta či hľadanie parkoviska pred poliklinikou, keďže tá sa nachádza priamo v areáli, ušetríte čas dochádzaním. Neďaleká
      Lekáreň Corrib je vám tiež k dispozícii.</p>
       <img src="./images/for_map/2.webp" alt=""  class="w-full">
       <div class="h-[1px] w-full bg-black/80"></div>
    </div>

    <div class="content-wrapper space-y-8">
      <h3 class="text-3xl font-[header-font]">Svet relaxu a zábavy.</h3>
      <p class="text-md">CLen pár minút cesty od vášho nového domova sa otvárajú brány do sveta vodnej zábavy
      AquaCity Poprad – 13 bazénov, tobogany a špičkové wellness. Ideálne miesto na
      regeneráciu po turistike, doprajte si saunový svet alebo relaxačné masáže. Ak hľadáte
      program na víkend, detské bazény a animácie sú zárukou, že vaše deti sa nebudú nudiť v
      žiadnom počasí.</p>
      <img src="./images/for_map/3.webp" alt="" class="w-full object-cover">
      <div class="h-[1px] w-full bg-black/80"></div>
    </div>

    <div class="content-wrapper space-y-8  pb-10">
      <h3 class="text-3xl font-[header-font]">Hokejové srdce mesta.</h3>
      <p class="text-md">Zažite pravú hokejovú atmosféru v slovenskej extralige. Môžete si vychutnať zápasy
      domáceho HK Poprad v jednom z najmodernejších hokejových stánkov pod Tatrami.<br>Bývanie
      v Corrib Tower znamená, že k pulzujúcej atmosfére popradského hokeja to máte doslova na
      skok. Zimný štadión mesta Poprad sa nachádza v bezprostrednej blízkosti, čo z vášho
      nového domova robí ideálnu adresu pre každého športového nadšenca.</p>
       <img src="./images/for_map/4.webp" alt="" class="w-full object-cover">
    </div>
  </div>
</div>

<style>
body {
  overflow: visible;
}
.interactive-map {
  display: flex;
}

@media (max-width: 768px) {
  .interactive-map {
    flex-direction: column;
  }
}

/* ЛЕВО */
.map-viewer {
  position: sticky;
  top: 0;
  width: 65%;
  height: 100vh;
  overflow: hidden;
}

/* ПРАВО */
.scroll-area {
  width: 35%;
  padding: 40px;
}

@media (max-width: 768px) {
  .map-viewer {
    position: sticky; 
    width: 100%;
    height: 300px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  }

  .scroll-area {
    width: 100%;
    padding: 20px;
  }
}

/* КАРТА */
.map-wrapper {
  position: relative;
  width: 100%;
  height: 100%;
}

.map-zoom-0,
.map-zoom-1 {
  position: absolute;
  inset: 0;
}

.map-zoom-0 img,
.map-zoom-1 img {
  width: 100%;
  height: 100%;
}
</style>

<script>
  document.addEventListener("DOMContentLoaded", () => {

  gsap.registerPlugin(ScrollTrigger);

  const map0 = document.querySelector(".map-zoom-0");
  const map1 = document.querySelector(".map-zoom-1");

  const sections = document.querySelectorAll(".content-wrapper");

  gsap.set(map0, { opacity: 1, scale: 1 });
  gsap.set(map1, { opacity: 0, scale: 1.2 });

  sections.forEach((section, index) => {

    ScrollTrigger.create({
      trigger: section,
      start: "bottom center",
      end: "bottom center",

      onEnter: () => {
        if (index === 1) {
          gsap.to(map0, { opacity: 0, scale: 1.1, duration: 0.6 });
          gsap.to(map1, { opacity: 1, scale: 1, duration: 0.6 });
        }
      },

      onEnterBack: () => {
        if (index === 0) {
          gsap.to(map0, { opacity: 1, scale: 1, duration: 0.6 });
          gsap.to(map1, { opacity: 0, scale: 1.2, duration: 0.6 });
        }
      }

    });

  });

});
</script>