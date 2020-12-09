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
                            <td class="has-text-centered"> {{ $suppliers[$i]->name }} </td>
                            <td class="has-text-centered"> {{ $suppliers[$i]->country }} </td>
                            <td class="has-text-centered">
                                @if ($user->hasRole('executive'))
                                    <form method="POST" action="/suppliers/{{ $suppliers[$i]->id }}">
                                        @csrf
                                        @method('DELETE')
                                        @if ($suppliers[$i]->is_active)
                                            <button class="button is-danger is-rounded is-small is-outlined" type="submit">
                                                Disable
                                            </button>
                                        @else
                                            <button class="button is-info is-rounded is-small is-outlined" type="submit">
                                                Enable
                                            </button>
                                        @endif
                                    </form>
                                @else
                                    <a class="button is-small is-primary is-rounded is-outlined"
                                        href="/suppliers/{{ $suppliers[$i]->id }}">View parts</a>
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
