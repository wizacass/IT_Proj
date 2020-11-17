<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label" for="{{ $for }}">{{ $label }}</label>
    </div>
    <div class="field-body">
        <div class="field {{ $subtitle ?? '' != null ? 'has-addons' : '' }}">
            <p class="control is-expanded">
                <input class="input {{ $errors->has($for) ? 'is-danger' : '' }}" name={{ $for }}
                    value="{{ $value ?? old($for) }}" type="{{ $type ?? 'text' }}" required>
            </p>
            @if ($subtitle ?? '' != null)
                <p class="control">
                    <a class="button is-static">
                        {{ $subtitle }}
                    </a>
                </p>
            @endif
        </div>
    </div>
</div>
