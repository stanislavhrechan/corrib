@extends('layouts.admin')

@section('content')
<div class="p-8">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-white text-2xl font-semibold">Buildings</h1>
            <p class="text-white/40 text-sm">
                Správa budov
            </p>
        </div>

        <button onclick="openBuildingModal()"
            class="px-4 py-2 bg-white text-black text-sm font-medium hover:bg-white/90 cursor-pointer">
            + Nová budova
        </button>
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-3 gap-4">

        @foreach($buildings as $building)
        <a href="{{ route('admin.buildings.show', $building->id) }}"
            class="p-5 border border-white/10 bg-white/5 hover:bg-white/10 transition group relative">

            <div class="flex justify-between items-start">

                <div>
                    <h2 class="text-white font-medium">
                        {{ $building->name }}
                    </h2>

                    <p class="text-white/40 text-sm mt-1">
                        {{ $building->parkings->count() }} parkings
                    </p>
                </div>

            </div>

            

        </a>

        @endforeach

    </div>

</div>

<!-- ================= CREATE MODAL ================= -->

<div id="buildingModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50
            opacity-0 pointer-events-none transition duration-300">

    <div id="buildingModalBox"
         class="w-[400px] bg-[#111] border border-white/10 p-6
                scale-95 opacity-0 transition duration-300">

        <div class="flex justify-between mb-4">
            <h2 class="text-white text-lg">Nová budova</h2>
            <button onclick="closeBuildingModal()">✕</button>
        </div>

        <form method="POST" action="{{ route('admin.build_park.store') }}">
            @csrf

            <input type="text" name="name"
                placeholder="Building name"
                class="w-full px-3 py-2 bg-white/5 border border-white/10 text-white">
            
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeBuildingModal()"
                    class="px-3 py-2 bg-white/10 text-white text-sm">
                    Cancel
                </button>

                <button type="submit"
                    class="px-3 py-2 bg-white text-black text-sm">
                    Create
                </button>
            </div>

        </form>

    </div>
</div>

<!-- ================= EDIT MODAL ================= -->

<div id="editBuildingModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50
            opacity-0 pointer-events-none transition duration-300">

    <div id="editBuildingModalBox"
         class="w-[400px] bg-[#111] border border-white/10 p-6
                scale-95 opacity-0 transition duration-300">

        <h2 class="text-white text-lg mb-4">Edit Building</h2>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="name" id="editName"
                class="w-full px-3 py-2 bg-white/5 border border-white/10 text-white">

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeEditModal()"
                    class="px-3 py-2 bg-white/10 text-white text-sm">
                    Cancel
                </button>

                <button type="submit"
                    class="px-3 py-2 bg-white text-black text-sm">
                    Save
                </button>
            </div>

        </form>

    </div>
</div>

<!-- ================= SCRIPT ================= -->

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
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0', 'pointer-events-none');

        box.classList.remove('scale-100', 'opacity-100');
        box.classList.add('scale-95', 'opacity-0');
    }
}

function openBuildingModal() {
    toggleModal('buildingModal', 'buildingModalBox', true);
}

function closeBuildingModal() {
    toggleModal('buildingModal', 'buildingModalBox', false);
}

function openEditModal(e, id, name) {
    e.stopPropagation();

    document.getElementById('editName').value = name;
    document.getElementById('editForm').action = `/admin/buildings/${id}`;

    toggleModal('editBuildingModal', 'editBuildingModalBox', true);
}

function closeEditModal() {
    toggleModal('editBuildingModal', 'editBuildingModalBox', false);
}
</script>

@endsection