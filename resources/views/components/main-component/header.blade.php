<header id="main-header" class="fixed top-0 left-0 w-full z-50 bg-50 md:py-8 ">
  <div class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between relative">
    <div class="block md:hidden relative z-50">
        <a  href="#kontakt" class="px-4 py-2 text-xs rounded-md 
            bg-[#947D6D]/25 backdrop-blur-md text-white flex items-center
            cursor-pointer           
            hover:bg-[#947D6D]/80 transition uppercase">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
            </svg>
        </a>
    </div>

    <nav class="hidden md:flex gap-8 text-md absolute left-60 top-1/2 -translate-y-1/2 z-50 ">
        <a href="" class="nav-link link-center-line">Domov</a>
        <a href="{{route('corrib.bild')}}" class="nav-link link-center-line">Ponuka bytov</a>
        <a href="#benefity" class="nav-link link-center-line" data-scroll="#benefity">Benefity</a>
    </nav>

    <div class="flex justify-center w-full absolute left-1/2 -translate-x-1/2 z-40 pointer-events-none">
        <img src="/images/logo_carrib.svg" alt="Corrib Tower Logo" class="w-16 md:w-19">
    </div>

    <nav class="hidden md:flex gap-8 text-md absolute right-60 top-1/2 -translate-y-1/2 z-50">
        <a href="#financovanie" class="nav-link link-center-line" data-scroll="#financovanie">Financovanie</a>
        <a href="{{route('gallery')}}" class="nav-link link-center-line">Galéria</a>
        <a href="#kontakt" class="nav-link link-center-line" data-scroll="#kontakt">Kontakt</a>
    </nav>

    <div class="block md:hidden relative z-50">
        <button id="menu-btn" class="px-2 py-2 text-xs rounded-md 
            bg-[#947D6D]/25 backdrop-blur-md text-white flex items-center
            cursor-pointer hover:bg-[#947D6D]/80 transition uppercase">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>

  </div>
</header>
<div id="mobile-menu"
     class="fixed inset-0 bg-black/90 backdrop-blur-md z-50
            opacity-0 pointer-events-none transition duration-300">

    <div class="flex flex-col items-center justify-center h-full gap-6 text-white text-lg uppercase">

        <a href="{{ url('/') }}" class="mobile-link  font-[header-font]">Domov</a>
        <a href="{{ route('corrib.bild') }}" class="mobile-link  font-[header-font]">Ponuka bytov</a>
        <a href="{{ url('/') }}#benefity" class="mobile-link  font-[header-font]">Benefity</a>
        <a href="{{ url('/') }}#financovanie" class="mobile-link  font-[header-font]">Financovanie</a>
        <a href="{{ route('gallery') }}" class="mobile-link  font-[header-font]">Galéria</a>
        <a href="#kontakt" class="mobile-link  font-[header-font]">Kontakt</a>

    </div>
</div>
<script>
const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

let isOpen = false;
let scrollPosition = 0;


function lockScroll() {
    scrollPosition = window.scrollY;

    document.body.style.position = 'fixed';
    document.body.style.top = `-${scrollPosition}px`;
    document.body.style.width = '100%';
}

function unlockScroll() {
    document.body.style.position = '';
    document.body.style.top = '';
    document.body.style.width = '';

    window.scrollTo(0, scrollPosition);
}


function openMenu() {
    mobileMenu.classList.remove('opacity-0', 'pointer-events-none');
    lockScroll();
    isOpen = true;
}

function closeMenu() {
    mobileMenu.classList.add('opacity-0', 'pointer-events-none');
    unlockScroll();
    isOpen = false;
}

function toggleMenu() {
    if (isOpen) {
        closeMenu();
    } else {
        openMenu();
    }
}


menuBtn.addEventListener('click', toggleMenu);

document.querySelectorAll('.mobile-link').forEach(link => {
    link.addEventListener('click', closeMenu);
});

mobileMenu.addEventListener('click', (e) => {
    if (e.target === mobileMenu) {
        closeMenu();
    }
});
</script>
<style>
#main-header {
    transition: transform 0.3s ease, background 0.3s ease, backdrop-filter 0.3s ease;
}

.header-hidden {
    transform: translateY(-100%);
}

.header-visible {
    transform: translateY(0);
}

.header-scrolled {
    background: rgba(44, 44, 44, 0.18);
    backdrop-filter: blur(10px);
}
</style>