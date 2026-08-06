<?php
/**
 * Rich category-level content, sourced from the live prismoline.com site.
 *
 * 'intro' / 'outro' paragraphs may contain inline <strong> markup (this is
 * static, hardcoded content — not user input — so products.php renders it
 * unescaped rather than through htmlspecialchars()).
 *
 * 'intro' / 'features' render inside the Category Hero body on products.php
 * (replacing the short cat_blurb) for every category that has them.
 *
 * 'sub_points' / 'specs' / 'lists' render in the content block below the
 * hero, only for categories that have no individual per-SKU products
 * (Reflectometer, Signages, Crash Barrier) in place of a "coming soon"
 * message.
 */

$category_content = [

    'thermo-plastic-road-making' => [
        'intro' => [
            '<strong>PRISMOLINE</strong> — <strong>Thermoplastic Road Marking Materials</strong> are high-performance solutions engineered for durability, visibility, and safety.',
            'Formulated with <strong>advanced thermoplastic technology</strong>, it offers:',
        ],
        'features' => [
            'Exceptional adhesion to a wide range of road surfaces.',
            'Superior wear resistance for long-lasting markings.',
            'Outstanding retro-reflectivity, ensuring high visibility day and night.',
            'Quick-drying properties for faster project completion.',
            'Optimal skid resistance for enhanced road safety.',
        ],
        'outro' => [
            'Designed for <strong>highways, urban roads, parking lots,</strong> and <strong>more</strong>, Prismoline\'s road marking material maintains superior performance even under extreme weather conditions.',
            'In addition, its <strong>eco-friendly</strong> formulation minimizes environmental impact while meeting stringent international quality standards, including <strong>MoRTH 803.4</strong> and <strong>BS 3262</strong>.',
            'Trusted by professionals worldwide, Prismoline delivers reliable and efficient road marking solutions you can count on.',
        ],
    ],

    'glass-beads' => [
        'intro' => [
            'Glass Beads are widely used in <strong>road marking and traffic safety applications</strong> to enhance the visibility of road lines and symbols. When applied on road marking surfaces, these reflective beads help improve the visibility of markings by reflecting light from vehicle headlights, making them easier to see during night-time and low-light conditions. Glass beads are commonly used along with <strong>thermoplastic road marking paint, traffic paint, and highway marking materials</strong> to support safer and clearer traffic guidance on highways, city roads, parking areas, and airport runways.',
            'Road marking to <strong>BS 6088B</strong> standard.',
        ],
        'features' => [
            'Used in road marking and highway safety applications.',
            'Helps improve visibility of traffic markings and lane lines.',
            'Commonly applied with thermoplastic and road marking paints.',
            'Supports better night-time and low-light visibility.',
            'Suitable for highways, urban roads, parking areas, and airports.',
            'Helps enhance overall road safety and traffic guidance.',
        ],
    ],

    'prismolite-products' => [
        'intro' => [
            '<strong>PRISMOLITE</strong> is a trusted brand committed to enhancing road safety and visibility through innovative, high-performance solutions. Our product line includes premium <strong>Glass Beads</strong> designed for reflective road markings, offering superior visibility in dry, wet, and low-light conditions. Beyond glass beads, PRISMOLITE also offers a comprehensive range of <strong>Road Safety Products</strong> tailored to meet global standards.',
            '<strong>PRISMOLITE Road Studs</strong> — our latest innovation — are engineered for superior durability and crack-resistant lenses. Made with advanced moulding and high-quality materials, they ensure long-lasting optical clarity and strength even under extreme impact and weather.',
        ],
    ],

    'aquatrak-wb' => [
        'intro' => [
            'Prismoline AquaTrak WB Water Based Acrylic Road Marking Paint is a premium fast-drying water-based road marking paint engineered for highways, city roads, parking facilities, airports, industrial premises, and traffic management applications. Formulated with high-quality acrylic polymers, it provides excellent adhesion, high visibility, and long-lasting performance on asphalt and concrete surfaces while being environmentally friendly with low VOC emissions.',
            'Designed to comply with IS 164 standards, AquaTrak WB delivers durable lane markings with quick drying times, making it ideal for projects requiring minimal traffic disruption. Suitable for brush, roller, and airless spray applications, it offers consistent colour retention, weather resistance, and excellent daytime visibility for a wide range of road safety projects.',
        ],
        'features' => [
            'Fast-drying water-based acrylic road marking paint.',
            'Manufactured in accordance with IS 164 standards.',
            'Excellent adhesion on asphalt and concrete surfaces.',
            'High daytime visibility with durable colour retention.',
            'Low VOC, eco-friendly, and environmentally responsible formulation.',
            'Easy application using brush, roller, or airless spray.',
            'Weather-resistant and UV-stable for long outdoor service life.',
            'Smooth, uniform finish with excellent coverage.',
            'Ideal for roads, parking facilities, airports, and industrial premises.',
            'Cost-effective solution for municipal and infrastructure road marking projects.',
        ],
    ],

    'proGrip' => [
        'intro' => [
            'Prismoline ProGrip Concrete Primer is a premium road marking primer specially formulated to improve the adhesion of thermoplastic road marking paint and cold plastic road marking systems on concrete, aged asphalt, and other challenging pavement surfaces. Engineered with high-performance resins, it creates a strong bonding layer that enhances coating durability, minimizes peeling, and extends the service life of pavement markings.',
            'Designed for professional road marking applications, ProGrip provides rapid drying, easy application, and superior penetration into porous surfaces. Suitable for highways, airports, parking facilities, industrial premises, municipal roads, and infrastructure projects, it ensures long-lasting adhesion and reliable performance under varying traffic and weather conditions.',
        ],
        'features' => [
            'High-performance primer for thermoplastic and cold plastic road markings.',
            'Improves adhesion on concrete and aged asphalt surfaces.',
            'Fast-drying formulation for quicker project completion.',
            'Enhances the durability and service life of pavement markings.',
            'Excellent penetration into porous surfaces.',
            'Easy application by spray, roller, or brush.',
            'Clear liquid formulation for uniform surface preparation.',
            'Reduces peeling, cracking, and delamination.',
            'Suitable for highways, airports, parking areas, and industrial projects.',
            'Compatible with thermoplastic and MMA cold plastic marking systems.',
        ],
    ],

    'proguard' => [
        'intro' => [
            'Prismoline ProGuard Cold Plastic Road Marking Paint is a premium 2K MMA-based cold plastic road marking system engineered for long-lasting, high-performance pavement markings on highways, intersections, airports, cycle tracks, pedestrian crossings, industrial facilities, and urban infrastructure projects. Manufactured using advanced methyl methacrylate (MMA) technology, it delivers exceptional abrasion resistance, superior adhesion, high skid resistance, and outstanding durability under heavy traffic conditions.',
            'Designed for long-term road safety applications, ProGuard 2K and ProGuard ATM provide excellent weather resistance, colour retention, and rapid curing, making them ideal for permanent road markings that demand extended service life and reduced maintenance. Suitable for asphalt and concrete pavements, ProGuard offers superior visibility and reliable performance in demanding traffic environments.',
        ],
        'features' => [
            'High-performance 2K MMA-based cold plastic road marking paint.',
            'Exceptional wear and abrasion resistance for heavy traffic roads.',
            'Excellent adhesion on asphalt and concrete pavements.',
            'High skid resistance for improved road safety.',
            'Fast curing with minimal traffic disruption.',
            'Long service life with excellent colour retention.',
            'UV, weather, and chemical-resistant formulation.',
            'Suitable for spray, screed, and structured road markings.',
            'Ideal for pedestrian crossings, cycle tracks, airports, and highways.',
            'Cost-effective solution for permanent pavement marking applications.',
        ],
    ],

    'reflectometer' => [
        'tagline' => 'PLTRM-003',
        'intro' => [
            '<strong>PLTRM-003</strong> is a portable on-site instrument which stimulates the brightness of road and airport marking that can be seen by the driver under the illumination of motor vehicles, and determines the retro reflection characteristic. It supports simultaneous measurement of index of day visibility (Qd), night visibility (RL), temperature and humidity efficiently.',
        ],
        'features' => [
            'Equipped with imported sensor to ensure accuracy of measurement.',
            'Colour touch screen real-time display of temperature and humidity.',
            'Ultrafast retroreflectometer measurement.',
            'Real-time voice broadcast for test data.',
            'USB port for test data exporting to computer.',
            'Mini Bluetooth printer.',
            'GPS for longitude and latitude for each test data.',
        ],
    ],

    'signages' => [
        'intro' => [
            '<strong>Prismoline Road Signage Boards</strong> are high-performance reflective traffic signs designed to improve road safety, regulate traffic movement, and provide clear guidance for motorists and pedestrians. Manufactured using premium reflective sheeting and durable substrates, our signage delivers superior visibility during daytime, nighttime, and adverse weather conditions.',
            'Designed in accordance with <strong>IRC & MoRTH standards</strong>, Prismoline road signages are corrosion-resistant, UV-stable, weatherproof, and built for long-term outdoor performance. Our range includes Warning, Regulatory, Mandatory, Directional, and Informatory sign boards suitable for highways, urban roads, industrial zones, airports, ports, educational campuses, smart city projects, and commercial developments across India.',
        ],
        'specs' => [
            'Material' => 'GI Sheet / ACP / Aluminium',
            'Reflective Sheeting' => 'Engineering Grade, HIP & Diamond Grade',
            'Standards' => 'IRC & MoRTH Compliant',
            'Thickness' => 'As per project specifications',
            'Mounting' => 'Pole Mounted / Gantry Mounted / Wall Mounted',
            'Weather Resistance' => 'UV Resistant & Corrosion Resistant',
            'Visibility' => 'High Day & Night Retroreflectivity',
            'Customization' => 'Multiple Sizes & Designs Available',
        ],
        'lists' => [
            [
                'title' => 'Applications',
                'items' => [
                    'National & State Highways',
                    'Municipal & Urban Roads',
                    'Smart City Projects',
                    'Industrial Parks',
                    'Airports & Ports',
                    'Educational Campuses',
                    'Residential & Commercial Areas',
                    'Parking Facilities & Toll Plazas',
                ],
            ],
            [
                'title' => 'Key Features',
                'items' => [
                    'Premium Reflective Sheeting',
                    'Excellent Day & Night Visibility',
                    'IRC & MoRTH Compliant',
                    'Weatherproof Construction',
                    'Corrosion Resistant',
                    'Long Service Life',
                    'Custom Sizes & Symbols',
                    'Bilingual Sign Boards Available',
                ],
            ],
            [
                'title' => 'Benefits',
                'items' => [
                    'Improves Road Safety',
                    'Reduces Traffic Accidents',
                    'Enhances Traffic Management',
                    'Clear Navigation & Guidance',
                    'Reliable in All Weather Conditions',
                    'Complies with Indian Standards',
                    'Low Maintenance',
                    'Ideal for Government & Infrastructure Projects',
                ],
            ],
        ],
    ],

    'crash-barrier' => [
        'intro' => [
            '<strong>W-Beam</strong> and <strong>Thrie Beam</strong> Crash Barrier Systems are essential road safety components designed to prevent vehicles from veering off the roadway and to reduce collision severity. Commonly installed along <strong>highways, bridges, medians,</strong> and <strong>hazardous curves,</strong> these systems are engineered for <strong>high-impact resistance</strong> and <strong>reliable vehicle redirection</strong>.',
            'Both systems are manufactured from high-tensile steel and hot-dip galvanized for long-term durability and corrosion resistance.',
        ],
        'sub_points' => [
            ['label' => 'W-Beam', 'text' => 'Two-wave profile; ideal for standard roadside applications with efficient energy absorption.'],
            ['label' => 'Thrie Beam', 'text' => 'Triple-wave profile; offers greater strength and containment, suitable for high-risk, high-traffic zones.'],
        ],
        'lists' => [
            [
                'title' => 'Key Features',
                'items' => [
                    'High strength for impact absorption & reliable vehicle containment',
                    'Superior corrosion resistance with hot-dip galvanized coating',
                    'Efficient energy dissipation to reduce secondary collisions',
                    'Modular design for quick installation and low maintenance',
                    'Standards compliant with IRC, MoRTH, and global safety norms',
                ],
            ],
            [
                'title' => 'Applications',
                'items' => [
                    'National & State Highways',
                    'Flyovers & Bridges',
                    'Median Dividers & Expressways',
                    'Sharp Curves, Embankments, and Accident-Prone Areas',
                ],
            ],
        ],
    ],

];
