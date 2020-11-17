@extends('layouts.app')

@section('content')
    <x-hero>Available suppliers list</x-hero>
    <div class="container" style="padding-top: 1em">
        <div class="box">
            <table class="table is-fullwidth is-hoverable">
                <thead class="has-text-centered">
                    <th>No.</th>
                    <th>Comapny name</th>
                    <th>Country</th>
                    <th></th>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($suppliers); $i++)
                        <tr>
                            <td class="has-text-right"> {{ $i + 1 }} </td>
                            <td> {{ $suppliers[$i]->name }} </td>
                            <td> {{ $suppliers[$i]->country }} </td>
                            <td class="has-text-centered">
                                <a class="button is-small is-primary is-rounded is-outlined"
                                    href="/suppliers/{{ $suppliers[$i]->id }}">View parts</a>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
