@extends('admin.layouts.app')

@section('page-title', 'Export Services')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Export Services Management</h5>
    <a href="{{ route('admin.services.create') }}" class="btn btn-dija">
        <i class="fa-solid fa-plus me-1"></i> Add New Service
    </a>
</div>

<div class="card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">Icon</th>
                    <th>Service Title [EN]</th>
                    <th>اسم الخدمة [AR]</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                <tr>
                    <td>
                        <div class="p-2 bg-light rounded text-center" style="font-size: 20px; color: #F26820; width: 45px;">
                            <i class="{{ $service->icon ?: 'fa-solid fa-ship' }}"></i>
                        </div>
                    </td>
                    <td>
                        <div class="fw-bold">{{ $service->getTranslation('title', 'en') }}</div>
                        <small class="text-muted">{{ Str::limit($service->getTranslation('description', 'en'), 70) }}</small>
                    </td>
                    <td dir="rtl">
                        <div class="fw-bold">{{ $service->getTranslation('title', 'ar') }}</div>
                        <small class="text-muted">{{ Str::limit($service->getTranslation('description', 'ar'), 70) }}</small>
                    </td>
                    <td><code>{{ $service->slug }}</code></td>
                    <td>
                        <span class="badge {{ $service->is_active ? 'bg-success' : 'bg-secondary' }}">
                            {{ $service->is_active ? 'Active' : 'Draft' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-outline-primary me-1">
                            <i class="fa-solid fa-pen"></i> Edit
                        </a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this service?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No services found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
