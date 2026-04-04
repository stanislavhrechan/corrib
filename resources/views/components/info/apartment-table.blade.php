@props(['apartments' => []])
<div class="max-w-8xl mx-10 overflow-hidden bg-white">
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
            <tr class="hover:bg-gray-50 transition">
                
                <td class="px-4 py-3 font-medium">
                    <a href="#" class="hover:underline">
                        {{ $apt['name'] }}
                    </a>
                </td>

                <td class="px-4 py-3">{{ $apt->name }}</td>
                <td class="px-4 py-3">{{ $apt->floor_id }}</td>
                <td class="px-4 py-3"> {{ $apt->rooms
                    ->whereNotIn('name', ['Balkón', 'Loggia', 'Pivnica'])
                    ->sum('area') 
                }} m²</td>
                <td class="px-4 py-3"> {{
                    $apt->rooms
                        ->whereIn('name', ['Balkón', 'Loggia'])
                        ->sum('area')
                }} m²</td>
                 <td class="px-4 py-3">{{
                    optional($apt->rooms->firstWhere('name', 'Pivnica'))->area > 0 ? $apt->rooms->firstWhere('name', 'Pivnica')->area . 'm²' : 'Nepridana'
                }} </td>
                <td class="px-4 py-3">{{ $apt->rooms->whereNotIn('name', 'Pivnica')->sum('area') }} m²</td>

                <td class="px-4 py-3 font-semibold">
                    Cena v RK
                </td>

                <td class="px-4 py-3">
                    @php
                        $statusMap = [
                            'free' => 'Voľný',
                            'reserved' => 'Rezervovaný',
                            'occupied' => 'Obsadený',
                        ];
                    @endphp

                    <span class="px-2 py-1 text-xs font-semibold
                        {{ $apt['status'] === 'free' ? 'bg-green-200' : ($apt['status'] === 'reserved' ? 'bg-yellow-200' : 'bg-red-200') }}">
                        
                        {{ $statusMap[$apt['status']] ?? $apt['status'] }}
                    </span>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>