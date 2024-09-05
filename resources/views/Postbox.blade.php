@extends('layouts.app')


@section('content')
    @push('style')
        <style>
            /* Styling untuk form */
            .post-container {
                max-width: 600px;
                margin: 2rem auto;
                padding: 2rem;
                background-color: #18181b;
                /* Latar belakang abu-abu */
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .post-container h2 {
                font-size: 1.75rem;
                font-weight: bold;
                color: #FFFFFF;
                /* Teks putih */
                margin-bottom: 1.5rem;
                text-align: center;
            }

            .form-group {
                margin-bottom: 1.5rem;
            }

            .form-group label {
                display: block;
                font-weight: 600;
                color: #FFFFFF;
                /* Teks putih */
                margin-bottom: 0.5rem;
            }

            .form-group input[type="file"],
            .form-group input[type="text"],
            .form-group textarea {
                width: 100%;
                padding: 0.75rem;
                border: 1px solid #374151;
                border-radius: 4px;
                background-color: #18181b;
                /* Latar belakang input lebih gelap */
                color: #FFFFFF;
                /* Teks putih */
            }

            .form-group input[type="file"]::file-selector-button {
                border: 1px solid #374151;
                padding: 0.5rem;
                border-radius: 4px;
                background-color: #18181b;
                /* Latar belakang tombol file selector */
                color: #FFFFFF;
                /* Teks putih */
                cursor: pointer;
            }

            .form-group textarea {
                resize: vertical;
                min-height: 120px;
            }

            .post-button {
                width: 100%;
                /* Memperpanjang tombol selebar kartu */
                background-color: #3182CE;
                color: #FFFFFF;
                /* Teks putih */
                font-weight: bold;
                padding: 0.75rem;
                border-radius: 50px;
                /* Bentuk lonjong */
                text-align: center;
                cursor: pointer;
                transition: background-color 0.3s ease;
                border: none;
                /* Menghilangkan border default */
            }

            .post-button:hover {
                background-color: #2B6CB0;
            }
        </style>
    @endpush


    {{-- {{ $user }} --}}

    <div class="post-container">
        <h2>Create a New Post</h2>

        <!-- Form untuk membuat post baru -->
        <form action="{{ route('postbox.post') }}" method="POST">
            @csrf
            <!-- Image Upload -->
            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image">
            </div>

            <!-- Caption -->
            <div class="form-group">
                <label for="caption">Caption:</label>
                <input type="text" id="caption" placeholder="Enter your caption here" name="title">
            </div>

            <!-- Story -->
            <div class="form-group">
                <label for="story">Story:</label>
                <textarea id="story" placeholder="Write your story here" name="content"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="post-button">Post</button>
            </div>
        </form>
    </div>
@endsection

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
