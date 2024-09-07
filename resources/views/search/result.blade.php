@extends('layouts.app')

@section('content')
    <div class="stories-container">
        <h2 class="stories-header">Hasil Pencarian</h2>

        <form method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Cari..." value="{{ $query }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        @if ($users->count() > 0)
            @foreach ($users as $pengguna)
                <div class="results-placeholder">
                    <div class="alert alert-secondary d-flex justify-content-between" role="alert">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('storage/' . $pengguna->profile->profile_picture) }}" alt="Profile Picture"
                                class="user-pp">
                            <a class="m-0 ms-2 user-name"
                                href="{{ route('profile.show', $pengguna->name) }}">{{ $pengguna->name }}</a>
                        </div>

                        <div class="gap-2 d-flex">

                            @if (in_array($pengguna->id, $followingIds))
                                <form action="{{ route('profile.unfollow', $pengguna->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary">Unfollow</button>
                                </form>
                            @else
                                <form action="{{ route('profile.follow', $pengguna->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Follow</button>
                                </form>
                            @endif
                            <a href="{{ route('profile.show', $pengguna->name) }}" class="btn btn-secondary">See More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>user not found.</p>
        @endif


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
