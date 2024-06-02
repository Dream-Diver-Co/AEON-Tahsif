@extends('layouts.admin')

@section('content')
    <div class="px-5 card-list-container">
        <div class="card-box-container d-flex align-items-center">
            <a href="{{ route('vendor_contact_index', ['id' => $id]) }}" class="card-box">
                {{-- <div class="card-box"> --}}

                <div class="card-element-first">
                    <p>Contacts</p>
                </div>
                <div class="card-element-second">
                    {{-- <img src="{{ asset($buyer->logo) }}"> --}}
                </div>

                {{-- </div> --}}
            </a>

            <a href="{{ route('manufecturer_certicicate_index', ['id' => $id]) }}" class="card-box">
                {{-- <div class="card-box"> --}}

                <div class="card-element-first">
                    <p>Certificates</p>
                </div>
                <div class="card-element-second">
                    {{-- <img src="{{ asset($buyer->logo) }}"> --}}
                </div>

                {{-- </div> --}}
            </a>


        </div>
    </div>
@endsection
