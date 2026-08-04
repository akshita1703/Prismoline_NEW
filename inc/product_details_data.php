<?php
/**
 * Rich content for individual product detail pages (product-details.php).
 * Keyed by url_slug so product-details.php?product=<slug> can look it up.
 * Only one product (SNOW) is filled in for now — add more the same way.
 */

$product_details = [

    'thermoplastic-road-marking-snow-white' => [
        'cat_slug'    => 'thermo-plastic-road-making',
        'cat_name'    => 'Thermo Plastic Road Marking',
        'name'        => 'SNOW',
        'full_name'   => 'Thermoplastic Snow White Road Marking Paint',
        'tagline'     => 'High-brightness, MoRTH & BS 3262 compliant hot-melt road marking compound',
        'image'       => '101A.webp',
        'description' => 'SNOW is a premium snow-white thermoplastic road marking compound engineered for maximum retroreflectivity and long-term pavement adhesion. Designed for highways, expressways, and urban roads where luminance contrast is critical, SNOW meets stringent MoRTH and international road marking standards. Its high-whiteness formulation ensures exceptional daytime visibility and night-time performance when used with glass bead drop-on systems. Ideal for procurement in NHAI, PMGSY, and smart city road infrastructure projects.',

        'spec_chips' => [
            ['label' => 'Base', 'value' => 'Hydrocarbon / Alkyn Resin'],
            ['label' => 'Colour', 'value' => 'Snow White'],
            ['label' => 'Packaging', 'value' => '25 kg bags'],
            ['label' => 'Application Temp', 'value' => '180–200°C'],
        ],

        'features' => [
            'High whiteness index for superior daytime visibility',
            'Excellent retroreflectivity with glass bead integration',
            'Strong adhesion to bituminous and cement concrete surfaces',
            'Fast set time minimising traffic disruption',
            'MoRTH 803 & BS 3262 compliant',
            'Resistant to fuel, oil, and UV degradation',
        ],

        'specs' => [
            'Base' => 'Hydrocarbon Resin / Alkyn Resin',
            'Colour' => 'Snow White (High Whiteness Index)',
            'Binder Content' => '≥18%',
            'Glass Bead Content' => '18–20% premixed',
            'Application Temp' => '180–200°C',
            'Thickness' => '1.5–3.0 mm',
            'Bond Strength' => '≥1.5 MPa',
            'Drying Time' => '<1 min @ 20°C',
            'Packaging' => '25 kg bags',
        ],

        'applications' => [
            'National Highways & Expressways',
            'State Highways & MDRs',
            'Urban Roads & Smart City Projects',
            'Airport Aprons & Taxiways',
            'PMGSY Rural Road Programs',
            'Industrial Zones & Port Roads',
        ],

        'faqs' => [
            [
                'q' => 'What makes SNOW thermoplastic paint different from standard white road marking paint?',
                'a' => 'SNOW uses a high-purity titanium dioxide base that delivers superior whiteness index and retroreflectivity compared to standard thermoplastic compounds. It is engineered for high-traffic national and state highway applications.',
            ],
            [
                'q' => 'Is SNOW thermoplastic paint compliant with MoRTH specifications?',
                'a' => 'Yes, SNOW is formulated to comply with MoRTH Section 803 road marking specifications and is suitable for submission in government tenders and highway contracts.',
            ],
            [
                'q' => 'What is the recommended application temperature for SNOW thermoplastic paint?',
                'a' => 'SNOW is typically applied at 180–200°C using screed or extrusion machines. The compound bonds effectively to both bituminous and concrete pavement surfaces.',
            ],
            [
                'q' => 'Can SNOW be used with glass bead drop-on systems?',
                'a' => 'Yes, SNOW is designed to work with drop-on glass beads (BS 6088 Class B) to enhance night-time retroreflection. Pre-mixed beads can also be incorporated.',
            ],
        ],

        'seo_title' => 'High-Whiteness Thermoplastic Road Marking Paint | Prismoline',
        'seo_desc'  => 'SNOW delivers maximum retroreflectivity and brightness for highway road markings, engineered for long lasting visibility in all conditions.',
        'seo_keywords' => 'High Whiteness Thermoplastic Road Marking Paint, White Road Marking Paint, Reflective Road Paint, Highway Lane Marking Paint',
    ],

];
