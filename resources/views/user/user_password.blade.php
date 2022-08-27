@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1
@endsection
@section('content') <div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-3">

            @include('user.pages.side_bar')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Change Passworde') }}</div>
                <div class="card-body">
                    <form action="{{ route('user.password.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="form-group col-sm-8 mb-2">
                                <label>Current Password</label>
                                <div class="input-group mt-1">
                                    <input type="password"
                                        class="form-control pl-15 bg-transparent plc-white @error('current_password') is-invalid @enderror"
                                        name="current_password" autocomplete="current_password"
                                        placeholder="Enter Current Password" value="{{ $user->password }}">
                                </div>
                                @error('current_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-sm-8 mb-2">
                                <label for="new_password">New Password</label>
                                <div class="input-group mt-1">
                                    <input type="password"
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        name="new_password" autocomplete="new_password"
                                        placeholder="Enter New Password" value="{{ old('new_password') }}"
                                        id="new_password">
                                </div>
                                @error('new_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-sm-8 mb-2">
                                <label for="confirm_password">Confirm Password</label>
                                <div class="input-group mt-1">
                                    <input type="password"
                                        class="form-control pl-15 bg-transparent  plc-white @error('confirm_password') is-invalid @enderror"
                                        name="confirm_password" autocomplete="confirm_password"
                                        placeholder="Enter Confirm Password"
                                        value="{{ old('confirm_password') }}">
                                </div>
                                @error('confirm_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <button type="submit" class="btn btn-rounded btn-success mt-1">
                            Update Password</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
    </div> @endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // alert('#showImage');
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
