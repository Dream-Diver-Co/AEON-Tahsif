@extends('layouts.admin')

@section('content')
    <div class="px-5 card-list-container">
        <div class="card-box-container d-flex align-items-center">
            @foreach ($vendors as $vendor)
                <a href="{{ route('manufacturer-index', ['id' => $vendor->id]) }}" class="card-box">
                    {{-- <div class="card-box"> --}}

                    <div class="card-element-first">
                        <p>{{ $vendor->name }}</p>
                    </div>
                    <div class="card-element-second">
                        <img src="{{ asset($vendor->logo) }}">
                    </div>

                    {{-- </div> --}}
                </a>
            @endforeach


        </div>
    </div>
@endsection
