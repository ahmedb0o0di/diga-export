@extends('admin.layouts.app')

@section('page-title', 'Add Team Member')

@section('content')

<div class="card-custom p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h5 class="fw-bold mb-0">Add Team Member</h5>
        <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary btn-sm">&larr; Back to List</a>
    </div>

    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <ul class="nav nav-tabs mb-4" id="teamTab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#en-team" type="button">English [EN]</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ar-team" type="button">العربية [AR]</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#fr-team" type="button">Français [FR]</button>
            </li>
        </ul>

        <div class="tab-content mb-4" id="teamTabContent">
            <!-- English -->
            <div class="tab-pane fade show active" id="en-team">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Full Name [EN] *</label>
                        <input type="text" name="name[en]" class="form-control" required placeholder="e.g. Mahmoud El-Sayed">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Designation / Role [EN] *</label>
                        <input type="text" name="designation[en]" class="form-control" required placeholder="e.g. Head of Export Logistics">
                    </div>
                </div>
            </div>

            <!-- Arabic -->
            <div class="tab-pane fade" id="ar-team" dir="rtl">
                <div class="row g-3 text-end">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">الاسم الكامل [AR] *</label>
                        <input type="text" name="name[ar]" class="form-control text-end" required placeholder="مثال: محمود السيد">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">المسمى الوظيفي [AR] *</label>
                        <input type="text" name="designation[ar]" class="form-control text-end" required placeholder="مثال: رئيس قطاع اللوجستيات">
                    </div>
                </div>
            </div>

            <!-- French -->
            <div class="tab-pane fade" id="fr-team">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nom complet [FR]</label>
                        <input type="text" name="name[fr]" class="form-control" placeholder="ex. Mahmoud El-Sayed">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Fonction [FR]</label>
                        <input type="text" name="designation[fr]" class="form-control" placeholder="ex. Responsable Logistique">
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 border-top pt-3">
            <div class="col-md-4">
                <label class="form-label fw-bold">Profile Photo</label>
                <input type="file" name="photo" class="form-control" accept="image/*">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">LinkedIn URL</label>
                <input type="url" name="linkedin" class="form-control" placeholder="https://linkedin.com/in/...">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">Twitter / X URL</label>
                <input type="url" name="twitter" class="form-control" placeholder="https://twitter.com/...">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">Facebook URL</label>
                <input type="url" name="facebook" class="form-control" placeholder="https://facebook.com/...">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">Display Order</label>
                <input type="number" name="sort_order" class="form-control" value="0">
            </div>
        </div>

        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-dija px-4">Save Team Member</button>
        </div>
    </form>
</div>

@endsection
