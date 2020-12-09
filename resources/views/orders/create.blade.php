@extends('layouts.app')

@section('content')
    @if ($supplier ?? '' != NULL)
        <x-hero subtitle="{{ $supplier->name }}">Place a new order</x-hero>
    @else
        <x-hero subtitle="Please choose parts from the list">Place a new order</x-hero>
    @endif
    <div class="container" style="padding-top: 1em">
        <form method="POST" id="orderForm" action="/orders">
            @csrf

            <x-formerror />
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            @if ($supplier ?? '' != NULL)
                <input type="hidden" name="supplier_id" value="{{ $supplier->id }}">
            @endif
            <orderinputs :products='@json($parts)'></orderinputs>

            <div class="field has-text-centered">
                <button class="button is-primary is-rounded is-large" type="submit">Order</button>
            </div>
        </form>
    </div>
@endsection
