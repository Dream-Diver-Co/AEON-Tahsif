@extends('layouts.admin')

@section('content')
    <div class="row content-wraper ">
        <div class="col-md-3 ">
            {{-- <div class="link-wraper">
                <p><a href="{{ route('critical-path') }}" class="nav-link">Critical List</a></p>
            </div> --}}
            <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                        <a href="{{ route('permissionIndex') }}" class="card-box">
                            {{-- <div class="card-box"> --}}

                            <div class="card-element-first">
                                <p>User Management</p>
                            </div>
                            <div class="card-element-second">
                                <i class="fas fa-users-cog"style="font-size:70px"></i>
                            </div>

                            {{-- </div> --}}
                        </a>
                </div>
            </div>
            {{-- <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                            <div class="card-element-first">
                                <p><a href="{{ route('permissionIndex') }}" class="nav-link">  User Management </a></p>
                            </div>
                            <div class="card-element-second">
                                {{-- <img src="#"> --}}
                                {{-- <i class="fas fa-users-cog"style="font-size:70px"></i>
                            </div>
                </div>
            </div> --}}
        </div>
        <div class="col-md-3 ">
            <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                        <a href="{{ route('po-create') }}" class="card-box">
                            {{-- <div class="card-box"> --}}

                            <div class="card-element-first">
                                <p>Purchase Order</p>
                            </div>
                            <div class="card-element-second">
                                <i class="fas fa-file-alt"style="font-size:70px"></i>
                            </div>

                            {{-- </div> --}}
                        </a>
                </div>
            </div>
            {{-- <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">
                    <a href="{{ route('po-create') }}">
                        <div class="card-element-first">
                            <p><a href="{{ route('po-create') }}" class="nav-link">Purchase Order</a></p>
                        </div>
                        <div class="card-element-second"> --}}
                            {{-- <img src="#"> --}}
                            {{-- <i class="fas fa-file-alt"style="font-size:70px"></i>
                        </div>
                    </a>
                </div>
            </div> --}}
        </div>
        <div class="col-md-3">
            {{-- <div class="link-wraper">
                <p>
                    <a href="{{ route('vendor-list') }}" class="nav-link"> Buyers</a>
                </p>
            </div> --}}
            <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                        <a href="{{ route('buyer-list') }}" class="card-box">
                            {{-- <div class="card-box"> --}}

                            <div class="card-element-first">
                                <p>Buyers</p>
                            </div>
                            <div class="card-element-second">
                                <i class="fas fa-building"style="font-size:70px"></i>
                            </div>

                            {{-- </div> --}}
                        </a>
                </div>
            </div>
            {{-- <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                    <div class="card-element-first">
                        <p><a href="{{ route('buyer-list') }}" class="nav-link">Buyers</a></p>
                    </div>
                    <div class="card-element-second"> --}}
                        {{-- <img src="#"> --}}
                        {{-- <i class="fas fa-building"style="font-size:70px"></i>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="col-md-3">
            {{-- <div class="link-wraper">
                <p>
                    <a href="{{ route('vendor-list') }}" class="nav-link">Vendors </a>
                </p>
            </div> --}}
            <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                        <a href="{{ route('vendor-list') }}" class="card-box">
                            {{-- <div class="card-box"> --}}

                            <div class="card-element-first">
                                <p>Vendors</p>
                            </div>
                            <div class="card-element-second">
                                <i class="fas fa-industry"style="font-size:70px"></i>
                            </div>

                            {{-- </div> --}}
                        </a>
                </div>
            </div>
            {{-- <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                    <div class="card-element-first">
                        <p><a href="{{ route('vendor-list') }}" class="nav-link">Vendors</a></p>
                    </div>
                    <div class="card-element-second">
                        {{-- <img src="#"> --}}
                        {{-- <i class="fas fa-industry"style="font-size:70px"></i>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <br>
    <div class="row content-wraper">
        <div class="col-md-3">
            {{-- <div class="link-wraper">
                <p><a href="{{ route('critical-path') }}" class="nav-link">Critical List</a></p>
            </div> --}}
            <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                        <a href="{{ route('buyer-manage') }}" class="card-box">
                            {{-- <div class="card-box"> --}}

                            <div class="card-element-first">
                                <p>Buyer Management</p>
                            </div>
                            <div class="card-element-second">
                                <i class="fas fa-warehouse"style="font-size:70px"></i>
                            </div>

                            {{-- </div> --}}
                        </a>
                </div>
            </div>
            {{-- <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                            <div class="card-element-first">
                                <p><a href="{{ route('buyer-manage') }}" class="nav-link">Buyer Management</a></p>
                            </div>
                            <div class="card-element-second">
                                {{-- <img src="#"> --}}
                                {{-- <i class="fas fa-warehouse"style="font-size:70px"></i>
                            </div>
                </div>
            </div> --}}
        </div>
        <div class="col-md-3">
            <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                        <a href="{{ route('vendor-manage') }}" class="card-box">
                            {{-- <div class="card-box"> --}}

                            <div class="card-element-first">
                                <p>Vendor Management</p>
                            </div>
                            <div class="card-element-second">
                                <i class="fas fa-recycle"style="font-size:70px"></i>
                            </div>

                            {{-- </div> --}}
                        </a>
                </div>
            </div>
            {{-- <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                    <div class="card-element-first">
                        <p><a href="{{ route('vendor-manage') }}" class="nav-link">Vendor Management</a></p>
                    </div>
                    <div class="card-element-second">
                        {{-- <img src="#"> --}}
                        {{-- <i class="fas fa-recycle"style="font-size:70px"></i>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="col-md-3">
            <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                        <a href="{{ route('critical-path') }}" class="card-box">
                            {{-- <div class="card-box"> --}}

                            <div class="card-element-first">
                                <p>Critical List</p>
                            </div>
                            <div class="card-element-second">
                                <i class="fas fa-circle"style="font-size:70px"></i>
                            </div>

                            {{-- </div> --}}
                        </a>
                </div>
            </div>
            {{-- <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                            <div class="card-element-first">
                                <p><a href="{{ route('critical-path') }}" class="nav-link">Critical List</a></p>
                            </div>
                            <div class="card-element-second">
                                {{-- <img src="#"> --}}
                                {{-- <i class="fas fa-circle"style="font-size:70px"></i>
                            </div>
                </div>
            </div>  --}}
        </div>
        <div class="col-md-3">
            <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">

                        <a href="{{ route('department-manage') }}" class="card-box">
                            {{-- <div class="card-box"> --}}

                            <div class="card-element-first">
                                <p>Departments</p>
                            </div>
                            <div class="card-element-second">
                                <i class="far fa-object-group"style="font-size:70px"></i>
                            </div>

                            {{-- </div> --}}
                        </a>
                </div>
            </div>
            {{-- <div class=" card-list-container">
                <div class="card-box-container1 d-flex align-items-center">
                            <div class="card-element-first">
                                <p><a href="{{ route('department-manage') }}" class="nav-link">Departments</a></p>
                            </div>
                            <div class="card-element-second">
                                {{-- <img src="#"> --}}
                                {{-- <i class="far fa-object-group"style="font-size:70px"></i>
                            </div>
                </div>
            </div>  --}}
        </div>
    </div>
@endsection
