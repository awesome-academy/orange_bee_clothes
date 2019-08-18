@extends('layouts.orangebee')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <p>My name: {{ auth()->user()->name }}</p>
                <p>My Email: {{ auth()->user()->email }}</p>
                <img alt="{{auth()->user()->name}}" src="{{auth()->user()->image}}"/>
            </div>
        </div>
    </div>
</div>

@endsection
