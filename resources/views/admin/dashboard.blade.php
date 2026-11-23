@extends('admin.layouts.app')

@section('page-title', 'Overview Dashboard')

@section('content')

<!-- Stat Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card-custom p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold">EXPORT SERVICES</span>
                    <h2 class="fw-bold mb-0 mt-2">{{ $stats['services'] }}</h2>
                </div>
                <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle" style="font-size: 24px;">
                    <i class="fa-solid fa-ship"></i>
                </div>
            </div>
            <a href="{{ route('admin.services.index') }}" class="small text-decoration-none mt-3 d-inline-block fw-semibold text-primary">Manage Services &rarr;</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-custom p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold">BLOG ARTICLES</span>
                    <h2 class="fw-bold mb-0 mt-2">{{ $stats['posts'] }}</h2>
                </div>
                <div class="bg-success bg-opacity-10 text-success p-3 rounded-circle" style="font-size: 24px;">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
            </div>
            <a href="{{ route('admin.posts.index') }}" class="small text-decoration-none mt-3 d-inline-block fw-semibold text-success">Manage Articles &rarr;</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-custom p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold">INQUIRIES & QUOTES</span>
                    <h2 class="fw-bold mb-0 mt-2">{{ $stats['inquiries'] }}</h2>
                </div>
                <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-circle" style="font-size: 24px;">
                    <i class="fa-solid fa-envelope-open-text"></i>
                </div>
            </div>
            <a href="{{ route('admin.inquiries.index') }}" class="small text-decoration-none mt-3 d-inline-block fw-semibold text-warning">View Messages ({{ $stats['new_inquiries'] }} New) &rarr;</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-custom p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold">HERO SLIDERS</span>
                    <h2 class="fw-bold mb-0 mt-2">{{ $stats['slides'] }}</h2>
                </div>
                <div class="bg-info bg-opacity-10 text-info p-3 rounded-circle" style="font-size: 24px;">
                    <i class="fa-solid fa-images"></i>
                </div>
            </div>
            <a href="{{ route('admin.slides.index') }}" class="small text-decoration-none mt-3 d-inline-block fw-semibold text-info">Edit Banners &rarr;</a>
        </div>
    </div>
</div>

<!-- Recent Inquiries & Quick Actions -->
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card-custom p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0">Recent Inquiries & Quotes</h5>
                <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Sender</th>
                            <th>Type</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentInquiries as $inq)
                        <tr>
                            <td>
                                <div class="fw-bold">{{ $inq->name }}</div>
                                <small class="text-muted">{{ $inq->email }}</small>
                            </td>
                            <td>
                                <span class="badge {{ $inq->type === 'quote' ? 'bg-primary' : 'bg-secondary' }}">
                                    {{ strtoupper($inq->type) }}
                                </span>
                            </td>
                            <td>{{ Str::limit($inq->subject ?: $inq->message, 30) }}</td>
                            <td>
                                @if($inq->status === 'new')
                                <span class="badge bg-danger">New</span>
                                @elseif($inq->status === 'read')
                                <span class="badge bg-warning text-dark">Read</span>
                                @else
                                <span class="badge bg-success">Replied</span>
                                @endif
                            </td>
                            <td class="small text-muted">{{ $inq->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('admin.inquiries.show', $inq->id) }}" class="btn btn-sm btn-light">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No inquiries received yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card-custom p-4 mb-4">
            <h5 class="fw-bold mb-3">Quick CMS Actions</h5>
            <div class="d-grid gap-2">
                <a href="{{ route('admin.services.create') }}" class="btn btn-outline-primary text-start">
                    <i class="fa-solid fa-plus me-2"></i> Add New Export Service
                </a>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-success text-start">
                    <i class="fa-solid fa-pen-nib me-2"></i> Publish New Blog Insight
                </a>
                <a href="{{ route('admin.slides.create') }}" class="btn btn-outline-info text-start">
                    <i class="fa-solid fa-image me-2"></i> Create New Hero Banner
                </a>
                <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-dark text-start">
                    <i class="fa-solid fa-sliders me-2"></i> Edit Company Info & Logos
                </a>
            </div>
        </div>

        <div class="card-custom p-4 bg-primary text-white" style="background-color: #0A192F !important;">
            <h6 class="fw-bold text-white mb-2"><i class="fa-solid fa-globe me-1"></i> Multi-lingual Architecture</h6>
            <p class="small text-white-50 mb-0">All services, blog articles, banners, and settings support independent English, Arabic (RTL), and French content tabs directly within each editor form.</p>
        </div>
    </div>
</div>

@endsection
