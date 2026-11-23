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
                    <h1 class="title split-collab">{{ $isRtl ? 'عن مجموعة ديجا للتصدير' : ($locale === 'fr' ? 'À propos de DIJA Group' : 'About DIJA Group Export') }}</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="{{ route('home') }}">{{ $isRtl ? 'الرئيسية' : ($locale === 'fr' ? 'Accueil' : 'Home') }}</a></li>
                        <li class="icon"><i class="fa-solid {{ $isRtl ? 'fa-angle-left' : 'fa-angle-right' }}"></i></li>
                        <li class="tmp-breadcrumb-item active">{{ $isRtl ? 'من نحن' : ($locale === 'fr' ? 'À propos' : 'About Us') }}</li>
                    </ul>
                    <div class="circle-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Section -->
<div class="about-area tmp-section-gap about-style-one">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-thumbnails">
                    <div class="thumbnail">
                        <img src="{{ asset('assets/images/about/01.png') }}" alt="DIJA Group Export">
                        <div class="image-two">
                            <img src="{{ asset('assets/images/about/03.png') }}" alt="DIJA Group Export">
                        </div>
                        <div class="image-three animated">
                            <img src="{{ asset('assets/images/about/02.png') }}" alt="DIJA Group Export">
                        </div>
                        <div class="square"></div>
                        <div class="flower">
                            <img src="{{ asset('assets/images/about/flower.png') }}" alt="DIJA Export">
                        </div>
                        <div class="product-share">
                            <div class="rating">
                                <div class="number">4.9</div>
                                <div class="stars-group">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-share">
                                <a href="#" class="avatar"><img src="{{ asset('assets/images/about/4.png') }}" alt="Partner"></a>
                                <a href="#" class="avatar"><img src="{{ asset('assets/images/about/5.png') }}" alt="Partner"></a>
                                <a href="#" class="avatar"><img src="{{ asset('assets/images/about/6.png') }}" alt="Partner"></a>
                                <a href="#" class="avatar"><img src="{{ asset('assets/images/about/7.png') }}" alt="Partner"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-inner">
                    <div class="section-head text-align-left section-head-one-side">
                        <div class="section-sub-title">
                            <img src="{{ asset('assets/images/services/section-custom-menubar.png') }}" alt="DIJA Export Services">
                            <span class="subtitle">{{ $isRtl ? 'ريادة التصدير الدولي' : ($locale === 'fr' ? 'À PROPOS' : 'ABOUT DIJA GROUP EXPORT') }}</span>
                        </div>
                        <h2 class="title split-collab">
                            {{ $isRtl ? 'جسركم الموثوق بين كبار المنتجين والأسواق الدولية' : ($locale === 'fr' ? 'Votre passerelle vers les marchés mondiaux de matières premières' : 'Bridging Global Markets With Certified Commodity Exports') }}
                        </h2>
                    </div>

                    <p class="description">
                        {{ \App\Models\Setting::get('site_description') }}
                    </p>
                    <p class="description">
                        {{ $isRtl ? 'نعمل وفق أعلى معايير الشفافية التعاقدية ومصطلحات التجارة الدولية (Incoterms)، مع إدارة دقيقة لسلاسل الإمداد ومراقبة الجودة عبر كبرى جهات المعاينة والتفتيش الدولية (SGS وIntertek وBureau Veritas).' : 'Operating under rigorous Incoterms standards, we manage end-to-end maritime freight, phytosanitary certifications, clean bill-of-lading execution, and transparent contracting across 45+ international destinations.' }}
                    </p>

                    <div class="single-progress-area progress-stye-one mt--30">
                        <div class="progress-top">
                            <p class="name">{{ $isRtl ? 'السلع الزراعية والمحاصيل الغذائية' : 'Agricultural Cargoes Sourced' }}</p>
                            <span class="parcent">88%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar wow fadeInLeft bg--primary" role="progressbar" style="width: 88%"></div>
                        </div>
                    </div>

                    <div class="single-progress-area progress-stye-one mt--20">
                        <div class="progress-top">
                            <p class="name">{{ $isRtl ? 'المعادن والمواد الخام الصناعية' : 'Industrial Minerals & Bulk Freight' }}</p>
                            <span class="parcent">95%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar wow fadeInLeft bg--primary" role="progressbar" style="width: 95%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 4-Stage Global Export Lifecycle -->
<div class="tpm-services-process-area tmp-section-gap bg-working-1" style="background: #f8f9fa;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head text-center mb--50">
                    <div class="section-sub-title center-title">
                        <img src="{{ asset('assets/images/services/section-custom-menubar.png') }}" alt="DIJA Export Services">
                        <span class="subtitle">{{ $isRtl ? 'منهجية التصدير' : ($locale === 'fr' ? 'NOTRE CYCLE' : 'OUR WORK PROCESS') }}</span>
                    </div>
                    <h2 class="title split-collab">{{ $isRtl ? 'دورة حياة التصدير والشحن في 4 مراحل' : 'Our 4-Stage Global Export Lifecycle' }}</h2>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="single-services h-100">
                    <div class="services-inner h-100 bg-white p-4 rounded shadow-sm text-center">
                        <div class="thumbnail thumbnail-rounded mb--20">
                            <img src="{{ asset('assets/images/services/services-round-1.png') }}" alt="Origin Sourcing">
                        </div>
                        <h5 class="title">{{ $isRtl ? '1. توريد السلع وهيكلة العقود' : '1. Origin Sourcing & Contract Structuring' }}</h5>
                        <p class="description mt--10">
                            {{ $isRtl ? 'فحص المزارع والمصانع المعتمدة لتأمين كميات توريد مؤكدة بأسعار فوب (FOB) وسيف (CIF) التنافسية.' : 'Vetting verified farms and industrial mills to secure reliable volume, favorable harvest timing, and transparent FOB/CIF pricing.' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="single-services h-100">
                    <div class="services-inner h-100 bg-white p-4 rounded shadow-sm text-center">
                        <div class="thumbnail thumbnail-rounded mb--20">
                            <img src="{{ asset('assets/images/services/services-round-2.png') }}" alt="Quality Grading">
                        </div>
                        <h5 class="title">{{ $isRtl ? '2. فحص الجودة والتعبئة الدولية' : '2. Quality Grading & Export Packaging' }}</h5>
                        <p class="description mt--10">
                            {{ $isRtl ? 'فحوصات مخبرية دقيقة من SGS وIntertek وإصدار شهادات الحجر الزراعي والإشراف على تعبئة الحاويات.' : 'Stringent third-party laboratory analysis (SGS, ISO), phytosanitary grading, export packing, and supervised container stuffing.' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="single-services h-100">
                    <div class="services-inner h-100 bg-white p-4 rounded shadow-sm text-center">
                        <div class="thumbnail thumbnail-rounded mb--20">
                            <img src="{{ asset('assets/images/services/services-round-3.png') }}" alt="Customs & Port Logistics">
                        </div>
                        <h5 class="title">{{ $isRtl ? '3. التخليص الجمركي والشحن البحري' : '3. Customs Clearance & Port Logistics' }}</h5>
                        <p class="description mt--10">
                            {{ $isRtl ? 'استخراج بوالص الشحن النظيفة، وتصديق القنصليات، وتنسيق إبحار السفن دون أية غرامات تأخير بموانئ الوصول.' : 'Preparing Bills of Lading, Certificates of Origin, consular legalization, port handling, and scheduled maritime vessel dispatch.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Team Section -->
<div class="team-area tmp-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head text-center mb--50">
                    <div class="section-sub-title center-title">
                        <img src="{{ asset('assets/images/services/section-custom-menubar.png') }}" alt="DIJA Export Services">
                        <span class="subtitle">{{ $isRtl ? 'القيادة التنفيذية' : ($locale === 'fr' ? 'NOTRE ÉQUIPE' : 'EXECUTIVE LEADERSHIP') }}</span>
                    </div>
                    <h2 class="title split-collab">{{ $isRtl ? 'فريق إدارة العمليات والتصدير' : ($locale === 'fr' ? 'Notre équipe dirigeante' : 'Our Export & Maritime Leadership') }}</h2>
                </div>
            </div>
        </div>

        <div class="row g-5">
            @foreach($team as $member)
            <div class="col-lg-4 col-md-6">
                <div class="single-team text-center h-100" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); padding-bottom: 25px;">
                    <div class="thumbnail mb--20">
                        <img src="{{ asset($member->photo ?: 'assets/images/team/team-1.png') }}" alt="{{ $member->getTrans('name') }}" style="width: 100%; height: 320px; object-fit: cover;">
                    </div>
                    <h5 class="name mb--5">{{ $member->getTrans('name') }}</h5>
                    <div class="designation" style="color: #F26820; font-weight: 600;">{{ $member->getTrans('designation') }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
