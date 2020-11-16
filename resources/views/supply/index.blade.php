@extends('layouts.app')

@section('content')
    <x-hero subtitle="{{ $user->email }}, {{ $user->role->name }}">Welcome back!</x-hero>

    <div class="container" style="padding-top: 2em">
        <div class="tile is-ancestor has-text-centered">
            <div class="tile is-parent">
                <div class="tile is-child card">
                    <div class="card-content has-background-primary-light">
                        <span class="icon is-large">
                            <i class="fas fa-3x fa-plane"></i>
                        </span>
                    </div>
                    <footer class="card-footer has-background-primary">
                        <div class="container" style="padding: 1em">
                            <a class="title" href="#">View Parts</a>
                        </div>
                    </footer>
                </div>
            </div>
            <div class="tile is-parent">
                <div class="tile is-child card">
                    <div class="card-content has-background-primary-light">
                        <span class="icon is-large">
                            <i class="fas fa-3x fa-globe-europe"></i>
                        </span>
                    </div>
                    <footer class="card-footer has-background-primary">
                        <div class="container" style="padding: 1em">
                            <a class="title" href="#">View Orders</a>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

@endsection
