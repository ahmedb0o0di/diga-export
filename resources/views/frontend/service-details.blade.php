@extends('frontend.layouts.app')

@php
    $locale = app()->getLocale();
    $isRtl = ($locale === 'ar');
@endphp

@section('title', $service->getTrans('title') . ' - DIJA GROUP EXPORT')

@section('content')

<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title split-collab">{{ $service->getTrans('title') }}</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="{{ route('home') }}">{{ $isRtl ? 'الرئيسية' : 'Home' }}</a></li>
                        <li class="icon"><i class="fa-solid {{ $isRtl ? 'fa-angle-left' : 'fa-angle-right' }}"></i></li>
                        <li class="tmp-breadcrumb-item"><a href="{{ route('services') }}">{{ $isRtl ? 'الخدمات' : 'Services' }}</a></li>
                        <li class="icon"><i class="fa-solid {{ $isRtl ? 'fa-angle-left' : 'fa-angle-right' }}"></i></li>
                        <li class="tmp-breadcrumb-item active">{{ Str::limit($service->getTrans('title'), 30) }}</li>
                    </ul>
                    <div class="circle-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Service Details Section -->
<div class="tmp-service-section tmp-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="tmp-large-service-detials">
                    <img src="{{ asset('assets/images/services/details-large.png') }}" alt="{{ $service->getTrans('title') }}" style="border-radius: 10px; width: 100%;">
                </div>

                <div class="single-service-details-component mt--40">
                    <h2 class="title split-collab">{{ $service->getTrans('title') }}</h2>
                    <p class="disc mb--20" style="font-size: 16px; line-height: 1.85;">
                        {{ $service->getTrans('description') }}
                    </p>

                    <div class="row mt--20">
                        <div class="col-lg-6 col-md-6">
                            <div class="check-service-wrapper">
                                <div class="single-check d-flex align-items-center mb-2">
                                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                                    <p class="mb-0 fw-semibold">{{ $isRtl ? 'ضمان الجودة المعتمدة دولياً' : 'Certified International Quality Assurance' }}</p>
                                </div>
                                <div class="single-check d-flex align-items-center mb-2">
                                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                                    <p class="mb-0 fw-semibold">{{ $isRtl ? 'فريق إدارة شحن بحري وتخليص معتمد' : 'Expert Maritime Trade Team' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="check-service-wrapper">
                                <div class="single-check d-flex align-items-center mb-2">
                                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                                    <p class="mb-0 fw-semibold">{{ $isRtl ? 'فحص ومعاينة SGS وIntertek المعتمدة' : 'SGS, Intertek & Bureau Veritas Inspection' }}</p>
                                </div>
                                <div class="single-check d-flex align-items-center mb-2">
                                    <i class="fa-solid fa-circle-check text-primary me-2"></i>
                                    <p class="mb-0 fw-semibold">{{ $isRtl ? 'تتبع فوري لمسارات السفن والحاويات' : '24/7 Container & Vessel Telematics' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-5 mt--20">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-service-details p-4 rounded bg-light border">
                            <div class="icon mb-3" style="font-size: 32px; color: #F26820;">
                                <i class="fa-solid fa-certificate"></i>
                            </div>
                            <div class="information">
                                <h5 class="title">{{ $isRtl ? 'ضمان الجودة والفحص المخبري' : 'Certified Quality Assurance' }}</h5>
                                <p class="disc text-muted mt-2">
                                    {{ $isRtl ? 'تخضع كافة السلع والشحنات لفحص فيزيائي شامل، وتحليل دقيق لنسب الرطوبة، واختبارات معملية معتمدة دولياً قبل التحميل.' : 'Every cargo consignment undergoes rigorous physical examination, moisture content analysis, and laboratory screening before loading.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-service-details p-4 rounded bg-light border">
                            <div class="icon mb-3" style="font-size: 32px; color: #F26820;">
                                <i class="fa-solid fa-file-contract"></i>
                            </div>
                            <div class="information">
                                <h5 class="title">{{ $isRtl ? 'إدارة الإنكوترمز والشحن البحري' : 'Incoterms & Freight Management' }}</h5>
                                <p class="disc text-muted mt-2">
                                    {{ $isRtl ? 'صياغة مرنة لعقود التوريد بشروط فوب (FOB) وسيف (CIF) وسي إف آر (CFR) تضمن وضوح نقل المسؤولية والتكاليف بدقة.' : 'Tailored shipping contracts under FOB, CIF, or CFR terms ensuring clarity of risk transfer and landed cost predictability.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt--40">
                    <h3 class="title split-collab">{{ $isRtl ? 'تفاصيل ومواصفات الخدمة الكاملة' : 'Full Scope & Operational Guidelines' }}</h3>
                    <div class="disc mt--20 p-4 bg-white rounded border" style="line-height: 1.9; font-size: 16px;">
                        {!! \Illuminate\Support\Str::markdown($service->getTrans('content') ?: $service->getTrans('description')) !!}
                    </div>
                </div>

                <!-- Quote CTA Box -->
                <div class="quote-cta-box mt--40 p-4 p-md-5 rounded" style="background: #0A192F; color: #fff;">
                    <h4 class="text-white mb--10">{{ $isRtl ? 'جاهز لطلب عرض أسعار لهذه الخدمة؟' : ($locale === 'fr' ? 'Prêt à réserver votre cargaison ?' : 'Ready to Request a Quotation?') }}</h4>
                    <p class="text-white-50 mb--25">{{ $isRtl ? 'تواصل مباشرة مع مكتب التجارة لطلب عرض أسعار فوري مبني على متطلباتك وميناء الوصول.' : 'Connect directly with our export desk for competitive FOB or CIF pricing tailored to your port of discharge.' }}</p>
                    <a href="{{ route('contact') }}" class="tmp-btn btn-primary">
                        {{ $isRtl ? 'طلب تسعيرة رسمية الآن' : ($locale === 'fr' ? 'Demander un devis' : 'Request Official Quote') }}
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="service-sidebar">
                    <div class="widget bg-white p-4 rounded shadow-sm mb--30 border">
                        <h5 class="widget-title mb--20" style="border-bottom: 2px solid #F26820; padding-bottom: 10px;">
                            {{ $isRtl ? 'كافة خدمات التصدير' : ($locale === 'fr' ? 'Tous les services' : 'Export Services') }}
                        </h5>
                        <ul class="category-link list-unstyled mb-0">
                            @foreach($allServices as $s)
                            <li class="mb--10 pb--10 border-bottom">
                                <a href="{{ route('service.details', $s->slug) }}" class="d-flex justify-content-between align-items-center text-decoration-none {{ $s->id === $service->id ? 'text-primary fw-bold' : 'text-dark' }}">
                                    <span>{{ $s->getTrans('title') }}</span>
                                    <i class="fa-solid {{ $isRtl ? 'fa-angle-left' : 'fa-angle-right' }}"></i>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget bg-white p-4 rounded shadow-sm text-center border">
                        <div class="icon mb--15" style="font-size: 40px; color: #F26820;">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <h5 class="mb--10">{{ $isRtl ? 'تحتاج استشارة تجارية فورية؟' : ($locale === 'fr' ? 'Besoin d\'assistance immédiate ?' : 'Need Immediate Trade Support?') }}</h5>
                        <p class="text-muted mb--20 small">{{ \App\Models\Setting::get('working_hours') }}</p>
                        <a href="tel:{{ \App\Models\Setting::get('contact_phone') }}" class="tmp-btn btn-secondary w-100">
                            {{ \App\Models\Setting::get('contact_phone') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
