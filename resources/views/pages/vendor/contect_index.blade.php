@extends('layouts.admin')

@section('content')
    <div class="px-5 card-list-container">

        <div>
            <div class="card-box-container d-flex align-items-center">
                @foreach ($contacts as $contact)
                    <div class="card">

                        <div class="card-body p-0">
                            <h5 class="text-center" style="background-color: green; color:white">CONTACT</h5>
                            <div class="card_img">
                                <img src="{{ asset($contact->profile_image) }}" width="70">
                            </div>
                            <div class="d-flex justify-content-between p-5">
                                <div>
                                    <strong>
                                        <p>Name:</p>
                                    </strong>
                                    <strong>
                                        <p>Designation:</p>
                                    </strong>
                                    <strong>
                                        <p>Department:</p>
                                    </strong>
                                    <strong>
                                        <p>Email:</p>
                                    </strong>
                                    <strong>
                                        <p>Phone:</p>
                                    </strong>
                                </div>
                                <div class="text-right">
                                    <p>{{ $contact->name }}</p>
                                    <p>{{ $contact->designation }}</p>
                                    <p>{{ $contact->department }}</p>
                                    <p>{{ $contact->email }}</p>
                                    <p>{{ $contact->phone }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach



            </div>
        </div>
    </div>
@endsection
