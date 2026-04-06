@extends('layouts.admin')

@section('content')
<div class="p-4 md:p-8">

    <div class="flex flex-col md:flex-row md:items-center gap-5 justify-between mb-8">
        <div>
            <h1 class="text-white text-2xl font-semibold">
                {{ $floor->name }}
            </h1>

            <p class="text-white/40 text-sm">
                {{ $floor->apartments->count() }} bytov • Stav v reálnom čase
            </p>
        </div>

        <button onclick="openApartmentModal()"
            class="px-3 py-2 bg-white text-black text-sm font-medium">
            + Pridať apartmán
        </button>
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

                    {{ 
                        $apartment->status == 'free' ? 'Voľný' :
                        ($apartment->status == 'occupied' ? 'Predaný' :
                        ($apartment->status == 'reserved' ? 'Rezervovaný' : 'Maintenance'))
                    }}
                </span>
            </div>

            <div class="mt-3 text-xs text-white/40">
                {{ $apartment->rooms->count() }} izby • {{ $apartment->rooms->sum('area') ?? '—' }} m²
            </div>

            <div class="mt-4 flex justify-between text-xs text-white/30">
                <button onclick="openEditModal(event, {{ $apartment->id }}, '{{ $apartment->name }}', '{{ $apartment->status }}', '{{ $apartment->size }}')" class="underline cursor-pointer">
                    Edit
                </button>
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
         class="w-[500px] bg-[#111] border border-white/10 mx-4 md:mx-0 p-6
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
                    class="w-full px-3 py-2 bg-white/5 border border-white/10  text-white">

                <input type="text" name="size" placeholder="55.70"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10  text-white">

                <select name="status"
                class="w-full px-3 py-2 bg-white/5 border border-white/10 text-white">
                    <option value="free" class="text-black">Voľný</option>
                    <option value="occupied" class="text-black">Predaný</option>
                    <option value="reserved" class="text-black">Rezervovaný</option>
                    <option value="maintenance" class="text-black">Maintenance</option>
                </select>

                <textarea name="coords" placeholder="SVG coords"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10  text-white"></textarea>

            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeApartmentModal()"
                    class="px-3 py-2 bg-white/10 text-white cursor-pointer text-sm">
                    Zrušiť
                </button>

                <button type="submit"
                    class="px-3 py-2 bg-white text-black cursor-pointer text-sm">
                    Vytvoriť
                </button>
            </div>

        </form>

    </div>
</div>

<!-- ========================= -->
<!-- ROOM PANEL -->
<!-- ========================= -->
<div id="roomPanel"
     class="hidden fixed md:bottom-10 bottom-30 right-1/2 translate-x-1/2 md:right-10 w-80 p-5  bg-[#111] border border-white/10">

    <div class="flex justify-between">
        <h3 id="panelRoomNumber" class="text-lg"></h3>
        <span id="panelStatus" class="text-xs"></span>
    </div>

    <div class="mt-4 flex gap-2">
        <button onclick="openRoomModal()"
            class="px-3 py-1 bg-white text-black text-xs flex items-center mr-1 cursor-pointer hover:bg-white/90 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

            Pridať miestnosť
        </button>
        <button onclick="openRoomsManager()"
            class="px-2 py-1 bg-white text-black text-xs flex items-center text-left mr-1 cursor-pointer hover:bg-white/80">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
            Upraviť miestnosť
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
         class="w-[400px] bg-[#111] border border-white/10  p-6  mx-5 md:mx-0
                scale-95 opacity-0 transition duration-300">

        <h2 class="text-white text-lg mb-4">Pridať miestnosť</h2>

        <form method="POST" action="{{ route('admin.floors.apartment.room.store') }}">
            @csrf

            <input type="hidden" name="apartment_id" id="roomApartmentId">

            <div class="space-y-3">
                <input type="text" name="number" placeholder="2.32"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10  text-white">

                <input type="text" name="name" placeholder="Living room"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10  text-white">

                <input type="text" name="area" placeholder="18.5"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10  text-white">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeRoomModal()"
                    class="px-3 py-2 bg-white/10 text-white  text-sm cursor-pointer">
                    Zrušiť
                </button>

                <button type="submit"
                    class="px-3 py-2 bg-white text-black  text-sm cursor-pointer">
                    Uložiť
                </button>
            </div>

        </form>

    </div>
</div>

<div id="editApartmentModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50
            opacity-0 pointer-events-none transition duration-300">

    <div id="editApartmentModalBox"
         class="w-[500px] bg-[#111] border border-white/10 rounded-2xl p-6 mx-5 md:mx-0
                scale-95 opacity-0 transition duration-300">

        <h2 class="text-white text-lg mb-4">Upraviť apartmán</h2>

        <form id="editForm" method="POST" >
            @csrf
            @method('PUT')
            <div class="space-y-3">
                <input type="text" name="name" id="editName"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10  text-white">

                <input type="text" name="size" id="editSize"
                    class="w-full px-3 py-2 bg-white/5 border border-white/10 text-white">

                <select name="status" id="editStatus"
                    class="w-full px-3 py-2  border border-white/10 text-white">
                    <option value="free" class="text-black">Voľný</option>
                    <option value="occupied" class="text-black">Predaný</option>
                    <option value="reserved" class="text-black">Rezervovaný</option>
                    <option value="maintenance" class="text-black">Maintenance</option>
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

<div id="roomsManagerModal" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 opacity-0 pointer-events-none transition">
    <div id="roomsManagerBox" class="w-[600px] max-h-[80vh] overflow-y-auto bg-[#111] p-6 border border-white/10 mx-5 md:mx-0">
        <h2 class="text-white text-lg mb-4">Izby</h2>

        <div id="roomsList" class="space-y-3"></div>

        <div class="flex justify-end mt-4">
            <button onclick="closeRoomsManager()"
                class="px-3 py-2 bg-white text-black text-sm cursor-pointer">
                Zavrieť
            </button>
        </div>
    </div>
</div>

<!-- ========================= -->
<!-- JS -->
<!-- ========================= -->
 <script>
window.apartments = @json($floor->apartments->load('rooms'));

function openRoomsManager() {
    const modal = 'roomsManagerModal';
    const box = 'roomsManagerBox';

    const apartment = window.apartments.find(a => a.id === window.currentApartmentId);

    const list = document.getElementById('roomsList');
    list.innerHTML = '';

    apartment.rooms.forEach(room => {
        list.innerHTML += `
            <form method="POST" action="/admin/floor/apartment/room/${room.id}/update" class="border border-white/10 p-3">
                @csrf
                @method('PUT')

                <input name="number" value="${room.number}" class="w-full mb-2">
                <input name="name" value="${room.name}" class="w-full mb-2">
                <input name="area" value="${room.area}" class="w-full mb-2">

                <div class="flex justify-between">
                    <button type="submit" class="text-green-400 hover:text-green-500 text-xs cursor-pointer">Aktualizovať</button>

                    <button type="button"
                        onclick="deleteRoom(${room.id})"
                        class="text-red-400 hover:text-red-500 text-xs cursor-pointer">
                        Odstrániť
                    </button>
                </div>
            </form>
        `;
    });

    toggleModal(modal, box, true);
}

function closeRoomsManager() {
    toggleModal('roomsManagerModal', 'roomsManagerBox', false);
}

function deleteRoom(id) {
    if (!confirm('Odstrániť miestnosť?')) return;

    fetch(`/admin/floor/apartment/room/${id}/destroy`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    }).then(() => location.reload());
}
</script>

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