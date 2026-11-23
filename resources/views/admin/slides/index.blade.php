@extends('admin.layouts.app')

@section('page-title', 'Hero Sliders & Banners')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Homepage Banner Slides</h5>
    <a href="{{ route('admin.slides.create') }}" class="btn btn-dija">
        <i class="fa-solid fa-plus me-1"></i> Add New Slide
    </a>
</div>

<div class="card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 60px;">Order</th>
                    <th style="width: 120px;">Preview</th>
                    <th>Title [EN]</th>
                    <th>العنوان [AR]</th>
                    <th>Status</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($slides as $slide)
                <tr>
                    <td>{{ $slide->sort_order }}</td>
                    <td>
                        <img src="{{ asset($slide->image ?: 'assets/images/banner/bg-01.jpg') }}" alt="Slide" style="width: 100px; height: 50px; object-fit: cover; border-radius: 6px;">
                    </td>
                    <td>
                        <div class="fw-bold">{{ $slide->getTranslation('title', 'en') }}</div>
                        <small class="text-muted">{{ Str::limit($slide->getTranslation('description', 'en'), 60) }}</small>
                    </td>
                    <td dir="rtl">
                        <div class="fw-bold">{{ $slide->getTranslation('title', 'ar') }}</div>
                        <small class="text-muted">{{ Str::limit($slide->getTranslation('description', 'ar'), 60) }}</small>
                    </td>
                    <td>
                        <span class="badge {{ $slide->is_active ? 'bg-success' : 'bg-secondary' }}">
                            {{ $slide->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.slides.edit', $slide->id) }}" class="btn btn-sm btn-outline-primary me-1">
                            <i class="fa-solid fa-pen"></i> Edit
                        </a>
                        <form action="{{ route('admin.slides.destroy', $slide->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this slide?');">
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
                    <td colspan="6" class="text-center py-4 text-muted">No slides found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
