
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#{{ $target }}" aria-expanded="false" aria-controls="{{ $target }}">
                    {{ $title }}
            </button>
        </h2>
        <div id="{{ $target }}" class="accordion-collapse collapse" data-bs-parent="#{{ $id }}">

            {{ $slot }}

        </div>
    </div>
