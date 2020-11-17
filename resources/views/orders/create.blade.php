@extends('layouts.app')

@section('content')
    <x-hero>Place a new order</x-hero>
    <div class="container" style="padding-top: 1em">
        <form method="POST" id="orderForm" action="/orders">
            @csrf

            <x-formerror />

            <div class="container has-text-centered" style="padding-bottom: 1em">
                <a class="button is-link is-inverted" v-on:click="add">
                    <span class="icon is-small">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span>Add a new part</span>
                </a>
                <a class="button is-danger is-inverted" v-on:click="remove" v-if="count > 0">
                    <span class="icon is-small">
                        <i class="fas fa-minus"></i>
                    </span>
                    <span>Remove</span>
                </a>
            </div>

            <div class="content" v-for="i in count">
                <x-inlineinput label="Part" for="parts[]" />
            </div>

            <div class="field has-text-centered">
                <button class="button is-primary is-rounded is-large" type="submit">Confirm</button>
            </div>
        </form>
    </div>
@endsection
