@extends('layouts.app')

@section('content')
    <x-hero subtitle='{{ $user->email }}, "{{ $user->supplier->name }}" {{ $user->role->name }}'>Welcome back!</x-hero>
    <div class="container" style="padding-top: 2em">
        <div class="tile is-ancestor has-text-centered">
            <x-iconcard icon="fa-plane" subtitle="View Parts" href="/parts"/>
            <x-iconcard icon="fa-globe-europe" subtitle="View Orders" href="#"/>
        </div>
    </div>
@endsection
