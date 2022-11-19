@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>HomePage</h1>
        <a class="btn btn-lg btn-primary" href="{{ route('calendar') }}" role="button">Calendar</a>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view calendar</p>
        @endguest
    </div>
@endsection
