@extends('layout.layout')

@section('title','Blood request')

@section('vertical_navbar')
    <!-- A vertical navbar -->
    <nav class="navbar bg-light">

          <!-- Links -->
        <ul class="navbar-nav" style="height:600px;">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/home')}}" style="color:black;margin-left:10px;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('donor.details.index')}}" style="color:black;margin-left:10px;">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/donor/requests') }}" style="color:black;margin-left:10px;"> Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color:#e60000;margin-left:10px;">Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('donor.donation_history.index') }}" style="color:black;margin-left:10px;"> Location</a>
            </li>
        </ul>
    </nav>
@endsection
@section('content')
    <br/>
    <a href="{{ route('donor.donations.create') }}">
        <button type="button" class="btn btn-outline-primary"> Add </button></a> <br/><br/>
    @foreach($donations as $donation)
        <div class="card bg-light text-dark">
            @if(Auth::user()->donor_id == $donation->donor_id)
            <div class="card-body">
                <div class="form-group row">
                <div class="column side" style="width: 15%">
                    <div id="user_icon">
                        <i class='fas fa-user-circle' style='font-size:60px;color:#e60000'></i>
                    </div>
                </div>
                <div class="column middle" style=" width: 70%">
                    <div id="content">
                <p>  Blood quantity - {{ $donation->blood_quantityInPints }}</p>
                <p> Branch - {{ $donation->branch_id }}</p>
                <p> Date - {{ $donation->created_at  }}</p>
                    </div>
                </div>
                </div>
            </div>
            </div>

        </div>

        <br/>
@endif
    @endforeach
    {{ $donations->links() }}
    @endsection
