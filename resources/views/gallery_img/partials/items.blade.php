@foreach($items as $file)
    @php
        $videoExtensions = ['mp4','webm'];
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    @endphp

    @if(in_array($ext, $videoExtensions))
        <div class="gallery-item opacity-0 translate-y-5 transition duration-500">
            <video controls class="w-full">
                <source src="{{ asset('gallery/' . $file) }}" type="video/{{ $ext }}">
            </video>
        </div>
    @else
        <div class="gallery-item opacity-0 translate-y-5 transition duration-500">
            <img src="{{ asset('gallery/' . $file) }}" class="w-full h-auto">
        </div>
    @endif
@endforeach