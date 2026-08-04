<?php

date_default_timezone_set('Asia/Kolkata');

// Site is now a flat structure (all pages in the root folder), so every
// asset/link is just a relative path from root — no absolute domain,
// no per-page "../" paths to keep track of.
$base_url = "";

// Contact / company info -----------------------------------------------

$main_phone = "+91-7033275747";
$WhatsApp   = "917033275747";
$message    = "Hi, I'm interested in Prismoline's road marking products.";
$encoded_message = urlencode($message);

$map = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3662.5426377271806!2d85.4455348!3d23.36857888!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f4fda463270335%3A0x1f74f49f1078a4a6!2sSharda%20InfraSolutions%20Private%20Limited!5e0!3m2!1sen!2sin!4v1761973435715!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';

// Products (static content — the admin-managed product CRUD system has
// been dropped per request; this array is now the single source of
// truth for what's shown on products.php). -----------------------------

require_once __DIR__ . '/products_data.php';

// Client logos ------------------------------------------------------

$client_logo = [
    ["name" => "Ceigall India Ltd", "url" => "cpe.png", "link" => 'https://ceigall.com/'],
    ["name" => "Cube Highways Trust", "url" => "cubehighways.png", "link" => 'https://www.cubehighwaystrust.com/'],
    ["name" => "S&P Infrastructure Developers Pvt. Ltd.", "url" => "dpl.png", "link" => 'https://spinfra.in/'],
    ["name" => "Elsamex", "url" => "elsamex.png", "link" => 'https://emslindia.com/'],
    ["name" => "RWD | Government of Bihar", "url" => "gkv.png", "link" => 'https://state.bihar.gov.in/rwdbihar/CitizenHome.html'],
    ["name" => "Hari Construction", "url" => "hari.png", "link" => 'https://hariconstructions.co.in/'],
    ["name" => "Jindal Steel", "url" => "jindal.png", "link" => 'https://www.jindalsteel.in/'],
    ["name" => "Kram Infracon Pvt. Ltd.", "url" => "kram.png", "link" => 'https://kraminfracon.co.in/'],
    ["name" => "Kunal Structure (India) Pvt. Ltd.", "url" => "ksipl.png", "link" => 'javascript:void(0)'],
    ["name" => "Larsen & Toubro", "url" => "l_n_t.png", "link" => 'https://www.larsentoubro.com/'],
    ["name" => "Ministry of Road Transport and Highways", "url" => "mrth.png", "link" => 'https://morth.gov.in/'],
    ["name" => "National Highways Authority of India", "url" => "nhai.png", "link" => 'https://nhai.gov.in/'],
    ["name" => "P L Grandsons Astec Private Limited", "url" => "plga.png", "link" => 'https://plgapl.com/'],
    ["name" => "Path Nirman Vibhag", "url" => "pnv.png", "link" => 'javascript:void(0)'],
    ["name" => "PRA India Private Limited (PRA Group)", "url" => "pra.png", "link" => 'javascript:void(0)'],
    ["name" => "Rajbir Constructions", "url" => "rajbir.png", "link" => 'javascript:void(0)'],
    ["name" => "Ramky Infrastructure Limited", "url" => "ramk.png", "link" => 'https://ramky.com/'],
    ["name" => "Reliance Infrastructure", "url" => "reliance.png", "link" => 'https://www.rinfra.com/'],
    ["name" => "RKD Construction Pvt Ltd", "url" => "rkd.png", "link" => 'https://www.rkdcpl.com/'],
    ["name" => "SG Infra Projects Private Limited", "url" => "s3g.png", "link" => 'javascript:void(0)'],
    ["name" => "Shivalaya Construction Limited", "url" => "shivalaya.png", "link" => 'https://www.sccgroup.co.in/'],
    ["name" => "Vinod Kumar Jain", "url" => "vkj.png", "link" => ''],
    ["name" => "VKS", "url" => "vks.png", "link" => 'javascript:void(0)'],
    ["name" => "Welspun World", "url" => "welspun.png", "link" => 'https://www.welspun.com/'],
    ["name" => "National Highways Infra Trust (NHIT)", "url" => "nhit.png", "link" => 'https://nhit.co.in/'],
];

// Certifications ------------------------------------------------------

$certificates = [
    [
        'url' => 'ISO.jpg',
        'name' => 'ISO 9001:2015',
        'alt' => 'ISO 9001:2015 Certificate',
        'description' => 'Quality Management System Certification',
        'scope' => 'Manufacturing & Supply of Prismoline Branded Thermoplastic Road Marking Compound & Related Products'
    ],
    [
        'url' => 'ISO2.jpg',
        'name' => 'ISO 14001:2015',
        'alt' => 'ISO 14001:2015 Certificate',
        'description' => 'Environmental Management System Certification',
        'scope' => 'Manufacturing & Supply of Prismoline Branded Thermoplastic Road Marking Compound & Related Products'
    ],
    [
        'url' => 'zed.jpg',
        'name' => 'MSME ZED Certification',
        'alt' => 'ZED Certification',
        'description' => 'Zero Defect Zero Effect Recognition',
        'scope' => 'Environmentally responsible manufacturing with safe and high-quality products under MSME Sustainable (ZED) Certification Scheme'
    ]
];

// Management team ------------------------------------------------------

$team_member = [
    [
        'name' => 'Mr. Prakash Mishra',
        'designation' => 'Sales Manager',
        'url' => 't1.png',
        'intro' => 'My name is Prakash Kumar Mishra, Manager – Project Sales. I oversee planning, coordination, and execution of project sales activities, ensuring targets are met, client relationships strengthened, timelines monitored, resources aligned, and strategies implemented to drive organizational growth and success.',
    ],
    [
        'name' => 'Mrs. Jasmit Mehta',
        'designation' => 'HR & Admin Manager',
        'url' => 't2.png',
        'intro' => 'As HR & Admin Manager at Sharda Infrasolutions, I oversee HR functions, administrative operations, and employee engagement to ensure smooth, efficient processes. I streamline recruitment, implement policies, resolve workplace issues, and boost productivity.',
    ],
    [
        'name' => 'Mr. Prabhat Ranjan',
        'designation' => 'Sales Manager',
        'url' => 't3.png',
        'intro' => 'For the past three years, I\u2019ve led sales operations at Sharda Infrasolutions Pvt. Ltd. as Sales Manager, driving growth through strategic sales, client partnerships, and emerging market opportunities.',
    ],
    [
        'name' => 'Mrs. Rakhi Kumari',
        'designation' => 'Purchase Manager',
        'url' => 't4.png',
        'intro' => 'I have been the Purchasing Manager at Sharda Infrasolutions Pvt. Ltd. for five years, gaining expertise in procurement, vendor management, cost control, and supply chain operations.',
    ],
    [
        'name' => 'Mr. Sanjay Gorai',
        'designation' => 'Project Manager',
        'url' => 't5.png',
        'intro' => 'I have served as Project Manager at Sharda Infrasolutions Pvt. Ltd. for 10 years, overseeing diverse projects on time, within budget, and to high standards.',
    ],
    [
        'name' => 'Mr. Paras Singh',
        'designation' => 'Accounts Head',
        'url' => 't6.png',
        'intro' => 'I currently serve as Accounts Head at Sharda Infrasolutions Pvt. Ltd., overseeing financial operations, compliance, budgets, audits, and accounting processes while providing strategic insights for growth.',
    ],
    [
        'name' => 'Mr. Chandan Ravidas',
        'designation' => 'Production & Quality Incharge',
        'url' => 't7.png',
        'intro' => 'For the past ten years, I have served as Factory and Production Incharge at Sharda Infrasolutions Pvt. Ltd., managing daily operations, meeting production targets, and improving efficiency and quality.',
    ],
];
