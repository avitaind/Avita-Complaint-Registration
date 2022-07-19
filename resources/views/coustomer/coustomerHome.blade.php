@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @include('component.alert')
                        @if (isset($getdata) != 'In Processing')
                            <a href="{{ route('complaintRegistration') }}" class="btn btn-primary mt-2 mb-2">Complaint
                                Registration</a>
                        @else
                            <div class="alert alert-success"> <strong>Your complaint id : {{ $getdata->ticketID }} is
                                    registered with us. We will update you shortly.</strong></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
