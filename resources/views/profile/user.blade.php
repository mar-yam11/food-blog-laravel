@extends('layouts.master')

@section('content')
    <div class="profile">
        <div class="container">
            <h2>Welcome, {{ $user->fullname }}</h2>
            <div class="profile__info">
                <h4>Your Information</h4>
                <p><strong>Username:</strong> {{ $user->username }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
            </div>
            <a href="{{ route('logout') }}" class="site-btn">Logout</a>
        </div>
    </div>
@endsection