@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hasil Pencarian</h1>

    <form method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Cari...">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <div class="results-placeholder">
        <!-- Hasil pencarian akan ditampilkan di sini -->
        <p>Belum ada hasil pencarian.</p>
    </div>
</div>
@endsection

@push('styles')
<style>
    .input-group {
        max-width: 600px;
        margin: 0 auto;
    }

    .input-group .form-control {
        border-radius: 0;
        border-right: 0;
    }

    .input-group .btn-primary {
        border-radius: 0;
        border-left: 0;
        padding: 0.75rem 1.25rem;
    }

    .results-placeholder {
        text-align: center;
        margin-top: 20px;
        font-size: 1.2rem;
    }

    .results-placeholder p {
        margin: 0;
    }
</style>
@endpush
