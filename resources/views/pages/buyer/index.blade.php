@extends('layouts.admin')

@section('content')
    <div class="px-5 card-list-container">
        <div class="card-box-container d-flex align-items-center">
            @foreach ($buyers as $buyer)
                <a href="{{ route('department-index', ['id' => $buyer->id]) }}" class="card-box">
                    {{-- <div class="card-box"> --}}

                    <div class="card-element-first">
                        <p>{{ $buyer->name }}</p>
                    </div>
                    <div class="card-element-second">
                        <img src="{{ asset($buyer->logo) }}">
                    </div>

                    {{-- </div> --}}
                </a>
            @endforeach


        </div>
    </div>
@endsection
