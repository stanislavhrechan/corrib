<section  id="cta-section" class="relative w-full h-150 overflow-hidden">

  <div id="ctaBg" 
       class="absolute top-0 left-0 w-full h-full bg-cover bg-center"
       style="background-image: url('/images/c-t-a.svg');">
  </div>

  <div class="absolute inset-0 bg-black/40"></div>

  <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-6 animated">
    <h2 class="font-[header-font] text-center text-2xl md:text-5xl max-w-3xl text-white mb-3">3D prehliadka</h2>
    <p class="text-xl text-gray-200 max-w-xl mb-5">Corrib Tower prináša nadčasový dizajn. Byty sú navrhnuté tak, aby maximalizovali prísun prirodzeného svetla.</p>
    <a href="#floors"
        class="inline-block bg-black hover:bg-white text-gray-100 hover:text-black  px-8 py-3  hover:bg-[#4A4036] transition duration-300 uppercase text-sm tracking-[0.1em]">
        Otvoriť prehliadku
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