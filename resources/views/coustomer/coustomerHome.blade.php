@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @include('component.alert')

                        @if ($getdata->name != Auth::user()->name)
                            <a href="{{ route('complaintRegistration') }}" class="btn btn-primary mt-2 mb-2">Complaint
                                Registration</a>
                        @else
                            {{-- <div class="alert alert-success">Yor Ticket ID is <strong >{{ $getdata->ticketID}} and on going {{ $getdata->status }}</strong></div> --}}
                            <div class="alert alert-success"> <strong>Your complaint id : {{ $getdata->ticketID }} is
                                    registered with us. We will update you shortly.</strong></div>
                        @endif

                        {{-- <a href="{{ route('complaintRegistration') }}" class="btn btn-primary mt-2 mb-2">Complaint
                            Registration</a> --}}
                        {{-- <br />
                        {{ __('You are logged in!') }} --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
