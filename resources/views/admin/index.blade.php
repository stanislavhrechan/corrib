@extends('layouts.admin')

@section('content')
<div class="p-4 md:p-8">
    <div class="flex md:flex-row flex-col gap-3 md:gap-0 md:items-center justify-between mb-8">
        <div>
            <h1 class="text-white text-2xl font-semibold">Poschodia</h1>
            <p class="text-white/40 text-sm">
                Ovládať každé poschodie s rôznymi informáciami o ňom
            </p>
        </div>

        <button onclick="openFloorModal()"
            class="px-4 py-2 bg-white text-black text-sm font-medium hover:bg-white/90 cursor-pointer">
            + Nové poschodie
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        @foreach($floors as $floor)
        <a href="{{ route('admin.floors.show', $floor->id) }}"
           class="p-5 border border-white/10 bg-white/5 hover:bg-white/10 transition group relative overflow-hidden">

            <svg class="absolute right-0 top-0 h-full w-24 text-white/15 opacity-20"
                 viewBox="0 0 100 100" fill="none">
                <path d="M10 90 L10 10 L90 10" stroke="currentColor"/>
                <path d="M20 90 L20 20 L90 20" stroke="currentColor"/>
                <path d="M30 90 L30 30 L90 30" stroke="currentColor"/>
                <circle cx="20" cy="20" r="2" fill="currentColor"/>
            </svg>

            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-white font-medium">
                        {{ $floor->name }}
                    </h2>

                    <p class="text-white/40 text-sm mt-1">
                        {{ $floor->apartments->count() }} apartmány
                    </p>
                </div>

                <span class="text-xs text-white/40 group-hover:text-white transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                </span>
            </div>

            @php
                $total = max($floor->apartments->count(), 1);
                $free = $floor->apartments->where('status','free')->count();
                $percent = ($free / $total) * 100;
            @endphp

            <div class="mt-4 h-1 w-full bg-white/10 rounded-full overflow-hidden">
                <div class="h-full bg-green-400" style="width: {{ $percent }}%"></div>
            </div>

            <div class="flex justify-between text-xs text-white/40 mt-2">
                <span>{{ round($percent) }}% voľný</span>
                <span>{{ 100 - round($percent) }}% predaný</span>
            </div>

        </a>
        @endforeach

    </div>
</div>

<!-- ================= MODAL ================= -->

<div id="floorModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50
            opacity-0 pointer-events-none transition duration-300 ease-out">

    <div id="floorModalBox"
         class="w-[420px] bg-[#111] border border-white/10  p-6
                scale-95 opacity-0 transition duration-300 ease-out">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-white text-lg font-semibold">
                Nové poschodie
            </h2>

            <button onclick="closeFloorModal()"
                    class="text-white/40 hover:text-white cursor-pointer">
                ✕
            </button>
        </div>

        <form method="POST" action="{{ route('admin.floors.store') }}">
            @csrf

            <div class="space-y-3">

                <div>
                    <label class="text-white/40 text-xs">Číslo poschodia</label>
                    <input type="number" name="floor_number"
                           class="w-full mt-1 px-3 py-2 bg-white/5 border border-white/10  text-white"
                           placeholder="e.g. 1" required>
                </div>

                <div>
                    <label class="text-white/40 text-xs">Meno</label>
                    <input type="text" name="name"
                           class="w-full mt-1 px-3 py-2 bg-white/5 border border-white/10  text-white"
                           placeholder="Floor name">
                </div>

                <div>
                    <label class="text-white/40 text-xs">Popis</label>
                    <textarea name="description" rows="3"
                              class="w-full mt-1 px-3 py-2 bg-white/5 border border-white/10  text-white"
                              placeholder="Optional..."></textarea>
                </div>

            </div>

            <div class="flex justify-end gap-2 mt-5">
                <button type="button"
                        onclick="closeFloorModal()"
                        class="px-3 py-2  bg-white/10 text-white text-sm cursor-pointer">
                    Cancel
                </button>

                <button type="submit"
                        class="px-3 py-2  bg-white text-black text-sm font-medium cursor-pointer">
                    Create
                </button>
            </div>

        </form>

    </div>
</div>

<!-- ================= SCRIPT ================= -->

<script>
function openFloorModal() {
    const modal = document.getElementById('floorModal');
    const box = document.getElementById('floorModalBox');

    modal.classList.remove('pointer-events-none');
    modal.classList.add('opacity-100');

    box.classList.remove('scale-95', 'opacity-0');
    box.classList.add('scale-100', 'opacity-100');
}

function closeFloorModal() {
    const modal = document.getElementById('floorModal');
    const box = document.getElementById('floorModalBox');

    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0', 'pointer-events-none');

    box.classList.remove('scale-100', 'opacity-100');
    box.classList.add('scale-95', 'opacity-0');
}
</script>

@endsection