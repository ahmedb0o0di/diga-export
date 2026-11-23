@extends('frontend.layouts.app')

@php
    $locale = app()->getLocale();
    $isRtl = ($locale === 'ar');
@endphp

@section('content')

<!-- Hero Swiper Slider -->
<div class="tmp-banner-swiper-one-area">
    <div class="swiper mySwiper-banner-one">
        <div class="swiper-wrapper">
            @foreach($slides as $slide)
            <div class="swiper-slide">
                <div class="tmp-banner-area bg_image banner-one-height-control tmp-section-gap" style="background-image: url('{{ asset($slide->image ?: 'assets/images/banner/bg-01.jpg') }}'); background-size: cover; background-position: center;">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="banner-one-main-wrapper">
                                    <div class="inner" style="background: rgba(10, 25, 47, 0.75); padding: 40px; border-radius: 12px; backdrop-filter: blur(4px);">
                                        @if($slide->getTrans('subtitle'))
                                        <span class="sub-title" style="color: #F26820; font-weight: 700; letter-spacing: 1px;">{{ $slide->getTrans('subtitle') }}</span>
                                        @endif
                                        <h1 class="title text-white mt--10" style="line-height: 1.3;">{{ $slide->getTrans('title') }}</h1>
                                        <p class="disc text-white mt--15" style="opacity: 0.9;">{{ $slide->getTrans('description') }}</p>
                                        <div class="button-area-banner-one mt--30">
                                            <a href="{{ $slide->button_link ?: route('contact') }}" class="tmp-btn btn-primary">
                                                {{ $slide->getTrans('button_text') ?: ($isRtl ? 'استكشف المزيد' : 'Explore More') }}
                                            </a>
                                            <a href="{{ route('contact') }}" class="tmp-btn btn-secondary ms-3">
                                                {{ $isRtl ? 'اتصل بنا' : ($locale === 'fr' ? 'Contactez-nous' : 'Contact Us') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<!-- Services Section -->
<div class="tmp-services-area tmp-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head text-center mb--50">
                    <span class="sub-title" style="color: #F26820; font-weight: 700;">{{ $isRtl ? 'خدمات التصدير الدولية' : ($locale === 'fr' ? 'Nos Solutions d\'Exportation' : 'PREMIER EXPORT SOLUTIONS') }}</span>
                    <h2 class="title">{{ $isRtl ? 'حلول تجارية متكاملة تلبي معايير الأسواق العالمية' : ($locale === 'fr' ? 'Des solutions complètes pour le commerce mondial' : 'End-to-End Trade Sourcing & Maritime Freight') }}</h2>
                </div>
            </div>
        </div>

        <div class="row g-5">
            @foreach($services as $service)
            <div class="col-lg-3 col-md-6">
                <div class="single-services services-style-one" style="height: 100%; display: flex; flex-direction: column; justify-content: space-between; border-radius: 8px; box-shadow: 0 5px 25px rgba(0,0,0,0.05); padding: 30px; background: #fff;">
                    <div>
                        <div class="icon mb--25" style="font-size: 38px; color: #F26820;">
                            <i class="{{ $service->icon ?: 'fa-solid fa-ship' }}"></i>
                        </div>
                        <h4 class="title" style="font-size: 20px; line-height: 1.4;">
                            <a href="{{ route('service.details', $service->slug) }}">{{ $service->getTrans('title') }}</a>
                        </h4>
                        <p class="disc mt--15" style="color: #6a6c71; font-size: 15px;">{{ Str::limit($service->getTrans('description'), 130) }}</p>
                    </div>
                    <div class="mt--20">
                        <a href="{{ route('service.details', $service->slug) }}" class="read-more-btn" style="color: #102E54; font-weight: 700;">
                            {{ $isRtl ? 'عرض التفاصيل' : ($locale === 'fr' ? 'En savoir plus' : 'View Details') }} <i class="fa-solid {{ $isRtl ? 'fa-arrow-left' : 'fa-arrow-right' }} ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Counter / Export Metrics -->
<div class="tmp-counterup-area bg_image bg_image-2 tmp-section-gap" style="background: #0A192F;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-counterup text-center">
                    <h2 class="title text-white" style="font-size: 48px; font-weight: 800; color: #F26820 !important;">45+</h2>
                    <p class="disc text-white">{{ $isRtl ? 'دولة وميناء شحن حول العالم' : ($locale === 'fr' ? 'Pays et ports d\'exportation' : 'Global Destination Ports') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-counterup text-center">
                    <h2 class="title text-white" style="font-size: 48px; font-weight: 800; color: #F26820 !important;">350K+</h2>
                    <p class="disc text-white">{{ $isRtl ? 'طن متري من البضائع المشحونة' : ($locale === 'fr' ? 'Tonnes métriques exportées' : 'Metric Tons Cargo Exported') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-counterup text-center">
                    <h2 class="title text-white" style="font-size: 48px; font-weight: 800; color: #F26820 !important;">100%</h2>
                    <p class="disc text-white">{{ $isRtl ? 'مطابقة للمواصفات وفحوصات الجودة' : ($locale === 'fr' ? 'Conformité et certification' : 'Quality Inspection Compliance') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-counterup text-center">
                    <h2 class="title text-white" style="font-size: 48px; font-weight: 800; color: #F26820 !important;">24/7</h2>
                    <p class="disc text-white">{{ $isRtl ? 'متابعة وتتبع مباشر لحركة السفن' : ($locale === 'fr' ? 'Suivi maritime en continu' : 'Vessel & Cargo Tracking') }}</p>
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
                    <span class="sub-title" style="color: #F26820; font-weight: 700;">{{ $isRtl ? 'فريق إدارة التجارة والشحن' : ($locale === 'fr' ? 'Notre Équipe' : 'TRADE DESK LEADERSHIP') }}</span>
                    <h2 class="title">{{ $isRtl ? 'خبراء التجارة الدولية والشحن البحري' : ($locale === 'fr' ? 'Experts en commerce international et fret' : 'Decades of Commodity Export & Chartering Expertise') }}</h2>
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

<!-- Latest News / Insights -->
<div class="tmp-blog-area tmp-section-gap bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head text-center mb--50">
                    <span class="sub-title" style="color: #F26820; font-weight: 700;">{{ $isRtl ? 'الأخبار والتحليلات' : ($locale === 'fr' ? 'Actualités' : 'MARKET INSIGHTS') }}</span>
                    <h2 class="title">{{ $isRtl ? 'أحدث تطورات الأسواق والشحن التجاري' : ($locale === 'fr' ? 'Dernières nouvelles du commerce mondial' : 'Global Commodity Trends & Export Analysis') }}</h2>
                </div>
            </div>
        </div>

        <div class="row g-5">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6">
                <div class="single-blog" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); height: 100%; display: flex; flex-direction: column;">
                    <a href="{{ route('blog.details', $post->slug) }}" class="thumbnail">
                        <img src="{{ asset($post->thumbnail ?: 'assets/images/blog/details/01.png') }}" alt="{{ $post->getTrans('title') }}" style="width: 100%; height: 230px; object-fit: cover;">
                    </a>
                    <div class="inner" style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <div class="category" style="color: #F26820; font-weight: 700; font-size: 13px; margin-bottom: 8px;">
                                {{ $post->getTrans('category') ?: 'Export' }}
                            </div>
                            <h4 class="title" style="font-size: 18px; line-height: 1.4;">
                                <a href="{{ route('blog.details', $post->slug) }}">{{ $post->getTrans('title') }}</a>
                            </h4>
                            <p class="disc mt--10" style="color: #6a6c71; font-size: 14px;">{{ Str::limit($post->getTrans('excerpt'), 100) }}</p>
                        </div>
                        <div class="mt--20 pt--15 border-top d-flex justify-content-between align-items-center">
                            <span style="font-size: 13px; color: #999;"><i class="fa-regular fa-clock me-1"></i> {{ $post->read_time }}</span>
                            <a href="{{ route('blog.details', $post->slug) }}" style="color: #102E54; font-weight: 700; font-size: 14px;">
                                {{ $isRtl ? 'اقرأ المقال' : ($locale === 'fr' ? 'Lire la suite' : 'Read Article') }} &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
