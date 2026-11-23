@extends('admin.layouts.app')

@section('page-title', 'Create Export Service')

@section('content')

<div class="card-custom p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h5 class="fw-bold mb-0">Add New Export Service</h5>
        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary btn-sm">&larr; Back to List</a>
    </div>

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <ul class="nav nav-tabs mb-4" id="serviceTab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#en-serv" type="button">English [EN]</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ar-serv" type="button">العربية [AR]</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#fr-serv" type="button">Français [FR]</button>
            </li>
        </ul>

        <div class="tab-content mb-4" id="serviceTabContent">
            <!-- English -->
            <div class="tab-pane fade show active" id="en-serv">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-bold">Service Title [EN] *</label>
                        <input type="text" name="title[en]" class="form-control" required placeholder="e.g. Agricultural Commodities Export">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Short Excerpt / Summary [EN]</label>
                        <textarea name="description[en]" class="form-control" rows="3" placeholder="Brief 1-2 sentence overview..."></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Full Scope & Details [EN]</label>
                        <textarea name="content[en]" class="form-control" rows="5" placeholder="Comprehensive specifications, Incoterms, inspection details..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Arabic -->
            <div class="tab-pane fade" id="ar-serv" dir="rtl">
                <div class="row g-3 text-end">
                    <div class="col-12">
                        <label class="form-label fw-bold">عنوان الخدمة [AR] *</label>
                        <input type="text" name="title[ar]" class="form-control text-end" required placeholder="مثال: تصدير السلع والمحاصيل الزراعية">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">الملخص المختصر [AR]</label>
                        <textarea name="description[ar]" class="form-control text-end" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">التفاصيل والمواصفات الكاملة [AR]</label>
                        <textarea name="content[ar]" class="form-control text-end" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <!-- French -->
            <div class="tab-pane fade" id="fr-serv">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-bold">Titre du service [FR]</label>
                        <input type="text" name="title[fr]" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Résumé [FR]</label>
                        <textarea name="description[fr]" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Détails complets [FR]</label>
                        <textarea name="content[fr]" class="form-control" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 border-top pt-3">
            <div class="col-md-4">
                <label class="form-label fw-bold">URL Slug (Auto-generated if blank)</label>
                <input type="text" name="slug" class="form-control" placeholder="agricultural-commodities">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">FontAwesome Icon Class</label>
                <input type="text" name="icon" class="form-control" value="fa-solid fa-ship" placeholder="e.g. fa-solid fa-wheat-awn">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">Service Header Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <div class="col-12 form-check ms-3 mt-3">
                <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" checked>
                <label class="form-check-label fw-semibold" for="is_active">Publish Service</label>
            </div>
        </div>

        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-dija px-4">Create Service</button>
        </div>
    </form>
</div>

@endsection
