@extends('layouts.app')

@section('content')
    @if ($supplier ?? '' != null)
        <x-hero>"{{ $supplier->name }}" parts</x-hero>
    @else
        <x-hero>Parts list</x-hero>
    @endif
    <div class="container" style="padding-top: 1em">
        @if ($isManager)
            <div class="container has-text-centered" style="padding-bottom: 1em">
                <form method="POST" action="/parts/search">
                    @csrf
                    <div class="field has-addons has-addons-centered">
                        <div class="control is">
                            <input class="input is-rounded" type="text" name="search_input" placeholder="Enter part type">
                        </div>
                        <div class="control">
                            <button type="submit" class="button is-info is-rounded">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        @if (count($parts) == 0)
            <div class="conatiner has-text-centered" style="padding: 2em">
                <p class="title">There are no parts!</p>
            </div>
        @else
            <div class="box">
                <table class="table is-fullwidth is-hoverable">
                    <thead class="has-text-centered">
                        <th>No.</th>
                        <th>Part type</th>
                        <th>Manufacturer</th>
                        @if ($isManager)
                            <th>Supplier</th>
                        @endif
                        <th>Model</th>
                        <th>Price</th>
                        @if ($supplier ?? '' != null)
                            <th></th>
                        @endif
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($parts); $i++)
                            <tr>
                                <td class="has-text-right"> {{ $i + 1 }} </td>
                                <td class="has-text-centered"> {{ $parts[$i]->part_type }} </td>
                                <td class="has-text-centered">{{ $parts[$i]->manufacturer }}</td>
                                @if ($isManager)
                                    <td class="has-text-centered">
                                        <a href="/suppliers/{{ $parts[$i]->supplier->id }}">
                                            {{ $parts[$i]->supplier->name }}
                                        </a>
                                    </td>
                                @endif
                                <td class="has-text-centered"> {{ $parts[$i]->model }} </td>
                                <td class="has-text-right"> {{ $parts[$i]->price }}$ </td>
                                <td class="has-text-centered">
                                    @if ($supplier ?? '' != null)
                                        <a class="button is-small is-primary is-rounded is-outlined"
                                            href="/parts/{{ $parts[$i]->id }}">Show</a>
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        @endif

        @if ($supplier ?? '' != null)
            <div class="container has-text-centered">
                <a class="button is-primary is-rounded is-large" href="/parts/create">Add new part</a>
            </div>
        @endif
    </div>
@endsection
