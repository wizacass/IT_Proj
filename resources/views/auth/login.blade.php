@extends('layouts/app')

@section('content')
    <x-hero>Login</x-hero>
    <div class="container" style="padding: 1em">
        <div class="container has-text-centered" style="margin-bottom: 1em">
            <h2 class="subtitle">Please enter your credentials</h2>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-formerror />
            <x-inlineinput label="Email" for="email" type="email" />
            <x-inlineinput label="Password" for="password" type="password" />

            <div class="field has-text-centered">
                <button class="button is-primary is-rounded is-large" type="submit">Login</button>
            </div>
        </form>
    </div>
@endsection
