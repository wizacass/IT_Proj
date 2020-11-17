@extends('layouts.app')

@section('content')
    <x-hero>"{{ $supplier->name }}" parts</x-hero>
    <div class="container has-text-centered" style="padding-top: 1em">
        <p class="subtitle">There will be parts displayed!</p>
        <a class="button is-primary is-rounded is-large" href="/parts/create">Add new part</a>
    </div>
@endsection
