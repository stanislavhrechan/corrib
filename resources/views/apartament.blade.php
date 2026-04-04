@extends('layouts.app')
@section('content')
<section class="relative w-full pt-34 pb-12 bg-gray-50">
    <div class="relative max-w-6xl mx-auto px-6">
        <h2 class="font-[header-font] text-center text-3xl md:text-5xl">
            Vyberte si priestor pre vašu ambulanciu
        </h2>
          <p class="text-black text-center md:text-md mb-10"><span class="">Corrib Tower</span> - <span class="">{{$apartment['floor_id']}}</span> - <span class=" font-semibold">{{$apartment['name']}}</span></p>

        <div class="grid md:grid-cols-[1fr_1fr] gap-8">
           
            <div class="">
                @if($apartment->floor_id >= 6 && $apartment->floor_id <=9)
               <img src="{{ asset('images/apartaments/6_9/' . $apartment->name) }}.svg" alt="">
                @else
               <img src="{{ asset('images/apartaments/' . $apartment->floor_id . '/' . $apartment->name) }}.svg" alt="">
               @endif
            </div>
            <div class="space-y-6">
                <div class="bg-white px-6">
                    <h3 class="text-xl font-semibold mb-4">Legenda miestností</h3>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="p-2 border-b">Č.</th>
                                <th class="p-2 border-b">Názov</th>
                                <th class="p-2 border-b">Výmera</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($apartment['rooms'] as $room)
                            <tr class="hover:bg-gray-50">
                                <td class="p-2 border-b">{{ $room['number'] }}</td>
                                <td class="p-2 border-b">{{ $room['name'] }}</td>
                                <td class="p-2 border-b">{{ $room['area'] }} m²</td>
                            </tr>
                            @endforeach
                            <tr class="font-bold">
                                <td colspan="2" class="p-2">Spolu</td>
                                <td class="p-2">{{ $apartment->rooms->sum('area')}} m²</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                
                <div class="bg-white p-6 shadow">
                    <h3 class="text-2xl font-semibold mb-4">Detail ponuky</h3>
                    <p class="mb-2"><span class="font-medium">Názov:</span> {{ $apartment['name'] }}</p>
                    <p class="mb-2"><span class="font-medium">Výmera:</span> {{ $apartment->rooms->sum('area')}} m²</p>
                    <p class="mb-2"><span class="font-medium">Počet miestností:</span> {{ $apartment->rooms->count()}}</p>
                    <p class="mb-2"><span class="font-medium">Poschodie:</span> {{ $apartment->floor_id }}</p>
                    <p class="mb-4">
                        <span class="font-medium">Stav:</span>
                        <span class="bg-green-200 px-3 py-1 ml-2 font-semibold">{{ $apartment->status == 'free' ? 'Voľný' : 'Predaný'  }}</span>
                    </p>
                   <button
                        class="text-gray-800 px-6 py-2 cursor-pointer transition"
                        id="scroll-button"
                    >
                        Mám záujem
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden md:block absolute -bottom-15 w-full">
            <div class="flex justify-between mx-10">
                <a   id="scroll-kontakt"
                class="z-30 px-4 py-2 bg-black text-white cursor-pointer">
                    Obhliadka
                </a>
                <a id="scroll-parkovisko"
                class="z-30 px-4 py-2 bg-[#575757] text-white cursor-pointer">
                    Parkovacie miesta
                </a>
            </div>
        </div>
    </div>
</section>
<x-info.parkovisko :buildings="$buildings"/>
<x-main-component.kontakt></x-main-component.kontakt>
<script>
document.getElementById("scroll-button").addEventListener("click", () => {
    gsap.to(window, {duration: 1, scrollTo: "#kontakt", ease: "power2.out"});
});
document.getElementById("scroll-kontakt").addEventListener("click", () => {
    gsap.to(window, {duration: 1, scrollTo: "#kontakt", ease: "power2.out"});
});
document.getElementById("scroll-parkovisko").addEventListener("click", () => {
    gsap.to(window, {duration: 1, scrollTo: "#parkovisko", ease: "power2.out"});
});
</script>
@endsection