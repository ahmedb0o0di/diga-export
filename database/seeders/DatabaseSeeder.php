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
        // 1. Default Administrator
        User::updateOrCreate(
            ['email' => 'admin@dijagroup.com'],
            [
                'name' => 'DIJA Administrator',
                'password' => Hash::make('admin123456'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Site Settings
        $settings = [
            'site_name' => [
                'en' => 'DIJA Group Export',
                'ar' => 'مجموعة ديجا للتصدير',
                'fr' => 'DIJA Group Export'
            ],
            'site_slogan' => [
                'en' => 'Empowering Global Trade & Export Solutions',
                'ar' => 'تمكين التجارة العالمية وحلول التصدير المتكاملة',
                'fr' => 'Solutions globales pour le commerce et l\'exportation'
            ],
            'site_description' => [
                'en' => 'DIJA Group Export connects verified origin producers with premier international importers, managing end-to-end maritime shipping, customs clearance, and quality assurance.',
                'ar' => 'تربط مجموعة ديجا للتصدير كبار المزارع والمصانع المعتمدة بمستوردين دوليين حول العالم، مع إدارة شاملة للشحن البحري والتخليص الجمركي وضمان الجودة.',
                'fr' => 'DIJA Group Export relie les producteurs certifiés aux importateurs internationaux avec gestion du fret maritime et du dédouanement.'
            ],
            'contact_phone' => '+1 (800) 555-DIJA',
            'contact_email' => 'export@dijagroup.com',
            'contact_address' => [
                'en' => 'Houston Port Trade Hub, TX 77002, USA',
                'ar' => 'مركز تداول ميناء هيوستن، تكساس 77002، الولايات المتحدة',
                'fr' => 'Centre de commerce portuaire de Houston, TX 77002, USA'
            ],
            'working_hours' => [
                'en' => 'Mon - Fri: 8:00 AM - 6:00 PM (EST)',
                'ar' => 'الإثنين - الجمعة: 8:00 ص - 6:00 م (توقيت شرق أمريكا)',
                'fr' => 'Lun - Ven: 8h00 - 18h00'
            ],
            'social_facebook' => 'https://facebook.com/dijagroup',
            'social_twitter' => 'https://twitter.com/dijagroup',
            'social_linkedin' => 'https://linkedin.com/company/dijagroup',
            'social_instagram' => 'https://instagram.com/dijagroup',
            'header_logo' => 'assets/images/logo/dija-logo.png',
            'footer_logo' => 'assets/images/logo/logo-white.png',
        ];

        foreach ($settings as $key => $val) {
            Setting::set($key, $val);
        }

        // 3. Hero Slides (3 Slides from Static Version)
        HeroSlide::truncate();
        HeroSlide::create([
            'title' => [
                'en' => 'Connecting Global Markets With Quality Exports',
                'ar' => 'نربط الأسواق العالمية بأجود السلع المصدرة والمعتمدة',
                'fr' => 'Connecter les marchés mondiaux avec des exportations de qualité'
            ],
            'subtitle' => [
                'en' => 'Premier International Export & Trade Partner',
                'ar' => 'الشريك الأول للتصدير والتجارة الدولية المعتمدة',
                'fr' => 'Partenaire d\'exportation et de commerce de premier plan'
            ],
            'description' => [
                'en' => 'DIJA Group Export delivers premium agricultural commodities, raw materials, and manufactured goods to over 45+ countries worldwide with full customs compliance and reliable freight logistics.',
                'ar' => 'توفر مجموعة ديجا للتصدير سلعاً زراعية ممتازة ومواد خام لأكثر من 45 دولة حول العالم مع الامتثال التام لمصطلحات التجارة الدولية وضمان مواعيد الشحن.',
                'fr' => 'DIJA Group Export livre des produits agricoles certifiés et des minéraux industriels à plus de 45 destinations dans le monde avec conformité aux Incoterms.'
            ],
            'button_text' => [
                'en' => 'Explore Export Services',
                'ar' => 'استكشف خدمات التصدير',
                'fr' => 'Explorer nos services'
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

        HeroSlide::create([
            'title' => [
                'en' => 'Powering Global Business Growth',
                'ar' => 'دعم نمو الأعمال التجارية وتوسعها عبر القارات',
                'fr' => 'Propulser la croissance des entreprises mondiales'
            ],
            'subtitle' => [
                'en' => 'Certified Commodity Supply & Hedging',
                'ar' => 'عقود توريد وتأمين تجاري ضد تقلبات الأسعار',
                'fr' => 'Approvisionnement certifié et couverture des risques'
            ],
            'description' => [
                'en' => 'Long-term commodity contracts, SGS-verified lab purity standards, and dedicated trade desk execution tailored to international wholesalers and processing plants.',
                'ar' => 'عقود تجارية طويلة الأجل، وفحوصات نقاوة معتمدة من SGS، وإدارة مخصصة تلبي متطلبات كبار المستوردين والمصانع العالمية.',
                'fr' => 'Contrats à long terme, analyses en laboratoire certifiées SGS et exécution sur mesure pour les grossistes.'
            ],
            'button_text' => [
                'en' => 'Contact Our Trade Desk',
                'ar' => 'تواصل مع مكتب التداول',
                'fr' => 'Contacter notre équipe'
            ],
            'button_link' => '/contact',
            'image' => 'assets/images/banner/bg-03.jpg',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        // 4. Services (6 Complete Services from Static Version)
        Service::truncate();

        Service::create([
            'slug' => 'agricultural-food-commodities',
            'title' => [
                'en' => 'Agricultural & Food Commodities',
                'ar' => 'السلع الزراعية والمنتجات الغذائية',
                'fr' => 'Produits agricoles et denrées alimentaires'
            ],
            'description' => [
                'en' => 'Reliable bulk sourcing of grains, pulses, oilseeds, sugar, fresh crops, and premium food commodities certified by SGS and Bureau Veritas.',
                'ar' => 'توريد سلع زراعية ومحاصيل حبوب وبذور زيتية وسكر مع فحوصات مخبرية معتمدة دولياً ومطابقة للمواصفات القياسية.',
                'fr' => 'Approvisionnement fiable en vrac de céréales, légumineuses, graines oléagineuses et sucre certifiés.'
            ],
            'content' => [
                'en' => "DIJA Group Export provides comprehensive export management and supply chain logistics for high-demand agricultural commodities, bulk food products, and industrial materials. By establishing direct partnerships with certified origin producers and state-of-the-art processing mills, we ensure our global buyers receive consistent grades, competitive seasonal pricing, and dependable year-round supply.\n\n### Certified Quality Assurance\nEvery cargo consignment undergoes rigorous physical examination, moisture content analysis, and laboratory screening before loading.\n\n### SGS, Intertek & Bureau Veritas Third-Party Inspection\nWe offer complete pre-shipment surveyor testing, non-GMO certificates, phytosanitary quarantine clearance, and clean container stuffing supervision across FOB, CIF, and CFR contracts.",
                'ar' => "توفر مجموعة ديجا للتصدير خدمات إدارة التصدير واللوجستيات الشاملة للسلع الزراعية والمنتجات الغذائية والمواد الصناعية عالية الطلب. من خلال بناء شراكات مباشرة مع المزارع المعتمدة ومحطات المعالجة المتطورة، نضمن لمشترينا الدوليين الحصول على جودة متناسقة وأسعار موسمية تنافسية وإمداد مستمر طوال العام.\n\n### ضمان الجودة المعتمدة\nتخضع كافة السلع والشحنات لفحص فيزيائي شامل، وتحليل دقيق لنسب الرطوبة، واختبارات معملية معتمدة دولياً قبل التحميل والشحن.\n\n### فحص واعتماد SGS وIntertek وBureau Veritas\nنوفر الفحص المسبق للشحنات وإصدار شهادات الخلو من التعديل الوراثي وشهادات الصحة النباتية والإشراف الميداني على تعبئة الحاويات.",
                'fr' => "DIJA Group Export fournit une gestion complète des exportations et une logistique de chaîne d'approvisionnement pour les produits agricoles. Nous assurons une qualité constante, des prix compétitifs et un approvisionnement régulier tout au long de l'année."
            ],
            'icon' => 'fa-solid fa-wheat-awn',
            'image' => 'assets/images/services/services-01.jpg',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Service::create([
            'slug' => 'industrial-raw-materials-minerals',
            'title' => [
                'en' => 'Industrial Raw Materials & Minerals',
                'ar' => 'المواد الخام الصناعية والمعادن',
                'fr' => 'Matières premières industrielles et minéraux'
            ],
            'description' => [
                'en' => 'Direct mine and quarry sourcing of silica sand, phosphate rock, gypsum, calcium carbonate, and industrial minerals with guaranteed chemical assay.',
                'ar' => 'توريد مباشر من المناجم والمحاجر لرمال السيليكا، صخور الفوسفات، الجبس، كربونات الكالسيوم، مع شهادات تحليل كيميائي معتمدة.',
                'fr' => 'Approvisionnement direct de sable de silice, roche phosphatée, gypse et minéraux industriels avec dosage chimique garanti.'
            ],
            'content' => [
                'en' => "Engineered for international manufacturing, glass fabrication, and construction conglomerates. We supply certified mineral consignments in bulk vessel holds or 1.5 MT big bags. Every consignment includes chemical spectrometry analysis, moisture grading, and granulometry certification.\n\n### High Purity Assays\nVerified silicon dioxide (SiO2), phosphorus pentoxide (P2O5), and purity ratings tailored to manufacturing tolerances.\n\n### Multimodal Port Loading\nEquipped with high-capacity telescopic conveyors and quayside grab systems to ensure fast laytime loading without port penalties.",
                'ar' => "حلول مخصصة للمصانع وشركات تصنيع الزجاج والإنشاءات الكبرى. نوفر السلع المعدنية في عنابر السفن الصب أو في أكياس جامبو (Big Bags) سعة 1.5 طن متري مع شهادات التحليل الطيفي والتحليل الحجمي للحبيبات.\n\n### درجات نقاوة قياسية\nتحليلات معملية دقيقة لنسب ثاني أكسيد السيليكون (SiO2) وخامس أكسيد الفوسفور (P2O5) المطابقة للمواصفات الصناعية.\n\n### شحن وتعبئة بموانئ التصدير\nاستخدام أحدث السيور الناقلة ومعدات الشحن السريع في الموانئ لتقليل فترات انتظار السفن وتفادي أية غرامات.",
                'fr' => "Solutions conçues pour les fabricants internationaux, l'industrie du verre et la construction. Nous fournissons des minéraux certifiés en vrac ou en grands sacs avec analyses complètes."
            ],
            'icon' => 'fa-solid fa-gem',
            'image' => 'assets/images/services/services-02.jpg',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Service::create([
            'slug' => 'ocean-air-freight-forwarding',
            'title' => [
                'en' => 'Ocean & Air Freight Forwarding',
                'ar' => 'خدمات الشحن البحري والجوي الدولي',
                'fr' => 'Fret maritime et aérien international'
            ],
            'description' => [
                'en' => 'FCL, LCL, chartered bulk carriers, and express air cargo agreements with premier global shipping lines to ensure timely vessel schedules.',
                'ar' => 'شحن الحاويات الكاملة (FCL) والجزئية (LCL) واستئجار سفن الصب الكاملة، مع تعاقدات تفضيلية تضمن إبحار الشحنات في مواعيدها.',
                'fr' => 'Expéditions maritimes FCL, LCL et affrètement de navires en vrac avec les principales compagnies mondiales.'
            ],
            'content' => [
                'en' => "Navigating global ocean shipping routes requires deep carrier relationships and smart route planning. We negotiate competitive freight rates, manage container slots, and monitor real-time telematics from departure terminal to final destination harbor.\n\n### Preferred Shipping Lines\nPartnered with Maersk, MSC, CMA CGM, and leading regional breakbulk operators.\n\n### Real-Time Telematics & Tracking\nGPS-enabled satellite tracking giving buyers 24/7 visibility into vessel positioning, transit ETA, and harbor berthing.",
                'ar' => "تتطلب الملاحة في خطوط الشحن العالمية علاقات وطيدة مع كبرى التوكيلات الملاحية وتخطيطاً مسارياً ذكياً. نفاوض على أسعار نولون شحن تنافسية وندير حجوزات الحاويات مع تتبع فوري للأقمار الصناعية.\n\n### شراكات مع كبرى الخطوط الملاحية\nتعاقدات مع ميرسك، وإم إس سي، وسي إم إيه سي جي إم، وشركات تأجير سفن الصب.\n\n### تتبع الحاويات والسفن\nمتابعة حية عبر الأقمار الصناعية على مدار الساعة لتحديثات الوصول ورسو السفن في الموانئ.",
                'fr' => "Une logistique maritime optimisée avec des tarifs négociés et un suivi en temps réel par satellite du départ jusqu'à l'arrivée au port de destination."
            ],
            'icon' => 'fa-solid fa-ship',
            'image' => 'assets/images/services/services-03.jpg',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Service::create([
            'slug' => 'customs-clearance-trade-documentation',
            'title' => [
                'en' => 'Customs Clearance & Trade Documentation',
                'ar' => 'التخليص الجمركي وإصدار شهادات التصدير',
                'fr' => 'Dédouanement et documentation commerciale'
            ],
            'description' => [
                'en' => 'Flawless preparation of Clean Bills of Lading, Consular Invoices, EUR.1 / Arab League certificates, and Letters of Credit (L/C) compliance.',
                'ar' => 'إعداد وإصدار دقيق لبوالص الشحن البحرية النظيفة، وشهادات المنشأ الرسمية، وتصديق السفارات، والاعتمادات المستندية البنكية.',
                'fr' => 'Préparation rigoureuse des connaissements maritimes, factures consulaires et certificats d\'origine.'
            ],
            'content' => [
                'en' => "Avoid costly customs delays. Our licensed trade compliance specialists prepare all export declaration paperwork, verify HS codes, manage consular attestations, and ensure clean L/C documentation.\n\n### 100% Compliant Trade Records\nEliminate port clearance delays through accurate HS code classification and electronic submission.\n\n### Banking & Letter of Credit Execution\nRigorous scrutiny of UCP 600 standards ensuring all shipping documents match banking criteria for prompt letter of credit negotiation.",
                'ar' => "تجنب أية غرامات أو تأخير جمركي. يتولى فريقنا المعتمد تدقيق البنود الجمركية (HS Codes)، وإصدار شهادات المنشأ الرسمية، وتصديق السفارات، ومطابقة مستندات الدفع البنكي وفقاً للأعراف الدولية (UCP 600).\n\n### وثائق تجارية متوافقة تماماً\nضمان سرعة الإفراج الجمركي في موانئ الوصول بفضل الدقة في البيانات الجمركية والفواتير التجارية المعتمدة.\n\n### تنفيذ الاعتمادات المستندية البنكية\nمراجعة دقيقة لكافة شروط الدفع البنكي لضمان سلاسة المعاملات المالية وقبول المستندات بدون تحفظات.",
                'fr' => "Évitez les retards douaniers coûteux grâce à notre équipe de spécialistes certifiés en conformité commerciale et exécution des lettres de crédit."
            ],
            'icon' => 'fa-solid fa-file-invoice',
            'image' => 'assets/images/services/services-04.jpg',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        Service::create([
            'slug' => 'cold-chain-logistics-reefer-cargo',
            'title' => [
                'en' => 'Cold Chain Logistics & Reefer Cargo',
                'ar' => 'لوجستيات التبريد وشحن البضائع المبردة',
                'fr' => 'Logistique de la chaîne du froid et fret réfrigéré'
            ],
            'description' => [
                'en' => 'State-of-the-art reefer container transport with controlled atmosphere (CA) technology for perishable fruits, vegetables, and frozen items.',
                'ar' => 'شحن مبرد فائق التطور عبر حاويات التبريد المزودة بتقنية التحكم في الغلاف الجوي (CA) للحاصلات الزراعية والمنتجات المجمدة.',
                'fr' => 'Transport sous température dirigée avec conteneurs réfrigérés haute technologie pour produits frais et surgelés.'
            ],
            'content' => [
                'en' => "Perishable crops demand uninterrupted temperature control from packhouse pre-cooling to destination delivery. Our reefer operations deploy Controlled Atmosphere (CA) and automated ventilation telematics that extend shelf life and prevent cargo deterioration.\n\n### Temperature Datalogging\nContinuous digital logging of pulp temperatures, humidity levels, and airflow across every maritime leg.\n\n### Fast-Track Port Gateways\nPriority cold-chain terminal handling to minimize dwell time before ship stowage.",
                'ar' => "تتطلب المحاصيل سريعة التلف تحكماً حرارياً غير منقطع من محطات التعبئة والتبريد الأولي وحتى التسليم النهائي. نستخدم حاويات التبريد المزودة بالتحكم في نسب الأكسجين وثاني أكسيد الكربون لإطالة العمر الافتراضي للبضائع.\n\n### تسجيل درجات الحرارة رقمياً\nأجهزة تسجيل رقمية مستمرة تقيس درجة حرارة اللب والرطوبة والتهوية طوال مسار الشحن البحري.\n\n### مسارات سريعة في الموانئ\nأولوية مناولة للحاويات المبردة في محطات الموانئ لتجنب بقائها خارج مقابس الكهرباء.",
                'fr' => "Contrôle rigoureux de la température depuis le pré-refroidissement jusqu'à la livraison finale avec télématique avancée."
            ],
            'icon' => 'fa-solid fa-snowflake',
            'image' => 'assets/images/services/services-01.jpg',
            'sort_order' => 5,
            'is_active' => true,
        ]);

        Service::create([
            'slug' => 'supply-chain-hedging-sourcing-advisory',
            'title' => [
                'en' => 'Supply Chain Hedging & Sourcing Advisory',
                'ar' => 'استشارات التوريد والتحوط التجاري',
                'fr' => 'Conseil en approvisionnement et couverture commerciale'
            ],
            'description' => [
                'en' => 'Market intelligence, seasonal commodity price hedging, forward contracting, and risk management strategies for volume buyers.',
                'ar' => 'دراسات متخصصة لأسواق السلع، والتحوط ضد تقلبات الأسعار، وإبرام عقود التوريد الآجلة لكبار المستوردين والموزعين.',
                'fr' => 'Intelligence économique, couverture des prix saisonniers des matières premières et gestion des risques d\'approvisionnement.'
            ],
            'content' => [
                'en' => "Volatile global markets require strategic procurement planning. We assist international commodity buyers with multi-origin sourcing matrices, volume price hedging, and seasonal crop forecasting to protect profit margins.\n\n### Strategic Forward Contracts\nLock in guaranteed delivery volumes and favorable price ceilings ahead of seasonal harvest cycles.\n\n### Multi-Origin Redundancy\nDiversify sourcing across multiple agricultural belts to eliminate regional climate or geopolitical supply shocks.",
                'ar' => "تتطلب الأسواق العالمية المتقلبة تخطيطاً استراتيجياً للتوريد. نساعد المستوردين في تنويع مصادر الشراء والتحوط ضد قفزات الأسعار ومتابعة مؤشرات المحاصيل لحماية هوامش الربح.\n\n### عقود الشراء الآجلة\nتأمين كميات توريد مؤكدة وسقوف سعرية تفضيلية قبل بدء مواسم الحصاد والتصدير.\n\n### تنويع مصادر التوريد\nتقليل مخاطر الإمداد عبر شبكة مزارع ومصادر متعددة تضمن تدفق البضائع دون انقطاع.",
                'fr' => "Stratégies d'achat prévisionnelles et diversification des sources d'approvisionnement pour sécuriser vos marges commerciales."
            ],
            'icon' => 'fa-solid fa-chart-line',
            'image' => 'assets/images/services/services-02.jpg',
            'sort_order' => 6,
            'is_active' => true,
        ]);

        // 5. Blog Posts (6 Articles from Static Version)
        Post::truncate();

        Post::create([
            'slug' => 'incoterms-2024-buyers-guide-fob-cif-cfr',
            'title' => [
                'en' => 'Incoterms 2024: A Comprehensive Buyer\'s Guide to Choosing Between FOB, CIF, and CFR',
                'ar' => 'إنكوترمز 2024: دليل شامل للمشترين للاختيار بين فوب (FOB) وسيف (CIF) وسي إف آر (CFR)',
                'fr' => 'Incoterms 2024 : Guide de l\'Acheteur pour Choisir entre FOB, CIF et CFR'
            ],
            'category' => [
                'en' => 'Export Compliance',
                'ar' => 'الامتثال التصديري',
                'fr' => 'Conformité d\'exportation'
            ],
            'excerpt' => [
                'en' => 'Explore key strategies for mitigating ocean freight risks, optimizing port demurrage, and securing competitive export supply contracts under modern Incoterms.',
                'ar' => 'تعرف على القواعد الذهبية لاختيار شرط الشحن التجاري المناسب، وتجنب غرامات التأخير في الموانئ وضمان حقوقك التعاقدية.',
                'fr' => 'Découvrez les stratégies clés pour atténuer les risques de fret maritime et optimiser les coûts de surestaries sous les Incoterms modernes.'
            ],
            'content' => [
                'en' => "In international commodity trade and global ocean shipping, selecting the appropriate International Commercial Terms (Incoterms®) is among the most consequential commercial decisions an importer can make. Published by the International Chamber of Commerce (ICC), Incoterms define the exact point where costs, operational risks, and logistics responsibilities transfer from the exporter to the buyer.\n\nMaking the wrong choice can expose your enterprise to unexpected port demurrage penalties, unhedged maritime insurance risks, and costly terminal handling charges (THC).\n\n### FOB (Free On Board)\nThe seller completes delivery once goods are loaded on board the vessel nominated by the buyer. Best for buyers with preferential maritime carrier volume contracts.\n\n### CIF (Cost, Insurance & Freight)\nThe seller contracts and pays ocean freight and marine insurance to the destination port. Ideal for buyers seeking turnkey cost certainty.\n\n### CFR (Cost and Freight)\nThe seller pays transport to the named port, but risk transfers once goods pass the ship's rail at origin. Buyer procures their own marine insurance.\n\n### Documentation Integrity\nMandatory preparation of clean on-board Bills of Lading, Commercial Invoices, and Official Certificates of Origin eliminates terminal clearance bottlenecks.",
                'ar' => "في تجارة السلع الدولية والشحن البحري، يعتبر اختيار مصطلح التجارة الدولية المناسب (Incoterms) من أهم القرارات التي يتخذها المستورد. تحدد هذه القواعد النقطة الدقيقة التي تنتقل عندها التكاليف والمخاطر والمسؤوليات اللوجستية من المصدر إلى المشتري.\n\n### فوب (FOB - Free On Board)\nتنتهي مسؤولية البائع بمجرد تحميل البضائع على ظهر السفينة المحددة من المشتري في ميناء الشحن. خيار مثالي للمشترين الذين لديهم تعاقدات شحن بحري مسبقة بأسعار مخفضة.\n\n### سيف (CIF - Cost, Insurance & Freight)\nيتكفل البائع بالشحن البحري والتأمين على البضائع حتى ميناء الوصول المحدد. خيار ممتاز للباحثين عن تكلفة نهائية محددة دون عناء إدارة الشحن.\n\n### سي إف آر (CFR - Cost and Freight)\nيدفع البائع تكلفة النقل لميناء الوصول، لكن المخاطر تنتقل بمجرد تحميل البضائع في ميناء الشحن، ويتولى المشتري شراء وثيقة التأمين بنفسه.\n\n### سلامة المستندات والتخليص\nإصدار بوالص شحن بحرية نظيفة (Clean on-board B/L)، وفواتير تجارية مصدقة، وشهادات منشأ رسمية يضمن سرعة الإفراج الجمركي.",
                'fr' => "Dans le commerce international, le choix des Incoterms détermine le transfert des risques et des coûts. Découvrez les différences essentielles entre FOB, CIF et CFR pour vos expéditions maritimes."
            ],
            'author' => 'DIJA Trade Compliance Desk',
            'read_time' => '8 min read',
            'thumbnail' => 'assets/images/blog/blog-2.png',
            'published_at' => now()->subDays(5),
            'is_published' => true,
        ]);

        Post::create([
            'slug' => 'navigating-cold-chain-logistics-perishable-exports',
            'title' => [
                'en' => 'Navigating Global Cold Chain Logistics for Perishable Agricultural Exports',
                'ar' => 'لوجستيات سلسلة التبريد العالمية: إدارة شحن الصادرات الزراعية سريعة التلف',
                'fr' => 'Maîtriser la Logistique Mondiale de la Chaîne du Froid pour les Exportations Périssables'
            ],
            'category' => [
                'en' => 'Cold Chain & Shipping',
                'ar' => 'الشحن والتبريد',
                'fr' => 'Chaîne du froid'
            ],
            'excerpt' => [
                'en' => 'How controlled atmosphere (CA) reefer containers and automated temperature telematics prevent spoilage across extended ocean transit routes.',
                'ar' => 'كيف تحافظ حاويات التبريد المزودة بتقنية التحكم في الغلاف الجوي على طزاجة المحاصيل الزراعية طوال فترات الإبحار الطويلة.',
                'fr' => 'Comment les conteneurs réfrigérés à atmosphère contrôlée préservent la fraîcheur des produits agricoles sur les longues traversées.'
            ],
            'content' => [
                'en' => "Transporting fresh fruits and vegetables requires meticulous temperature, humidity, and gas composition management. Pre-cooling immediately following harvest prevents cellular degradation. Modern Controlled Atmosphere (CA) containers regulate oxygen and carbon dioxide levels to slow down the natural ripening process, ensuring produce arrives in farm-fresh condition.",
                'ar' => "يتطلب شحن الفواكه والخضروات الطازجة إدارة دقيقة لدرجات الحرارة والرطوبة ونسب الغازات داخل الحاويات. التبريد الأولي الفوري بعد الحصاد يمنع تلف الأنسجة النباتية، بينما تعمل تقنيات الغلاف الجوي المتحكم به على إبطاء نضج الثمار لتصل طازجة تماماً للمستهلك.",
                'fr' => "Le transport des fruits et légumes frais exige une gestion rigoureuse de la température et de l'humidité afin de garantir une fraîcheur optimale."
            ],
            'author' => 'Logistics Operations Desk',
            'read_time' => '6 min read',
            'thumbnail' => 'assets/images/blog/blog-3.png',
            'published_at' => now()->subDays(12),
            'is_published' => true,
        ]);

        Post::create([
            'slug' => 'top-phytosanitary-sgs-inspection-protocols',
            'title' => [
                'en' => 'Top Phytosanitary & SGS Inspection Protocols for Destination Customs Clearance',
                'ar' => 'أهم بروتوكولات الفحص النباتي وSGS لتيسير التخليص الجمركي في موانئ الوصول',
                'fr' => 'Protocoles Phytosanitaires & d\'Inspection SGS pour le Dédouanement à Destination'
            ],
            'category' => [
                'en' => 'Quality & Inspection',
                'ar' => 'الجودة والرقابة',
                'fr' => 'Qualité et contrôle'
            ],
            'excerpt' => [
                'en' => 'Essential laboratory screening, sampling protocols, and international quarantine certifications required to avoid port demurrage.',
                'ar' => 'الفحوصات المعملية وإجراءات سحب العينات والشهادات الحجرية الإلزامية لتجنب أية غرامات أو رفض جمركي للشحنات.',
                'fr' => 'Analyses en laboratoire, protocoles d\'échantillonnage et certifications indispensables pour éviter les blocages douaniers.'
            ],
            'content' => [
                'en' => "Customs authorities worldwide enforce stringent quarantine guidelines against crop pests and microbiological contaminants. Engaging accredited surveyors like SGS, Intertek, and Bureau Veritas prior to vessel loading provides immutable proof of compliance, safeguarding your capital.",
                'ar' => "تطبق سلطات الجمارك والحجر الزراعي في كافة دول العالم شروطاً صارمة لحماية بيئتها من الآفات والميكروبات. الاستعانة بجهات فحص معتمدة دولياً مثل SGS وIntertek يوفر دليلاً قاطعاً على مطابقة السلع للمواصفات الدولية ويحمي استثمارات المستورد.",
                'fr' => "Les autorités douanières appliquent des normes de quarantaine rigoureuses. Faire appel à des organismes d'inspection agréés garantit la conformité de vos cargaisons."
            ],
            'author' => 'DIJA Quality Assurance Desk',
            'read_time' => '7 min read',
            'thumbnail' => 'assets/images/blog/blog-1.png',
            'published_at' => now()->subDays(18),
            'is_published' => true,
        ]);

        Post::create([
            'slug' => 'bulk-commodity-sourcing-hedging-strategies',
            'title' => [
                'en' => 'Bulk Commodity Sourcing Strategies: Hedging Against Seasonal Supply Fluctuations',
                'ar' => 'استراتيجيات توريد السلع السائبة: التحوط ضد تقلبات العرض والأسعار الموسمية',
                'fr' => 'Stratégies d\'Approvisionnement en Vrac : Se Couvrir contre les Fluctuations Saisonnières'
            ],
            'category' => [
                'en' => 'Market Advisory',
                'ar' => 'دراسات السوق',
                'fr' => 'Conseil et marchés'
            ],
            'excerpt' => [
                'en' => 'How commercial buyers leverage forward contracts and multi-origin sourcing matrices to secure reliable commodity shipments.',
                'ar' => 'كيف يستخدم كبار المستوردين العقود الآجلة وتنويع مصادر التوريد لتأمين الإمدادات بأسعار مستقرة.',
                'fr' => 'Comment les acheteurs industriels utilisent les contrats à terme pour sécuriser leurs approvisionnements.'
            ],
            'content' => [
                'en' => "Commodity markets are subject to climate cycles, export quotas, and geopolitical shifts. Developing a multi-origin sourcing network ensures your processing plants never experience downtime due to regional shortages.",
                'ar' => "تتأثر أسواق السلع الأساسية بالعوامل المناخية والسياسات التصديرية. بناء شبكة توريد متعددة المناشئ يضمن استمرار تشغيل المصانع وتدفق السلع دون انقطاع.",
                'fr' => "Les marchés des matières premières connaissent des cycles volatils. La diversification des sources d'approvisionnement préserve la rentabilité de votre entreprise."
            ],
            'author' => 'Commodity Trade Desk',
            'read_time' => '5 min read',
            'thumbnail' => 'assets/images/blog/blog-4.png',
            'published_at' => now()->subDays(25),
            'is_published' => true,
        ]);

        Post::create([
            'slug' => 'digital-bills-of-lading-modern-customs-brokerage',
            'title' => [
                'en' => 'Digital Bills of Lading and Modern Customs Brokerage: Accelerating Port Clearance',
                'ar' => 'بوالص الشحن الرقمية والتخليص الجمركي الحديث: تسريع الإفراج عن البضائع في الموانئ',
                'fr' => 'Connaissements Numériques & Courtage Douanier Moderne : Accélérer le Dédouanement'
            ],
            'category' => [
                'en' => 'Digital Trade & Logistics',
                'ar' => 'التجارة الرقمية واللوجستيات',
                'fr' => 'Logistique numérique'
            ],
            'excerpt' => [
                'en' => 'Transitioning from paper documentation to electronic Bills of Lading (eB/L) to eliminate courier delays and administrative friction.',
                'ar' => 'التحول إلى بوالص الشحن الإلكترونية والمستندات الرقمية لتفادي تأخير البريد السريع وتسريع التخليص في الموانئ.',
                'fr' => 'La transition vers les connaissements électroniques (eB/L) réduit les délais administratifs et sécurise les transactions.'
            ],
            'content' => [
                'en' => "Paper documents sent via international couriers frequently arrive after cargo discharge, resulting in unnecessary container demurrage charges. Electronic Bills of Lading (eB/L) offer instant bank-to-bank transfer, complete cryptographic security, and rapid clearance.",
                'ar' => "كثيراً ما تتأخر المستندات الورقية المرسلة عبر البريد السريع مقارنة بوصول السفن، مما يكلف المستوردين غرامات انتظار باهظة. توفر بوالص الشحن الرقمية تحويلاً بنكياً فورياً وأماناً تاماً يسرع الإفراج عن الحاويات.",
                'fr' => "Les connaissements électroniques éliminent les risques de retard de courrier et permettent un dédouanement immédiat à l'arrivée du navire."
            ],
            'author' => 'Maritime Operations Team',
            'read_time' => '6 min read',
            'thumbnail' => 'assets/images/blog/blog-5.png',
            'published_at' => now()->subDays(30),
            'is_published' => true,
        ]);

        Post::create([
            'slug' => 'sustainable-packaging-international-freight',
            'title' => [
                'en' => 'Sustainable Packaging in International Freight: Reducing Container Footprint',
                'ar' => 'التعبئة المستدامة في الشحن الدولي: تقليل البصمة البيئية وتحسين استيعاب الحاويات',
                'fr' => 'Conditionnement Durable dans le Fret International : Réduire l\'Empreinte Conteneur'
            ],
            'category' => [
                'en' => 'Sustainability & Packing',
                'ar' => 'الاستدامة والتعبئة',
                'fr' => 'Emballage durable'
            ],
            'excerpt' => [
                'en' => 'Innovative bulk bags, flexitanks, and recyclable liners that maximize container payload while cutting global carbon footprint.',
                'ar' => 'أكياس التعبئة العملاقة وحاويات الفليكسي تانك الصديقة للبيئة لزيادة الحمولة وخفض انبعاثات الشحن.',
                'fr' => 'Des solutions d\'emballage innovantes pour maximiser le volume utile des conteneurs tout en réduisant l\'impact environnemental.'
            ],
            'content' => [
                'en' => "Modern international trade demands both economic efficiency and environmental responsibility. Utilizing reusable FIBC bulk bags and recyclable container liners increases net cargo capacity by up to 14% while drastically lowering packaging waste.",
                'ar' => "تتطلب التجارة الدولية الحديثة الجمع بين الجدوى الاقتصادية والمسؤولية البيئية. استخدام أكياس التعبئة القابلة لإعادة التدوير يزيد من سعة استيعاب الحاويات بنسبة تصل إلى 14% ويقلل من الهدر.",
                'fr' => "L'optimisation des emballages de transport permet de maximiser le fret utile et de diminuer les coûts logistiques globaux."
            ],
            'author' => 'Sustainability & Trade Desk',
            'read_time' => '5 min read',
            'thumbnail' => 'assets/images/blog/blog-6.png',
            'published_at' => now()->subDays(35),
            'is_published' => true,
        ]);

        // 6. Team Members (from Static Version)
        TeamMember::truncate();
        TeamMember::create([
            'name' => [
                'en' => 'Clade Owen',
                'ar' => 'كلايد أوين',
                'fr' => 'Clade Owen'
            ],
            'designation' => [
                'en' => 'CEO & International Trade Director',
                'ar' => 'الرئيس التنفيذي ومدير التجارة الدولية',
                'fr' => 'PDG & Directeur du commerce international'
            ],
            'photo' => 'assets/images/team/team-2.png',
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'linkedin' => 'https://linkedin.com',
            'sort_order' => 1,
        ]);

        TeamMember::create([
            'name' => [
                'en' => 'John Lee',
                'ar' => 'جون لي',
                'fr' => 'John Lee'
            ],
            'designation' => [
                'en' => 'Head of Maritime Logistics & Chartering',
                'ar' => 'رئيس قطاع الشحن البحري واستئجار السفن',
                'fr' => 'Responsable logistique maritime et affrètement'
            ],
            'photo' => 'assets/images/team/team-3.png',
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'linkedin' => 'https://linkedin.com',
            'sort_order' => 2,
        ]);

        TeamMember::create([
            'name' => [
                'en' => 'William John',
                'ar' => 'ويليام جون',
                'fr' => 'William John'
            ],
            'designation' => [
                'en' => 'Director of Customs & Quality Inspection',
                'ar' => 'مدير التخليص الجمركي وفحوصات الجودة',
                'fr' => 'Directeur des douanes et du contrôle qualité'
            ],
            'photo' => 'assets/images/team/team-1.png',
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'linkedin' => 'https://linkedin.com',
            'sort_order' => 3,
        ]);
    }
}
