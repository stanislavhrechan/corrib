<div class="flex my-10 md:my-30 flex-col gap-2 items-center">
    <h2 class="font-[header-font] text-center text-4xl md:text-5xl max-w-3xl">
        Prečo bývať v Corrib Tower?
    </h2>
</div>

<section class="relative w-full mt-30" id="sticky-cards-container">

@php
$cards = [
    [
        'id' => 1,
        'image' => '/images/privilegios/privilegios-1.webp',
        'title' => 'Výhľad na Vysoké Tatry',
        'video' => null,
        'svg' => <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-24 h-24 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            HTML,
        'text' => 'Dominantou projektu je panoramatický výhľad na naše
            veľhory. Sledovať západ slnka nad štítmi priamo z vašej obývačky sa stane
            obľúbeným rituálom.'
    ],
    [
        'id' => 2,
        'image' => '/images/privilegios/privilegios-2.png',
        'title' => 'Centrum mesta na dosah',
        'video' => null,
        'svg' => <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-24 h-24 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
            </svg>
            HTML,
        'text' => 'Zabudnite na dlhé dochádzanie. Či už obľubujete ranné
            espresso v útulnej kaviarni alebo večernú prechádzku v parku, centrum mesta vám
            ponúka tie najlepšie prevádzky priamo pod oknami.'
    ],
    [
        'id' => 3,
        'image' => '',
        'title' => 'Komfort pre rodiny',
        'video' => '/videos/video_banners_3.mp4',
        'svg' => <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-24 h-24 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            HTML,
        'text' => 'Priamo v areáli projektu sme pre vašich najmenších vybudovali
            moderné detské ihrisko, kde môžu tráviť čas na čerstvom vzduchu. Školy, služby
            a občiansku vybavenosť máte v blízkosti bývania.'
    ],
    [
        'id' => 4,
        'image' => '/images/privilegios/privilegios-4.webp',
        'title' => 'Všetko dôležité pre vaše zdravie na jednom mieste',
        'video' => null,
        'svg' => <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-24 h-24 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
            HTML,
        'text' => 'Veríme, že skutočný komfort bývania sa meria aj tým, ako rýchlo a pohodine vybavite
        dôležité záležitosti spojené so zdravím.
        Zabudnite na štartovanie auta či hladanie
        parkoviska - poliklinika s lekárňou priamo v areáli vám ušetrí čas aj energiu. Všetko
        potrebné máte na dosah, pohodine a bez zbytočných starostí.'
    ],
    [
        'id' => 5,
        'image' => '',
        'title' => 'Zelená oáza v meste',
        'video' => '/videos/video_banners_5.mp4',
        'svg' => <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-24 h-24 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            HTML,
        'text' => 'Hoci ste v srdci diania, v okolí domu sme zachovali dostatok zelene pre oddych a regeneráciu.
        Priamo v areáli sme kládli dôraz na parkovú úpravu a estetickú výsadbu, ktorá vytvára
        prirodzenú bariéru od mestského prostredia. Je to priestor, kde si môžete v pokoji prečítať
        knihu na lavičke, zatiaľ čo vaše deti sa hrajú na modernom a bezpečnom ihrisku.'
    ],
    [
        'id' => 6,
        'image' => '/images/privilegios/privilegios-7.png',
        'title' => 'AquaCity Poprad',
        'video' => null,
        'svg' => <<<HTML
            <svg class="w-24 h-24 text-white" viewBox="0 0 173 136" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.5 8.10714L8.88294 13.7842C13.8275 18.999 20.5337 21.9286 27.5263 21.9286C34.5189 21.9286 41.2252 18.999 46.1697 13.7842L48.1987 11.6443C53.1433 6.42959 59.8495 3.5 66.8421 3.5C73.8351 3.5 80.5406 6.42959 85.4856 11.6443L87.5144 13.7842C92.4594 18.999 99.1649 21.9286 106.158 21.9286C113.151 21.9286 119.856 18.999 124.801 13.7842L126.83 11.6443C131.775 6.42959 138.481 3.5 145.474 3.5C152.467 3.5 159.172 6.42959 164.117 11.6443L169.5 17.3214M3.5 63.3929L8.88294 69.0698C13.8275 74.2851 20.5337 77.2143 27.5263 77.2143C34.5189 77.2143 41.2252 74.2851 46.1697 69.0698L48.1987 66.9302C53.1433 61.7149 59.8495 58.7857 66.8421 58.7857C73.8351 58.7857 80.5406 61.7149 85.4856 66.9302L87.5144 69.0698C92.4594 74.2851 99.1649 77.2143 106.158 77.2143C113.151 77.2143 119.856 74.2851 124.801 69.0698L126.83 66.9302C131.775 61.7149 138.481 58.7857 145.474 58.7857C152.467 58.7857 159.172 61.7149 164.117 66.9302L169.5 72.6071M3.5 118.679L8.88294 124.355C13.8275 129.571 20.5337 132.5 27.5263 132.5C34.5189 132.5 41.2252 129.571 46.1697 124.355L48.1987 122.216C53.1433 117.001 59.8495 114.071 66.8421 114.071C73.8351 114.071 80.5406 117.001 85.4856 122.216L87.5144 124.355C92.4594 129.571 99.1649 132.5 106.158 132.5C113.151 132.5 119.856 129.571 124.801 124.355L126.83 122.216C131.775 117.001 138.481 114.071 145.474 114.071C152.467 114.071 159.172 117.001 164.117 122.216L169.5 127.893" stroke="white" stroke-width="7" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            HTML,
        'text' => '13 bazénov, tobogany a špičkové wellness. Ideálne miesto na regeneráciu po turistike, len pár minút od nás.'
    ],
    [
        'id' => 7,
        'image' => '/images/privilegios/privilegios-6.png',
        'title' => 'Zimný štadión mesta Poprad',
        'video' => null,
        'svg' => <<<HTML
            <svg class="w-24 h-24 text-white" viewBox="0 0 176 149" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M102.908 134.912H73.092C71.8724 134.912 70.8838 135.9 70.8838 137.12V145.954C70.8838 147.177 71.8721 148.165 73.092 148.165H102.908C104.128 148.165 105.116 147.176 105.116 145.954V137.12C105.116 135.9 104.128 134.912 102.908 134.912Z" fill="white"/>
            <path d="M134.519 6.21259L124.16 0L92.8457 51.9124L99.8998 63.6096L134.519 6.21259Z" fill="white"/>
            <path d="M76.1001 79.6699L60.215 106.006C56.7896 111.691 50.2212 114.684 43.6838 113.538L9.41806 107.531C7.07987 107.122 4.68222 107.766 2.86653 109.291C1.0505 110.815 0 113.069 0 115.441V127.477C0 130.8 2.69672 133.497 6.02353 133.497H35.0708C49.1483 133.497 62.2002 126.124 69.4636 114.063L83.1538 91.3667L76.1001 79.6699Z" fill="white"/>
            <path d="M173.134 109.29C171.318 107.765 168.921 107.121 166.582 107.531L132.317 113.537C125.779 114.684 119.211 111.69 115.785 106.006L51.8397 0L41.4814 6.21259L106.537 114.062C113.8 126.123 126.852 133.496 140.93 133.496H169.977C173.304 133.496 176.001 130.8 176.001 127.476V115.44C176 113.068 174.95 110.815 173.134 109.29Z" fill="white"/>
            </svg>
            HTML,
        'text' => 'Zažite pravú hokejovú atmosféru v slovenskej extralige. Len pár minút od nás si môžete vychutnať zápasy domáceho HK Poprad v jednom z najmodernejších hokejových stánkov pod Tatrami.'
    ],
];
@endphp

<div class="sticky-wrapper relative w-full h-[100dvh] overflow-hidden">

    @foreach($cards as $index => $card)
        <div class="card absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-center overflow-hidden">

            {{-- MEDIA --}}
            @if(!empty($card['video']))
                <video class="card-video absolute inset-0 w-full h-full object-cover"
                 muted
                autoplay
                loop
                playsinline>
                    <source src="{{ $card['video'] }}" type="video/mp4">
                </video>
            @else
                <div class="absolute inset-0 bg-cover bg-center"
                     style="background-image:url('{{ $card['image'] }}');"></div>
            @endif

            {{-- OVERLAY --}}
            @if($card['id'] === 2)
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
            @else
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent"></div>
            @endif
            {{-- CONTENT --}}
            <div class="relative z-10 flex flex-col items-center">
                <h4 class="text-white font-[header-font] text-4xl md:text-5xl mb-3">
                    {{ $card['title'] }}
                </h4>

                {!! $card['svg'] !!}

                <p class="text-white text-center max-w-md mt-3 px-6">
                    {{ $card['text'] }}
                </p>
            </div>

            {{-- LOGO --}}
            <div class="absolute bottom-8 right-5 md:right-15 z-10">
                <img src="./images/white-logo_for_privilegios.svg" class="w-30">
            </div>

        </div>
    @endforeach

</div>
</section>
<style>
.card {
will-change: transform;
}
</style>
<script>
document.addEventListener("DOMContentLoaded", () => {

    gsap.registerPlugin(ScrollTrigger);

    const container = document.getElementById("sticky-cards-container");
    const cards = gsap.utils.toArray(".card");
    const videos = document.querySelectorAll(".card-video");
    const total = cards.length;

    gsap.set(cards, {
        xPercent: (i) => i === 0 ? 0 : 100
    });

    const tl = gsap.timeline({
        defaults: { ease: "none" },
        scrollTrigger: {
            trigger: container,
            start: "top top",
            end: () => "+=" + (window.innerHeight * total),
            pin: true,
            scrub: 1,
            anticipatePin: 0.5,
            invalidateOnRefresh: true,
        }
    });

    cards.forEach((card, i) => {
        if (i === total - 1) return;

        tl.to(cards[i + 1], {
            xPercent: 0
        });
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const video = entry.target;

            if (!video) return;

            if (entry.isIntersecting) {
                video.muted = true;
                video.playsInline = true;

                video.play().catch(() => {});
            } else {
                video.pause();
            }
        });
    }, {
        threshold: 0.6 
    });

    videos.forEach(video => {
        observer.observe(video);
    });

    let resizeTimeout;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            ScrollTrigger.refresh();
        }, 200);
    });

});
</script>