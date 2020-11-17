@extends('layouts.app')

@section('content')
    <x-hero>"{{ $supplier->name }}" parts</x-hero>
    <div class="container" style="padding-top: 1em">
        <div class="box">
            <table class="table is-fullwidth is-hoverable">
                <thead>
                    <th>No.</th>
                    <th>Part type</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th></th>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($parts); $i++)
                        <tr>
                            <td> {{ $i + 1 }} </td>
                            <td> {{ $parts[$i]->part_type }} </td>
                            <td> {{ $parts[$i]->model }} </td>
                            <td> {{ $parts[$i]->price }}$ </td>
                            <td><a class="button is-small is-primary is-rounded is-outlined">Show</a></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        <div class="container has-text-centered">
            <a class="button is-primary is-rounded is-large" href="/parts/create">Add new part</a>
        </div>
    </div>
@endsection
