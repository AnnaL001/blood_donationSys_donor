@extends('layout.layout')

@section('title','Home')

@section('vertical_navbar')
    <!-- A vertical navbar -->
    <nav class="navbar bg-light">

        <!-- Links -->
        <ul class="navbar-nav" style="height:490px;">
            <li class="nav-item">
                <a class="nav-link" href="#" style="color:#e60000;
        margin-left:10px;">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/donor/profile')}}" style="color:black;margin-left:10px;">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('donor.requests.index') }}" style="color:black;margin-left:10px;"> Request</a>
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
    <br/><br/>
    <div class="jumbotron">
       <h3> Welcome, {{ Auth::user()->first_name }}
       @if(Auth::user()->gender == "Male")
            <i class="fas fa-male" style="color: #e60000;"></i>
           @endif
           <i class="fas fa-female" style="color: #e60000;"></i>
       </h3>
        <p> The aim of the system is to enable for ease of finding voluntary non-remunerated blood donors in
            the case of emergencies to ensure adequate
            supply of safe blood.
        </p>
    </div>
    @endsection
