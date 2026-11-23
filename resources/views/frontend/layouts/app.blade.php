<!DOCTYPE html>
@php
    $locale = app()->getLocale();
    $isRtl = ($locale === 'ar');
    $siteName = \App\Models\Setting::get('site_name', 'DIJA GROUP EXPORT');
    $siteSlogan = \App\Models\Setting::get('site_slogan', 'Global Commodity Sourcing & International Export Solutions');
    $headerLogo = \App\Models\Setting::get('header_logo', 'assets/images/logo/dija-logo.png');
    $footerLogo = \App\Models\Setting::get('footer_logo', 'assets/images/logo/logo-white.png');
    $contactEmail = \App\Models\Setting::get('contact_email', 'export@dijagroup.com');
    $contactPhone = \App\Models\Setting::get('contact_phone', '+1 (800) 555-DIJA');
    $contactAddress = \App\Models\Setting::get('contact_address', 'Houston Port Trade Hub, TX 77002, USA');
    $workingHours = \App\Models\Setting::get('working_hours', 'Trading Desk: Mon - Sat 8:00 AM – 8:00 PM (UTC-6)');
    $fb = \App\Models\Setting::get('facebook_url', '#');
    $tw = \App\Models\Setting::get('twitter_url', '#');
    $in = \App\Models\Setting::get('linkedin_url', '#');
    $insta = \App\Models\Setting::get('instagram_url', '#');
@endphp
<html lang="{{ $locale }}" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}">
    <title>@yield('title', $siteName . ' - ' . $siteSlogan)</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&family=Prompt:wght@300;400;500;600;700;800&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    @if($isRtl)
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    @endif

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/cursor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset($isRtl ? 'assets/css/vendor/bootstrap.rtl.min.css' : 'assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/metismenu.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @if($isRtl)
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}">
    @endif

    @stack('styles')
</head>

<body class="@yield('body-class', 'index-one') {{ $isRtl ? 'rtl' : '' }}">

    <!-- Header Area -->
    <header class="tmp-header-area-start header-one">
        <div class="header-top-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-top-inner">
                            <div class="left-information-area">
                                <p class="left-top">{{ $siteSlogan }}</p>
                            </div>
                            <div class="right-header-top">
                                <div class="social-area-transparent">
                                    <span>{{ $isRtl ? 'تابعنا على' : ($locale === 'fr' ? 'Suivez-nous' : 'Follow on') }}</span>
                                    <a href="{{ $fb }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="{{ $tw }}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="{{ $in }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="{{ $insta }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-header-one-wrapper">
                        <div class="header-mida-area">
                            <div class="logo-area-start">
                                <a class="logo" href="{{ route('home') }}">
                                    <img src="{{ asset($headerLogo) }}" alt="{{ $siteName }}">
                                </a>
                            </div>
                            <div class="mid-header-center"></div>
                            <a href="{{ route('contact') }}" class="tmp-btn btn-primary">
                                {{ $isRtl ? 'طلب عرض أسعار' : ($locale === 'fr' ? 'Demander un devis' : 'REQUEST QUOTE') }}
                            </a>
                        </div>

                        <div class="tmp-nav-area-one header--sticky">
                            <div class="logo-md-sm-device">
                                <a href="{{ route('home') }}" class="logo">
                                    <img src="{{ asset($headerLogo) }}" alt="{{ $siteName }}">
                                </a>
                            </div>

                            <div class="header-nav main-nav-one">
                                <nav>
                                    <ul class="parent-nav">
                                        <li>
                                            <a class="nav-link" href="{{ route('home') }}">
                                                <span class="nav-link-text">{{ $isRtl ? 'الرئيسية' : ($locale === 'fr' ? 'Accueil' : 'HOME') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ route('about') }}">
                                                <span class="nav-link-text">{{ $isRtl ? 'من نحن' : ($locale === 'fr' ? 'À propos' : 'ABOUT') }}</span>
                                            </a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a class="nav-link" href="{{ route('services') }}">
                                                <span class="nav-link-text">{{ $isRtl ? 'خدماتنا' : ($locale === 'fr' ? 'Services' : 'SERVICES') }}</span>
                                            </a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('services') }}">{{ $isRtl ? 'خدمات التصدير' : ($locale === 'fr' ? 'Services d\'exportation' : 'Export Services') }}</a></li>
                                                <li><a href="{{ route('contact') }}">{{ $isRtl ? 'حلول الشحن المخصصة' : ($locale === 'fr' ? 'Solutions sur mesure' : 'Custom Shipping Solutions') }}</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ route('blog') }}">
                                                <span class="nav-link-text">{{ $isRtl ? 'المدونة' : ($locale === 'fr' ? 'Blog' : 'BLOG') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ route('contact') }}">
                                                <span class="nav-link-text">{{ $isRtl ? 'اتصل بنا' : ($locale === 'fr' ? 'Contact' : 'CONTACT') }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                            <div class="actions-area">
                                <div class="tmp-side-collups-area" id="side-collups">
                                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
                                        <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
                                        <rect width="20" height="2" fill="#1F1F25"></rect>
                                    </svg>
                                </div>
                                <div class="language-picker">
                                    <div class="js">
                                        <div class="language-picker js-language-picker" data-trigger-class="btn btn--subtle">
                                            <form action="" class="language-picker__form">
                                                <label for="language-picker-select">Select Language</label>
                                                <select name="language-picker-select" id="language-picker-select" onchange="window.location.href=this.options[this.selectedIndex].getAttribute('data-url');">
                                                    <option lang="en" value="english" data-url="{{ route('change.language', 'en') }}" {{ $locale === 'en' ? 'selected' : '' }}>English</option>
                                                    <option lang="ar" value="arabic" data-url="{{ route('change.language', 'ar') }}" {{ $locale === 'ar' ? 'selected' : '' }}>العربية</option>
                                                    <option lang="fr" value="francais" data-url="{{ route('change.language', 'fr') }}" {{ $locale === 'fr' ? 'selected' : '' }}>Français</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile / Offcanvas Sidebar -->
    <div id="side-hide">
        <div class="top-area">
            <a href="{{ route('home') }}" class="logo-area">
                <img src="{{ asset($headerLogo) }}" alt="{{ $siteName }}">
            </a>
            <div class="close-icon-area">
                <div id="close-slide__main">
                    <i class="fa-solid fa-x"></i>
                </div>
            </div>
        </div>
        <div class="body">
            <div class="image-area-feature">
                <img src="{{ asset('assets/images/sidebar/01.jpg') }}" alt="sidebar">
            </div>
            <h5 class="title mt--30">{{ $siteSlogan }}</h5>
            <p class="disc">{{ \App\Models\Setting::get('site_description') }}</p>
            <div class="short-contact-area-side-collups">
                <div class="single-contact-information-side">
                    <i class="fa-solid fa-phone"></i>
                    <div class="information">
                        <span>{{ $isRtl ? 'اتصل بنا الآن' : ($locale === 'fr' ? 'Appelez-nous' : 'Call Now') }}</span>
                        <a href="tel:{{ $contactPhone }}" class="number">{{ $contactPhone }}</a>
                    </div>
                </div>
                <div class="single-contact-information-side">
                    <i class="fa-light fa-envelope"></i>
                    <div class="information">
                        <span>{{ $isRtl ? 'البريد الإلكتروني' : ($locale === 'fr' ? 'E-mail' : 'Email Us') }}</span>
                        <a href="mailto:{{ $contactEmail }}" class="number">{{ $contactEmail }}</a>
                    </div>
                </div>
                <div class="single-contact-information-side">
                    <i class="fa-sharp fa-light fa-location-dot"></i>
                    <div class="information">
                        <span>{{ $isRtl ? 'العنوان' : ($locale === 'fr' ? 'Adresse' : 'Address') }}</span>
                        <a href="#" class="number">{{ $contactAddress }}</a>
                    </div>
                </div>
            </div>
            <ul class="social-icons solid-social-icons rounded-social-icons mt--20">
                <li><a href="{{ $fb }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="{{ $in }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                <li><a href="{{ $tw }}"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="{{ $insta }}"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
        </div>
        <div class="mobile-lang-picker text-center mt--20 mb--10">
            <div class="language-picker">
                <div class="js">
                    <div class="language-picker js-language-picker" data-trigger-class="btn btn--subtle">
                        <form action="" class="language-picker__form">
                            <label for="language-picker-select-mobile">Language</label>
                            <select name="language-picker-select" id="language-picker-select-mobile" onchange="window.location.href=this.options[this.selectedIndex].getAttribute('data-url');">
                                <option lang="en" value="english" data-url="{{ route('change.language', 'en') }}" {{ $locale === 'en' ? 'selected' : '' }}>English</option>
                                <option lang="ar" value="arabic" data-url="{{ route('change.language', 'ar') }}" {{ $locale === 'ar' ? 'selected' : '' }}>العربية</option>
                                <option lang="fr" value="francais" data-url="{{ route('change.language', 'fr') }}" {{ $locale === 'fr' ? 'selected' : '' }}>Français</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu-main">
            <nav class="nav-main mainmenu-nav mt--30">
                <ul class="mainmenu metismenu" id="mobile-menu-active">
                    <li><a href="{{ route('home') }}" class="main">{{ $isRtl ? 'الرئيسية' : ($locale === 'fr' ? 'Accueil' : 'Home') }}</a></li>
                    <li><a href="{{ route('about') }}" class="main">{{ $isRtl ? 'من نحن' : ($locale === 'fr' ? 'À propos' : 'About') }}</a></li>
                    <li><a href="{{ route('services') }}" class="main">{{ $isRtl ? 'خدماتنا' : ($locale === 'fr' ? 'Services' : 'Services') }}</a></li>
                    <li><a href="{{ route('blog') }}" class="main">{{ $isRtl ? 'المدونة' : ($locale === 'fr' ? 'Blog' : 'Blog') }}</a></li>
                    <li><a href="{{ route('contact') }}" class="main">{{ $isRtl ? 'اتصل بنا' : ($locale === 'fr' ? 'Contact' : 'Contact') }}</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Main Content Block -->
    <main>
        @if(session('success'))
        <div class="container mt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 8px; font-weight: 600;">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer Area -->
    <footer class="footer-area footer-style-one-wrapper bg-color-footer bg_images tmp-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="subscribe-area subscribe-style-1">
                        <div class="subscribe-inner">
                            <div class="title">{{ $isRtl ? 'الاشتراك في النشرة الإخبارية للأسواق والتصدير' : ($locale === 'fr' ? 'Abonnez-vous à notre bulletin d\'exportation' : 'Subscribe to Global Export & Trade Updates') }}</div>
                            <form action="{{ route('inquiry.submit') }}" method="POST" class="newsletter-form-1 mt--40">
                                @csrf
                                <input type="hidden" name="name" value="Newsletter Subscriber">
                                <input type="hidden" name="subject" value="Newsletter Subscription">
                                <input type="hidden" name="message" value="Please subscribe me to export updates.">
                                <input type="email" name="email" placeholder="{{ $isRtl ? 'أدخل بريدك الإلكتروني' : ($locale === 'fr' ? 'Entrez votre e-mail' : 'Enter Your Email') }}" required>
                                <button type="submit" class="tmp-btn btn-primary">
                                    {{ $isRtl ? 'اشترك الآن' : ($locale === 'fr' ? 'S\'abonner' : 'Subscribe Now') }} <i class="fa-sharp fa-regular fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-main footer-style-one">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-wrapper border-right mr--20">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset($footerLogo) }}" alt="{{ $siteName }}">
                                </a>
                            </div>
                            <p class="description">{{ \App\Models\Setting::get('site_description') }}</p>
                            <div class="day-time">
                                <div class="icon"><i class="fa-solid fa-alarm-clock"></i></div>
                                <div class="content">
                                    <div class="day">{{ $isRtl ? 'ساعات التداول والتصدير:' : ($locale === 'fr' ? 'Heures de négociation:' : 'Trade Desk Hours:') }}</div>
                                    <div class="time">{{ $workingHours }}</div>
                                </div>
                            </div>
                            <ul class="social-icons solid-social-icons rounded-social-icons">
                                <li><a href="{{ $fb }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="{{ $in }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                <li><a href="{{ $tw }}"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="{{ $insta }}"><i class="fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="single-footer-wrapper pl-50 pl_md--0 pl_sm--0">
                            <h5 class="ft-title">{{ $isRtl ? 'روابط سريعة' : ($locale === 'fr' ? 'Navigation' : 'Quick Links') }}</h5>
                            <ul class="ft-link">
                                <li><a href="{{ route('about') }}">{{ $isRtl ? 'عن الشركة' : ($locale === 'fr' ? 'À propos' : 'About DIJA') }}</a></li>
                                <li><a href="{{ route('services') }}">{{ $isRtl ? 'خدمات التصدير' : ($locale === 'fr' ? 'Services' : 'Export Services') }}</a></li>
                                <li><a href="{{ route('blog') }}">{{ $isRtl ? 'الأخبار والإعلام' : ($locale === 'fr' ? 'Actualités' : 'News & Trade Desk') }}</a></li>
                                <li><a href="{{ route('contact') }}">{{ $isRtl ? 'اتصل بنا' : ($locale === 'fr' ? 'Contact' : 'Contact Us') }}</a></li>
                                <li><a href="{{ route('admin.login') }}">{{ $isRtl ? 'لوحة التحكم' : ($locale === 'fr' ? 'Espace Admin' : 'Admin Portal') }}</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="single-footer-wrapper pr--15">
                            <h5 class="ft-title">{{ $isRtl ? 'أحدث مقالات التجارة' : ($locale === 'fr' ? 'Derniers articles' : 'Latest Insights') }}</h5>
                            @php
                                $footerPosts = \App\Models\Post::where('is_published', true)->orderByDesc('published_at')->take(2)->get();
                            @endphp
                            @foreach($footerPosts as $fPost)
                            <div class="single-post">
                                <div class="thumbnail">
                                    <img src="{{ asset($fPost->thumbnail) }}" alt="{{ $fPost->getTrans('title') }}" style="width: 70px; height: 70px; object-fit: cover; border-radius: 6px;">
                                </div>
                                <div class="content">
                                    <div class="date"><i class="fa-light fa-calendar-days"></i><span>{{ $fPost->published_at ? $fPost->published_at->format('d M, Y') : 'Recent' }}</span></div>
                                    <a href="{{ route('blog.details', $fPost->slug) }}">
                                        <h6 class="title" style="font-size: 14px; line-height: 1.4;">{{ Str::limit($fPost->getTrans('title'), 45) }}</h6>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="single-footer-wrapper">
                            <h5 class="ft-title">{{ $isRtl ? 'معلومات التواصل المباشر:' : ($locale === 'fr' ? 'Contact direct:' : 'Direct Trade Contact:') }}</h5>
                            <ul class="ft-link">
                                <li class="ft-location">{{ $contactAddress }}</li>
                                <li>
                                    <div class="single-contact">
                                        <div class="icon"><i class="fa-solid fa-envelope-open-text"></i></div>
                                        <div class="content">
                                            <span>Email:</span>
                                            <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-contact">
                                        <div class="icon"><i class="fa-light fa-phone"></i></div>
                                        <div class="content">
                                            <span>Phone:</span>
                                            <a href="tel:{{ $contactPhone }}">{{ $contactPhone }}</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <div class="copyright-area-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-wrapper">
                        <p>© Copyright <script>document.write(new Date().getFullYear());</script> {{ $siteName }}. {{ $isRtl ? 'جميع الحقوق محفوظة. تم التطوير بواسطة' : ($locale === 'fr' ? 'Tous droits réservés. Développé par' : 'All Rights Reserved. Developed by') }} <a href="https://aise-digital.com/" target="_blank" rel="noopener noreferrer">AISE</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Back to Top -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
        </svg>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/swiper.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/gsap.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/splittext.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/scrolltigger.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/scrolltoplugins.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/cursor.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/metismenu.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waw.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/sal.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/isotop.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')
</body>
</html>
