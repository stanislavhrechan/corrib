@props(['apartments' => []])
<div class="w-full overflow-x-auto">
    <div class="min-w-[800px] md:max-w-8xl mx-5 md:mx-10  bg-white">
        <table class="w-full text-sm  text-center">
            <thead class="bg-[#CDC4BA] sticky top-0 z-10">
                <tr>
                    <th class="px-4 py-3 text-white uppercase text-xs">Označenie</th>
                    <th class="px-4 py-3 text-white uppercase text-xs">Počet izieb</th>
                    <th class="px-4 py-3 text-white uppercase text-xs">Podlažie</th>
                    <th class="px-4 py-3 text-white uppercase text-xs">Interiér</th>
                    <th class="px-4 py-3 text-white uppercase text-xs">Balkón / Terasa</th>
                    <th class="px-4 py-3 text-white uppercase text-xs">Pivnica</th>
                    <th class="px-4 py-3 text-white uppercase text-xs">Spolu</th>
                    <th class="px-4 py-3 text-white uppercase text-xs">Cena</th>
                    <th class="px-4 py-3 text-white uppercase text-xs">Stav</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">


                @foreach($apartments as $apt)
                    @php
                        $rooms = $apt->rooms;

                        $livingArea = $rooms
                            ->whereNotIn('name', ['Balkón', 'Loggia', 'Pivnica'])
                            ->sum('area');

                        $balconyArea = $rooms
                            ->whereIn('name', ['Balkón', 'Loggia'])
                            ->sum('area');

                        $pivnica = $rooms->firstWhere('name', 'Pivnica');

                        $totalArea = $rooms
                            ->whereNotIn('name', ['Pivnica'])
                            ->sum('area');

                        $statusMap = [
                            'free' => 'Voľný',
                            'reserved' => 'Rezervovaný',
                            'occupied' => 'Predaný',
                        ];

                        $statusColor = match($apt->status) {
                            'free' => 'bg-green-200',
                            'reserved' => 'bg-yellow-200',
                            default => 'bg-red-200',
                        };
                    @endphp

                    <tr 
                        onclick="window.location='/apartment/{{ $apt->slug }}'"
                        class="hover:bg-gray-50 transition cursor-pointer"
                    >
                        <td class="px-4 py-3 font-medium">
                            <span class="hover:underline">
                                {{ $apt->name }}
                            </span>
                        </td>

                        <td class="px-4 py-3">{{ $apt->name }}</td>

                        <td class="px-4 py-3">{{ $apt->floor_id }}</td>

                        <td class="px-4 py-3">
                            {{ $livingArea }} m²
                        </td>

                        <td class="px-4 py-3">
                            {{ $balconyArea }} m²
                        </td>

                        <td class="px-4 py-3">
                            {{ ($pivnica && $pivnica->area > 0) ? $pivnica->area . ' m²' : 'Nepridaná' }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $totalArea }} m²
                        </td>

                        <td class="px-4 py-3 font-semibold">
                            Cena v RK
                        </td>

                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs font-semibold {{ $statusColor }}">
                                {{ $statusMap[$apt->status] ?? $apt->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>