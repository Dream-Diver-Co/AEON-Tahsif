@extends('layouts.admin')

@section('content')
    <div class="px-5 card-list-container">
        <div class="card-box-container d-flex align-items-center">
            @foreach ($manufacturers as $manufacturer)
                <a href="{{ route('manufacturer-interface', ['id' => $manufacturer->id]) }}" class="card-box">
                    {{-- <div class="card-box"> --}}

                    <div class="card-element-first">
                        <p>{{ $manufacturer->name }}</p>
                    </div>
                    <div class="card-element-second">
                        {{-- <img src="{{ asset($buyer->logo) }}"> --}}
                    </div>

                    {{-- </div> --}}
                </a>
            @endforeach


        </div>
    </div>
@endsection
