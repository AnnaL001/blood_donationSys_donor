@extends('layout.layout')

@section('title','Blood history')

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
                <a class="nav-link" href="{{ route('donor.donations.index') }}" style="color:black;margin-left:10px;">Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color:#e60000;margin-left:10px;"> Location</a>
            </li>
        </ul>
    </nav>
@endsection
@section('content')
    <br/>
    @foreach($donation_history as $history)
        @if(Auth::user()->donor_id == $history->donor_id)
        <div class="card bg-light text-dark">

                <div class="card-body">

                    <div class="form-group row">

                        <div class="column side" style="width: 20%">
                            <div id="user_icon">
                                <i class='fas fa-history' style='font-size:80px;color:#e60000'></i>
                            </div>
                        </div>
                        <div class="column middle" style=" width: 70%">
                            <div id="content">
                                <p>  Blood quantity - {{ $history->blood_quantityInPints }}</p>
                                <p> Branch - {{ $history->branch_id }}</p>
                                <p> Date - {{ $history->date_of_donation  }}</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        </div>

        <br/>
@endif
    @endforeach
    {{ $donation_history->links() }}
@endsection
