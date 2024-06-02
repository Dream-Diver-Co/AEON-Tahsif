@extends('layouts.admin')

@section('content')
    <div class="px-5">
        <form method="POST" action="" id="create-patient-form" class="">
            @csrf
            <div class="row justify-content-between">
                <div class="col-md-6 justify-content-end">

                    <div class="form-group row">
                        <label for="name" class="col-5 text-right">Name:</label>
                        <div class="col-7"><input type="text" class="form-control form-control-sm" id="name"
                                name="name"></div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-5 text-right">Email:</label>
                        <div class="col-7"><input type="email" class="form-control form-control-sm" id="email"
                                name="email"></div>
                    </div>


                </div>
                <div class="col-md-6 justify-content-start">

                    <div class="form-group row">
                        <label for="password" class="col-5 text-right">Password:</label>
                        <div class="col-7"><input type="password" class="form-control form-control-sm" id="password"
                                name="password"></div>
                    </div>

                    <div class="form-group row">
                        <label for="logo" class="col-5 text-right">Logo:</label>
                        <div class="col-7"><input type="file" class="form-control form-control-sm" id="logo"
                                name="logo"></div>
                    </div>




                </div>
            </div>



        </form>


    </div>
@endsection
