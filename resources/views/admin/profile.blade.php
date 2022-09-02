@extends('admin.layouts.admin_master')
@section('title')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0">Featured</h5>
                            </div>
                            <div class="card-body">
                                <!-- <img id="showImage"  src="{{ !empty($user->image) ? url('admin/', $user->image) : url('admin/default.png') }}" class="mx-auto d-block img-circle w-25 p-4"> -->

                                <img id="showImage" class="img-circle mx-auto d-block mb-4"
                                                    src="{{ !empty($user->image) ? url('admin/', $user->image) : url('admin/default.png') }}"
                                                    alt="User Avatar"
                                                    style="width: 280px;
                                                    height: 282px;
                                                    margin-top: 4px;">

                                <input type="file" name="profile_photo" class="form-control" id="image">
                                <table class="table table-striped table-bordered mx-auto mt-4">

                                    <tbody>
                                        <div class="row">
                                            <tr>
                                                <td>
                                                    <label for="" class="p-md-3"> User Name</label>
                                                </td>

                                                <td><input type="text" class="mt-3 form-control"
                                                        placeholder="Enter User Name...!!" value="{{ $user->name }}"
                                                        name="name">
                                                </td>

                                                <td>
                                                    <label for="" class="p-md-3">User Email</label>
                                                </td>

                                                <td><input type="text" class="mt-3 form-control"
                                                        placeholder="Enter User Name...!!" value="{{ $user->email }}"
                                                        name="email">
                                                </td>
                                            </tr>
                                        </div>

                                        <tr>


                                            <td>
                                                <label for="" class="p-md-3">Change Password</label>
                                            </td>

                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input btn-sm mt-4"
                                                        id="customSwitch1" data-size="sm">
                                                    <label class="custom-control-label" for="customSwitch1"></label>
                                                </div>
                                                <a href="{{ route('admin.password.change') }}" class="link">Change
                                                    Password</a>

                                            </td>
                                        </tr>



                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-outline-primary mx-auto d-block mt-4">Update
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
