@extends('layouts.app')

@section('content')
    <div class="stories-container">
        <h2 class="stories-header">Hasil Pencarian</h2>

        <form method="GET" class="mb-4" action="{{ route('search.result') }}">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Cari...">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

    </div>
@endsection


@push('style')
    <style>
        .stories-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: rgba(0, 0, 0, 0.6);
            /* Background semi-transparan */
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .stories-header {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffffff;
            /* Warna teks putih */
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .user-pp {
            width: 40px;
            height: 40px;
        }

        .user-name {
            text-decoration: none;
            color: #fff;
            cursor: pointer;
            transition: 300ms all;
        }

        .user-name:hover {
            color: #1c86ee;
        }
    </style>
@endpush

@push('scripts')
    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Cool'
            })
        </script>
    @endif
@endpush
