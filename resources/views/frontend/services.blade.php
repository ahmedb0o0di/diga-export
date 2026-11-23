@extends('frontend.layouts.app')

@php
    $locale = app()->getLocale();
    $isRtl = ($locale === 'ar');
@endphp

@section('title', ($isRtl ? 'خدمات التصدير - مجموعة ديجا للتصدير' : ($locale === 'fr' ? 'Services d\'Exportation - DIJA GROUP EXPORT' : 'Export Services - DIJA GROUP EXPORT')))

@section('content')

<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title">{{ $isRtl ? 'خدمات التصدير والشحن الدولي' : ($locale === 'fr' ? 'Nos Solutions d\'Exportation' : 'Export & Maritime Services') }}</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="{{ route('home') }}">{{ $isRtl ? 'الرئيسية' : ($locale === 'fr' ? 'Accueil' : 'Home') }}</a></li>
                        <li class="icon"><i class="fa-solid {{ $isRtl ? 'fa-angle-left' : 'fa-angle-right' }}"></i></li>
                        <li class="tmp-breadcrumb-item active">{{ $isRtl ? 'الخدمات' : ($locale === 'fr' ? 'Services' : 'Services') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Services Grid -->
<div class="tmp-services-area tmp-section-gap">
    <div class="container">
        <div class="row g-5">
            @foreach($services as $service)
            <div class="col-lg-6">
                <div class="single-services" style="background: #fff; border-radius: 10px; padding: 35px; box-shadow: 0 5px 25px rgba(0,0,0,0.06); height: 100%; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <div class="d-flex align-items-center mb--20">
                            <div class="icon me-3" style="font-size: 40px; color: #F26820; width: 60px;">
                                <i class="{{ $service->icon ?: 'fa-solid fa-ship' }}"></i>
                            </div>
                            <h3 class="title mb-0" style="font-size: 24px;">
                                <a href="{{ route('service.details', $service->slug) }}">{{ $service->getTrans('title') }}</a>
                            </h3>
                        </div>
                        <p class="disc" style="color: #6a6c71; line-height: 1.8; font-size: 16px;">
                            {{ $service->getTrans('description') }}
                        </p>
                    </div>
                    <div class="mt--25 pt--20 border-top d-flex justify-content-between align-items-center">
                        <a href="{{ route('service.details', $service->slug) }}" class="tmp-btn btn-primary btn-sm">
                            {{ $isRtl ? 'تفاصيل الخدمة' : ($locale === 'fr' ? 'En savoir plus' : 'Service Details') }}
                        </a>
                        <a href="{{ route('contact') }}" style="color: #102E54; font-weight: 700; font-size: 14px;">
                            {{ $isRtl ? 'طلب تسعيرة' : ($locale === 'fr' ? 'Demander un devis' : 'Request Quote') }} &rarr;
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
