@extends('layout.layout')

@section('title','User profile')

@section('vertical_navbar')
    <!-- A vertical navbar -->
    <nav class="navbar bg-light">

         <!-- Links -->
        <ul class="navbar-nav" style="height:580px;">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/home')}}" style="color:black;margin-left:10px;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color:#e60000;margin-left:10px;">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/donor/requests') }}" style="color:black;margin-left:10px;"> Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route ('donor.donations.index') }}" style="color:black;margin-left:10px;">Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('donor.donation_history.index') }}" style="color:black;margin-left:10px;"> Location </a>
            </li>
        </ul>
    </nav>
@endsection
@section('content')
    <br/>
    <div class="jumbotron" style="height: 300px;">
            <div class ="row">
                <div class="column side" style="width: 30%">
                    <div id="vertical_navbar">
                        <i class='fas fa-user-circle' style='font-size:150px;color:#e60000'></i>
                    </div>
                </div>
                <div class="column middle" style=" width: 70%">
                    <div id="content">
                        <h6 style="margin-left:15px;"> First name :  {{  Auth::user()->first_name }}</h6>
                        <h6 style="margin-left: 15px;"> Last name : {{  Auth::user()->last_name }}</h6>
                        <h6 style="margin-left: 15px;"> Surname : {{  Auth::user()->surname }}</h6>
                        <h6 style="margin-left: 15px;"> Email  : {{  Auth::user()->email }}</h6>
                        <h6 style="margin-left: 15px;"> Phone No : {{  Auth::user()->phoneNo }}</h6>
                        <h6 style="margin-left: 15px;"> Gender : {{ Auth::user()->gender }}</h6>
                        <h6 style="margin-left: 15px;"> Blood type :  {{ Auth::user()->blood_type }} </h6>
                       <a href="{{ route('donor.details.edit', Auth::user()->donor_id)}}"> <button type="button" class="btn btn-outline-info" style="margin-left: 15px;"> Edit </button></a>

                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection
