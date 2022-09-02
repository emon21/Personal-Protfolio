@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

<div class="card mb-2">
    <div class="card-body">
        <img class="rounded-circle card-img-top" style="border-radius: 20%;" src="{{ asset( Auth::user()->image) }}"
            alt="User Avatar" width="100">

             {{-- <img src="@if ($user->image) {{ asset($user->image) }} @else {{ asset('backend/user/user.png') }} @endif"
                    class="img-fluid rounded-circle img-rounded" alt=""> --}}
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
    <a href="{{ route('user.dashboard') }}"
        class="list-group-item list-group-item-action {{ $route == 'user.dashboard' ? 'active btn btn-success' : '' }}"><i
            class="fa fa-tachometer" aria-hidden="true"></i>
        Dashboard</a>
    <a href="{{ route('user.profile') }}"
        class="list-group-item list-group-item-action {{ $route == 'user.profile' ? 'active btn btn-success' : '' }}">Profile
        Update</a>
    <a href="{{ route('user.password.change') }}"
        class="list-group-item list-group-item-action {{ $route == 'user.password.change' ? 'active btn btn-success' : '' }}">Change
        Password</a>

    <a href="{{ route('user.logout') }}" class="list-group-item  btn btn-danger btn-sm btn-block text-left">Logout</a>
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
