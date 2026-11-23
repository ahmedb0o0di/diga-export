@extends('frontend.layouts.app')

@php
    $locale = app()->getLocale();
    $isRtl = ($locale === 'ar');
    $contactEmail = \App\Models\Setting::get('contact_email', 'export@dijagroup.com');
    $contactPhone = \App\Models\Setting::get('contact_phone', '+1 (800) 555-DIJA');
    $contactAddress = \App\Models\Setting::get('contact_address', 'Houston Port Trade Hub, TX 77002, USA');
    $workingHours = \App\Models\Setting::get('working_hours', 'Trading Desk: Mon - Sat 8:00 AM – 8:00 PM (UTC-6)');
@endphp

@section('title', ($isRtl ? 'اتصل بنا وطلب عرض أسعار - مجموعة ديجا للتصدير' : 'Contact & Request Export Quote - DIJA GROUP EXPORT'))

@section('content')

<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title">{{ $isRtl ? 'تواصل معنا وطلب عرض أسعار الشحن' : ($locale === 'fr' ? 'Contactez-nous & Devis d\'Exportation' : 'Contact & Export Quote Inquiries') }}</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="{{ route('home') }}">{{ $isRtl ? 'الرئيسية' : 'Home' }}</a></li>
                        <li class="icon"><i class="fa-solid {{ $isRtl ? 'fa-angle-left' : 'fa-angle-right' }}"></i></li>
                        <li class="tmp-breadcrumb-item active">{{ $isRtl ? 'اتصل بنا' : 'Contact' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Info Cards & Form Section -->
<div class="contact-page-area tmp-section-gap">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Info -->
            <div class="col-lg-5">
                <div class="contact-info-wrapper p-4 p-md-5 rounded shadow-sm bg-white h-100">
                    <span class="sub-title" style="color: #F26820; font-weight: 700;">{{ $isRtl ? 'مكتب التجارة والتصدير' : 'DIRECT DESK ACCESS' }}</span>
                    <h3 class="title mt--10 mb--20">{{ $isRtl ? 'جاهزون لتلبية عقود التوريد والشحن الدولي' : 'Ready to Structure Your Next Export Consignment' }}</h3>
                    <p class="disc" style="line-height: 1.8; color: #555;">
                        {{ $isRtl ? 'يتعامل فريقنا المتخصص مع استفسارات الشحن البحري، وتوريد السلع الزراعية، والمعادن الصناعية، وإجراءات خطابات الاعتماد البنكي (L/C).' : 'Connect directly with our export logistics specialists for vessel chartering, commodity pricing, phytosanitary requirements, and Letters of Credit.' }}
                    </p>

                    <div class="contact-item d-flex align-items-center mt--30">
                        <div class="icon me-3 ms-3" style="font-size: 26px; color: #F26820; width: 45px;">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <span class="d-block text-muted" style="font-size: 13px;">{{ $isRtl ? 'الهاتف المباشر' : 'Direct Line' }}</span>
                            <a href="tel:{{ $contactPhone }}" class="fw-bold text-dark" style="font-size: 17px;">{{ $contactPhone }}</a>
                        </div>
                    </div>

                    <div class="contact-item d-flex align-items-center mt--25">
                        <div class="icon me-3 ms-3" style="font-size: 26px; color: #F26820; width: 45px;">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <span class="d-block text-muted" style="font-size: 13px;">{{ $isRtl ? 'البريد الإلكتروني التجاري' : 'Trading Desk Email' }}</span>
                            <a href="mailto:{{ $contactEmail }}" class="fw-bold text-dark" style="font-size: 17px;">{{ $contactEmail }}</a>
                        </div>
                    </div>

                    <div class="contact-item d-flex align-items-center mt--25">
                        <div class="icon me-3 ms-3" style="font-size: 26px; color: #F26820; width: 45px;">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <span class="d-block text-muted" style="font-size: 13px;">{{ $isRtl ? 'المركز اللوجستي التجاري' : 'Headquarters & Port Hub' }}</span>
                            <p class="mb-0 fw-bold text-dark" style="font-size: 16px;">{{ $contactAddress }}</p>
                        </div>
                    </div>

                    <div class="contact-item d-flex align-items-center mt--25">
                        <div class="icon me-3 ms-3" style="font-size: 26px; color: #F26820; width: 45px;">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div>
                            <span class="d-block text-muted" style="font-size: 13px;">{{ $isRtl ? 'ساعات العمل الرسمية' : 'Operating Desk Hours' }}</span>
                            <p class="mb-0 fw-bold text-dark" style="font-size: 15px;">{{ $workingHours }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="col-lg-7">
                <div class="contact-form-wrapper p-4 p-md-5 rounded shadow-sm bg-white">
                    <h3 class="title mb--10">{{ $isRtl ? 'طلب عرض أسعار أو استفسار تجاري' : 'Request An Export Quote / Inquiry' }}</h3>
                    <p class="disc text-muted mb--30">{{ $isRtl ? 'يرجى تزويدنا بتفاصيل السلعة وميناء الوصول المستهدف لتقديم تسعيرة تجارية دقيقة.' : 'Please provide cargo specifications and destination port for an accurate quotation.' }}</p>

                    <form action="{{ route('inquiry.submit') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">{{ $isRtl ? 'الاسم الكامل' : 'Full Name' }} <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control form-control-lg" required placeholder="{{ $isRtl ? 'اسم المسؤول' : 'e.g. John Doe' }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">{{ $isRtl ? 'البريد الإلكتروني' : 'Business Email' }} <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control form-control-lg" required placeholder="name@company.com">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">{{ $isRtl ? 'رقم الهاتف / واتساب' : 'Phone / WhatsApp' }}</label>
                                <input type="text" name="phone" class="form-control form-control-lg" placeholder="+1 234 567 8900">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">{{ $isRtl ? 'اسم الشركة' : 'Company Name' }}</label>
                                <input type="text" name="company" class="form-control form-control-lg" placeholder="{{ $isRtl ? 'شركة الاستيراد' : 'Importing Enterprise' }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">{{ $isRtl ? 'نوع الطلب' : 'Request Type' }}</label>
                                <select name="type" class="form-select form-control-lg">
                                    <option value="quote">{{ $isRtl ? 'طلب عرض أسعار تصدير (Quote)' : 'Export Quote Request' }}</option>
                                    <option value="contact">{{ $isRtl ? 'استفسار عام / شراكة تجارية' : 'General Trade Inquiry' }}</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">{{ $isRtl ? 'الموضوع / السلعة' : 'Commodity / Subject' }}</label>
                                <input type="text" name="subject" class="form-control form-control-lg" placeholder="{{ $isRtl ? 'مثال: توريد 500 طن ذرة صفراء CIF' : 'e.g. 5,000 MT Wheat CIF Alexandria' }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold">{{ $isRtl ? 'تفاصيل الشحنة والاستفسار' : 'Consignment Details & Message' }} <span class="text-danger">*</span></label>
                                <textarea name="message" class="form-control form-control-lg" rows="5" required placeholder="{{ $isRtl ? 'حدد المواصفات المطلوبة، ميناء الوصول، وشروط الدفع...' : 'Describe quantity, destination seaport, packaging preferences, Incoterms, and payment terms...' }}"></textarea>
                            </div>

                            <div class="col-12 mt--25">
                                <button type="submit" class="tmp-btn btn-primary w-100 py-3" style="font-size: 16px;">
                                    <i class="fa-solid fa-paper-plane me-2"></i> {{ $isRtl ? 'إرسال طلب التسعيرة الآن' : 'Submit Export Quote Request' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
