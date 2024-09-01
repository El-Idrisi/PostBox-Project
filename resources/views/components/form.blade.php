<div class="p-4 shadow card bg-dark text-bg-dark" style="max-width: 400px; width: 100%;">
    <h3 class="mb-4 text-center">{{ $title }}</h3>
    <form method="POST" action="{{ $route }}">
        @csrf

        {{ $slot }}


        <p class="mt-3 text-center">
            {{ $haveLogin }}
        </p>
    </form>
</div>
