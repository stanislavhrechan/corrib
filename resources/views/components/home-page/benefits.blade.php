@php
$images = [
    ['src' => '/images/for_why/2-why.webp', 'alt' => 'Illustrations by my fav AarzooAly', 'code' => '#23', 'header' => 'Exteriérové rolety/ žalúzie', 'text' => '10Np+ 11Np / ostatné podlažia doladíme  '],
    ['src' => '/images/for_why/1-why.webp', 'alt' => 'Illustrations by my fav AarzooAly', 'code' => '#23', 'header' => 'Video vrátnik a Kamerový systém ', 'text' => 'Špičkové technológie, ktoré strážia váš domov, kým vy si nerušene užívate jeho pohodlie.'],
    ['src' => '/images/for_why/3-why.webp', 'alt' => 'Illustrations by my fav AarzooAly', 'code' => '#23', 'header' => 'Príprava na klimatizáciu a Tepelné čerpadlo', 'text' => 'Kompletná príprava na klimatizáciu a výkonné tepelné čerpadlá vzduch/voda pre váš maximálny tepelný komfort a úsporný ohrev TÚV.'],
    ['src' => '/images/for_why/4-why.webp', 'alt' => 'Illustrations by my fav AarzooAly', 'code' => '#23', 'header' => 'Fotovoltaická elektráreň', 'text' => 'Ekologická energia pre váš komfort: fotovoltika napája tepelné čerpadlá, ohrev vody aj osvetlenie spoločných priestorov, čím minimalizuje vaše prevádzkové náklady.'],
    ['src' => '/images/for_why/5-why.webp', 'alt' => 'Illustrations by my fav AarzooAly', 'code' => '#23', 'header' => 'Inteligentný manažment tepla', 'text' => 'Centrálna plynová kotolňa v spojení s bytovými stanicami Danfoss vám umožní nastaviť si ideálne teplo v každej miestnosti jednoducho cez mobilnú aplikáciu.'],
];
@endphp
<div id="benefity"  class="my-5  flex flex-col gap-2 items-center">
    <p class="mx-5 text-gray-600 text-center">Bývanie na Levočskej ulici v Poprade znamená, že váš čas patrí vám, nie dochádzaniu.<br>Všetko, čo potrebujete k spokojnému životu, nájdete v okruhu pár minút chôdze.</p>
    <h2 class="font-[header-font] text-center text-2xl text-4xl md:text-5xl">Benefity</h2>
</div>
<div class="flex h-full w-full items-center justify-center overflow-hidden">
    <div class="relative w-full px-5 flex gap-2">
        @foreach($images as $index => $image)
            <div 
                class="item relative cursor-pointer overflow-hidden transition-all duration-600 ease-in-out"
                style="{{ $index === 0 ? 'width: 90vw; height: 70vh;' : 'width: 5rem; height: 70vh;' }}"                            
                data-index="{{ $index }}"
            >
                {{-- Overlay --}}
               
                 
                @if($index % 2 === 1)
                    <div class="overlay absolute h-full w-full bg-gradient-to-r from-black/60 to-transparent opacity-0 transition-opacity duration-600"></div>
                    <div class="card-text absolute top-4 left-4  p-3  text-white rounded-lg opacity-0 transition-opacity duration-600 text-left ">
                        <h3 class="text-3xl font-medium font-[header-font] mb-1">{{ $image['header'] }}</h3>
                        <p class="max-w-md text-md text-gray-200">{{ $image['text'] }}</p>
                    </div>
                @else
                  <div class="overlay absolute h-full w-full bg-gradient-to-t from-black/60 to-transparent opacity-0 transition-opacity duration-600"></div>
                    <div class="card-text absolute bottom-4 right-4  p-3  text-white rounded-lg opacity-0 transition-opacity duration-600 text-left ">
                        <h3 class="text-3xl font-medium font-[header-font] mb-1">{{ $image['header'] }}</h3>
                        <p class="max-w-md text-md text-gray-200">{{ $image['text'] }}</p>
                    </div>
                @endif
                
                <div class="code absolute bottom-0 right-0 p-4 flex flex-col items-end justify-end opacity-0 transition-opacity duration-600">
                </div>

                <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="h-full w-full object-cover">
            </div>
        @endforeach
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.item');
    let activeIndex = 0;
    const total = items.length;
    let isHovered = false;

    const setActive = (index) => {
        activeIndex = index;
        items.forEach((item, i) => {
            const overlay = item.querySelector('.overlay');
            const code = item.querySelector('.code');
            const text = item.querySelector('.card-text');

            if(i === index){
                item.style.flex = '11'; 
                overlay.style.opacity = 1;
                code.style.opacity = 1;
                if(text) text.style.opacity = 1;
            } else {
                item.style.flex = '1'; 
                overlay.style.opacity = 0;
                code.style.opacity = 0;
                if(text) text.style.opacity = 0;
            }
        });
    }

    setActive(0);

    items.forEach((item, i) => {
        item.addEventListener('mouseenter', () => {
            setActive(i);
            isHovered = true; 
        });
        item.addEventListener('mouseleave', () => {
            isHovered = false;
        });
    });

    setInterval(() => {
        if (!isHovered) { 
            let nextIndex = (activeIndex + 1) % total;
            setActive(nextIndex);
        }
    }, 3000);
});
</script>