<div class="card mb-2">
    <div class="card-body">
        <img class="rounded-circle card-img-top" style="border-radius: 50%;" src="{{ asset('user/user.png') }}"
            alt="User Avatar" width="100">
        <h4 class="card-title text-center pt-2 text-success">{{ Auth::user()->name }}</h4>
        <div class="d-flex justify-content-center">
            <a href="#" class="card-link btn btn-success"><i class="fa fa-bandcamp" aria-hidden="true"></i>
                User</a>
            <a href="#" class="card-link btn btn-warning">Update Profile</a>
        </div>
    </div>
</div>
<div class="list-group">
    <h2 class="bg-dark text-light p-2">User Dashboard</h2>
    <i class="fa fa-bandcamp" aria-hidden="true"></i>
    <a href="{{ route('user.dashboard') }}" class="list-group-item list-group-item-action"><i class="fa fa-tachometer"
            aria-hidden="true"></i>
        Dashboard</a>
    <a href="{{ route('user.profile') }}" class="list-group-item list-group-item-action">Profile
        Update</a>
    <a href="#" class="list-group-item list-group-item-action">Change
        Password</a>
    <a href="#" class="list-group-item list-group-item-action">My
        Orders</a>
    <a href="#" class="list-group-item list-group-item-action">Logout</a>
    <a href="#" class="list-group-item list-group-item-action">Change
        Password</a>
    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block text-left">Logout</a>
    {{-- <a href="" class="btn btn-danger btn-sm btn-block">Logout</a> --}}

</div>


{{-- <ul class="list-group list-group-flush">
    <a href="" class="btn btn-primary btn-sm btn-block ">Home</a>
    <a href="" class="btn btn-primary btn-sm btn-block">Profile
        Update</a>
    <a href="" class="btn btn-primary btn-sm btn-block">Change
        Password</a>
    <a href="" class="btn btn-primary btn-sm btn-block">My
        Orders</a>
</ul> --}}
