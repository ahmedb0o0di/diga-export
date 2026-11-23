@extends('admin.layouts.app')

@section('page-title', 'Create Blog Post')

@section('content')

<div class="card-custom p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h5 class="fw-bold mb-0">Write New Insight / Article</h5>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary btn-sm">&larr; Back to List</a>
    </div>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <ul class="nav nav-tabs mb-4" id="postTab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#en-post" type="button">English [EN]</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ar-post" type="button">العربية [AR]</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#fr-post" type="button">Français [FR]</button>
            </li>
        </ul>

        <div class="tab-content mb-4" id="postTabContent">
            <!-- English -->
            <div class="tab-pane fade show active" id="en-post">
                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label fw-bold">Post Title [EN] *</label>
                        <input type="text" name="title[en]" class="form-control" required placeholder="e.g. Incoterms 2024: Essential Guide">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Category [EN]</label>
                        <input type="text" name="category[en]" class="form-control" placeholder="e.g. Export Compliance">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Short Excerpt [EN]</label>
                        <textarea name="excerpt[en]" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Full Article Content [EN] *</label>
                        <textarea name="content[en]" class="form-control" rows="8" required></textarea>
                    </div>
                </div>
            </div>

            <!-- Arabic -->
            <div class="tab-pane fade" id="ar-post" dir="rtl">
                <div class="row g-3 text-end">
                    <div class="col-md-8">
                        <label class="form-label fw-bold">عنوان المقال [AR] *</label>
                        <input type="text" name="title[ar]" class="form-control text-end" required placeholder="مثال: إنكوترمز 2024: دليل شامل للمشترين">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">التصنيف [AR]</label>
                        <input type="text" name="category[ar]" class="form-control text-end" placeholder="مثال: الامتثال التصديري">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">الملخص المختصر [AR]</label>
                        <textarea name="excerpt[ar]" class="form-control text-end" rows="2"></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">نص المقال الكامل [AR] *</label>
                        <textarea name="content[ar]" class="form-control text-end" rows="8" required></textarea>
                    </div>
                </div>
            </div>

            <!-- French -->
            <div class="tab-pane fade" id="fr-post">
                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label fw-bold">Titre [FR]</label>
                        <input type="text" name="title[fr]" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Catégorie [FR]</label>
                        <input type="text" name="category[fr]" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Extrait [FR]</label>
                        <textarea name="excerpt[fr]" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Contenu [FR]</label>
                        <textarea name="content[fr]" class="form-control" rows="8"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 border-top pt-3">
            <div class="col-md-3">
                <label class="form-label fw-bold">URL Slug (Auto if blank)</label>
                <input type="text" name="slug" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Author Name</label>
                <input type="text" name="author" class="form-control" value="DIJA Group Trade Desk">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Read Time</label>
                <input type="text" name="read_time" class="form-control" value="5 min read">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Thumbnail Image</label>
                <input type="file" name="thumbnail" class="form-control" accept="image/*">
            </div>
            <div class="col-12 form-check ms-3 mt-3">
                <input type="checkbox" name="is_published" class="form-check-input" id="is_published" value="1" checked>
                <label class="form-check-label fw-semibold" for="is_published">Publish Immediately</label>
            </div>
        </div>

        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-dija px-4">Publish Article</button>
        </div>
    </form>
</div>

@endsection
