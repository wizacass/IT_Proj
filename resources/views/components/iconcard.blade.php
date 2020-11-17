<div class="tile is-parent">
    <div class="tile is-child card">
        <div class="card-content has-background-primary-light">
            <span class="icon is-large has-text-primary-dark">
                <i class="fas fa-3x {{ $icon }}"></i>
            </span>
        </div>
        <footer class="card-footer has-background-primary">
            <div class="container" style="padding: 1em">
                @if ($href)
                    <a class="title has-text-white" href="{{ $href }}"> {{ $subtitle }} </a>
                @else
                    <p class="title has-text-white"> {{ $subtitle }} </p>
                @endif
            </div>
        </footer>
    </div>
</div>
