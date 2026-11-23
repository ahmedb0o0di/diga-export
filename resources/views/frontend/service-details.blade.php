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
                    <h1 class="title">{{ $service->getTrans('title') }}</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="{{ route('home') }}">{{ $isRtl ? 'الرئيسية' : 'Home' }}</a></li>
                        <li class="icon"><i class="fa-solid {{ $isRtl ? 'fa-angle-left' : 'fa-angle-right' }}"></i></li>
                        <li class="tmp-breadcrumb-item"><a href="{{ route('services') }}">{{ $isRtl ? 'الخدمات' : 'Services' }}</a></li>
                        <li class="icon"><i class="fa-solid {{ $isRtl ? 'fa-angle-left' : 'fa-angle-right' }}"></i></li>
                        <li class="tmp-breadcrumb-item active">{{ Str::limit($service->getTrans('title'), 25) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Service Details Section -->
<div class="tmp-services-details-area tmp-section-gap">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="services-details-content bg-white p-4 p-md-5 rounded shadow-sm">
                    @if($service->image)
                    <div class="thumbnail mb--35">
                        <img src="{{ asset($service->image) }}" alt="{{ $service->getTrans('title') }}" style="width: 100%; height: 380px; object-fit: cover; border-radius: 10px;">
                    </div>
                    @endif

                    <h2 class="title mb--20">{{ $service->getTrans('title') }}</h2>
                    <p class="disc" style="font-size: 17px; line-height: 1.85; color: #444;">
                        {{ $service->getTrans('description') }}
                    </p>

                    <div class="mt--30">
                        <h4 class="title mb--15">{{ $isRtl ? 'المواصفات والضمانات التشغيلية' : ($locale === 'fr' ? 'Spécifications et garanties' : 'Operational Scope & Specifications') }}</h4>
                        <p class="disc" style="line-height: 1.85; color: #555;">
                            {{ $service->getTrans('content') ?: $service->getTrans('description') }}
                        </p>
                    </div>

                    <div class="quote-cta-box mt--40 p-4 p-md-5 rounded" style="background: #0A192F; color: #fff;">
                        <h4 class="text-white mb--10">{{ $isRtl ? 'جاهز لحجز شحنتك التجارية؟' : ($locale === 'fr' ? 'Prêt à réserver votre cargaison ?' : 'Ready to Book Your Cargo Consignment?') }}</h4>
                        <p class="text-white-50 mb--25">{{ $isRtl ? 'تواصل مباشرة مع مكتب التجارة لطلب عرض أسعار فوري مبني على مصطلحات FOB أو CIF أو CFR.' : 'Connect directly with our trade desk for structured pricing under FOB, CIF, or CFR terms.' }}</p>
                        <a href="{{ route('contact') }}" class="tmp-btn btn-primary">
                            {{ $isRtl ? 'طلب تسعيرة رسمية' : ($locale === 'fr' ? 'Demander un devis' : 'Request Official Quote') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="service-sidebar">
                    <div class="widget bg-white p-4 rounded shadow-sm mb--30">
                        <h5 class="widget-title mb--20" style="border-bottom: 2px solid #F26820; padding-bottom: 10px;">
                            {{ $isRtl ? 'كافة خدمات التصدير' : ($locale === 'fr' ? 'Tous les services' : 'Export Portfolio') }}
                        </h5>
                        <ul class="category-link list-unstyled mb-0">
                            @foreach($allServices as $s)
                            <li class="mb--10 pb--10 border-bottom">
                                <a href="{{ route('service.details', $s->slug) }}" class="d-flex justify-content-between align-items-center {{ $s->id === $service->id ? 'text-primary fw-bold' : 'text-dark' }}">
                                    <span>{{ $s->getTrans('title') }}</span>
                                    <i class="fa-solid {{ $isRtl ? 'fa-angle-left' : 'fa-angle-right' }}"></i>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget bg-white p-4 rounded shadow-sm text-center">
                        <div class="icon mb--15" style="font-size: 40px; color: #F26820;">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <h5 class="mb--10">{{ $isRtl ? 'تحتاج استشارة تجارية فورية؟' : ($locale === 'fr' ? 'Besoin d\'assistance immédiate ?' : 'Need Immediate Trade Support?') }}</h5>
                        <p class="text-muted mb--20">{{ \App\Models\Setting::get('working_hours') }}</p>
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
