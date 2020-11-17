@extends('layouts.app')

@section('content')
<x-hero>Register a new part</x-hero>
    <div class="container" style="padding: 1em">
        <div class="container has-text-centered" style="margin-bottom: 1em">
            <h2 class="subtitle">Please enter information about the part</h2>
        </div>
        <form method="POST" action="/parts">
            @csrf

            <x-formerror />
            <x-inlineinput label="Manufacturer" for="manufacturer"/>
            <x-inlineinput label="Model Name" for="model"/>
            <x-inlineinput label="Part type" for="part_type"/>
            <x-inlineinput label="Delivery time" for="delivery_time" type="number" subtitle="days"/>
            <x-inlineinput label="Price" for="price" type="number" subtitle="$"/>
            <x-inlineinput label="Amount" for="amount" type="number"/>

            <div class="field has-text-centered">
                <button class="button is-primary is-rounded is-large" type="submit">Add</button>
            </div>
        </form>
    </div>
@endsection
