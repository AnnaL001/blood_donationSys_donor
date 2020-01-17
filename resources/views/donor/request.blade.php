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
                <a class="nav-link" href="#" style="color:#e60000;margin-left:10px;"> Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('donor.donations.index') }}" style="color:black;margin-left:10px;">Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('donor.donation_history.index') }}" style="color:black;margin-left:10px;"> Location </a>
            </li>
        </ul>
    </nav>
@endsection
@section('content')
    <br/>
     @foreach($requests as $request)

         <div class="card bg-light text-dark">
             @if(Auth::user()->blood_type == $request->blood_type)
             <div class="card-body">
               <p> {{ $request->request_text }}</p>
                 <p> Response - </p>

                 <div class="form-group row">
                     <div class="column side" style="width: 25%;margin-left: 60px;">
                         <a href="{{ URL::to('donor/add_response/'.$request->request_id)}}">
                         <button type="button" class="btn btn-outline-info">
                             {{ __('Add response') }}
                         </button>
                         </a>
                     </div>
                     <div class="column middle" style="width: 25%">
                             <button type="button" class="btn btn-outline-warning">
                                 {{ __('Edit response') }}
                             </button>
                     </div>
                 </div>
                 </div>
             </div>


         <br/>
        @endif
             @endforeach

        {{ $requests->links() }}
@endsection
