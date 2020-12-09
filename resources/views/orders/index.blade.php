@extends('layouts.app')

@section('content')
    <x-hero>Orders</x-hero>
    <div class="container" style="padding-top: 2em">
        <div class="box">
            <table class="table is-fullwidth is-hoverable">
                <thead class="has-text-centered">
                    <th>No.</th>
                    <th>Supplier</th>
                    <th>Sum</th>
                    <th>Parts Count</th>
                    <th>Expected Delivery</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($orders); $i++)
                        <tr>
                            <td class="has-text-right"> {{ $i + 1 }} </td>
                            <td class="has-text-centered"> {{ $orders[$i]->supplier->name }} </td>
                            <td class="has-text-right"> {{ $orders[$i]->sum }} </td>
                            <td class="has-text-right"> {{ $orders[$i]->parts_count }} </td>
                            <td class="has-text-right"> {{ $orders[$i]->expected_delivery }} </td>
                            <td class="has-text-centered">
                                <i> {{ $orders[$i]->status->name }} </i>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
