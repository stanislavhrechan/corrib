@extends('layouts.admin')

@section('content')
<div class="p-4 md:p-8">

    <div class="flex md:flex-row flex-col gap-5 md:gap-0 justify-between mb-8">
        <div>
            <h1 class="text-white text-2xl font-semibold">
                {{ $building->name }}
            </h1>

            <p class="text-white/40 text-sm">
                {{ $building->parkings->count() }} parkings
            </p>
        </div>

        <button onclick="openParkingModal()"
            class="px-4 py-2 bg-white text-black text-sm">
            + Add Parking
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-3">

        @foreach($building->parkings as $parking)

        <div onclick="selectParking({{ $parking->id }}, '{{ $parking->parking_number }}', '{{ $parking->status }}')"
             class="p-4 border border-white/10 bg-white/5 hover:bg-white/10 cursor-pointer">

            <div class="flex justify-between items-center">
                <span class="text-white">
                    {{ $parking->parking_number }}
                </span>

                <span class="text-xs px-2 py-1 rounded
                    @if($parking->status=='available') bg-green-500/20 text-green-300
                    @elseif($parking->status=='sold') bg-red-500/20 text-red-300
                    @elseif($parking->status=='reserved') bg-yellow-500/20 text-yellow-300
                    @else bg-gray-500/20 text-gray-300
                    @endif">

                    {{ 
                        $parking->status == 'available' ? 'Voľné' :
                        ($parking->status == 'sold' ? 'Predané' :
                        ($parking->status == 'reserved' ? 'Rezervované' : 'Neznáme'))
                    }}
                </span>
            </div>

            <div class="mt-4 flex justify-between text-xs text-white/30">
                <button onclick="openEditModal(event, {{ $parking->id }}, '{{ $parking->parking_number }}', '{{ $parking->status }}')">
                    Edit
                </button>
            </div>

        </div>

        @endforeach

    </div>

</div>
<div id="parkingModal" class="fixed inset-0 bg-black/60 flex items-center justify-center opacity-0 pointer-events-none transition">

    <div id="parkingModalBox" class="w-[400px] bg-[#111] p-6 scale-95 opacity-0 transition mx-5 md:mx-0">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-white">New Parking</h2>
            <button onclick="closeParkingModal()" class="text-white/50 hover:text-white text-xl cursor-pointer">
                ✕
            </button>
        </div>

        <form method="POST" action="{{ route('admin.parkings.store') }}">
            @csrf

            <input type="hidden" name="building_id" value="{{ $building->id }}">

            <input type="text" name="parking_number" placeholder="G30"
                class="w-full mb-3 p-2 bg-white/5 text-white">

            <textarea name="coords" placeholder="SVG coords"
                class="w-full mb-3 p-2 bg-white/5 text-white"></textarea>

            <select name="status" class="w-full mb-3 p-2 bg-black/40 p-2  text-white">
                <option value="available">K dispozícii</option>
                <option value="sold">Predané</option>
                <option value="reserved">Rezervované</option>
            </select>
            <div class="flex justify-end">
                <button class="bg-white text-black px-3 py-2">Create</button>
            </div>
        </form>

    </div>
</div>
<div id="editParkingModal"
     class="fixed inset-0 bg-black/60 flex items-center justify-center opacity-0 pointer-events-none transition">

    <div id="editParkingModalBox"
         class="w-[400px] bg-[#111] p-6 scale-95 opacity-0 transition mx-5 md:mx-0">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-white mb-4">Edit Parking</h2>
            <button onclick="closeEditModal()" class="text-white/50 hover:text-white text-xl cursor-pointer">
                    ✕
            </button>
        </div>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="parking_number" id="editNumber"
                class="w-full mb-3 p-2 bg-white/5 text-white">

            <select name="status" id="editStatus"
                class="w-full mb-3 bg-black/40 p-2  text-white">
                <option value="available">K dispozícii</option>
                <option value="sold">Predané</option>
                <option value="reserved">Rezervované</option>
            </select>
            <div class="flex justify-end">
                <button class="bg-white text-black px-3 py-2">Save</button>
            </div>

        </form>

    </div>
</div>
<script>
function toggleModal(modalId, boxId, show) {
    const modal = document.getElementById(modalId);
    const box = document.getElementById(boxId);

    if (show) {
        modal.classList.remove('pointer-events-none');
        modal.classList.add('opacity-100');

        box.classList.remove('scale-95', 'opacity-0');
        box.classList.add('scale-100', 'opacity-100');
    } else {
        modal.classList.add('pointer-events-none', 'opacity-0');
        modal.classList.remove('opacity-100');

        box.classList.add('scale-95', 'opacity-0');
        box.classList.remove('scale-100', 'opacity-100');
    }
}

function openParkingModal() {
    toggleModal('parkingModal', 'parkingModalBox', true);
}

function closeParkingModal() {
    toggleModal('parkingModal', 'parkingModalBox', false);
}

function openEditModal(e, id, number, status) {
    e.stopPropagation();

    document.getElementById('editNumber').value = number;
    document.getElementById('editStatus').value = status;

    document.getElementById('editForm').action = `/admin/parkings/${id}`;

    toggleModal('editParkingModal', 'editParkingModalBox', true);
}

function closeEditModal() {
    toggleModal('editParkingModal', 'editParkingModalBox', false);
}
</script>
@endsection