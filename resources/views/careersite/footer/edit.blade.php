<!-- resources/views/careersite/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Update Data')

@section('content')
<div class="content-wrapper">
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0 fw-bold">Update Data</h5>
        </div>
        <div class="card-body">
            <!-- Form untuk update data -->
            <form action="{{ route('footer.update', $item->id) }}" method="POST" >
                @csrf
                @method('PUT')
                
                <!-- URL  -->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Url</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="url" value="{{ $item->url }}" >
                    </div>
                </div>
                <!-- Sub-section -->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Sub-section</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="sub_section" value="{{ $item->sub_section }}" readonly>
                    </div>
                </div>
                <!-- Preview -->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Preview</label>
                    <div class="col-sm-9">
                        <img class="img-fluid" src="{{ asset('images/footer-image-preview-header.png') }}" alt="footer-image-preview">
                    </div>
                </div>

                <!-- Buttons -->
                <div class="row">
                    <div class="col-sm-9 offset-sm-3">
                        <a href="{{ route('footer.index') }}" class="btn btn-outline-secondary px-4">CANCEL</a>
                        <button type="submit" class="btn btn-primary px-4 ms-2">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
.preview-container {
    border: 1px solid #dee2e6;
    border-radius: 4px;
    overflow: hidden;
}

.preview-navbar {
    background: linear-gradient(90deg, #dc3545 0%, #c82333 100%);
    padding: 12px 20px;
    display: flex;
    align-items: center;
    gap: 20px;
}


.btn-primary {
    background-color: #4285f4;
    border-color: #4285f4;
}

.btn-primary:hover {
    background-color: #357ae8;
    border-color: #357ae8;
}
</style>
@endpush
@endsection