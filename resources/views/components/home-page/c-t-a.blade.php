<section id="cta-section" class="relative w-full h-[600px] overflow-hidden">
  <div id="ctaBg" 
       class="absolute inset-0 bg-cover bg-center"
       style="background-image: url('/images/c-t-a.svg');">
  </div>

  <div class="absolute inset-0 bg-black/50"></div>

  <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-6">
    <h2 class="font-[header-font] text-center text-3xl md:text-5xl max-w-3xl text-white mb-4">3D prehliadka</h2>
    <p class="text-white/80 mb-6 max-w-xl">
      Vyberte si apartmán a prezrite si ho v 3D.
    </p>

    <button id="openKuula"
      class="border border-white/30 px-10 py-3 uppercase text-sm text-white hover:bg-white hover:text-black transition duration-250 cursor-pointer">
      Otvoriť prehliadku
    </button>
  </div>
</section>


<section id="kuula-section"
  class="fixed inset-0 bg-black z-50 opacity-0 pointer-events-none">

  <div class="absolute top-0 left-0 w-full flex justify-between items-start md:items-center p-6 z-50 cursor-pointer ">

    <div class="flex flex-col md:flex-row gap-3 mt-15 md:mt-0 md:ml-20">
      <button class="changeTour bg-black/45 hover:bg-black/90 transition duration-250 text-white px-4 py-2 text-xs md:text-sm uppercase  text-white cursor-pointer"
        data-tour="https://kuula.co/share/collection/7Mnyl?logo=1&info=0&fs=0&vr=1&sd=1&initload=1&thumbs=3">
        Corrib 2i.2
      </button>

      <button class="changeTour bg-black/45 hover:bg-black/90 transition duration-250 text-white px-4 py-2 text-xs md:text-sm uppercase  text-white cursor-pointer"
        data-tour="https://kuula.co/share/collection/7MnW6?logo=1&info=0&fs=0&vr=1&sd=1&initload=1&thumbs=3">
        Corrib 2i
      </button>

      <button class="changeTour bg-black/45 hover:bg-black/90 transition duration-250 text-white px-4 py-2 text-xs md:text-sm uppercase  text-white cursor-pointer"
        data-tour="https://kuula.co/share/collection/7MnRV?logo=1&info=0&fs=0&vr=1&sd=1&initload=1&thumbs=3">
        Corrib 3i
      </button>

      <button class="changeTour bg-black/45 hover:bg-black/90 transition duration-250 text-white px-4 py-2 text-xs md:text-sm uppercase  text-white cursor-pointer"
        data-tour="https://kuula.co/share/collection/7MMcB?logo=1&info=0&fs=0&vr=1&sd=1&initload=1&thumbs=3">
        Corrib 4i
      </button>
    </div>

    <button id="closeKuula"
      class="bg-white/45  text-black hover:bg-white/90 transition duration-250 px-4 py-2 text-xs md:text-sm uppercase cursor-pointer">
      Zavrieť
    </button>
  </div>

  <iframe id="kuulaFrame"
    class="w-full h-full"
    frameborder="0"
    allow="xr-spatial-tracking; gyroscope; accelerometer"
    allowfullscreen
    scrolling="no">
  </iframe>

</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<script>
const cta = document.getElementById('cta-section');
const bg = document.getElementById('ctaBg');
const openBtn = document.getElementById('openKuula');

const kuulaSection = document.getElementById('kuula-section');
const kuulaFrame = document.getElementById('kuulaFrame');
const closeBtn = document.getElementById('closeKuula');

const defaultTour = "https://kuula.co/share/collection/7Mnyl?logo=1&info=0&fs=0&vr=1&sd=1&initload=1&thumbs=3";


openBtn.addEventListener('click', () => {

    const tl = gsap.timeline();

    tl.to(bg, {
        scale: 1.2,
        duration: 1,
        ease: "power3.out"
    })

    .to(cta, {
        filter: "blur(6px)",
        duration: 0.5
    })

    .call(() => {
        kuulaSection.style.pointerEvents = "auto";
        kuulaFrame.src = defaultTour;
    })

    .to(kuulaSection, {
        opacity: 1,
        duration: 0.8
    });
});


closeBtn.addEventListener('click', () => {

    const tl = gsap.timeline();

    tl.to(kuulaSection, {
        opacity: 0,
        duration: 0.5
    })

    .call(() => {
        kuulaSection.style.pointerEvents = "none";
        kuulaFrame.src = "";
    })

    .to(cta, {
        filter: "blur(0px)",
        duration: 0.5
    }, "<");
});


document.querySelectorAll('.changeTour').forEach(btn => {
    btn.addEventListener('click', () => {

        const url = btn.dataset.tour;

        gsap.to(kuulaFrame, {
            opacity: 0,
            duration: 0.3,
            onComplete: () => {
                kuulaFrame.src = url;

                gsap.to(kuulaFrame, {
                    opacity: 1,
                    duration: 0.3
                });
            }
        });

    });
});
</script>
