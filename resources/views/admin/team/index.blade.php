@extends('admin.layouts.app')

@section('page-title', 'Team Members')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Export Specialists & Executive Team</h4>
        <p class="text-muted mb-0">Manage leadership profiles displayed on the About Us page.</p>
    </div>
    <a href="{{ route('admin.team.create') }}" class="btn btn-dija">
        <i class="fa fa-plus me-1"></i> Add Team Member
    </a>
</div>

<div class="card-custom">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width: 70px;">Photo</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Social Links</th>
                    <th>Order</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $m)
                    <tr>
                        <td>
                            <img src="{{ asset($m->photo) }}" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td>
                            <div class="fw-bold">{{ $m->getTranslation('name', 'en') }}</div>
                            <small class="text-muted">{{ $m->getTranslation('name', 'ar') }}</small>
                        </td>
                        <td>
                            <div>{{ $m->getTranslation('designation', 'en') }}</div>
                            <small class="text-muted">{{ $m->getTranslation('designation', 'ar') }}</small>
                        </td>
                        <td>
                            @if($m->linkedin)
                                <a href="{{ $m->linkedin }}" target="_blank" class="badge bg-primary text-decoration-none me-1"><i class="fa-brands fa-linkedin-in"></i></a>
                            @endif
                            @if($m->twitter)
                                <a href="{{ $m->twitter }}" target="_blank" class="badge bg-info text-decoration-none me-1"><i class="fa-brands fa-twitter"></i></a>
                            @endif
                            @if($m->facebook)
                                <a href="{{ $m->facebook }}" target="_blank" class="badge bg-secondary text-decoration-none"><i class="fa-brands fa-facebook-f"></i></a>
                            @endif
                        </td>
                        <td>{{ $m->sort_order }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.team.edit', $m->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.team.destroy', $m->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this team member?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No team members added yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
