@extends('layouts.admin')

@section('title', 'Import Tracer Study')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <!-- Header -->
                <div class="card-header bg-light">
                    <h3 class="mb-0">Import Data Tracer Study</h3>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <!-- Success message -->
                    @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.707 9.707l-2.5-2.5.708-.708L6.707 8.293l4.146-4.147.708.708-4.854 4.853z"/>
                            </svg>
                            <div>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('admin.tracer.import.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">Pilih File CSV</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Import Data</button>
                        </div>
                    </form>

                    <!-- Tips -->
                    <small class="text-muted mt-3 d-block">
                        Pastikan file CSV sesuai format sebelum diimpor.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
