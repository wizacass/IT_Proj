@extends('layouts.app')

@section('content')
<x-hero>Register a new part</x-hero>
    <div class="container" style="padding: 1em">
        <div class="container has-text-centered" style="margin-bottom: 1em">
            <h2 class="subtitle">Please enter information about the part</h2>
        </div>
        <form method="POST" action="/parts/{{ $part->id }}">
            @csrf
            @method('PATCH')

            <x-formerror />
            <x-inlineinput label="Delivery time" for="delivery_time" type="number" subtitle="days" value="{{ $part->delivery_time }}"/>
            <x-inlineinput label="Price" for="price" type="number" subtitle="$" value="{{ $part->price }}"/>
            <x-inlineinput label="Amount" for="amount" type="number" value="{{ $part->amount }}"/>

            <div class="field has-text-centered">
                <button class="button is-primary is-rounded is-large" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
