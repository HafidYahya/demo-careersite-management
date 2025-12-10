@extends('layouts.app')

@section('title', 'Careersite Content Management')

@section('content')
<div class="content-wrapper">
    <div class="page-header bg-white px-3 py-3 rounded shadow">
        <h2 class="text-danger fw-bold">{{ strtoupper(str_replace('_', ' ', $section)) }} SECTION</h2>
    </div>
    <div class="navbar-image-preview-header mt-3">
    @php
    $headerImage = match ($section) {
        'about' => 'images/about-image-preview-header.png',
        'core_values' => 'images/core-values-image-preview-header.png',
        'kata_alfanesia' => 'images/kata-alfanesia-image-preview-header.png',
        'tagline_join' => 'images/tagline-join-image-preview-header.png',
        default => 'images/carousel-image-preview-header.png',
    };
    @endphp
        <img class="img-fluid" src="{{ asset($headerImage) }}" alt="footer-image-preview-header">
    </div>
    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <!-- Filter Section -->
            <div class="row mb-4">
                <div class="col-md-2">
                    <label class="form-label fw-bold">Page</label>
                    <div>: Home</div>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Section</label>
                    <div>: Carousel</div>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold"><i class="fas fa-filter"></i> Show</label>
                    <select class="form-select">
                        <option>5 Entries</option>
                        <option>10 Entries</option>
                        <option>25 Entries</option>
                        <option>50 Entries</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold"><i class="fas fa-list"></i> Data Type</label>
                    <select class="form-select">
                        <option>All Type</option>
                        <option>Image</option>
                        <option>Url</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">&nbsp;</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </div>
            </div>
            
            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Sub-Section <i class="fas fa-sort"></i></th>
                            <th>Publish Date <i class="fas fa-sort"></i></th>
                            <th>Updated Date <i class="fas fa-sort"></i></th>
                            <th>Updated By <i class="fas fa-sort"></i></th>
                            <th>Data Type <i class="fas fa-sort"></i></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subSections as $item)
                        <tr>
                            <td>{{ $item['sub_section'] }}</td>
                            <td>{{ date('d M Y H:i', strtotime($item['created_at']))}}</td>
                            <td>{{ date('d M Y H:i', strtotime($item['updated_at'] ))}}</td>
                            <td>{{ $item['update_by'] }}</td>
                            <td>
                                @if ($item['data_type'] === 'img')
                                <i class="far fa-image me-1"></i>
                                @elseif ($item['data_type'] === 'url')
                                <i class="fas fa-link me-1"></i>
                                @else
                                <i class="fas fa-align-left me-1"></i>
                                @endif
                                {{ $item['data_type'] }}
                            </td>
                            <td>
                                <a href="{{ route('home.edit', $item['id']) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection