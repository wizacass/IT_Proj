@extends('layouts.app')

@section('content')
    <x-hero subtitle='"{{ $part->supplier->name }}"'> {{ $part->part_type }} {{ $part->model }}</x-hero>
    <div class="container" style="padding-top: 1em">
        {{-- <div class="columns">
            <div class="column"> --}}
                <div class="card">
                    <header class="card-header has-background-primary-light">
                        <p class="card-header-title is-centered">Part details</p>
                    </header>
                    <div class="card-content">
                        <table class="table is-fullwidth">
                            <tbody>
                                <tr>
                                    <th>Part type</th>
                                    <td> {{ $part->part_type }} </td>
                                </tr>
                                <tr>
                                    <th>Manufacturer</th>
                                    <td> {{ $part->manufacturer }} </td>
                                </tr>
                                <tr>
                                    <th>Model</th>
                                    <td> {{ $part->model }} </td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td> {{ $part->price }}$ </td>
                                </tr>
                                <tr>
                                    <th>Delivery time</th>
                                    <td> {{ $part->delivery_time }} days </td>
                                </tr>
                                <tr>
                                    <th>In stock</th>
                                    <td> {{ $part->amount }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <footer class="card-footer">
                        <p class="card-footer-item">
                            <a class="button is-text is-fullwidth has-text-link" href="/parts/{{ $part->id }}/edit">Edit
                                Information</a>
                        </p>
                        <form class="card-footer-item" method="POST" action="/parts/{{ $part->id }}">
                            @csrf
                            @method('DELETE')
                            @if ($part->is_orderable)
                                <button class="button is-text is-fullwidth has-text-danger" type="submit">
                                    <p>Remove Part</p>
                                    <span class="icon">
                                        <i class="fas fa-lg fa-times"></i>
                                    </span>
                                </button>
                            @else
                                <button class="button is-text is-fullwidth has-text-link" type="submit">
                                    <p>Enable orders</p>
                                </button>
                            @endif
                        </form>
                    </footer>
                </div>
                {{--
            </div>
            <div class="column">
            </div>
        </div> --}}
    </div>
@endsection
