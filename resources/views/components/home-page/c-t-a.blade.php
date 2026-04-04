<section  id="cta-section" class="relative w-full h-150 overflow-hidden">
  <div id="ctaBg" 
       class="absolute top-0 left-0 w-full h-full bg-cover bg-center"
       style="background-image: url('/images/c-t-a.svg');">
  </div>
  <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_rgba(0,0,0,0.3)_0%,_rgba(0,0,0,0.7)_100%)]"></div>
  <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-6 animated">
    <h2 class="font-[header-font] text-center text-2xl md:text-5xl max-w-3xl text-white mb-3">3D prehliadka</h2>
    <p class="text-base md:text-lg  text-white/80  max-w-xl mb-5 leading-relaxed">Corrib Tower prináša nadčasový dizajn. Byty sú navrhnuté tak, aby maximalizovali prísun prirodzeného svetla.</p>
    <a href="#floors"
       class="relative overflow-hidden border border-white/30 px-10 py-3 uppercase text-sm tracking-widest text-white group transition duration-300">

      <span class="relative z-10 inline-flex items-center gap-2">

        <span class="group-hover:translate-x-[-4px] transition duration-300">
            Otvoriť prehliadku
        </span>

        <svg class="w-5 h-5 opacity-0 translate-x-[-6px] group-hover:opacity-100 group-hover:translate-x-0 transition duration-300"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 -960 960 960"
            fill="currentColor">

            <path d="M40-160v-640l240 40v560L40-160Zm320-40v-560h240v560H360Zm560 40-240-40v-560l240-40v640Z"/>

        </svg>

        </span>

    </a>
  </div>

</section>

<script>
const cta = document.getElementById('cta-section');
const bg = document.getElementById('ctaBg');
const button = document.querySelector('a[href="#floors"]');

button.addEventListener('click', (e) => {
    e.preventDefault();

    const tl = gsap.timeline();

    tl.to(cta, {
        height: "100vh",
        duration: 0.8,
        ease: "power3.inOut"
    })

    .to(bg, {
        scale: 1.2,
        duration: 1.2,
        ease: "power3.out"
    }, "<")

    .to(cta.querySelector('.bg-black\\/40'), {
        backgroundColor: "rgba(0,0,0,0.7)",
        duration: 0.6
    }, "<")

    .to(cta, {
        filter: "blur(6px)",
        duration: 0.5
    })

    .to(cta, {
        filter: "blur(0px)",
        duration: 0.5
    })

    .call(() => {
        document.querySelector('#floors')?.scrollIntoView({ behavior: 'smooth' });
    });
});
</script>