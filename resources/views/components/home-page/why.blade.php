 <div class="flex my-10 md:my-30 flex-col gap-2 items-center">
    <h2 class="font-[header-font] text-center text-4xl md:text-5xl max-w-3xl">Prečo bývať v Corrib Tower?</h2>
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
            'image' => '/images/privilegios/privilegios-2.webp',
            'video' => null,
            'title' => 'Centrum mesta na dosah',
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
            'title' => 'Všetko dôležité pre zdravie',
            'video' => null,
            'svg' => <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-24 h-24 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
            HTML,
            'text' => 'Zdravotná starostlivosť dostupná len pár krokov
            od vchodu – keďže poliklinika sa nachádza priamo v areáli, ušetríte čas dochádzaním.'
        ],
        ['id' => 5,
            'image' => '',
            'title' => 'Zelená oáza v meste',
            'video' => '/videos/video_banners_5.mp4',
            'svg' => <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-24 h-24 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            HTML,
            'text' => 'Hoci ste v srdci diania, v okolí domu sme zachovali dostatok
            zelene pre oddych a regeneráciu.'
        ],
    ];
    @endphp
        <div class=" top-0 h-screen w-full overflow-hidden" id="sticky-cards-wrapper">

            @foreach($cards as $index => $card)
                <div
                    class="card absolute top-0 left-0 w-full h-full flex flex-col justify-center text-center items-center overflow-hidden"
                >

                    @if(!empty($card['video']))
                        <video 
                            class="card-video absolute top-0 left-0 w-full h-full object-cover"
                            autoplay
                            muted 
                            loop 
                            playsinline
                            preload="metadata"
                        >
                            <source src="{{ $card['video'] }}" type="video/mp4">
                        </video>
                    @else
                        <div
                            class="absolute top-0 left-0 w-full h-full bg-cover bg-center"
                            style="background-image: url('{{ $card['image'] }}');"
                        ></div>
                    @endif

                    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-black/80 via-black/50 to-transparent"></div>

                    <div class="relative z-10 flex flex-col items-center">
                        <h4 class="text-white font-[header-font] text-4xl md:text-5xl mb-3">
                            {{ $card['title'] }}
                        </h4>

                        {!! $card['svg'] !!}

                        <p class="text-white text-center max-w-md mt-3 px-6">
                            {{ $card['text'] }}
                        </p>
                    </div>

                    <div class="absolute text-white bottom-8 md:bottom-5 right-5 md:right-15 z-10">
                        <img src="./images/white-logo_for_privilegios.svg" class="w-30">
                    </div>

                </div>
            @endforeach
        </div>
</section>

<style>
.card {
    will-change: transform;
    transform: translateZ(0);
}

.card video {
    transform: translateZ(0) scale(1.01);
    backface-visibility: hidden;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    gsap.registerPlugin(ScrollTrigger);

    const container = document.getElementById("sticky-cards-container");
    const cards = gsap.utils.toArray(".card");
    const videos = gsap.utils.toArray(".card-video");
    const total = cards.length;

    cards.forEach((card, i) => {
        gsap.set(card, {
            x: i === 0 ? "0%" : "100%",
            zIndex: i + 1
        });
    });

    videos.forEach(video => {
        video.pause();
        video.currentTime = 0;
    });

    if (videos[0]) {
        videos[0].play();
    }

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: container,
            start: "top top",
            end: `+=${window.innerHeight * (total - 1)}`,
            pin: true,
            scrub: true,
            onUpdate: self => {
                const progress = self.progress;
                const activeIndex = Math.round(progress * (total - 1));

                cards.forEach((card, i) => {
                    const video = card.querySelector("video");

                    if (!video) return;

                    if (i === activeIndex) {
                        video.play().catch(() => {});
                    } else {
                        video.pause();
                    }
                });
            }
        }
    });

    cards.forEach((card, i) => {
        if (i === total - 1) return;

        tl.to(cards[i + 1], {
            x: "0%",
            duration: 1,
            ease: "none"
        }, i);
    });

    const resizeObserver = new ResizeObserver(() => {
        ScrollTrigger.refresh();
    });

    resizeObserver.observe(container);
});
</script>