<section class="hero {{ $color ?? "is-primary" }} is-bold">
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">
                {{ $slot }}
            </h1>
            @if($subtitle ?? '' != NULL)
            <h2 class="subtitle">
                {{ $subtitle ?? '' }}
            </h2>
            @endif
        </div>
    </div>
</section>
