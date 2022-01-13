@extends('layouts.master')

@section('title', 'Profile User')

@section('content')

<div class="profile">
    <div class="profile-info">
        <h1 style="text-align: center;font-weight: bold; ">User Profile</h1>
        <div class="card-body">
            @if(Auth::user()->image)
                <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 10vw;height: 20vh; margin: 0 40%; ">
            @endif
            <form action="{{route('profile')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" style="margin: 2% 35%">
                <br>
                <input type="submit" value="Upload" style="margin: 0.5% 40%; padding: 0 2%">
            </form>
        </div>
        <h4>Name &nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;
            <span class="span-info">{{Auth::user()->name}}</span>
        </h4>
        <br>
        <h4>Email &nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;
            <span class="span-info">{{Auth::user()->email}}</span>
        </h4>
        <br>
        <h4>Age &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;
            <span class="span-info">{{Auth::user()->age}}</span>
        </h4>

    </div>
</div>

@endsection
