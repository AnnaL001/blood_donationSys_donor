@extends('layout.layout1')

@section('title','Add donation')

@section('content')
    <br/><br/><br/>
    <center>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color: #e60000;
             border-style: groove";><i class='fas fa-paper-plane' style='font-size:16px'></i>{{ __('Add donation') }}</div>

                        <div class="card-body" style="border-style: groove">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br />
                            @endif

                            <form method="POST" action="{{ route('donor.donations.store') }}" >
                                @csrf
                                <div class="form-group row">
                                    <label for="blood_quantityInPints" class="col-md-4 col-form-label text-md-right">{{ __('Blood quantity in pints') }}</label>

                                    <div class="col-md-6">
                                         <select class="form-control" id="blood_quantityInPints" name="blood_quantityInPints">
                                            <option> 1 </option>
                                            <option> 2 </option>
                                             <option> 3 </option>
                                             <option> 4 </option>
                                        </select>


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="branch" class="col-md-4 col-form-label text-md-right">{{ __('Branch') }}</label>

                                    <div class="col-md-6">

                                        <select  id="branch" class="form-control" name="branch">
                                            @foreach($branches as $key => $value)
                                                <option value="{{$value}}">{{$key}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-primary" style="background-color: #e60000;
            border-color: #E7E7E7;">
                                            {{ __('Add') }}
                                        </button>
                                        <a href="{{ route('donor.donations.index') }}">
                                            <button type="button" class="btn btn-primary" style="background-color: #e60000;
            border-color: #E7E7E7;">
                                                {{ __('Back') }}
                                            </button> </a>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
@endsection
