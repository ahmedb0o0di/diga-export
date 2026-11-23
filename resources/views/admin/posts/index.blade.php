@extends('admin.layouts.app')

@section('page-title', 'Blog Posts & Trade Insights')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Blog Articles Management</h5>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-dija">
        <i class="fa-solid fa-plus me-1"></i> Write New Article
    </a>
</div>

<div class="card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 80px;">Thumbnail</th>
                    <th>Article Title [EN]</th>
                    <th>عنوان المقال [AR]</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th style="width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td>
                        <img src="{{ asset($post->thumbnail ?: 'assets/images/blog/details/01.png') }}" alt="Post" style="width: 70px; height: 50px; object-fit: cover; border-radius: 6px;">
                    </td>
                    <td>
                        <div class="fw-bold">{{ $post->getTranslation('title', 'en') }}</div>
                        <small class="text-muted">Slug: <code>{{ $post->slug }}</code></small>
                    </td>
                    <td dir="rtl">
                        <div class="fw-bold">{{ $post->getTranslation('title', 'ar') }}</div>
                    </td>
                    <td><span class="badge bg-light text-dark border">{{ $post->getTranslation('category', 'en') ?: 'Export' }}</span></td>
                    <td class="small text-muted">{{ $post->published_at ? $post->published_at->format('M d, Y') : '-' }}</td>
                    <td>
                        <span class="badge {{ $post->is_published ? 'bg-success' : 'bg-secondary' }}">
                            {{ $post->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary me-1">
                            <i class="fa-solid fa-pen"></i> Edit
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this post?');">
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
                    <td colspan="7" class="text-center py-4 text-muted">No posts found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
