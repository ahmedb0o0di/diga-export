@extends('frontend.layouts.app')

@php
    $locale = app()->getLocale();
    $isRtl = ($locale === 'ar');
@endphp

@section('title', ($isRtl ? 'من نحن - مجموعة ديجا للتصدير' : ($locale === 'fr' ? 'À propos - DIJA GROUP EXPORT' : 'About Us - DIJA GROUP EXPORT')))

@section('content')

<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title">{{ $isRtl ? 'عن مجموعة ديجا للتصدير' : ($locale === 'fr' ? 'À propos de DIJA Group' : 'About DIJA Group Export') }}</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="{{ route('home') }}">{{ $isRtl ? 'الرئيسية' : ($locale === 'fr' ? 'Accueil' : 'Home') }}</a></li>
                        <li class="icon"><i class="fa-solid {{ $isRtl ? 'fa-angle-left' : 'fa-angle-right' }}"></i></li>
                        <li class="tmp-breadcrumb-item active">{{ $isRtl ? 'من نحن' : ($locale === 'fr' ? 'À propos' : 'About Us') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Section -->
<div class="tmp-about-area tmp-section-gap">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-thumbnails mb_md--40 mb_sm--40">
                    <img src="{{ asset('assets/images/about/01.jpg') }}" alt="About DIJA Group" style="border-radius: 12px; width: 100%; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content ps-lg-4">
                    <span class="sub-title" style="color: #F26820; font-weight: 700;">{{ $isRtl ? 'ريادة التصدير الدولي' : ($locale === 'fr' ? 'Leader du commerce mondial' : 'GLOBAL TRADE EXCELLENCE') }}</span>
                    <h2 class="title mt--10 mb--20">{{ $isRtl ? 'جسركم الموثوق بين كبار المنتجين والأسواق الدولية' : ($locale === 'fr' ? 'Votre passerelle vers les marchés mondiaux de matières premières' : 'Connecting Certified Origin Producers with Global Importers') }}</h2>
                    <p class="disc" style="line-height: 1.8;">
                        {{ \App\Models\Setting::get('site_description') }}
                    </p>
                    <p class="disc" style="line-height: 1.8;">
                        {{ $isRtl ? 'نعمل وفق أعلى معايير الشفافية التعاقدية ومصطلحات التجارة الدولية (Incoterms 2020)، مع إدارة دقيقة لسلاسل الإمداد ومراقبة الجودة عبر كبرى جهات المعاينة والتفتيش الدولية.' : ($locale === 'fr' ? 'Nous opérons selon les normes les plus strictes de transparence contractuelle et les Incoterms 2020, avec une surveillance qualité continue.' : 'Operating under rigorous Incoterms 2020 standards, we manage end-to-end maritime freight, phytosanitary certifications, and clean bill-of-lading execution across global seaports.') }}
                    </p>
                    <div class="mt--30">
                        <a href="{{ route('contact') }}" class="tmp-btn btn-primary">
                            {{ $isRtl ? 'تواصل مع فريقنا التجاري' : ($locale === 'fr' ? 'Contactez notre équipe' : 'Connect with Trade Desk') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Team Section -->
<div class="team-area tmp-section-gap bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head text-center mb--50">
                    <span class="sub-title" style="color: #F26820; font-weight: 700;">{{ $isRtl ? 'القيادة التنفيذية' : ($locale === 'fr' ? 'Direction' : 'EXECUTIVE LEADERSHIP') }}</span>
                    <h2 class="title">{{ $isRtl ? 'فريق إدارة العمليات والتصدير' : ($locale === 'fr' ? 'Notre équipe dirigeante' : 'Our Export & Maritime Leadership') }}</h2>
                </div>
            </div>
        </div>

        <div class="row g-5">
            @foreach($team as $member)
            <div class="col-lg-4 col-md-6">
                <div class="single-team text-center" style="border-radius: 8px; overflow: hidden; background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.06); padding-bottom: 25px;">
                    <div class="thumbnail mb--20">
                        <img src="{{ asset($member->photo ?: 'assets/images/team/team-1.png') }}" alt="{{ $member->getTrans('name') }}" style="width: 100%; height: 320px; object-fit: cover;">
                    </div>
                    <h5 class="title mb--5">{{ $member->getTrans('name') }}</h5>
                    <p class="disc" style="color: #F26820; font-weight: 600;">{{ $member->getTrans('designation') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
