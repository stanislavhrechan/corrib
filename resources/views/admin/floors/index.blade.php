@extends('layouts.admin')

@section('content')
<div class="p-8">

    <div class="flex flex-col md:flex-row md:items-center gap-5 justify-between mb-8">
        <div>
            <h1 class="text-white text-2xl font-semibold">
                {{ $floor->name }}
            </h1>

            <p class="text-white/40 text-sm">
                {{ $floor->apartments->count() }} bytov • Stav v reálnom čase
            </p>
        </div>

        <div class="">
            <button onclick="openApartmentModal()"
                class="px-3 py-2 bg-white text-black text-sm font-medium">
                + Add Apartment
            </button>
        </div>
    </div>

    <div class="flex gap-4 text-xs text-white/40 mb-6">
        <span class="flex items-center gap-1">
            <div class="w-2 h-2 bg-green-400 rounded-full"></div> Voľný
        </span>
        <span class="flex items-center gap-1">
            <div class="w-2 h-2 bg-red-400 rounded-full"></div> Predaný
        </span>
        <span class="flex items-center gap-1">
            <div class="w-2 h-2 bg-yellow-400 rounded-full"></div> Rezervovaný
        </span>
        <span class="flex items-center gap-1">
            <div class="w-2 h-2 bg-gray-400 rounded-full"></div> Maintenance
        </span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-3">

        @foreach($floor->apartments as $apartment)

        <div onclick="selectApartment({{ $apartment->id }}, '{{ $apartment->name }}', '{{ $apartment->status }}')"
             class="p-4 border border-white/10 bg-white/5 hover:bg-white/10 transition cursor-pointer">

            <div class="flex justify-between items-center">
                <span class="text-white font-medium">
                    {{ $apartment->name }}
                </span>

                <span class="text-xs px-2 py-1 rounded
                    @if($apartment->status=='free') bg-green-500/20 text-green-300
                    @elseif($apartment->status=='occupied') bg-red-500/20 text-red-300
                    @elseif($apartment->status=='reserved') bg-yellow-500/20 text-yellow-300
                    @else bg-gray-500/20 text-gray-300
                    @endif">

                    {{ $apartment->status }}
                </span>
            </div>

            <div class="mt-3 text-xs text-white/40">
                {{ $apartment->rooms->count() }} izby • {{ $apartment->rooms->sum('area') ?? '—' }} m²
            </div>

            <div class="mt-4 flex justify-between text-xs text-white/30">
                <button onclick="openEditModal(event, {{ $apartment->id }}, '{{ $apartment->name }}', '{{ $apartment->status }}', '{{ $apartment->size }}')">
                    Edit
                </button>
                <button class="hover:text-white">Status</button>
            </div>

        </div>

        @endforeach

    </div>

</div>

<!-- ========================= -->
<!-- APARTMENT MODAL -->
<!-- ========================= -->
<div id="apartmentModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50
            opacity-0 pointer-events-none transition duration-300">

    <div id="apartmentModalBox"
         class="w-[500px] bg-[#111] border border-white/10 rounded-2xl p-6
                scale-95 opacity-0 transition duration-300">

        <div class="flex justify-between mb-4">
            <h2 class="text-white text-lg">Nový byt</h2>
            <button onclick="closeApartmentModal()">✕</button>
        </div>

        <form method="POST" action="{{ route('admin.floors.apartment.store') }}">
            @csrf
            <input type="hidden" name="floor_id" value="{{ $floor->id }}">

            <div class="space-y-3">

                <input type="text" name="name" placeholder="Byt A"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white">

                <input type="text" name="size" placeholder="55.70"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white">

                <select name="status"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white">
                    <option value="free">Voľný</option>
                    <option value="occupied">Predaný</option>
                    <option value="reserved">Rezervovaný</option>
                    <option value="maintenance">Maintenance</option>
                </select>

                <textarea name="coords" placeholder="SVG coords"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white"></textarea>

            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeApartmentModal()"
                    class="px-3 py-2 bg-white/10 text-white rounded-lg text-sm">
                    Cancel
                </button>

                <button type="submit"
                    class="px-3 py-2 bg-white text-black rounded-lg text-sm">
                    Create
                </button>
            </div>

        </form>

    </div>
</div>

<!-- ========================= -->
<!-- ROOM PANEL -->
<!-- ========================= -->
<div id="roomPanel"
     class="hidden fixed bottom-10 right-10 w-80 p-5  bg-[#111] border border-white/10">

    <div class="flex justify-between">
        <h3 id="panelRoomNumber" class="text-lg"></h3>
        <span id="panelStatus" class="text-xs"></span>
    </div>

    <div class="mt-4 flex gap-2">
        <button onclick="openRoomModal()"
            class="px-3 py-1 bg-white text-black text-xs">
            Add Room
        </button>
    </div>
</div>

<!-- ========================= -->
<!-- ROOM MODAL -->
<!-- ========================= -->
<div id="roomModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50
            opacity-0 pointer-events-none transition duration-300">

    <div id="roomModalBox"
         class="w-[400px] bg-[#111] border border-white/10  p-6
                scale-95 opacity-0 transition duration-300">

        <h2 class="text-white text-lg mb-4">Add Room</h2>

        <form method="POST" action="{{ route('admin.floors.apartment.room.store') }}">
            @csrf

            <input type="hidden" name="apartment_id" id="roomApartmentId">

            <div class="space-y-3">
                <input type="text" name="number" placeholder="2.32"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white">

                <input type="text" name="name" placeholder="Living room"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white">

                <input type="text" name="area" placeholder="18.5"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeRoomModal()"
                    class="px-3 py-2 bg-white/10 text-white rounded-lg text-sm">
                    Cancel
                </button>

                <button type="submit"
                    class="px-3 py-2 bg-white text-black rounded-lg text-sm">
                    Save
                </button>
            </div>

        </form>

    </div>
</div>

<div id="editApartmentModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50
            opacity-0 pointer-events-none transition duration-300">

    <div id="editApartmentModalBox"
         class="w-[500px] bg-[#111] border border-white/10 rounded-2xl p-6
                scale-95 opacity-0 transition duration-300">

        <h2 class="text-white text-lg mb-4">Edit Apartment</h2>

        <form id="editForm" method="POST" >
            @csrf
            @method('PUT')
            <div class="space-y-3">
                <input type="text" name="name" id="editName"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10  text-white">

                <input type="text" name="size" id="editSize"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10 text-white">

                <select name="status" id="editStatus"
                    class="w-full px-3 py-2 bg-black/40 border border-white/10  text-white">
                    <option value="free">Voľný</option>
                    <option value="occupied">Predaný</option>
                    <option value="reserved">Rezervovaný</option>
                    <option value="maintenance">Maintenance</option>
                </select>

            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeEditModal()"
                    class="px-3 py-2 bg-white/10 text-white  text-sm">
                    Cancel
                </button>

                <button type="submit"
                    class="px-3 py-2 bg-white text-black  text-sm">
                    Save
                </button>
            </div>

        </form>

    </div>
</div>

<!-- ========================= -->
<!-- JS -->
<!-- ========================= -->
<script>
function selectApartment(id, name, status) {
    document.getElementById('roomPanel').classList.remove('hidden');
    document.getElementById('panelRoomNumber').innerText = name;
    document.getElementById('panelStatus').innerText = status;

    window.currentApartmentId = id;
}


function openApartmentModal() {
    toggleModal('apartmentModal', 'apartmentModalBox', true);
}

function closeApartmentModal() {
    toggleModal('apartmentModal', 'apartmentModalBox', false);
}

function openRoomModal() {
    document.getElementById('roomApartmentId').value = window.currentApartmentId;
    toggleModal('roomModal', 'roomModalBox', true);
}

function closeRoomModal() {
    toggleModal('roomModal', 'roomModalBox', false);
}

function toggleModal(modalId, boxId, show) {
    const modal = document.getElementById(modalId);
    const box = document.getElementById(boxId);

    if (show) {
        modal.classList.remove('pointer-events-none');
        modal.classList.add('opacity-100');

        box.classList.remove('scale-95', 'opacity-0');
        box.classList.add('scale-100', 'opacity-100');
    } else {
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0', 'pointer-events-none');

        box.classList.remove('scale-100', 'opacity-100');
        box.classList.add('scale-95', 'opacity-0');
    }
}

function openEditModal(e, id, name, status, size) {
    e.stopPropagation();

    document.getElementById('editName').value = name;
    document.getElementById('editStatus').value = status;
    document.getElementById('editSize').value = size ?? '';

    document.getElementById('editForm').action = `/admin/floor/apartment/${id}/update`;

    toggleModal('editApartmentModal', 'editApartmentModalBox', true);
}

function closeEditModal() {
    toggleModal('editApartmentModal', 'editApartmentModalBox', false);
}
</script>

@endsection