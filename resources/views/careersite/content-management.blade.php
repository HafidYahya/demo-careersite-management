<!-- resources/views/careersite/content-management.blade.php -->
@extends('layouts.app')

@section('title', 'Careersite Content Management')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h2 class="text-danger fw-bold">CAREERSITE CONTENT MANAGEMENT</h2>
    </div>
    
    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <!-- Filter Section -->
            <div class="row mb-4">
                <div class="col-md-2">
                    <label class="form-label fw-bold">Page</label>
                    <div>: All</div>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold"><i class="fas fa-filter"></i> Show</label>
                    <select class="form-select">
                        <option>5 Entries</option>
                        <option>10 Entries</option>
                        <option>25 Entries</option>
                        <option>50 Entries</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold"><i class="fas fa-list"></i> Section</label>
                    <select class="form-select">
                        <option>All Section</option>
                        <option>Navbar</option>
                        <option>Footer</option>
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
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Section <i class="fas fa-sort"></i></th>
                            <th>Publish Date <i class="fas fa-sort"></i></th>
                            <th>Updated Date <i class="fas fa-sort"></i></th>
                            <th>Updated By <i class="fas fa-sort"></i></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Navbar</td>
                            <td>24 Nov 2025</td>
                            <td>28 Nov 2025</td>
                            <td>22095060 - Putera Iskandar</td>
                            <td>
                                <a href="{{ Route('navbar.index') }}" class="btn btn-primary btn-sm">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Footer</td>
                            <td>24 Nov 2025</td>
                            <td>28 Nov 2025</td>
                            <td>22095060 - Putera Iskandar</td>
                            <td>
                                <a href="{{ Route('footer.index') }}" class="btn btn-primary btn-sm">Detail</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection