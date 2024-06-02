@php

// $file = 'storage/logos/sample_1698315297.pdf';
// $file = substr($file, 14);
// $file = preg_replace('/_.*\.pdf$/', '.pdf', $file);

@endphp
@extends('layouts.admin')

@section('content')

@php

//dd($certificates);
@endphp
    <div class="px-5 card-list-container">

    <h4>Manufecturer Certificates</h4>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Issue Date</th>
                <th scope="col">Valid From</th>
                <th scope="col">Valid To</th>
                <th scope="col">PDF File</th>
            </tr>
        </thead>
        <tbody>
        @foreach($certificates as $certificate)
            <tr>
                @php
                    $file = $certificate->pdf_file;
                    $file = substr($file, 14);
                    $file = preg_replace('/_.*\.pdf$/', '.pdf', $file);

                @endphp

                <td>{{$certificate->id}}</td>
                <td>{{$certificate->name}}</td>
                <td><img src="{{ asset($certificate->logo) }}" width="50" style="width:50px !important;"></td>
                <td>{{$certificate->issue_date}}</td>
                <td>{{$certificate->valid_from}}</td>
                <td>{{$certificate->valid_to}}</td>
                <td><a href="{{asset($certificate->pdf_file)}}" target=”_blank” >{{$file}}</a></td>



            </tr>
         @endforeach
        </tbody>


    </table>



    </div>
@endsection
