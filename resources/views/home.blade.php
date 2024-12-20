@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>

                    <!-- Buttons to navigate to different pages -->
                    <div class="mt-3">
                        <!-- Admin Dashboard -->
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Admin Dashboard</a>

                        <!-- Reports Page -->
                        <a href="{{ url('/reports') }}" class="btn btn-secondary">Reports Page</a>

                        <!-- Edit Profile Page -->
                        <a href="{{ url('/profile') }}" class="btn btn-success">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
