@extends('frontend.layouts.app')

@php
    $locale = app()->getLocale();
    $isRtl = ($locale === 'ar');
@endphp

@section('title', ($isRtl ? 'المدونة والأخبار - مجموعة ديجا للتصدير' : 'Trade News & Insights - DIJA GROUP EXPORT'))

@section('content')

<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title">{{ $isRtl ? 'أخبار وتحليلات التجارة الدولية' : ($locale === 'fr' ? 'Actualités & Analyses du Commerce' : 'Trade Desk News & Market Reports') }}</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="{{ route('home') }}">{{ $isRtl ? 'الرئيسية' : 'Home' }}</a></li>
                        <li class="icon"><i class="fa-solid {{ $isRtl ? 'fa-angle-left' : 'fa-angle-right' }}"></i></li>
                        <li class="tmp-breadcrumb-item active">{{ $isRtl ? 'المدونة' : 'Blog' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Grid Section -->
<div class="tmp-blog-area tmp-section-gap">
    <div class="container">
        <div class="row g-5">
            @forelse($posts as $post)
            <div class="col-lg-4 col-md-6">
                <div class="single-blog" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); height: 100%; display: flex; flex-direction: column;">
                    <a href="{{ route('blog.details', $post->slug) }}" class="thumbnail">
                        <img src="{{ asset($post->thumbnail ?: 'assets/images/blog/details/01.png') }}" alt="{{ $post->getTrans('title') }}" style="width: 100%; height: 240px; object-fit: cover;">
                    </a>
                    <div class="inner" style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <div class="category" style="color: #F26820; font-weight: 700; font-size: 13px; margin-bottom: 8px;">
                                {{ $post->getTrans('category') ?: 'Export Insights' }}
                            </div>
                            <h4 class="title" style="font-size: 18px; line-height: 1.45;">
                                <a href="{{ route('blog.details', $post->slug) }}">{{ $post->getTrans('title') }}</a>
                            </h4>
                            <p class="disc mt--10" style="color: #6a6c71; font-size: 14px; line-height: 1.7;">{{ Str::limit($post->getTrans('excerpt'), 120) }}</p>
                        </div>
                        <div class="mt--20 pt--15 border-top d-flex justify-content-between align-items-center">
                            <span style="font-size: 13px; color: #999;"><i class="fa-regular fa-clock me-1"></i> {{ $post->read_time }}</span>
                            <a href="{{ route('blog.details', $post->slug) }}" style="color: #102E54; font-weight: 700; font-size: 14px;">
                                {{ $isRtl ? 'اقرأ المقال' : 'Read More' }} &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <h4>{{ $isRtl ? 'لا توجد مقالات حالياً' : 'No articles published yet.' }}</h4>
            </div>
            @endforelse
        </div>

        <div class="row mt--40">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
