@extends('admin.layouts.app')

@section('page-title', 'Create Hero Slide')

@section('content')

<div class="card-custom p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h5 class="fw-bold mb-0">Add New Hero Banner</h5>
        <a href="{{ route('admin.slides.index') }}" class="btn btn-outline-secondary btn-sm">&larr; Back to List</a>
    </div>

    <form action="{{ route('admin.slides.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <ul class="nav nav-tabs mb-4" id="slideTab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#en-slide" type="button">English [EN]</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ar-slide" type="button">العربية [AR]</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#fr-slide" type="button">Français [FR]</button>
            </li>
        </ul>

        <div class="tab-content mb-4" id="slideTabContent">
            <!-- English -->
            <div class="tab-pane fade show active" id="en-slide">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Subtitle [EN]</label>
                        <input type="text" name="subtitle[en]" class="form-control" placeholder="e.g. Premier Export Management">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Main Headline [EN] *</label>
                        <input type="text" name="title[en]" class="form-control" required placeholder="e.g. Connecting Global Markets">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Description [EN]</label>
                        <textarea name="description[en]" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Button Label [EN]</label>
                        <input type="text" name="button_text[en]" class="form-control" placeholder="Explore Services">
                    </div>
                </div>
            </div>

            <!-- Arabic -->
            <div class="tab-pane fade" id="ar-slide" dir="rtl">
                <div class="row g-3 text-end">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">العنوان الفرعي [AR]</label>
                        <input type="text" name="subtitle[ar]" class="form-control text-end" placeholder="مثال: شريكك الأول للتصدير">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">العنوان الرئيسي [AR] *</label>
                        <input type="text" name="title[ar]" class="form-control text-end" required placeholder="مثال: نربط الأسواق العالمية بأجود السلع">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">الوصف والتفاصيل [AR]</label>
                        <textarea name="description[ar]" class="form-control text-end" rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">نص زر الإجراء [AR]</label>
                        <input type="text" name="button_text[ar]" class="form-control text-end" placeholder="استكشف خدمات التصدير">
                    </div>
                </div>
            </div>

            <!-- French -->
            <div class="tab-pane fade" id="fr-slide">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Sous-titre [FR]</label>
                        <input type="text" name="subtitle[fr]" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Titre principal [FR]</label>
                        <input type="text" name="title[fr]" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Description [FR]</label>
                        <textarea name="description[fr]" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Texte du bouton [FR]</label>
                        <input type="text" name="button_text[fr]" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 border-top pt-3">
            <div class="col-md-4">
                <label class="form-label fw-bold">Button Link</label>
                <input type="text" name="button_link" class="form-control" value="/services">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="0">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">Background Banner Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <div class="col-12 form-check ms-3 mt-3">
                <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" checked>
                <label class="form-check-label fw-semibold" for="is_active">Active (Visible on public homepage)</label>
            </div>
        </div>

        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-dija px-4">Create Slide</button>
        </div>
    </form>
</div>

@endsection
