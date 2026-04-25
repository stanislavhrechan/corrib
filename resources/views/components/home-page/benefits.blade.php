@php
$images = [
    ['src' => '/images/for_why/why_1.png', 'alt' => 'Illustrations by my fav AarzooAly', 'header' => 'Exteriérové rolety/žalúzie', 'text' => 'Príprava na všetky byty'],
    ['src' => '/images/for_why/why_2.png', 'alt' => 'Illustrations by my fav AarzooAly', 'header' => 'Video vrátnik a Kamerový systém ', 'text' => 'Špičkové technológie, ktoré strážia váš domov, kým vy si nerušene užívate jeho pohodlie.'],
    ['src' => '/images/for_why/why_3.png', 'alt' => 'Illustrations by my fav AarzooAly', 'header' => 'Príprava na klimatizáciu', 'text' => 'V projekte je zabezpečená kompletná príprava na inštaláciu klimatizácie. Získate tak jednoduchú cestu k maximálnemu tepelnému komfortu počas horúcich dní.'],
    ['src' => '/images/for_why/why_4.png', 'alt' => 'Illustrations by my fav AarzooAly', 'header' => 'Fotovoltická elektráreň a tepelné čerpadlo', 'text' => 'Váš komfort zabezpečuje kombinácia fotovoltiky a výkonného tepelného čerpadla vzduch/voda. Ekologická energia zo slnka napája kúrenie, osvetlenie aj ohrev vody. Tento systém výrazne znižuje vaše mesačné prevádzkové náklady. Tepelné čerpadlo sa postará o úsporný ohrev teplej vody a stabilné teplo v celom priestore. Využívanie obnoviteľných zdrojov chráni životné prostredie aj vašu peňaženku.'],
    ['src' => '/images/for_why/why_5.png', 'alt' => 'Illustrations by my fav AarzooAly', 'header' => 'Inteligentný manažment tepla', 'text' => 'Centrálna plynová kotolňa v spojení s bytovými stanicami Danfoss vám umožní nastaviť si ideálne teplo v každej miestnosti jednoducho cez mobilnú aplikáciu.'],
];
@endphp

<div id="benefity" class="my-10 flex flex-col gap-3 items-center px-5">
    <p class="text-gray-600 text-center max-w-2xl">
        Bývanie na Levočskej ulici v Poprade znamená komfort v každom detaile.
    </p>
    <h2 class="font-[header-font] text-4xl md:text-5xl text-center">Benefity</h2>
</div>

<div class="w-full px-5 overflow-hidden">
    <div class="flex flex-col md:flex-row gap-2">

        @foreach($images as $index => $image)
            <div 
                class="item group w-full md:flex-1 relative cursor-pointer overflow-hidden transition-all duration-700 ease-in-out h-[250px] md:h-[70vh]"
                data-index="{{ $index }}"
            >

                <img 
                    src="{{ $image['src'] }}"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                >

                {{-- overlay --}}
                <div class="overlay absolute inset-0 bg-black/50 opacity-0 transition-opacity duration-500"></div>

                {{-- text --}}
                <div class="card-text absolute bottom-5 left-5 text-white opacity-0 md:opacity-0 transition-all duration-500">
                    <h3 class="text-2xl md:text-3xl font-[header-font]">
                        {{ $image['header'] }}
                    </h3>
                    <p class="text-sm text-gray-200 max-w-md">
                        {{ $image['text'] }}
                    </p>
                </div>

            </div>
        @endforeach

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const items = document.querySelectorAll('.item');

    let activeIndex = 0;
    let isHovered = false;
    const isMobile = window.innerWidth < 768;

    function setActive(index) {
        activeIndex = index;

        items.forEach((item, i) => {
            const overlay = item.querySelector('.overlay');
            const text = item.querySelector('.card-text');

            if (isMobile) {
                item.style.flex = 'unset';
                item.style.height = '250px';

                overlay.style.opacity = '1';
                text.style.opacity = '1';
                text.style.transform = 'translateY(0)';
            } 
            else {
                item.style.flex = (i === index) ? '11' : '1';

                overlay.style.opacity = (i === index) ? '1' : '0';
                text.style.opacity = (i === index) ? '1' : '0';
                text.style.transform = (i === index) ? 'translateY(0)' : 'translateY(10px)';
            }
        });
    }

    setActive(0);

    if (isMobile) {
        items.forEach((item, i) => {
            item.addEventListener('click', () => {
                setActive(i);
            });
        });
    }

    if (!isMobile) {
        items.forEach((item, i) => {
            item.addEventListener('mouseenter', () => {
                isHovered = true;
                setActive(i);
            });

            item.addEventListener('mouseleave', () => {
                isHovered = false;
            });
        });
    }

    if (!isMobile) {
        setInterval(() => {
            if (!isHovered) {
                setActive((activeIndex + 1) % items.length);
            }
        }, 3000);
    }

});
</script>