@extends('admin.layouts.app')

@section('page-title', 'Site Settings & Branding')

@section('content')

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card-custom p-4 mb-4">
        <h5 class="fw-bold mb-3 border-bottom pb-2">Company Identity & Information</h5>

        <!-- Nav Tabs for Languages -->
        <ul class="nav nav-tabs mb-4" id="langTab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-content" type="button"><i class="fa-solid fa-flag-usa me-1"></i> English</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="ar-tab" data-bs-toggle="tab" data-bs-target="#ar-content" type="button"><i class="fa-solid fa-globe me-1"></i> العربية (RTL)</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="fr-tab" data-bs-toggle="tab" data-bs-target="#fr-content" type="button"><i class="fa-solid fa-flag me-1"></i> Français</button>
            </li>
        </ul>

        <div class="tab-content" id="langTabContent">
            <!-- English -->
            <div class="tab-pane fade show active" id="en-content">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Company Name [EN]</label>
                        <input type="text" name="site_name[en]" class="form-control" value="{{ $settings['site_name']['en'] ?? 'DIJA GROUP EXPORT' }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Slogan / Tagline [EN]</label>
                        <input type="text" name="site_slogan[en]" class="form-control" value="{{ $settings['site_slogan']['en'] ?? '' }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Company Overview / Description [EN]</label>
                        <textarea name="site_description[en]" class="form-control" rows="3">{{ $settings['site_description']['en'] ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Address [EN]</label>
                        <input type="text" name="contact_address[en]" class="form-control" value="{{ $settings['contact_address']['en'] ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Working Hours [EN]</label>
                        <input type="text" name="working_hours[en]" class="form-control" value="{{ $settings['working_hours']['en'] ?? '' }}">
                    </div>
                </div>
            </div>

            <!-- Arabic -->
            <div class="tab-pane fade" id="ar-content" dir="rtl">
                <div class="row g-3 text-end">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">اسم الشركة [عربي]</label>
                        <input type="text" name="site_name[ar]" class="form-control text-end" value="{{ $settings['site_name']['ar'] ?? 'مجموعة ديجا للتصدير' }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">الشعار التسويقي [عربي]</label>
                        <input type="text" name="site_slogan[ar]" class="form-control text-end" value="{{ $settings['site_slogan']['ar'] ?? '' }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">نبذة عن الشركة [عربي]</label>
                        <textarea name="site_description[ar]" class="form-control text-end" rows="3">{{ $settings['site_description']['ar'] ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">العنوان التجاري [عربي]</label>
                        <input type="text" name="contact_address[ar]" class="form-control text-end" value="{{ $settings['contact_address']['ar'] ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">ساعات العمل والتداول [عربي]</label>
                        <input type="text" name="working_hours[ar]" class="form-control text-end" value="{{ $settings['working_hours']['ar'] ?? '' }}">
                    </div>
                </div>
            </div>

            <!-- French -->
            <div class="tab-pane fade" id="fr-content">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nom de l'entreprise [FR]</label>
                        <input type="text" name="site_name[fr]" class="form-control" value="{{ $settings['site_name']['fr'] ?? 'DIJA GROUP EXPORT' }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Slogan [FR]</label>
                        <input type="text" name="site_slogan[fr]" class="form-control" value="{{ $settings['site_slogan']['fr'] ?? '' }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Description [FR]</label>
                        <textarea name="site_description[fr]" class="form-control" rows="3">{{ $settings['site_description']['fr'] ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Adresse [FR]</label>
                        <input type="text" name="contact_address[fr]" class="form-control" value="{{ $settings['contact_address']['fr'] ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Heures de travail [FR]</label>
                        <input type="text" name="working_hours[fr]" class="form-control" value="{{ $settings['working_hours']['fr'] ?? '' }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact & Social Media Info -->
    <div class="card-custom p-4 mb-4">
        <h5 class="fw-bold mb-3 border-bottom pb-2">Direct Contact Channels & Socials</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold">Trading Desk Email</label>
                <input type="email" name="contact_email" class="form-control" value="{{ $settings['contact_email'] ?? 'export@dijagroup.com' }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold">Trading Desk Phone / WhatsApp</label>
                <input type="text" name="contact_phone" class="form-control" value="{{ $settings['contact_phone'] ?? '+1 (800) 555-DIJA' }}" required>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Facebook URL</label>
                <input type="text" name="facebook_url" class="form-control" value="{{ $settings['facebook_url'] ?? '#' }}">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Twitter / X URL</label>
                <input type="text" name="twitter_url" class="form-control" value="{{ $settings['twitter_url'] ?? '#' }}">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">LinkedIn URL</label>
                <input type="text" name="linkedin_url" class="form-control" value="{{ $settings['linkedin_url'] ?? '#' }}">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Instagram URL</label>
                <input type="text" name="instagram_url" class="form-control" value="{{ $settings['instagram_url'] ?? '#' }}">
            </div>
        </div>
    </div>

    <!-- Logos & Visual Assets -->
    <div class="card-custom p-4 mb-4">
        <h5 class="fw-bold mb-3 border-bottom pb-2">Logos & Brand Graphics</h5>
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label fw-bold">Header Main Logo (Light Background)</label>
                <div class="p-3 border rounded bg-light mb-2 text-center">
                    <img src="{{ asset($settings['header_logo'] ?? 'assets/images/logo/dija-logo.png') }}" style="max-height: 55px;" alt="Header Logo">
                </div>
                <input type="file" name="header_logo" class="form-control" accept="image/*">
                <small class="text-muted">Upload replacement PNG/SVG image for header.</small>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Footer Logo (Dark Background)</label>
                <div class="p-3 border rounded mb-2 text-center" style="background: #0A192F;">
                    <img src="{{ asset($settings['footer_logo'] ?? 'assets/images/logo/logo-white.png') }}" style="max-height: 55px;" alt="Footer Logo">
                </div>
                <input type="file" name="footer_logo" class="form-control" accept="image/*">
                <small class="text-muted">Upload replacement white/orange logo for dark footer.</small>
            </div>
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-dija px-4 py-2">
            <i class="fa-solid fa-floppy-disk me-1"></i> Save All Settings
        </button>
    </div>
</form>

@endsection
