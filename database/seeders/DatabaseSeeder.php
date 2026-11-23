<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Setting;
use App\Models\HeroSlide;
use App\Models\Service;
use App\Models\Post;
use App\Models\TeamMember;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Default Admin User
        User::updateOrCreate(
            ['email' => 'admin@dijagroup.com'],
            [
                'name' => 'DIJA Administrator',
                'password' => Hash::make('admin123456'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Settings (Multi-lingual & General)
        $settings = [
            'site_name' => [
                'en' => 'DIJA GROUP EXPORT',
                'ar' => 'مجموعة ديجا للتصدير',
                'fr' => 'DIJA GROUP EXPORT'
            ],
            'site_slogan' => [
                'en' => 'Global Commodity Sourcing & International Export Solutions',
                'ar' => 'توريد السلع العالمية وحلول التصدير الدولي',
                'fr' => 'Approvisionnement mondial en matières premières & solutions d\'exportation'
            ],
            'site_description' => [
                'en' => 'DIJA Group Export connects certified origin producers with premier international importers, managing end-to-end maritime shipping, rigorous quality inspections, and seamless customs clearance worldwide.',
                'ar' => 'تربط مجموعة ديجا للتصدير كبار المنتجين المعتمدين بأبرز المستوردين والشركاء في مختلف قارات العالم، مع إدارة متكاملة لسلاسل الإمداد والشحن البحري والتخليص الجمركي.',
                'fr' => 'DIJA Group Export met en relation des producteurs certifiés avec des importateurs internationaux de premier plan, en gérant le transport maritime de bout en bout et le dédouanement.'
            ],
            'contact_email' => 'export@dijagroup.com',
            'contact_phone' => '+1 (800) 555-DIJA',
            'contact_address' => [
                'en' => 'Houston Port Trade Hub, TX 77002, United States',
                'ar' => 'مركز ميناء هيوستن التجاري، تكساس 77002، الولايات المتحدة الأمريكية',
                'fr' => 'Hub commercial du port de Houston, TX 77002, États-Unis'
            ],
            'working_hours' => [
                'en' => 'Trading Desk: Mon - Sat 8:00 AM – 8:00 PM (UTC-6)',
                'ar' => 'مكتب التداول التجاري: الإثنين - السبت 8:00 ص – 8:00 م (UTC-6)',
                'fr' => 'Bureau commercial: Lun - Sam 8:00 – 20:00 (UTC-6)'
            ],
            'facebook_url' => 'https://facebook.com',
            'twitter_url' => 'https://twitter.com',
            'linkedin_url' => 'https://linkedin.com',
            'instagram_url' => 'https://instagram.com',
            'header_logo' => 'assets/images/logo/dija-logo.png',
            'footer_logo' => 'assets/images/logo/logo-white.png',
        ];

        foreach ($settings as $key => $val) {
            Setting::set($key, $val);
        }

        // 3. Hero Slides
        HeroSlide::truncate();
        HeroSlide::create([
            'title' => [
                'en' => 'Connecting Global Markets with Certified Commodity Cargoes',
                'ar' => 'نربط الأسواق العالمية بأجود السلع المصدرة والمعتمدة',
                'fr' => 'Connecter les marchés mondiaux avec des cargaisons certifiées'
            ],
            'subtitle' => [
                'en' => 'Premier International Export & Trade Management',
                'ar' => 'شريكك الأول للتصدير والتجارة الدولية',
                'fr' => 'Gestion de premier plan du commerce international'
            ],
            'description' => [
                'en' => 'DIJA Group Export delivers certified agricultural products, industrial minerals, and raw commodities to over 45 destinations worldwide with guaranteed Incoterms compliance and chartered vessel scheduling.',
                'ar' => 'توفر مجموعة ديجا للتصدير سلعاً زراعية ممتازة ومواد خام لأكثر من 45 دولة حول العالم مع الامتثال التام لمصطلحات التجارة الدولية وضمان مواعيد الشحن.',
                'fr' => 'DIJA Group Export livre des produits agricoles certifiés et des minéraux industriels à plus de 45 destinations dans le monde avec conformité aux Incoterms.'
            ],
            'button_text' => [
                'en' => 'Explore Export Services',
                'ar' => 'استكشف خدمات التصدير',
                'fr' => 'Découvrir nos services'
            ],
            'button_link' => '/services',
            'image' => 'assets/images/banner/bg-01.jpg',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        HeroSlide::create([
            'title' => [
                'en' => 'End-to-End Maritime Freight & Port Logistics',
                'ar' => 'شحن بحري متكامل ولوجستيات موانئ فائقة الكفاءة',
                'fr' => 'Fret maritime de bout en bout et logistique portuaire'
            ],
            'subtitle' => [
                'en' => 'Global Multimodal Supply Chain Certainty',
                'ar' => 'أمان وموثوقية سلاسل الإمداد العالمية',
                'fr' => 'Certitude de la chaîne d\'approvisionnement mondiale'
            ],
            'description' => [
                'en' => 'From bulk grain carriers to reefer container fleets, our chartered vessels and accredited surveyor partnerships ensure your commodity shipments arrive on schedule without port demurrage.',
                'ar' => 'من ناقلات الحبوب الصب إلى الحاويات المبردة، تضمن سفننا المستأجرة وفحوصات الجودة وصول شحناتكم التجارية في مواعيدها المحددة ودون غرامات تأخير.',
                'fr' => 'Des vraquiers aux flottes de conteneurs réfrigérés, nos navires affrétés garantissent des livraisons ponctuelles.'
            ],
            'button_text' => [
                'en' => 'Request An Export Quote',
                'ar' => 'طلب عرض أسعار تصدير',
                'fr' => 'Demander un devis'
            ],
            'button_link' => '/contact',
            'image' => 'assets/images/banner/bg-02.jpg',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        // 4. Services
        Service::truncate();
        Service::create([
            'slug' => 'agricultural-commodities-export',
            'title' => [
                'en' => 'Agricultural Commodities Export',
                'ar' => 'تصدير السلع والمحاصيل الزراعية',
                'fr' => 'Exportation de produits agricoles'
            ],
            'description' => [
                'en' => 'Reliable bulk sourcing of grains, pulses, oilseeds, sugar, and specialty crops certified by SGS and Bureau Veritas.',
                'ar' => 'توريد سلع زراعية معتمدة من كبرى مناشئ الحبوب والبذور الزيتية والسكر مع فحوصات مخبرية معتمدة دولياً.',
                'fr' => 'Approvisionnement fiable en vrac de céréales, légumineuses, graines oléagineuses et sucre certifiés.'
            ],
            'content' => [
                'en' => 'Every agricultural consignment undergoes rigorous physical examination, moisture content analysis, and laboratory screening before loading. We offer full phytosanitary clearance and non-GMO certification across FOB and CIF shipments.',
                'ar' => 'تخضع كافة شحنات التصدير الزراعية لفحص فيزيائي شامل وتحليل دقيق لنسب الرطوبة واختبارات معملية معتمدة دولياً قبل التحميل والشحن، مع إصدار الشهادات الصحية النباتية المعتمدة.',
                'fr' => 'Chaque envoi agricole fait l\'objet d\'un examen physique rigoureux et d\'une analyse en laboratoire avant le chargement.'
            ],
            'icon' => 'fa-solid fa-wheat-awn',
            'image' => 'assets/images/services/services-01.jpg',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Service::create([
            'slug' => 'industrial-raw-materials',
            'title' => [
                'en' => 'Industrial Raw Materials & Minerals',
                'ar' => 'المواد الخام الصناعية والمعادن الأولية',
                'fr' => 'Matières premières industrielles & minéraux'
            ],
            'description' => [
                'en' => 'Direct supply contracts for non-ferrous metals, chemical compounds, polymers, and mineral ores directly to manufacturing hubs.',
                'ar' => 'عقود توريد وتصدير مباشرة للمعادن، والمركبات الكيميائية، والبوليمرات وخامات المعادن الصناعية إلى كبرى المصانع.',
                'fr' => 'Contrats d\'approvisionnement direct pour les métaux non ferreux, composés chimiques et polymères.'
            ],
            'content' => [
                'en' => 'We maintain long-term extraction and refining quotas with certified processing plants. Materials are shipped with complete mill test certificates, chemical assay data, and standardized packaging.',
                'ar' => 'نمتلك شراكات تعاقدية ممتدة مع كبرى مصافي ومصانع المعالجة الصناعية لضمان تزويدكم بشهادات الفحص الكيميائي والمطابقة للمواصفات القياسية.',
                'fr' => 'Nous maintenons des partenariats à long terme pour garantir des certificats d\'analyse chimique conformes.'
            ],
            'icon' => 'fa-solid fa-cubes-stacked',
            'image' => 'assets/images/services/services-02.jpg',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Service::create([
            'slug' => 'ocean-freight-chartering',
            'title' => [
                'en' => 'Ocean Freight & Vessel Chartering',
                'ar' => 'خدمات الشحن البحري واستئجار السفن',
                'fr' => 'Fret maritime & affrètement de navires'
            ],
            'description' => [
                'en' => 'Full container load (FCL), specialized reefer transport, and break-bulk chartering through tier-one maritime shipping alliances.',
                'ar' => 'شحن الحاويات الكاملة (FCL)، ونقل مبرد للحاويات، وتأجير السفن التجارية عبر كبرى التحالفات الملاحية العالمية.',
                'fr' => 'Transport maritime conteneurisé (FCL), transport frigorifique spécialisé et affrètement.'
            ],
            'content' => [
                'en' => 'Our maritime desk books and coordinates vessel space across major shipping lines (MSC, Maersk, CMA CGM, Hapag-Lloyd) to secure preferential demurrage terms and steady transit lanes.',
                'ar' => 'ينسق مكتبنا البحري مساحات الحجز مع كبرى الخطوط الملاحية العالمية لضمان فترات سماح تفضيلية للحاويات ووصول آمن وسريع للموانئ المستهدفة.',
                'fr' => 'Notre bureau maritime réserve et coordonne les espaces de navires avec les plus grandes compagnies maritimes.'
            ],
            'icon' => 'fa-solid fa-ship',
            'image' => 'assets/images/services/services-03.jpg',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Service::create([
            'slug' => 'customs-export-documentation',
            'title' => [
                'en' => 'Customs Clearance & Trade Documentation',
                'ar' => 'التخليص الجمركي وإصدار شهادات التصدير',
                'fr' => 'Dédouanement & documentation commerciale'
            ],
            'description' => [
                'en' => 'Flawless preparation of Bills of Lading, Consular Invoices, EUR.1 / Arab League certificates, and Letters of Credit execution.',
                'ar' => 'إعداد وإصدار دقيق لبوالص الشحن البحرية النظيفة، وشهادات المنشأ الرسمية، والاعتمادات المستندية البنكية.',
                'fr' => 'Préparation rigoureuse des connaissements maritimes, factures consulaires et certificats d\'origine.'
            ],
            'content' => [
                'en' => 'Avoid costly customs delays. Our licensed trade specialists prepare all export declaration paperwork, verify HS codes, manage consular attestations, and ensure clean L/C documentation.',
                'ar' => 'تجنب أية غرامات أو تأخير جمركي. يتولى فريقنا المعتمد تدقيق البنود الجمركية، وإصدار شهادات المنشأ، وتصديق السفارات، وإدارة مستندات الدفع البنكي.',
                'fr' => 'Évitez les retards douaniers coûteux grâce à notre équipe de spécialistes certifiés.'
            ],
            'icon' => 'fa-solid fa-file-invoice',
            'image' => 'assets/images/services/services-04.jpg',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        // 5. Blog Posts
        Post::truncate();
        Post::create([
            'slug' => 'incoterms-2024-importers-guide',
            'title' => [
                'en' => 'Incoterms 2024: Essential Guide for Bulk Commodity Importers (FOB vs CIF vs CFR)',
                'ar' => 'إنكوترمز 2024: دليل شامل للمشترين للاختيار بين فوب (FOB) وسيف (CIF) وسي إف آر (CFR)',
                'fr' => 'Incoterms 2024: Guide essentiel pour les importateurs (FOB vs CIF vs CFR)'
            ],
            'category' => [
                'en' => 'Export Compliance',
                'ar' => 'الامتثال التصديري',
                'fr' => 'Conformité export'
            ],
            'excerpt' => [
                'en' => 'Understanding contractual risk transfer and port cost allocation between seller and buyer in modern sea freight agreements.',
                'ar' => 'فهم نقطة انتقال المخاطر وتوزيع تكاليف الموانئ بدقة بين البائع والمشتري في عقود الشحن البحري.',
                'fr' => 'Comprendre le transfert de risque et la répartition des coûts portuaires dans le fret maritime.'
            ],
            'content' => [
                'en' => 'In international commodity trading and sea freight, choosing the right Incoterm is a critical financial decision. We detail the key operational considerations comparing FOB, CIF, and CFR for bulk maritime shipments.',
                'ar' => 'في تجارة السلع الدولية والشحن البحري، يعد اختيار مصطلح التجارة الدولية المناسب (Incoterms) من أهم القرارات التجارية التي تحدد انتقال التكاليف والمخاطر التشغيلية من المصدر إلى المشتري.',
                'fr' => 'Dans le commerce international des matières premières, choisir le bon Incoterm est une décision financière cruciale.'
            ],
            'author' => 'DIJA Trade Compliance Desk',
            'read_time' => '7 min read',
            'thumbnail' => 'assets/images/blog/details/01.png',
            'published_at' => now()->subDays(10),
            'is_published' => true,
        ]);

        Post::create([
            'slug' => 'optimizing-maritime-cold-chains',
            'title' => [
                'en' => 'Optimizing Maritime Cold-Chain Logistics for Perishable Agro Exports',
                'ar' => 'تحسين مسارات الشحن البحري وسلاسل التبريد للمحاصيل سريعة التلف',
                'fr' => 'Optimisation de la chaîne du froid maritime pour les denrées périssables'
            ],
            'category' => [
                'en' => 'Maritime Logistics',
                'ar' => 'اللوجستيات البحرية',
                'fr' => 'Logistique maritime'
            ],
            'excerpt' => [
                'en' => 'How controlled-atmosphere reefer containers and live telemetry safeguard premium fruit and vegetable cargo during long transits.',
                'ar' => 'كيف تضمن حاويات التبريد ذات الغلاف الجوي المضبوط والتتبع المباشر سلامة الفواكه والخضروات في الرحلات الطويلة.',
                'fr' => 'Comment les conteneurs à atmosphère contrôlée protègent les cargaisons de fruits et légumes.'
            ],
            'content' => [
                'en' => 'Perishable agro exports demand seamless temperature management from the farm gate to destination port discharge. Discover the latest advancements in reefer monitoring and humidity regulation.',
                'ar' => 'تتطلب صادرات المنتجات الزراعية الطازجة إدارة دقيقة ومستمرة لدرجات الحرارة من مزارع الإنتاج وحتى التفريغ بميناء الوصول، مع تطبيق أحدث أنظمة المراقبة عن بعد.',
                'fr' => 'Les exportations de produits agricoles périssables exigent une gestion thermique irréprochable.'
            ],
            'author' => 'Marine Logistics Team',
            'read_time' => '5 min read',
            'thumbnail' => 'assets/images/blog/details/02.jpg',
            'published_at' => now()->subDays(5),
            'is_published' => true,
        ]);

        // 6. Team Members
        TeamMember::truncate();
        TeamMember::create([
            'name' => [
                'en' => 'Dr. Marwan Al-Sharif',
                'ar' => 'د. مروان الشريف',
                'fr' => 'Dr. Marwan Al-Sharif'
            ],
            'designation' => [
                'en' => 'Managing Director & Global Trade Head',
                'ar' => 'المدير التنفيذي ورئيس التجارة الدولية',
                'fr' => 'Directeur Général & Responsable du Commerce'
            ],
            'photo' => 'assets/images/team/team-3.png',
            'facebook' => '#',
            'twitter' => '#',
            'linkedin' => '#',
            'sort_order' => 1,
        ]);

        TeamMember::create([
            'name' => [
                'en' => 'Eng. Khaled Al-Najjar',
                'ar' => 'م. خالد النجار',
                'fr' => 'Ing. Khaled Al-Najjar'
            ],
            'designation' => [
                'en' => 'Head of Maritime Logistics & Chartering',
                'ar' => 'مدير العمليات البحرية واللوجستيات',
                'fr' => 'Chef de la Logistique Maritime'
            ],
            'photo' => 'assets/images/team/team-1.png',
            'facebook' => '#',
            'twitter' => '#',
            'linkedin' => '#',
            'sort_order' => 2,
        ]);

        TeamMember::create([
            'name' => [
                'en' => 'Ahmed Al-Saadani',
                'ar' => 'أحمد السعدني',
                'fr' => 'Ahmed Al-Saadani'
            ],
            'designation' => [
                'en' => 'Senior Customs & Trade Compliance Officer',
                'ar' => 'مسؤول التخليص الجمركي والامتثال التجاري',
                'fr' => 'Responsable Douanes & Conformité'
            ],
            'photo' => 'assets/images/team/team-2.png',
            'facebook' => '#',
            'twitter' => '#',
            'linkedin' => '#',
            'sort_order' => 3,
        ]);
    }
}
