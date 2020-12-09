@extends('layouts.app')

@section('content')

    <x-hero>"{{ $supplier->name }}" parts</x-hero>

    <div class="container" style="padding-top: 1em">
        <div class="box">
            <table class="table is-fullwidth is-hoverable">
                <thead class="has-text-centered">
                    <th>No.</th>
                    <th>Part type</th>
                    <th>Manufacturer</th>
                    <th>Model</th>
                    <th>Price</th>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($parts); $i++)
                        <tr>
                            <td class="has-text-right"> {{ $i + 1 }} </td>
                            <td class="has-text-centered"> {{ $parts[$i]->part_type }} </td>
                            <td class="has-text-centered">{{ $parts[$i]->manufacturer }}</td>
                            <td class="has-text-centered"> {{ $parts[$i]->model }} </td>
                            <td class="has-text-right"> {{ $parts[$i]->price }}$ </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        <div class="container has-text-centered">
            <a class="button is-primary is-rounded is-large" href="/suppliers/{{ $supplier->id }}/order">Order</a>
        </div>
    </div>
@endsection
