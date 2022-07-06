@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('complaintRegistration') }}" class="btn btn-primary mt-2 mb-2">Complaint
                            Registration</a>

                        <br />
                        {{ __('You are logged in!') }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
