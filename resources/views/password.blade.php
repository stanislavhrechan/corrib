@extends('layouts.guest')
@section('content')
    <form method="POST" action="/password" class=" bg-white p-6  shadow-md w-full max-w-sm">
        @csrf

        <input 
            type="password" 
            name="password" 
            placeholder="Enter password"
            class="w-full border border-gray-300 px-3 py-2 mb-3 focus:outline-none focus:ring-2 focus:ring-black"
        >

        <button 
            type="submit"
            class="w-full bg-black text-white py-2 hover:bg-gray-800 transition"
        >
            Enter
        </button>

        @if(session('error'))
            <p class="text-red-500 text-sm mt-3 text-center">
                {{ session('error') }}
            </p>
        @endif
    </form>
@endsection


