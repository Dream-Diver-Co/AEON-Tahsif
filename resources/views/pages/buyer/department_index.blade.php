@extends('layouts.admin')

@section('content')
    <div class="px-5 card-list-container">

        <div>
            <div class="card-box-container d-flex align-items-center">
                @foreach ($departments as $department)
                    <a href="{{ route('buyer_contact_index', ['id' => $department->id]) }}" class="card-box">
                        {{-- <div > --}}
                        <div class="card-element-first">
                            <p>{{ $department->name }}</p>
                        </div>
                        <div class="card-element-second">
                            {{-- <img src="{{ asset($buyer->logo) }}"> --}}
                        </div>

                        {{-- </div> --}}
                    </a>
                @endforeach


            </div>
        </div>
    </div>
@endsection
