@extends('layouts.app')

@section('title', 'Update Data')

@section('content')
<div class="content-wrapper">
    <!-- Modal-style Card -->
    <div class="modal-card">
        <div class="modal-header">
            <h2 class="modal-title">Update Data</h2>
            <a href="{{ route('detail', $item->section_name) }}" class="close-btn">
                <i class="fas fa-times"></i>
            </a>
        </div>

        <div class="modal-body">
            <!-- Validation Errors -->
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Oops!</strong> There were some problems with your input.
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <form action="{{ route('home.update', $item->id) }}" method="POST" enctype="multipart/form-data" id="updateForm">
                @csrf
                @method('PUT')

                {{-- =========================
                     FORM TYPE: IMAGE
                ========================= --}}
                @if ($item->data_type === 'img')
                <div class="form-container">
                    <!-- Image Upload -->
                    <div class="form-row">
                        <label class="form-label">Image</label>
                        <div class="form-input">
                            <label for="imageUpload" class="btn-upload">
                                <i class="fas fa-upload"></i> Upload Image
                            </label>
                            <input type="file" id="imageUpload" name="image" accept=".jpg,.jpeg,.png">
                            <div class="form-hint">Allowed format .m .jpg, .jpeg, .png.</div>
                            @error('image')
                            <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Sub-section & Max Size -->
                    <div class="form-row-split">
                        <div class="form-col">
                            <label class="form-label">Sub-section</label>
                            <input type="text" class="form-control" value="{{ $item->sub_section }}" readonly>
                        </div>
                        <div class="form-col">
                            <label class="form-label">Max Size</label>
                            <input type="text" class="form-control" value="{{ $item->max_size ?? '2 MB' }}" readonly>
                        </div>
                    </div>

                    <!-- Max Width & Max Height -->
                    <div class="form-row-split">
                        <div class="form-col">
                            <label class="form-label">Max Width</label>
                            <input type="text" class="form-control" value="1266px" readonly>
                        </div>
                        <div class="form-col">
                            <label class="form-label">Max Height</label>
                            <input type="text" class="form-control" value="600px" readonly>
                        </div>
                    </div>

                    <!-- Preview -->
                    <div class="form-row">
                        <label class="form-label">Preview</label>
                        <div class="form-input">
                            <div class="preview-container">
                                <img id="previewImage"
                                     src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/placeholder.jpg') }}"
                                     alt="Preview"
                                     class="preview-image">
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- =========================
                     FORM TYPE: TEXT
                ========================= --}}
                @if ($item->data_type === 'text')
                <div class="form-container">
                    <!-- Content Text -->
                    <div class="form-row">
                        <label class="form-label">Content <span class="text-danger">*</span></label>
                        <div class="form-input">
                            <textarea name="text" rows="5" class="form-control" 
                                      placeholder="Enter your content here..." required>{{ old('text', $item->text) }}</textarea>
                            @error('text')
                            <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Sub-section -->
                    <div class="form-row">
                        <label class="form-label">Sub-section</label>
                        <div class="form-input">
                            <input type="text" class="form-control" value="{{ $item->sub_section }}" readonly>
                        </div>
                    </div>

                    <!-- Preview -->
                    <div class="form-row">
                        <label class="form-label">Preview</label>
                        <div class="form-input">
                            <div class="preview-box">
                                <div id="textPreview">
                                    {{ $item->text }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- =========================
                     FORM TYPE: URL
                ========================= --}}
                @if ($item->data_type === 'url')
                <div class="form-container">
                    <!-- URL Input -->
                    <div class="form-row">
                        <label class="form-label">Url</label>
                        <div class="form-input">
                            <input type="url" name="url" class="form-control" 
                                   value="{{ old('url', $item->url) }}"
                                   placeholder="https://www.youtube.com/embed/..."
                                   required>
                            @error('url')
                            <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Sub-section -->
                    <div class="form-row">
                        <label class="form-label">Sub-section</label>
                        <div class="form-input">
                            <input type="text" class="form-control" value="{{ $item->sub_section }}" readonly>
                        </div>
                    </div>

                    <!-- Preview -->
                    <div class="form-row">
                        <label class="form-label">Preview</label>
                        <div class="form-input">
                            <div class="preview-box" id="urlPreviewBox">
                                @if ($item->url && (strpos($item->url, 'youtube.com') !== false || strpos($item->url, 'youtu.be') !== false))
                                <iframe src="{{ $item->url }}" 
                                        width="100%" 
                                        height="400" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                </iframe>
                                @else
                                <div class="url-preview-placeholder">
                                    <i class="fas fa-video fa-3x"></i>
                                    <p>Preview will appear here when URL is valid</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- =========================
                     ACTION BUTTONS
                ========================= --}}
                <div class="modal-footer">
                    <a href="{{ route('detail', $item->section_name) }}" class="btn btn-cancel">
                        CANCEL
                    </a>
                    <button type="submit" class="btn btn-update">
                        UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.content-wrapper {
    min-height: 100vh;
    background: #f5f5f5;
    padding: 40px 20px;
}

.modal-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
}

.modal-header {
    background: #e0e0e0;
    padding: 20px 30px;
    border-radius: 8px 8px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-title {
    font-size: 20px;
    font-weight: 700;
    color: #333;
    margin: 0;
}

.close-btn {
    width: 24px;
    height: 24px;
    background: transparent;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #333;
    text-decoration: none;
    font-size: 20px;
}

.close-btn:hover {
    color: #000;
}

.modal-body {
    padding: 40px;
}

.form-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-row {
    display: flex;
    align-items: flex-start;
    gap: 20px;
}

.form-row-split {
    display: flex;
    gap: 20px;
}

.form-col {
    flex: 1;
    display: flex;
    align-items: flex-start;
    gap: 20px;
}

.form-col .form-label {
    min-width: 120px;
    padding-top: 10px;
}

.form-col .form-control {
    flex: 1;
}

.form-label {
    font-size: 14px;
    font-weight: 600;
    color: #333;
    min-width: 150px;
    padding-top: 10px;
    flex-shrink: 0;
}

.form-input {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.form-control {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 14px;
    transition: border-color 0.2s;
    background: white;
    font-family: inherit;
}

.form-control:focus {
    outline: none;
    border-color: #4285f4;
}

.form-control[readonly] {
    background: #f5f5f5;
    cursor: not-allowed;
    color: #666;
}

textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

.form-hint {
    font-size: 13px;
    color: #4285f4;
    margin-top: 5px;
}

.error-text {
    font-size: 13px;
    color: #dc3545;
    margin-top: 5px;
}

.btn-upload {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: #4285f4;
    color: white;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
    transition: background 0.2s;
    border: none;
}

.btn-upload:hover {
    background: #357ae8;
}

input[type="file"] {
    display: none;
}

.preview-container {
    border: 2px dashed #dc3545;
    border-radius: 8px;
    overflow: hidden;
    background: #fafafa;
    width: 100%;
}

.preview-image {
    width: 100%;
    height: auto;
    display: block;
    object-fit: contain;
    max-height: 500px;
}

.preview-box {
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 20px;
    background: white;
    min-height: 150px;
    width: 100%;
}

#textPreview {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
    white-space: pre-wrap;
    word-wrap: break-word;
}

.url-preview-placeholder {
    text-align: center;
    padding: 60px 20px;
    color: #999;
}

.url-preview-placeholder i {
    color: #ddd;
    margin-bottom: 15px;
}

.url-preview-placeholder p {
    margin: 0;
    font-size: 14px;
}

#urlPreviewBox iframe {
    border-radius: 6px;
    border: 1px solid #ddd;
}

.modal-footer {
    padding: 20px 40px;
    border-top: 1px solid #e0e0e0;
    background: white;
    display: flex;
    justify-content: center;
    gap: 15px;
    border-radius: 0 0 8px 8px;
}

.btn {
    padding: 12px 50px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
    display: inline-block;
    border: none;
}

.btn-cancel {
    background: white;
    color: #666;
    border: 2px solid #ddd;
}

.btn-cancel:hover {
    background: #f5f5f5;
}

.btn-update {
    background: #4285f4;
    color: white;
    border: 2px solid #4285f4;
}

.btn-update:hover {
    background: #357ae8;
    border-color: #357ae8;
}

.btn-update:disabled {
    background: #ccc;
    border-color: #ccc;
    cursor: not-allowed;
}

.alert {
    padding: 15px;
    border-radius: 6px;
    margin-bottom: 25px;
}

.alert-danger {
    background: #fee;
    border: 1px solid #fcc;
    color: #c33;
}

.alert ul {
    margin: 10px 0 0 20px;
}

@media (max-width: 768px) {
    .form-row,
    .form-row-split,
    .form-col {
        flex-direction: column;
    }
    
    .form-label,
    .form-col .form-label {
        min-width: auto;
        padding-top: 0;
        margin-bottom: 5px;
    }
    
    .modal-body {
        padding: 25px;
    }
    
    .modal-footer {
        flex-direction: column;
        padding: 20px 25px;
    }
    
    .btn {
        width: 100%;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image upload preview
    const imageUpload = document.getElementById('imageUpload');
    const previewImage = document.getElementById('previewImage');
    
    if (imageUpload && previewImage) {
        imageUpload.addEventListener('change', function(event) {
            const file = event.target.files[0];
            
            if (file) {
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!validTypes.includes(file.type)) {
                    alert('⚠️ Format file tidak valid. Gunakan .jpg, .jpeg, atau .png');
                    event.target.value = '';
                    return;
                }
                
                if (file.size > 2097152) {
                    alert('⚠️ Ukuran file maksimal 2 MB');
                    event.target.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }
    
    // Text preview
    const textInput = document.querySelector('textarea[name="text"]');
    const textPreview = document.getElementById('textPreview');
    
    if (textInput && textPreview) {
        textInput.addEventListener('input', function() {
            textPreview.textContent = this.value || 'Your text will appear here...';
        });
    }
    
    // URL preview
    const urlInput = document.querySelector('input[name="url"]');
    const urlPreviewBox = document.getElementById('urlPreviewBox');
    
    if (urlInput && urlPreviewBox) {
        urlInput.addEventListener('input', function() {
            const url = this.value;
            if (url && (url.includes('youtube.com') || url.includes('youtu.be'))) {
                urlPreviewBox.innerHTML = `
                    <iframe src="${url}" 
                            width="100%" 
                            height="400" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                `;
            } else if (url) {
                urlPreviewBox.innerHTML = `
                    <div class="url-preview-placeholder">
                        <i class="fas fa-link fa-3x"></i>
                        <p>${url}</p>
                    </div>
                `;
            } else {
                urlPreviewBox.innerHTML = `
                    <div class="url-preview-placeholder">
                        <i class="fas fa-video fa-3x"></i>
                        <p>Preview will appear here when URL is valid</p>
                    </div>
                `;
            }
        });
    }
    
    // Form submission
    const updateForm = document.getElementById('updateForm');
    if (updateForm) {
        updateForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
        });
    }
});
</script>
@endpush
@endsection