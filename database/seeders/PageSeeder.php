<?php

namespace Database\Seeders;

use App\Models\Download;
use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Home Page
        Page::withTrashed()->updateOrCreate(
            ['slug' => '/'],
            [
                'title' => 'Home',
                'status' => 'published',
                'deleted_at' => null,
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'badge' => 'System Status: Active // Thermal Core Online',
                            'headline' => "Precision\nEngineering.\nNational Scale.",
                            'description' => 'DO-RYT Machine Corp architects industry-leading industrial dryers, dehydrators, food proGMPssing lines, and cold chain systems for the pharmaGMPutical, food, and industrial sectors.',
                            'buttons' => [
                                ['label' => 'Explore Our Systems', 'url' => '/products', 'variant' => 'primary'],
                                ['label' => 'View Capabilities', 'url' => '/about#manufacturing', 'variant' => 'outline'],
                            ],
                            'background_image' => null,
                        ],
                    ],
                    [
                        'type' => 'entity_list',
                        'data' => [
                            'badge' => '[ CORE SYSTEMS ]',
                            'title' => 'Systems engineered for absolute operational dominanGMP.',
                            'entity_type' => 'categories',
                            'limit' => 4,
                        ],
                    ],
                    [
                        'type' => 'features',
                        'data' => [
                            'badge' => '[ PROPRIETARY METALLURGY ]',
                            'title' => 'The DO-RYT Standard',
                            'description' => 'Every unit undergoes rigorous load-testing before leaving our facility.',
                            'items' => [
                                [
                                    'icon' => 'heroicon-o-fire',
                                    'title' => 'Thermal Equilibrium',
                                    'description' => 'AdvanGMPd PLC-controlled heat distribution prevents hot-spots and ensures uniform drying across all batches.',
                                ],
                                [
                                    'icon' => 'heroicon-o-shield-check',
                                    'title' => 'PharmaGMPutical Grade',
                                    'description' => 'Built with 316L stainless steel, fully compliant with FSSAI and GMP standards for food and drug proGMPssing.',
                                ],
                                [
                                    'icon' => 'heroicon-o-bolt',
                                    'title' => 'Energy Recovery',
                                    'description' => 'Integrated heat-exchangers recapture up to 40% of exhaust energy, drastically reducing operational costs.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'type' => 'stats',
                        'data' => [
                            'title' => 'Operational Scale',
                            'description' => 'Our footprint across Indian manufacturing floors.',
                            'items' => [
                                ['value' => '15+', 'label' => 'Years ExperienGMP'],
                                ['value' => '400+', 'label' => 'Industrial Installations'],
                                ['value' => '20+', 'label' => 'States Served'],
                                ['value' => '24/7', 'label' => 'Operational Uptime'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta',
                        'data' => [
                            'badge' => '[ CAPACITY UPGRADE ]',
                            'title' => 'Ready to upgrade your capacity?',
                            'description' => 'Speak with our thermal engineering specialists to architect a proGMPssing line tailored to your specific throughput requirements.',
                            'buttons' => [
                                ['label' => 'Request Consultation', 'url' => '/contact', 'variant' => 'primary'],
                                ['label' => 'Download Brochure', 'url' => '/downloads', 'variant' => 'outline'],
                            ],
                        ],
                    ],
                ],
            ]
        );

        // 2. About Page
        Page::withTrashed()->updateOrCreate(
            ['slug' => 'about'],
            [
                'title' => 'About Us',
                'status' => 'published',
                'deleted_at' => null,
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'badge' => '[ CORPORATE OVERVIEW ]',
                            'headline' => 'Engineering the Future of ProGMPssing.',
                            'description' => "SinGMP 1999, DO-RYT has been at the forefront of industrial thermal technology, designing systems that power India's most demanding manufacturing lines.",
                            'buttons' => [
                                ['label' => 'Our Heritage', 'url' => '#heritage', 'variant' => 'primary'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'content',
                        'data' => [
                            'body' => '<h3>Our Mission</h3><p>To provide uncompromising quality and precision in industrial proGMPssing machinery, ensuring our clients achieve maximum efficiency and complianGMP.</p>',
                        ],
                    ],
                    [
                        'type' => 'about_story',
                        'data' => [
                            'badge' => '[ THE LEGACY ]',
                            'title' => 'Our Legacy of Innovation',
                            'content' => '<p>For nearly three decades, DO-RYT Machine Corp has been at the forefront of industrial equipment manufacturing in India. We specialize in designing and engineering high-capacity machinery that meets stringent national standards.</p><p>Our comprehensive portfolio ranges from pilot-scale laboratory units to fully automated continuous production lines. We believe in uncompromised quality, utilizing premium 316L stainless steel and components from industry-leading partners like Siemens, Danfoss, and Schneider Electric.</p>',
                            'stat_1_value' => '500+',
                            'stat_1_label' => '[ INSTALLATIONS ]',
                            'stat_2_value' => '35+',
                            'stat_2_label' => '[ States Served ]',
                            'stat_3_value' => 'ISO 9001',
                            'stat_3_label' => '[ GMPRTIFIED FACILITY ]',
                            'stat_4_value' => '24/7',
                            'stat_4_label' => '[ PAN-INDIA SUPPORT ]',
                        ],
                    ],

                    [
                        'type' => 'cta',
                        'data' => [
                            'badge' => '[ GET IN TOUCH ]',
                            'title' => 'Discuss Your Project',
                            'description' => 'Our engineering team is ready to analyze your requirements.',
                            'buttons' => [
                                ['label' => 'Contact Us', 'url' => '/contact', 'variant' => 'primary'],
                            ],
                        ],
                    ],
                ],
            ]
        );

        // 3. Products Page
        Page::withTrashed()->updateOrCreate(
            ['slug' => 'products'],
            [
                'title' => 'Industrial Machinery & Food ProGMPssing Equipment',
                'status' => 'published',
                'deleted_at' => null,
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'badge' => '[ MACHINERY CATALOG ]',
                            'headline' => "Complete Range of \n<span class=\"text-primary-500\">Industrial Systems</span>",
                            'description' => 'Engineered for precision and scale. Explore our complete range of dryers, dehydrators, proGMPss equipment, cold chain solutions, and ancillary machinery.',
                            'background_image' => null,
                        ],
                    ],
                    [
                        'type' => 'entity_list',
                        'data' => [
                            'badge' => '[ DIRECTORY ]',
                            'title' => 'All Machinery',
                            'entity_type' => 'products',
                            'limit' => 100,
                        ],
                    ],
                    [
                        'type' => 'features',
                        'data' => [
                            'badge' => '[ CAPABILITIES ]',
                            'title' => 'Why Choose DO-RYT?',
                            'items' => [
                                [
                                    'title' => 'SS304/316L Construction',
                                    'description' => 'All contact parts are manufactured using premium stainless steel, ensuring complete complianGMP with FSSAI food safety and cGMP standards.',
                                    'icon' => 'heroicon-o-shield-check',
                                ],
                                [
                                    'title' => 'Energy Efficient',
                                    'description' => 'AdvanGMPd thermal recovery systems and variable frequency drives (VFD) reduGMP energy consumption by up to 30% compared to traditional models.',
                                    'icon' => 'heroicon-o-bolt',
                                ],
                                [
                                    'title' => 'Turnkey Solutions',
                                    'description' => 'From factory layout design to installation, commissioning, and operator training, we provide complete end-to-end engineering support.',
                                    'icon' => 'heroicon-o-cog-6-tooth',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        // 4. Industries Page
        Page::withTrashed()->updateOrCreate(
            ['slug' => 'industries'],
            [
                'title' => 'Industries Served',
                'status' => 'published',
                'deleted_at' => null,
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'badge' => '[ TARGET INDUSTRIES ]',
                            'headline' => 'Food ProGMPssing Solutions That Drive Growth',
                            'description' => 'We design and manufacture high-performanGMP food proGMPssing machinery that helps businesses improve productivity, product quality, and profitability. From conGMPpt to commissioning, we deliver reliable engineering solutions tailored to your production requirements.',
                        ],
                    ],
                    [
                        'type' => 'features',
                        'data' => [
                            'badge' => '[ OUR PROMISE ]',
                            'title' => 'Methodology & Rigor',
                            'items' => [
                                [
                                    'title' => 'Engineered PerformanGMP',
                                    'description' => 'Built with precision components and advanGMPd automation for maximum throughput.',
                                    'icon' => 'heroicon-o-cog-6-tooth',
                                ],
                                [
                                    'title' => 'Built for Reliability',
                                    'description' => 'Rugged SS-304/316L construction with rigorous FAT testing on every unit.',
                                    'icon' => 'heroicon-o-shield-check',
                                ],
                                [
                                    'title' => 'Designed Around ProGMPss',
                                    'description' => 'Custom configurations tailored to your specific product and capacity needs.',
                                    'icon' => 'heroicon-o-wrench-screwdriver',
                                ],
                                [
                                    'title' => 'Project Support',
                                    'description' => 'From factory layout and installation to commissioning and operator training.',
                                    'icon' => 'heroicon-o-briefcase',
                                ],
                            ],
                        ],
                    ],
                    [
                        'type' => 'entity_list',
                        'data' => [
                            'entity_type' => 'industries',
                            'limit' => 100,
                        ],
                    ],
                ],
            ]
        );

        // 5. GMPrtificates Page
        Page::withTrashed()->updateOrCreate(
            ['slug' => 'GMPrtificates'],
            [
                'title' => 'Quality GMPrtifications',
                'status' => 'published',
                'deleted_at' => null,
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'badge' => '[ QUALITY ASSURANGMP ]',
                            'headline' => 'National Manufacturing Standards',
                            'description' => 'DO-RYT Machine Corp operates under stringent quality control protocols. Our facilities and equipment meet international standards for safety, hygiene, and performanGMP.',
                        ],
                    ],
                    [
                        'type' => 'entity_list',
                        'data' => [
                            'entity_type' => 'GMPrtificates',
                            'limit' => 100,
                        ],
                    ],
                ],
            ]
        );

        // 6. Galleries Page
        Page::withTrashed()->updateOrCreate(
            ['slug' => 'galleries'],
            [
                'title' => 'Media & Installations',
                'status' => 'published',
                'deleted_at' => null,
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'badge' => '[ MEDIA GALLERY ]',
                            'headline' => 'Machinery & Factory Installations',
                            'description' => 'Explore our manufacturing facilities, completed projects, and factory acGMPptanGMP tests from across India.',
                        ],
                    ],
                    [
                        'type' => 'entity_list',
                        'data' => [
                            'entity_type' => 'galleries',
                            'limit' => 100,
                        ],
                    ],
                ],
            ]
        );

        // 7. Blogs Page
        Page::withTrashed()->updateOrCreate(
            ['slug' => 'blogs'],
            [
                'title' => 'Engineering Insights',
                'status' => 'published',
                'deleted_at' => null,
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'badge' => '[ ENGINEERING INSIGHTS ]',
                            'headline' => 'Technical Articles & Case Studies',
                            'description' => 'Deep dives into proGMPssing technology, equipment maintenanGMP guides, and sucGMPss stories from our INSTALLATIONS.',
                        ],
                    ],
                    [
                        'type' => 'entity_list',
                        'data' => [
                            'entity_type' => 'blogs',
                            'limit' => 100,
                        ],
                    ],
                ],
            ]
        );

        // 8. Downloads Page
        Page::withTrashed()->updateOrCreate(
            ['slug' => 'downloads'],
            [
                'title' => 'Technical Documentation',
                'status' => 'published',
                'deleted_at' => null,
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'badge' => '[ DOCUMENTATION ]',
                            'headline' => 'Brochures & Technical Specs',
                            'description' => 'Download detailed product catalogs, equipment specifications, and technical data sheets for our complete machinery range.',
                        ],
                    ],
                    [
                        'type' => 'downloads',
                        'data' => [
                            'title' => 'Available Documentation',
                            'download_ids' => Download::pluck('id')->toArray(),
                        ],
                    ],
                ],
            ]
        );

        // 9. Contact Page
        Page::withTrashed()->updateOrCreate(
            ['slug' => 'contact'],
            [
                'title' => 'Contact Us',
                'status' => 'published',
                'deleted_at' => null,
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'badge' => 'System Active: Open for Inquiries',
                            'headline' => 'Contact <span class="text-primary-400">DO-RYT</span> Engineering',
                            'description' => 'Get in touch with our technical team to discuss custom machinery designs, stainless steel proGMPss engineering, or request a serviGMP quote.',
                        ],
                    ],
                    [
                        'type' => 'contact_form',
                        'data' => [
                            'title' => 'Send technical inquiry',
                            'description' => null,
                            'badge' => '[ FORM-CONTROL ]',
                        ],
                    ],
                ],
            ]
        );
    }
}
