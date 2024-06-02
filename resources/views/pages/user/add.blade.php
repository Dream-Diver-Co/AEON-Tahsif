@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!-- ... -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@lang('global.add')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('userCreate') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>@lang('cruds.user.fields.name')</label>
                                <input type="text" name="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>@lang('cruds.user.fields.email')</label>
                                <input type="email" name="email"
                                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>@lang('cruds.role.fields.roles')</label>
                                <select class="form-control select2" multiple="multiple" name="roles[]"
                                    data-placeholder="@lang('pleaseSelect')" style="width: 100%;">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>@lang('cruds.user.fields.password')</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password-field"
                                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-fw fa-eye toggle-password"></i>
                                        </span>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>@lang('global.login_password_confirmation')</label>
                                <div class="input-group">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-fw fa-eye toggle-password"></i>
                                        </span>
                                    </div>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span
                                        class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="buyerCheckbox"
                                        name="buyerCheckbox">
                                    <label class="custom-control-label" for="buyerCheckbox">Buyer</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="vendorCheckbox"
                                        name="vendorCheckbox">
                                    <label class="custom-control-label" for="vendorCheckbox">Vendor</label>
                                </div>
                            </div>
                            <div class="form-group" id="buyerSelectBox" style="display: none;">
                                <label>Select Buyer Role</label>
                                <select class="form-control select2" name="buyer_id" data-placeholder="@lang('pleaseSelect')"
                                    style="width: 100%">
                                    <option value="">Select Buyer </option>
                                    @foreach ($buyers as $buyer)
                                        <option value="{{ $buyer->id }}">{{ $buyer->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group" id="vendorSelectBox" style="display: none;">
                                <label>Select Vendor Role</label>
                                <select class="form-control select2" name="vendor_id" data-placeholder="@lang('pleaseSelect')"
                                    style="width: 100%;">
                                    <!-- Add options for vendor roles here -->
                                    <option value="">Select Vendor </option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">@lang('global.save')</button>
                                <a href="{{ route('userIndex') }}"
                                    class="btn btn-default float-left">@lang('global.cancel')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Add custom styles for eye toggle icons */
        .input-group-append .input-group-text {
            cursor: pointer;
        }
    </style>
@endsection

@section('scripts')
    <script>
        // Toggle the visibility of select boxes based on checkbox selection
        const buyerCheckbox = document.getElementById('buyerCheckbox');
        const vendorCheckbox = document.getElementById('vendorCheckbox');
        const buyerSelectBox = document.getElementById('buyerSelectBox');
        const vendorSelectBox = document.getElementById('vendorSelectBox');

        buyerCheckbox.addEventListener('change', function() {
            buyerSelectBox.style.display = this.checked ? 'block' : 'none';
        });

        vendorCheckbox.addEventListener('change', function() {
            vendorSelectBox.style.display = this.checked ? 'block' : 'none';
        });

        // Toggle password visibility
        const togglePassword = document.querySelectorAll('.toggle-password');
        togglePassword.forEach(icon => {
            icon.addEventListener('click', function() {
                const input = this.closest('.input-group').querySelector('input');
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
@endsection
