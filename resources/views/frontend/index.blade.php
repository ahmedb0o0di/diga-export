@extends('frontend.layouts.app')

@php
    $locale = app()->getLocale();
    $isRtl = ($locale === 'ar');
    $siteName = \App\Models\Setting::get('site_name', 'DIJA Group Export');
    $sitePhone = \App\Models\Setting::get('contact_phone', '+1 (800) 555-DIJA');
    $siteEmail = \App\Models\Setting::get('contact_email', 'export@dijagroup.com');
    $siteAddress = \App\Models\Setting::get('contact_address', 'Houston Port Trade Hub, TX 77002, USA');
@endphp

@section('content')

<!-- ==================== 1. HERO SWIPER BANNER ==================== -->
<div class="tmp-banner-swiper-one-area">
    <div class="swiper mySwiper-banner-one">
        <div class="swiper-wrapper">
            @foreach($slides as $slide)
            @php
                $slideImg = $slide->image;
                if (!$slideImg || str_contains($slideImg, 'bg-01')) {
                    $slideImg = 'assets/images/banner/01.jpg';
                } elseif (str_contains($slideImg, 'bg-02')) {
                    $slideImg = 'assets/images/banner/04.jpg';
                } elseif (str_contains($slideImg, 'bg-03')) {
                    $slideImg = 'assets/images/banner/05.jpg';
                }
            @endphp
            <div class="swiper-slide">
                <div class="tmp-banner-area bg_image banner-one-height-control tmp-section-gap" style="background-image: url('{{ asset($slideImg) }}'); background-size: cover; background-position: center;">
                    <div class="shape-image-banner-one">
                        <img src="{{ asset('assets/images/banner/shape/01.png') }}" alt="banner" class="one">
                        <img src="{{ asset('assets/images/banner/shape/02.png') }}" alt="banner" class="two">
                        <img src="{{ asset('assets/images/banner/shape/03.png') }}" alt="banner" class="three">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="banner-one-main-wrapper">
                                    <div class="inner" style="background: rgba(10, 25, 47, 0.78); padding: 40px; border-radius: 12px; backdrop-filter: blur(5px);">
                                        @if($slide->getTrans('subtitle'))
                                        <span class="sub-title" style="color: #F26820; font-weight: 700; letter-spacing: 1px;">{{ $slide->getTrans('subtitle') }}</span>
                                        @endif
                                        <h1 class="title text-white mt--10" style="line-height: 1.3;">{{ $slide->getTrans('title') }}</h1>
                                        <p class="disc text-white mt--15" style="opacity: 0.95; font-size: 16px;">{{ $slide->getTrans('description') }}</p>
                                        <div class="button-area-banner-one mt--30">
                                            <a href="{{ $slide->button_link ?: route('services') }}" class="tmp-btn btn-primary">
                                                {{ $slide->getTrans('button_text') ?: ($isRtl ? 'استكشف الخدمات' : 'Explore Export Services') }}
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
        <div class="swiper-button-next" data-tmp-cursor="md transparent fw-bold" data-tmp-cursor-text="Next"></div>
        <div class="swiper-button-prev" data-tmp-cursor="md transparent fw-bold" data-tmp-cursor-text="Prev"></div>
    </div>
</div>

<!-- ==================== 2. ABOUT DIJA GROUP EXPORT ==================== -->
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
                                <a href="#" class="avatar"><img src="{{ asset('assets/images/about/4.png') }}" alt="Trade partner"></a>
                                <a href="#" class="avatar"><img src="{{ asset('assets/images/about/5.png') }}" alt="Trade partner"></a>
                                <a href="#" class="avatar"><img src="{{ asset('assets/images/about/6.png') }}" alt="Trade partner"></a>
                                <a href="#" class="avatar"><img src="{{ asset('assets/images/about/7.png') }}" alt="Trade partner"></a>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="tmp-btn btn-secondary mt--30">
                        {{ $isRtl ? 'طلب عرض أسعار' : ($locale === 'fr' ? 'Demander un devis' : 'Request A Quote') }}
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-inner">
                    <div class="section-head text-align-left section-head-one-side">
                        <div class="section-sub-title">
                            <img src="{{ asset('assets/images/services/section-custom-menubar.png') }}" alt="DIJA Export Services">
                            <span class="subtitle">{{ $isRtl ? 'عن مجموعة ديجا للتصدير' : ($locale === 'fr' ? 'À PROPOS DE DIJA GROUP' : 'ABOUT DIJA GROUP EXPORT') }}</span>
                        </div>
                        <h2 class="title split-collab">
                            {{ $isRtl ? 'بوابتكم الموثوقة لتصدير السلع والبضائع للأسواق العالمية' : ($locale === 'fr' ? 'Votre passerelle de confiance pour l\'exportation de marchandises' : 'Your Trusted Gateway To Global Commodity & Goods Export') }}
                        </h2>
                    </div>

                    <p class="description">
                        {{ $isRtl ? 'تربط مجموعة ديجا للتصدير كبرى المزارع والمصانع المعتمدة بأهم المستوردين وتجار الجملة في أكثر من 45 دولة حول العالم. نتولى إدارة عمليات التصدير بالكامل بدءاً من الفحص المخبري وسحب العينات وحتى الشحن البحري واستخراج بوالص الشحن النظيفة وإنهاء التخليص الجمركي.' : ($locale === 'fr' ? 'DIJA Group Export relie les producteurs certifiés aux principaux importateurs internationaux dans plus de 45 pays, gérant l\'intégralité du processus d\'exportation, du contrôle qualité au fret maritime et au dédouanement.' : 'DIJA Group Export connects certified origin producers with premier international importers, managing end-to-end maritime shipping, third-party laboratory verification, and customs clearance with zero hidden surprises.') }}
                    </p>

                    <div class="single-progress-area progress-stye-one mt--30">
                        <div class="progress-top">
                            <p class="name">{{ $isRtl ? 'شحنات السلع الزراعية والصناعية (طن متري)' : 'Commodity Cargoes (MT Delivered)' }}</p>
                            <span class="parcent">92%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar wow fadeInLeft bg--primary" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="single-progress-area progress-stye-one mt--20">
                        <div class="progress-top">
                            <p class="name">{{ $isRtl ? 'مطابقة الفحوصات والشهادات الدولية (SGS / Intertek)' : 'International Inspection Compliance' }}</p>
                            <span class="parcent">100%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar wow fadeInLeft bg--primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== 3. EXPORT SERVICES GRID ==================== -->
<div class="tmp-services-area services-style--1 background-image-services bg_image tmp-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head text-center mb--50">
                    <div class="section-sub-title center-title">
                        <img src="{{ asset('assets/images/services/section-custom-menubar.png') }}" alt="DIJA Export Services">
                        <span class="subtitle">{{ $isRtl ? 'خدمات التصدير الدولية' : ($locale === 'fr' ? 'NOS SERVICES' : 'OUR EXPORT SERVICES') }}</span>
                    </div>
                    <h2 class="title split-collab">
                        {{ $isRtl ? 'حلول تصديرية شاملة للمستوردين وتجار الجملة حول العالم' : ($locale === 'fr' ? 'Des solutions complètes pour les importateurs et grossistes' : 'Comprehensive Solutions for Global Importers & Wholesalers') }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="row g-5">
            @foreach($services as $index => $service)
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="single-services service-style-one h-100">
                    <div class="services-inner with-shadow card-bg-color h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="thumbnail mb--20">
                                <div class="icon" style="font-size: 38px; color: #F26820; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; background: rgba(242, 104, 32, 0.1); border-radius: 8px;">
                                    <i class="{{ $service->icon ?: 'fa-solid fa-ship' }}"></i>
                                </div>
                            </div>
                            <div class="services-content">
                                <a href="{{ route('service.details', $service->slug) }}">
                                    <h5 class="title">{{ $service->getTrans('title') }}</h5>
                                </a>
                                <p class="desctiption mt--10">
                                    {{ Str::limit($service->getTrans('description'), 130) }}
                                </p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt--20 pt--15 border-top">
                            <a href="{{ route('service.details', $service->slug) }}" class="icon angle-roted">
                                <i class="fa-solid {{ $isRtl ? 'fa-arrow-left' : 'fa-arrow-right' }}"></i>
                            </a>
                            <div class="number text-muted fw-bold" style="font-size: 20px; opacity: 0.4;">
                                0{{ $index + 1 }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row mt--40">
            <div class="col-lg-12">
                <div class="services-bottom">
                    <div class="services-bottom-inner">
                        <p class="description">
                            {{ $isRtl ? 'هل تحتاج إلى مواصفات خاصة أو استئجار سفينة صب مخصصة؟' : ($locale === 'fr' ? 'Besoin de spécifications particulières ou d\'affrètement maritime ?' : 'Need customized commodity specifications or dedicated vessel chartering?') }}
                        </p>
                        <p class="description">
                            <a href="{{ route('contact') }}" class="btn-simple" style="color: #F26820; font-weight: 700; text-decoration: underline;">
                                {{ $isRtl ? 'تحدث مع مكتب تداول التصدير لدينا' : ($locale === 'fr' ? 'Contactez notre desk commercial' : 'Consult Our Trade Logistics Team') }} &rarr;
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== 4. 4-STAGE EXPORT WORK PROCESS ==================== -->
<div class="tpm-services-process-area tmp-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head text-center mb--50">
                    <div class="section-sub-title center-title">
                        <img src="{{ asset('assets/images/services/section-custom-menubar.png') }}" alt="DIJA Export Services">
                        <span class="subtitle">{{ $isRtl ? 'منهجية العمل والتصدير' : ($locale === 'fr' ? 'NOTRE PROCESSUS' : 'OUR WORK PROCESS') }}</span>
                    </div>
                    <h2 class="title split-collab">
                        {{ $isRtl ? 'دورة حياة التصدير والشحن في 4 مراحل متكاملة' : ($locale === 'fr' ? 'Notre cycle d\'exportation en étapes clés' : 'Our 4-Stage Global Export Lifecycle') }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-services h-100">
                    <div class="services-inner h-100">
                        <div class="thumbnail thumbnail-rounded border-top-left hover-animation">
                            <img src="{{ asset('assets/images/services/services-round-1.png') }}" alt="Origin Sourcing">
                            <div class="number-bg-round">
                                <span>01</span>
                            </div>
                        </div>
                        <div class="services-content services-content-style-1 text-center mt--20">
                            <h5 class="title">{{ $isRtl ? '1. توريد السلع وهيكلة العقود' : '1. Origin Sourcing & Contract Structuring' }}</h5>
                            <p class="description">
                                {{ $isRtl ? 'التعاقد المباشر مع المزارع والمناجم المعتمدة لضمان الكميات المطلوبة وأسعار فوب (FOB) وسيف (CIF) التنافسية.' : 'Direct contracts with verified origin producers and mills ensuring volume certainty and transparent FOB/CIF pricing.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-services h-100">
                    <div class="services-inner h-100">
                        <div class="thumbnail thumbnail-rounded border-top-left hover-animation">
                            <img src="{{ asset('assets/images/services/services-round-2.png') }}" alt="Quality Grading">
                            <div class="number-bg-round">
                                <span>02</span>
                            </div>
                        </div>
                        <div class="services-content services-content-style-1 text-center mt--20">
                            <h5 class="title">{{ $isRtl ? '2. فحص الجودة والتعبئة الدولية' : '2. Quality Grading & Export Packaging' }}</h5>
                            <p class="description">
                                {{ $isRtl ? 'فحوصات مخبرية معتمدة من SGS وIntertek، وإصدار شهادات الحجر الزراعي، وتعبئة الحاويات بأعلى المعايير.' : 'Stringent third-party laboratory analysis (SGS, ISO), phytosanitary grading, export packing, and supervised stuffing.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-services h-100">
                    <div class="services-inner h-100">
                        <div class="thumbnail thumbnail-rounded border-top-left hover-animation">
                            <img src="{{ asset('assets/images/services/services-round-3.png') }}" alt="Customs & Port Logistics">
                            <div class="number-bg-round">
                                <span>03</span>
                            </div>
                        </div>
                        <div class="services-content services-content-style-1 text-center mt--20">
                            <h5 class="title">{{ $isRtl ? '3. التخليص الجمركي والشحن البحري' : '3. Customs Clearance & Port Logistics' }}</h5>
                            <p class="description">
                                {{ $isRtl ? 'استخراج بوالص الشحن النظيفة، وتصديق القنصليات، وتنسيق إبحار السفن دون أية غرامات تأخير بموانئ الوصول.' : 'Clean Bills of Lading, Certificates of Origin, consular legalization, scheduled vessel dispatch, and zero demurrage.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== 5. FAQ SECTION ==================== -->
<div class="faq-area faq-style-one faq-bg-image bg_image tmp-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head text-center mb--50">
                    <div class="section-sub-title center-title">
                        <img src="{{ asset('assets/images/services/section-custom-menubar.png') }}" alt="DIJA Export Services">
                        <span class="subtitle">{{ $isRtl ? 'الأسئلة الشائعة حول التصدير' : ($locale === 'fr' ? 'QUESTIONS FRÉQUENTES' : 'QUESTION AND ANSWERS') }}</span>
                    </div>
                    <h2 class="title split-collab">
                        {{ $isRtl ? 'إجابات شاملة لشركائنا والمستوردين' : ($locale === 'fr' ? 'Tout savoir sur nos procédures d\'exportation' : 'Frequently Asked Export Questions') }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="thumbnail">
                    <img src="{{ asset('assets/images/faq/faq-1.png') }}" alt="DIJA Group Export FAQ">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="faq-accordion">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <div class="accordion-header" id="headingOne">
                                <div class="accordion-button" data-bs-toggle="collapse" role="button" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="accordion-button-left">
                                        <i class="fa-regular fa-question"></i>
                                        <span>{{ $isRtl ? 'ما هي ضمانات الجودة التي تقدمونها للشحنات المصدرة؟' : 'What quality guarantees do you provide for export shipments?' }}</span>
                                    </div>
                                    <div class="accordion-button-right">
                                        <i class="fa-sharp fa-light fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{ $isRtl ? 'تخضع كافة شحناتنا لفحوصات مسبقة من كبرى الهيئات الدولية (SGS وIntertek وBureau Veritas) للتحقق من نسب النقاوة، والرطوبة، والخلو من الآفات، مع تقديم شهادات صحة نباتية رسمية معتمدة.' : 'Every shipment is certified by accredited international surveyors (SGS, Intertek) verifying moisture content, purity, grading, and phytosanitary clearance before container seals are affixed.' }}
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <div class="accordion-header" id="headingTwo">
                                <div class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="accordion-button-left">
                                        <i class="fa-regular fa-question"></i>
                                        <span>{{ $isRtl ? 'ما هي شروط الإنكوترمز (Incoterms) التي تدعمونها في العقود؟' : 'Which Incoterms do you support for international contracts?' }}</span>
                                    </div>
                                    <div class="accordion-button-right">
                                        <i class="fa-sharp fa-light fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{ $isRtl ? 'ندعم كافة شروط التجارة الدولية الأساسية، وأكثرها طلباً هي FOB (التسليم على ظهر السفينة بميناء الشحن)، وCIF (التكلفة والتأمين ونولون الشحن حتى ميناء الوصول)، وCFR حسب رغبة المشتري.' : 'We routinely execute contracts under FOB (Free on Board), CIF (Cost, Insurance & Freight), and CFR (Cost and Freight), tailoring terms to each client\'s logistics requirements.' }}
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <div class="accordion-header" id="headingThree">
                                <div class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <div class="accordion-button-left">
                                        <i class="fa-regular fa-question"></i>
                                        <span>{{ $isRtl ? 'ما هي المدة الزمنية المعتادة من توقيع العقد وحتى إبحار الشحنة؟' : 'What is the standard lead time from contract signing to port dispatch?' }}</span>
                                    </div>
                                    <div class="accordion-button-right">
                                        <i class="fa-sharp fa-light fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{ $isRtl ? 'تتراوح المدة عادة بين 7 إلى 14 يوم عمل حسب حجم الطلبية ونوع السلعة والتغليف المطلوب، مع إشعار المشتري بجداول رسو وإبحار السفن أولاً بأول.' : 'Standard dispatch lead times range between 7 to 14 business days, depending on packaging specifications and scheduled carrier vessel bookings.' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-buttom mt--30">
                        <h5 class="title">{{ $isRtl ? 'هل لديك استفسارات إضافية؟' : 'Still Have More Questions?' }}</h5>
                        <p>{{ $isRtl ? 'تواصل مباشرة مع' : 'Contact Our' }} <a href="{{ route('contact') }}">{{ $isRtl ? 'فريق الدعم والخبراء التجاريين' : 'Expert Trade Logistics Desk' }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== 6. METRICS & COUNTERUP ==================== -->
<div class="tmp-counterup-area tmp-section-gapTop" style="background: #0A192F; padding-bottom: 70px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head text-center mb--40">
                    <div class="section-sub-title center-title">
                        <img src="{{ asset('assets/images/services/section-custom-menubar.png') }}" alt="DIJA Export Services">
                        <span class="subtitle" style="color: #F26820;">{{ $isRtl ? 'إنجازات وموثوقية بالأرقام' : 'PROVEN TRACK RECORD' }}</span>
                    </div>
                    <h2 class="title text-white split-collab">{{ $isRtl ? 'حجم العمليات التصديرية العالمية' : 'Global Export Volumes & Capabilities' }}</h2>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="count-box counter-style-4 text-center">
                    <h3 class="title" style="color: #F26820; font-size: 46px; font-weight: 800;">45+</h3>
                    <h5 class="counter-title text-white">{{ $isRtl ? 'موانئ شحن وتفريغ دولية' : 'Global Destination Ports' }}</h5>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="count-box counter-style-4 text-center">
                    <h3 class="title" style="color: #F26820; font-size: 46px; font-weight: 800;">350K+</h3>
                    <h5 class="counter-title text-white">{{ $isRtl ? 'طن متري من البضائع المشحونة' : 'Metric Tons Cargo Exported' }}</h5>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="count-box counter-style-4 text-center">
                    <h3 class="title" style="color: #F26820; font-size: 46px; font-weight: 800;">100%</h3>
                    <h5 class="counter-title text-white">{{ $isRtl ? 'مطابقة لفحوصات الجودة' : 'Quality Inspection Compliance' }}</h5>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="count-box counter-style-4 text-center">
                    <h3 class="title" style="color: #F26820; font-size: 46px; font-weight: 800;">24/7</h3>
                    <h5 class="counter-title text-white">{{ $isRtl ? 'متابعة وتتبع خطوط السفن' : 'Vessel & Cargo Tracking' }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== 7. EXECUTIVE TRADE TEAM ==================== -->
<div class="team-area tmp-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head text-center mb--50">
                    <div class="section-sub-title center-title">
                        <img src="{{ asset('assets/images/services/section-custom-menubar.png') }}" alt="DIJA Export Services">
                        <span class="subtitle">{{ $isRtl ? 'قيادات التداول والشحن البحري' : ($locale === 'fr' ? 'NOTRE ÉQUIPE' : 'LEADERSHIP & TRADE SPECIALISTS') }}</span>
                    </div>
                    <h2 class="title split-collab">
                        {{ $isRtl ? 'فريق إدارة العمليات والتجارة الدولية' : ($locale === 'fr' ? 'Des experts dédiés à vos opérations d\'exportation' : 'Experienced Trade & Maritime Logistics Team') }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="row g-5">
            @foreach($team as $member)
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="single-team text-center h-100" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); padding-bottom: 25px;">
                    <div class="thumbnail mb--20">
                        <img src="{{ asset($member->photo ?: 'assets/images/team/team-1.png') }}" alt="{{ $member->getTrans('name') }}" style="width: 100%; height: 320px; object-fit: cover;">
                    </div>
                    <div class="content px-3">
                        <h5 class="name mb--5">{{ $member->getTrans('name') }}</h5>
                        <div class="designation" style="color: #F26820; font-weight: 600;">{{ $member->getTrans('designation') }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- ==================== 8. BRAND PARTNERS ==================== -->
<div class="brand-area tmp-section-gap pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-inner">
                    <ul class="brand-list brand-style-1 justify-content-center justify-content-lg-between">
                        <li><img src="{{ asset('assets/images/brand/brand-1.png') }}" alt="Brand 1"></li>
                        <li><img src="{{ asset('assets/images/brand/brand-2.png') }}" alt="Brand 2"></li>
                        <li><img src="{{ asset('assets/images/brand/brand-3.png') }}" alt="Brand 3"></li>
                        <li><img src="{{ asset('assets/images/brand/brand-4.png') }}" alt="Brand 4"></li>
                        <li><img src="{{ asset('assets/images/brand/brand-5.png') }}" alt="Brand 5"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== 9. HOMEPAGE CONTACT & QUOTE FORM ==================== -->
<div class="contact-area-three tmp-section-gapTop" style="margin-top: 50px;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="contact-inner">
                    <div class="section-head section-head-one-side text-align-left">
                        <span class="title" style="font-size: 28px; font-weight: 800; color: #102E54;">
                            {{ $isRtl ? 'مكتب تداول وتصدير البضائع' : 'Global Export Trade Desk' }}
                        </span>
                        <p class="description mt--15">
                            {{ $isRtl ? 'يسعدنا استقبال استفسارات المستوردين والشركات التجارية حول العالم، وتوفير عروض أسعار تفصيلية لجميع السلع ومسارات الشحن.' : 'DIJA Group Export connects certified origin producers with premier international importers, managing end-to-end maritime shipping and customs clearance.' }}
                        </p>
                    </div>

                    <ul class="ft-link ft-link-style-three mt--30">
                        <li class="mb-3">
                            <div class="single-contact background-transparent d-flex align-items-center">
                                <div class="icon me-3" style="font-size: 24px; color: #F26820; width: 45px;"><i class="fa-solid fa-phone"></i></div>
                                <div class="content">
                                    <span class="text-muted d-block small">{{ $isRtl ? 'الهاتف المباشر' : 'Direct Line' }}</span>
                                    <a class="contact-here fw-bold" href="tel:{{ $sitePhone }}">{{ $sitePhone }}</a>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="single-contact background-transparent d-flex align-items-center">
                                <div class="icon me-3" style="font-size: 24px; color: #F26820; width: 45px;"><i class="fa-solid fa-envelope"></i></div>
                                <div class="content">
                                    <span class="text-muted d-block small">{{ $isRtl ? 'البريد الإلكتروني' : 'Email Inquiry' }}</span>
                                    <a class="contact-here fw-bold" href="mailto:{{ $siteEmail }}">{{ $siteEmail }}</a>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="single-contact background-transparent d-flex align-items-center">
                                <div class="icon me-3" style="font-size: 24px; color: #F26820; width: 45px;"><i class="fa-solid fa-location-dot"></i></div>
                                <div class="content">
                                    <span class="text-muted d-block small">{{ $isRtl ? 'العنوان' : 'Office Address' }}</span>
                                    <span class="fw-bold">{{ $siteAddress }}</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="contact-inner" style="background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 10px 40px rgba(0,0,0,0.06);">
                    <div class="section-head section-head-one-side text-align-left mb--30">
                        <span class="title" style="font-size: 24px; font-weight: 800; color: #102E54;">
                            {{ $isRtl ? 'طلب عرض أسعار فوري' : ($locale === 'fr' ? 'Demande de Cotation Immédiate' : 'REQUEST AN EXPORT QUOTATION') }}
                        </span>
                        <p class="description mt--10">
                            {{ $isRtl ? 'املأ البيانات أدناه وسيتواصل معكم فريق العمليات اللوجستية خلال ساعات قليلة.' : 'Provide your shipment requirements below to receive a competitive FOB/CIF quotation from our trade desk.' }}
                        </p>
                    </div>

                    <form action="{{ route('inquiry.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="quote">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input class="form-control" name="name" placeholder="{{ $isRtl ? 'الاسم الكامل *' : 'Your Full Name *' }}" type="text" required>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="email" placeholder="{{ $isRtl ? 'البريد الإلكتروني *' : 'Work Email *' }}" type="email" required>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="phone" placeholder="{{ $isRtl ? 'رقم الهاتف / واتساب' : 'Phone / WhatsApp' }}" type="text">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="company" placeholder="{{ $isRtl ? 'اسم الشركة' : 'Company Name' }}" type="text">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="destination_country" placeholder="{{ $isRtl ? 'ميناء أو دولة الوصول' : 'Destination Port / Country' }}" type="text">
                            </div>
                            <div class="col-md-6">
                                <select class="form-select" name="service_interest">
                                    <option value="">{{ $isRtl ? '-- حدد السلعة أو الخدمة --' : '-- Select Commodity / Service --' }}</option>
                                    @foreach($services as $serv)
                                        <option value="{{ $serv->getTrans('title') }}">{{ $serv->getTrans('title') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" rows="4" placeholder="{{ $isRtl ? 'المواصفات المطلوبة، الكمية بالطن المتري، شروط الشحن المفضلة...' : 'Required commodity specifications, estimated volume (MT), preferred Incoterms...' }}" name="message" required></textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="tmp-btn btn-primary px-5 py-3" type="submit">
                                    {{ $isRtl ? 'إرسال طلب التسعير' : ($locale === 'fr' ? 'Envoyer la demande' : 'Submit Quotation Request') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== 10. LATEST NEWS & TRADE INSIGHTS ==================== -->
<div class="tmp-blog-area tmp-section-gap bg-light mt--50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head text-center mb--50">
                    <div class="section-sub-title center-title">
                        <img src="{{ asset('assets/images/services/section-custom-menubar.png') }}" alt="DIJA Export Services">
                        <span class="subtitle">{{ $isRtl ? 'الأخبار والتحليلات التصديرية' : ($locale === 'fr' ? 'ANALYSES & ACTUALITÉS' : 'GLOBAL TRADE INSIGHTS') }}</span>
                    </div>
                    <h2 class="title split-collab">
                        {{ $isRtl ? 'أحدث تطورات الأسواق والشحن التجاري' : ($locale === 'fr' ? 'Derniers articles et analyses du marché' : 'Latest News & Trade Insights') }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="row g-5">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="single-blog h-100" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                    <a href="{{ route('blog.details', $post->slug) }}" class="thumbnail">
                        <img src="{{ asset($post->thumbnail ?: 'assets/images/blog/details/01.png') }}" alt="{{ $post->getTrans('title') }}" style="width: 100%; height: 230px; object-fit: cover;">
                    </a>
                    <div class="inner p-4 flex-grow-1 d-flex flex-column justify-content-between">
                        <div>
                            <div class="category" style="color: #F26820; font-weight: 700; font-size: 13px; margin-bottom: 8px;">
                                {{ $post->getTrans('category') ?: 'Global Trade' }}
                            </div>
                            <h5 class="title" style="line-height: 1.4;">
                                <a href="{{ route('blog.details', $post->slug) }}">{{ $post->getTrans('title') }}</a>
                            </h5>
                            <p class="disc mt--10 text-muted" style="font-size: 14px;">
                                {{ Str::limit($post->getTrans('excerpt'), 110) }}
                            </p>
                        </div>
                        <div class="mt--20 pt--15 border-top d-flex justify-content-between align-items-center">
                            <span class="small text-muted"><i class="fa-regular fa-clock me-1"></i> {{ $post->read_time }}</span>
                            <a href="{{ route('blog.details', $post->slug) }}" style="color: #102E54; font-weight: 700; font-size: 14px;">
                                {{ $isRtl ? 'اقرأ المقال' : ($locale === 'fr' ? 'Lire la suite' : 'Read More') }} &rarr;
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
