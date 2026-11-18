@extends('layouts.app')
@section('title','Edit Result')
@section('content')
<div class="card"><h1>Edit Student Result</h1>
<form method="POST" action="{{ route('results.update',$result) }}">@csrf @method('PUT') @include('results._form')</form>
</div>
@endsection
