@extends('layouts.app')

@section('content')
<x-hero>Dashboard</x-hero>
<div class="container" style="padding: 1em">
    <div class="card">
        <div class="card-body has-text-centered" style="padding: 1em">
            <p>You are logged in as {{ $user->role->name }}, {{ $user->email }}! </p>
        </div>
    </div>
</div>
@endsection
