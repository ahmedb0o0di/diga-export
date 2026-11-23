@extends('frontend.layouts.app')

@php
    $locale = app()->getLocale();
    $isRtl = ($locale === 'ar');
@endphp

@section('title', $post->getTrans('title') . ' - DIJA GROUP EXPORT')

@section('content')

<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title">{{ $isRtl ? 'تحليلات التجارة والتصدير' : 'Trade & Export Analysis' }}</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="{{ route('home') }}">{{ $isRtl ? 'الرئيسية' : 'Home' }}</a></li>
                        <li class="icon"><i class="fa-solid {{ $isRtl ? 'fa-angle-left' : 'fa-angle-right' }}"></i></li>
                        <li class="tmp-breadcrumb-item"><a href="{{ route('blog') }}">{{ $isRtl ? 'المدونة' : 'Blog' }}</a></li>
                        <li class="icon"><i class="fa-solid {{ $isRtl ? 'fa-angle-left' : 'fa-angle-right' }}"></i></li>
                        <li class="tmp-breadcrumb-item active">{{ Str::limit($post->getTrans('title'), 30) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Details Area -->
<div class="tmp-service-section tmp-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="blog-details-left-area bg-white p-4 p-md-5 rounded shadow-sm">
                    @if($post->thumbnail)
                    <div class="thumbnail mb--30">
                        <img src="{{ asset($post->thumbnail) }}" alt="{{ $post->getTrans('title') }}" style="width: 100%; max-height: 480px; object-fit: cover; border-radius: 10px;">
                    </div>
                    @endif

                    <div class="meta-info mb--20 pb--15 border-bottom d-flex align-items-center gap-3 text-muted" style="font-size: 14px;">
                        <span><i class="fa-regular fa-user me-1"></i> {{ $post->author }}</span>
                        <span>&bull;</span>
                        <span><i class="fa-regular fa-calendar me-1"></i> {{ $post->published_at ? $post->published_at->format('d M, Y') : 'Recent' }}</span>
                        <span>&bull;</span>
                        <span><i class="fa-regular fa-clock me-1"></i> {{ $post->read_time }}</span>
                        <span>&bull;</span>
                        <span class="badge bg-primary">{{ $post->getTrans('category') ?: 'Export' }}</span>
                    </div>

                    <h2 class="title mb--25" style="line-height: 1.4;">{{ $post->getTrans('title') }}</h2>

                    <div class="blog-content" style="font-size: 17px; line-height: 1.85; color: #333;">
                        {!! \Illuminate\Support\Str::markdown($post->getTrans('content')) !!}
                    </div>

                    <div class="quote-area-blog-details my--40 p-4 p-md-5 rounded" style="background: #0A192F; position: relative;">
                        <i class="fa-sharp fa-regular fa-quote-left fa-2x text-white-50 mb-3 d-block"></i>
                        <p class="disc text-white mb--15" style="font-size: 20px; font-weight: 500; line-height: 1.6;">
                            {{ $isRtl ? 'في التجارة الدولية للسلع، يعد الوضوح التعاقدي ركيزة الربحية الأولى. إن مواءمة شروط الإنكوترمز مع قدرات الاستقبال بميناء الوصول يجنبك غرامات التأخير وأية رسوم مينائية مفاجئة.' : '"In international commodity trading, contractual clarity is the foundation of profitability. Harmonizing Incoterms with destination port capabilities prevents costly demurrage and delays."' }}
                        </p>
                        <span class="author text-primary" style="font-weight: 700;">{{ $isRtl ? 'مدير اللوجستيات البحرية — مجموعة ديجا للتصدير' : 'Marine Logistics Directorate — DIJA Group Export' }}</span>
                    </div>

                    <div class="share-box pt--25 border-top d-flex justify-content-between align-items-center">
                        <span class="fw-bold">{{ $isRtl ? 'مشاركة هذا التحليل:' : 'Share this analysis:' }}</span>
                        <div class="social-share d-flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-outline-secondary btn-sm"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->getTrans('title')) }}" target="_blank" class="btn btn-outline-secondary btn-sm"><i class="fa-brands fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-outline-secondary btn-sm"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Recent Posts Section -->
                @if($recentPosts->count() > 0)
                <div class="recent-posts-section mt--50">
                    <h3 class="mb--30">{{ $isRtl ? 'مقالات ذات صلة' : 'Related Trade Insights' }}</h3>
                    <div class="row g-4">
                        @foreach($recentPosts as $rPost)
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm" style="border-radius: 8px; overflow: hidden;">
                                <img src="{{ asset($rPost->thumbnail ?: 'assets/images/blog/details/01.png') }}" class="card-img-top" alt="{{ $rPost->getTrans('title') }}" style="height: 180px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 16px; line-height: 1.4;">
                                        <a href="{{ route('blog.details', $rPost->slug) }}" class="text-dark">{{ Str::limit($rPost->getTrans('title'), 60) }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
