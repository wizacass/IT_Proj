@extends('layouts.app')

@section('content')
    <x-hero> Order {{ $order->id }} details </x-hero>
    <div class="container" style="padding-top: 1em">
        {{-- <div class="columns">
            <div class="column"> --}}
                <div class="card">
                    <header class="card-header has-background-primary-light">
                        <p class="card-header-title is-centered">Order details</p>
                    </header>
                    <div class="card-content">
                        <table class="table is-fullwidth">
                            <tbody>
                                <tr>
                                    <th>Order sum</th>
                                    <td> {{ $order->sum }}$ </td>
                                </tr>
                                <tr>
                                    <th>Parts count</th>
                                    <td> {{ $order->parts_count }} </td>
                                </tr>
                                <tr>
                                    <th>Expected delivery</th>
                                    <td> {{ $order->expected_delivery }} </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td> {{ $order->status->name }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @if ($order->delivery_status_id <= 2)
                    <footer class="card-footer">
                        <form class="card-footer-item" method="POST" action="/orders/{{ $order->id }}">
                            @csrf
                            @method('DELETE')
                                <button class="button is-text is-fullwidth has-text-danger" type="submit">
                                    <p>Cancel order</p>
                                    <span class="icon">
                                        <i class="fas fa-lg fa-times"></i>
                                    </span>
                                </button>
                        </form>
                    </footer>
                    @endif
                </div>
                {{--
            </div>
            <div class="column">
            </div>
        </div> --}}
    </div>
@endsection
