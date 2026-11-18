@extends('layouts.app')
@section('title','Admin Login')
@section('content')
<div class="card" style="max-width:480px;margin:30px auto">
<h1>Admin Login</h1><p class="muted">Sign in to manage students and results.</p>
@if($errors->any())<div class="alert" style="background:#fee2e2;color:#991b1b">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('login.submit') }}">@csrf
<label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
<label for="password">Password</label><input id="password" type="password" name="password" required>
<label style="font-weight:normal"><input type="checkbox" name="remember" value="1" style="width:auto"> Remember me</label>
<button class="btn" type="submit">Login</button>
</form>
<p class="muted" style="margin-top:18px">Demo: admin@example.com / password123</p>
</div>
@endsection
