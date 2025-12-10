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
            <form action="{{ route('navbar.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Image Upload -->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Image</label>
                    <div class="col-sm-9">
                        <label for="imageUpload" class="btn btn-primary">
                            <i class="fas fa-upload"></i> Upload Image
                        </label>
                        <input type="file" id="imageUpload" name="image" class="d-none" accept=".jpg,.jpeg,.png" onchange="previewImage(event)">
                        <div class="form-text text-primary">Allowed format in .jpg, .jpeg, .png.</div>
                        
                        @if($item->image)
                        <div class="mt-2 text-muted small">
                            <i class="fas fa-image"></i> Current: {{ basename($item->image) }}
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Sub-section -->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Sub-section</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="sub_section" value="{{ $item->sub_section }}" readonly>
                    </div>
                </div>

                <!-- Max Size -->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold"></label>
                    <div class="col-sm-3">
                        <label class="form-label fw-bold">Max Size</label>
                        <input type="text" class="form-control" value="{{ $item->max_size ?? '2 MB' }}" readonly>
                    </div>
                </div>

                <!-- Max Width & Height -->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold"></label>
                    <div class="col-sm-4">
                        <label class="form-label fw-bold">Max Width</label>
                        <input type="text" class="form-control" value="{{ $item->max_width ?? '1200px' }}" readonly>
                    </div>
                    <div class="col-sm-5">
                        <label class="form-label fw-bold">Max Height</label>
                        <input type="text" class="form-control" value="{{ $item->max_height ?? '446px' }}" readonly>
                    </div>
                </div>

                <!-- Preview -->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label fw-bold">Preview</label>
                    <div class="col-sm-9">
                        <div class="preview-container">
                            <div class="preview-navbar">
                                <!-- Preview logo - akan berubah saat upload image baru -->
                                <img id="previewLogo" 
                                     src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/ats-alfamart-logo.png') }}" 
                                     alt="Logo Preview" 
                                     class="preview-logo">
                                <div class="preview-menu">
                                    <span>HOME</span>
                                    <span>OUR CONCERN</span>
                                    <span>VACANCIES</span>
                                    <span>LOGIN</span>
                                    <button type="button" class="btn-daftar">Daftar</button>
                                    <span>EN / ID</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="row">
                    <div class="col-sm-9 offset-sm-3">
                        <a href="{{ route('navbar.index') }}" class="btn btn-outline-secondary px-4">CANCEL</a>
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

.preview-logo {
    height: 35px;
    max-width: 150px;
    object-fit: contain;
    padding: 5px;
    border-radius: 3px;
}

.preview-menu {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-left: auto;
    font-size: 11px;
    color: white;
    font-weight: 500;
}

.btn-daftar {
    background: white;
    color: #dc3545;
    border: none;
    padding: 4px 12px;
    border-radius: 3px;
    font-size: 11px;
    font-weight: 600;
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

@push('scripts')
<script>
// Fungsi sederhana untuk preview image
function previewImage(event) {
    const file = event.target.files[0];
    
    if (file) {
        // Cek format file
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
        if (!validTypes.includes(file.type)) {
            alert('Format file tidak valid. Gunakan .jpg, .jpeg, atau .png');
            event.target.value = '';
            return;
        }
        
        // Cek ukuran file (2MB = 2097152 bytes)
        if (file.size > 2097152) {
            alert('Ukuran file maksimal 2 MB');
            event.target.value = '';
            return;
        }
        
        // Tampilkan preview
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewLogo').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
</script>
@endpush
@endsection