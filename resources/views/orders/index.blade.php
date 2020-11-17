@extends('layouts.app')

@section('content')
    <x-hero>Orders</x-hero>
    <div class="container" style="padding-top: 2em">
        <p>Orders list</p>
        <div class="container has-text-centered">
            <a class="button is-primary is-rounded is-large" href="/orders/create">Place a new order</a>
        </div>
    </div>
@endsection
