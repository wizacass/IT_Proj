@extends('layouts.app')

@section('content')
    <x-hero subtitle="Please choose parts from the list">Place a new order</x-hero>
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

            <div class="box" v-if="count > 0">
                <div class="level" v-for="i in count">
                    <div class="level-item">
                        <p><b>@{{ i }}</b></p>
                    </div>
                    <div class="level-item">
                        <div class="select is-fullwidth">
                            <select name=parts[]>
                                <option>Select a part</option>
                                @foreach ($parts as $part)
                                    <option value="{{ $part->id }}">[{{ $part->supplier->name }}] {{ $part->part_type }}
                                        {{ $part->model }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="level-item">
                        <x-inlineinput for="part_counts[]" type="number" placeholder="Amount" />
                    </div>
                </div>
            </div>

            <div class="field has-text-centered">
                <button class="button is-primary is-rounded is-large" type="submit">Next</button>
            </div>
        </form>
    </div>
@endsection
