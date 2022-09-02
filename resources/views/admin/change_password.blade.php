@extends('admin.layouts.admin_master')
@section('title')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <form action="{{ route('admin.password.update', $adminEdit->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0">Featured</h5>
                            </div>
                            <div class="card-body">

                                <table class="table table-striped table-bordered mx-auto mt-4">

                                    <tbody>
                                        <tr>
                                            <td>
                                                <label>Current Password</label>
                                            </td>

                                            <td> <input type="text"
                                                    class="form-control pl-15 bg-transparent plc-white @error('current_password') is-invalid @enderror"
                                                    name="current_password" autocomplete="current_password"
                                                    placeholder="Enter Current Password"
                                                    value="{{ old('current_password') }}">
                                                @error('current_password')
                                                    <div class="text-danger pt-2">{{ $message }}</div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <label>New Password</label>
                                            </td>

                                            <td> <input type="text"
                                                    class="form-control pl-15 bg-transparent plc-white @error('new_password') is-invalid @enderror"
                                                    name="new_password" autocomplete="new_password"
                                                    placeholder="Enter Password" value="{{ old('new_password') }}">
                                                @error('new_password')
                                                    <div class="text-danger pt-2">{{ $message }}</div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <label>Confirm Password</label>
                                            </td>

                                            <td><input type="text"
                                                    class="form-control pl-15 bg-transparent plc-white @error('confirm_password') is-invalid @enderror"
                                                    name="confirm_password" autocomplete="confirm_password"
                                                    placeholder="Enter Password" value="{{ old('confirm_password') }}">
                                                @error('confirm_password')
                                                    <div class="text-danger pt-2">{{ $message }}</div>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-outline-primary mx-auto d-block mt-4">Change Password
                                    Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
