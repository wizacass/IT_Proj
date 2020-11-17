@extends('layouts.app')

@section('content')
    @if ($supplier ?? '' != null)
        <x-hero>"{{ $supplier->name }}" parts</x-hero>
    @else
        <x-hero>Parts list</x-hero>
    @endif
    <div class="container" style="padding-top: 1em">
        <div class="box">
            <table class="table is-fullwidth is-hoverable">
                <thead class="has-text-centered">
                    <th>No.</th>
                    <th>Part type</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>In stock</th>
                    <th></th>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($parts); $i++)
                        <tr>
                            <td class="has-text-right"> {{ $i + 1 }} </td>
                            <td> {{ $parts[$i]->part_type }} </td>
                            <td> {{ $parts[$i]->model }} </td>
                            <td class="has-text-right"> {{ $parts[$i]->price }}$ </td>
                            <td class="has-text-right"> {{ $parts[$i]->amount }} </td>
                            <td class="has-text-centered">
                                @if ($supplier ?? '' != null)
                                    <a class="button is-small is-primary is-rounded is-outlined"
                                        href="/parts/{{ $parts[$i]->id }}">Show</a>
                                @else
                                    <a class="button is-small is-primary is-rounded is-outlined" href="#">Order</a>
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        @if ($supplier ?? '' != null)
            <div class="container has-text-centered">
                <a class="button is-primary is-rounded is-large" href="/parts/create">Add new part</a>
            </div>
        @endif
    </div>
@endsection
