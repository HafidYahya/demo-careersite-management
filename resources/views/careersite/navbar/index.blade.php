@extends('layouts.app')

@section('title', 'Careersite Content Management')

@section('content')
<div class="content-wrapper">
    <div class="page-header bg-white px-3 py-3 rounded shadow">
        <h2 class="text-danger fw-bold">NAVBAR SECTION</h2>
    </div>
    <div class="navbar-image-preview-header mt-3">
        <img class="img-fluid" src="{{ asset('images/navbar-image-preview-header.png') }}" alt="navbar-image-preview-header">
    </div>
    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <!-- Filter Section -->
            <div class="row mb-4">
                <div class="col-md-2">
                    <label class="form-label fw-bold">Page</label>
                    <div>: All</div>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Section</label>
                    <div>: Navbar</div>
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
                        @foreach ($navbar as $item)
                        <tr>
                            <td>{{ $item['sub_section'] }}</td>
                            <td>{{ date('d M Y H:i', strtotime($item['created_at']))}}</td>
                            <td>{{ date('d M Y H:i', strtotime($item['updated_at'] ))}}</td>
                            <td>{{ $item['update_by'] }}</td>
                            <td><i class="far fa-image me-1"></i>{{ $item['data_type'] }}</td>
                            <td>
                                <a href="{{ route('navbar.edit', $item['id']) }}" class="btn btn-warning btn-sm">
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