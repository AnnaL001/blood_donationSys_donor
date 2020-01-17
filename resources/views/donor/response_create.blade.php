@extends('layout.layout1')

@section('title','Add response')

@section('content')
    <br/><br/><br/>
    <center>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color: #e60000;
             border-style: groove";><i class='fas fa-comment-dots' style='font-size:16px'></i>{{ __('Add Response') }}</div>

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

                            <form method="POST" action="{{  route('donor.responses.store')}}" >
                                @csrf
                                <div class="form-group row">
                                    <label for="response_text" class="col-md-4 col-form-label text-md-right">{{ __('Response') }}</label>

                                    <div class="col-md-6">
                                        <input type="hidden" value="{{$request_id}}" name="request_id" />
                                        <select class="form-control" id="response_text" name="response_text">
                                            <option> Yes  </option>
                                            <option> No </option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-primary" style="background-color: #e60000;
            border-color: #E7E7E7;">
                                            {{ __('Add') }}
                                        </button>
                                        <a href="{{ route('donor.requests.index') }}">
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

