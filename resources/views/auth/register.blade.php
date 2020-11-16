@extends('layouts.app')

@section('content')
<x-hero>Register</x-hero>
    <div class="container" style="padding: 1em">
        <div class="container has-text-centered" style="margin-bottom: 1em">
            <h2 class="subtitle">Please enter your details</h2>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-formerror />
            <x-inlineinput label="Username" for="name" />
            <x-inlineinput label="Email" for="email" type="email" />
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="role_id">Position</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="select is-fullwidth {{ $errors->has('role') ? 'is-danger' : '' }}">
                            <select name="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <x-inlineinput label="Password" for="password" type="password" />
            <x-inlineinput label="Confirm Password" for="password_confirmation" type="password" />

            <div class="field has-text-centered">
                <button class="button is-primary is-rounded is-large" type="submit">Register</button>
            </div>
        </form>
    </div>
@endsection
