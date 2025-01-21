@extends('layouts.tabler')

@section('title')
    Team Management
@endsection
@section('me')
    @parent
@endsection

@section('Damage')


<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page Title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                  
                    <div class="text-muted mt-1">Manage your team members and their roles</div>
                </div>
                <div class="col-auto ms-auto">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                        <i class="ti ti-plus"></i> Add New Member
                    </button>
                </div>
                <div class="card-actions btn-group">
            <div class="dropdown">
                <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <x-icon.vertical-dots />
                </a>
                <div class="dropdown-menu dropdown-menu-end" >
                
                    <a href="{{ route('admin.team.logs.show') }}" class="dropdown-item">
                        <x-icon.plus />
                        {{ __('View Team`s Logs') }}
                    </a>
                   
                </div>
            </div>
        </div>
            </div>
        </div>

        <!-- Team Members Table -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Team Members</h3>
                <div class="ms-auto">
                    <input type="text" class="form-control form-control-sm" placeholder="Search members...">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>
                                <span class="badge bg-blue">Admin</span>
                                <span class="badge bg-green">Manager</span>
                            </td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editMemberModal">Edit</button>
                                    <button class="btn btn-sm btn-danger">Remove</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>jane.smith@example.com</td>
                            <td>
                                <span class="badge bg-yellow">Viewer</span>
                            </td>
                            <td><span class="badge bg-secondary">Inactive</span></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editMemberModal">Edit</button>
                                    <button class="btn btn-sm btn-danger">Remove</button>
                                </div>
                            </td>
                        </tr>
                        <!-- Add more rows dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Member Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMemberModalLabel">Add New Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.team.create') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Assign Role</label>
                        <select name="role" class="form-select" required>
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="viewer">Viewer</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Member</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Member Modal -->
<div class="modal fade" id="editMemberModal" tabindex="-1" aria-labelledby="editMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMemberModalLabel">Edit Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="#">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="john.doe@example.com" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Assign Role</label>
                        <select name="role" class="form-select" required>
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="manager" selected>Manager</option>
                            <option value="viewer">Viewer</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
