@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 500px;">
    <h2 class="text-center mb-4">Admin Login</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ url('/admin/login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input
                type="email"
                name="email"
                class="form-control"
                id="email"
                required
            >
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                name="password"
                class="form-control"
                id="password"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection
