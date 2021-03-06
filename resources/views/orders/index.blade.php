@extends('layouts.app')

@section('content')
    <x-hero>Orders</x-hero>
    <div class="container" style="padding-top: 2em">
        @if (count($orders) == 0)
            <div class="conatiner has-text-centered" style="padding: 2em">
                <p class="title">There are no orders!</p>
            </div>
        @else
            <div class="box">
                <table class="table is-fullwidth is-hoverable">
                    <thead class="has-text-centered">
                        <th>No.</th>
                        <th>Supplier</th>
                        <th>Sum</th>
                        <th>Parts Count</th>
                        <th>Expected Delivery</th>
                        @if ($user->hasRole('manager'))
                            <th>Status</th>
                        @else
                            <th></th>
                        @endif
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($orders); $i++)
                            <tr>
                                <td class="has-text-right"> {{ $i + 1 }} </td>
                                <td class="has-text-centered"> {{ $orders[$i]->supplier->name }} </td>
                                <td class="has-text-right"> {{ $orders[$i]->sum }}$ </td>
                                <td class="has-text-right"> {{ $orders[$i]->parts_count }} </td>
                                <td class="has-text-right"> {{ $orders[$i]->expected_delivery }} </td>
                                <td class="has-text-centered">
                                    @if ($user->hasRole('manager'))
                                        <i> {{ $orders[$i]->status->name }} </i>
                                    @else
                                        <a class="button is-primary is-small is-rounded is-outlined"
                                            href="/orders/{{ $orders[$i]->id }}">Details</a>
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        @endif
        <div class="container has-text-right">
            <p class="subtitle"><b>Total sum: {{ number_format($sum, 2, '.', '') }}$</b></p>
        </div>
    </div>
@endsection
