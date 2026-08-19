<?php
$current_page = 'products';

require_once "inc/data.php";
require_once "inc/product_details_data.php";
require_once "inc/category_content_data.php";

$cat_slug = isset($_GET['category']) ? trim($_GET['category']) : null;
$selected_category = null;

foreach ($products as $cat) {
    if ($cat_slug && $cat['cat_slug'] == $cat_slug) {
        $selected_category = $cat;
        break;
    }
}
// Default to the first category so the page always has content to show,
// the same way the tab version defaults its first pill to "active".
if (!$selected_category) {
    $selected_category = $products[0];
    $cat_slug = $selected_category['cat_slug'];
}

$page_title = htmlspecialchars($selected_category['cat_name']) . " | Prismoline";
$page_meta_desc = htmlspecialchars($selected_category['cat_blurb']);
$page_meta_keywords = "Road Marking Products, Road Safety Products, Highway Safety Equipment, Traffic Safety Products, Road Infrastructure Solutions";

require_once "inc/header.php";
require_once "inc/nav.php";
?>
<link rel="stylesheet" href="<?= $base_url ?>assets/css/products-v2.css?v=<?= filemtime(__DIR__ . '/assets/css/products-v2.css') ?>">

<?php
$cc = $category_content[$selected_category['cat_slug']] ?? null;

// Prefer an actual product photo for the hero (clean studio/lifestyle shot) —
// the category banner images are marketing graphics with the category name
// already printed into them, which reads poorly blown up as a hero visual.
// Categories with no individual SKUs (Reflectometer, Signages, Crash Barrier)
// fall back to their category banner since that's all that exists for them.
if (!empty($selected_category['products'][0]['image'])) {
    $hero_image = htmlspecialchars($selected_category['products'][0]['image']);
    $hero_image_dir = 'assets/images/products/product/';
    $hero_image_alt = htmlspecialchars($selected_category['products'][0]['name']);
} else {
    $hero_image = !empty($selected_category['cat_image']) ? htmlspecialchars($selected_category['cat_image']) : 'no-category-image.webp';
    $hero_image_dir = 'assets/images/products/category/';
    $hero_image_alt = htmlspecialchars($selected_category['cat_name']);
}

// Sitewide facts (already used across the product pages) — reused here as the
// "Standards & Quality" section so nothing is invented per-category.
$trust_highlights = [
    ['icon' => 'fa-certificate', 'text' => 'MoRTH & BS 3262 Compliant'],
    ['icon' => 'fa-award',       'text' => 'ISO 9001 & ISO 14001 Certified'],
    ['icon' => 'fa-truck-fast',  'text' => 'Pan-India Delivery'],
    ['icon' => 'fa-headset',     'text' => 'Dedicated Technical Support'],
];

// Pull an "Applications" list out of $cc['lists'] (if the category has one) so
// it can be rendered as its own chip section; every other titled list keeps
// rendering in the general info-card fallback further down.
$applications_list = null;
$other_lists = [];
if ($cc && !empty($cc['lists'])) {
    foreach ($cc['lists'] as $list) {
        if (!$applications_list && strcasecmp($list['title'], 'Applications') === 0) {
            $applications_list = $list;
        } else {
            $other_lists[] = $list;
        }
    }
}

$product_count = count($selected_category['products'] ?? []);

// Picks an icon + short category label for a "Key Benefits" line based on
// keywords in the existing text — presentation only. The original sentence
// is always shown in full underneath as the description; the label is just
// a category heading for it, not new information.
function pv2_benefit_meta($text)
{
    $lower = strtolower($text);
    // Order matters — more specific keywords (e.g. "retroreflect") are
    // checked before broader overlapping ones (e.g. "reflect"/"visib") so
    // two different sentences don't collapse onto the same label.
    $map = [
        ['icon' => 'fa-link',               'label' => 'High Adhesion',      'kw' => ['adhesion', 'bond', 'adhere']],
        ['icon' => 'fa-road',               'label' => 'Skid Resistance',    'kw' => ['skid']],
        ['icon' => 'fa-weight-hanging',     'label' => 'High Strength',      'kw' => ['compressive', 'shock', 'impact', 'axle load', 'heavy vehicle', 'heavy-duty', 'heavy stress']],
        ['icon' => 'fa-shield-halved',      'label' => 'Wear Resistant',     'kw' => ['wear', 'durab', 'abrasion', 'rugged']],
        ['icon' => 'fa-circle-dot',         'label' => 'Retroreflective',    'kw' => ['retroreflect', 'glass bead']],
        ['icon' => 'fa-eye',                'label' => 'High Visibility',    'kw' => ['whiteness', 'luminan', 'bright', 'visib', 'contrast']],
        ['icon' => 'fa-gem',                'label' => 'Optical Clarity',    'kw' => ['lens', 'optical', 'roundness', 'sieve gradation']],
        ['icon' => 'fa-flask',              'label' => 'Chemical Resistant', 'kw' => ['fuel', 'oil', 'chemical']],
        ['icon' => 'fa-cloud-sun',          'label' => 'Weather Resistant',  'kw' => ['weather', 'uv', 'climat', 'foggy', 'outdoor']],
        ['icon' => 'fa-droplet',            'label' => 'Water Resistant',    'kw' => ['water', 'moisture', 'humid', 'ip68', 'dust ingress', 'waterproof']],
        ['icon' => 'fa-certificate',        'label' => 'Certified Standard', 'kw' => ['morth', 'bs 3262', 'bs3262', 'bs 6088', 'is 164', 'complian', 'conformance', 'standard']],
        ['icon' => 'fa-anchor',             'label' => 'Secure Mounting',    'kw' => ['shank', 'anchorage', 'mount', 'bracket', 'bolt-on', 'dislocation']],
        ['icon' => 'fa-solar-panel',        'label' => 'Solar Powered',      'kw' => ['solar', 'lithium battery', 'self-powered']],
        ['icon' => 'fa-volume-high',        'label' => 'Tactile Warning',    'kw' => ['rumble', 'tactile']],
        ['icon' => 'fa-bolt',               'label' => 'Fast Drying',        'kw' => ['fast', 'quick', 'rapid', 'dry']],
        ['icon' => 'fa-leaf',               'label' => 'Eco-Friendly',       'kw' => ['eco', 'environment', 'voc']],
        ['icon' => 'fa-scale-balanced',     'label' => 'Consistent Quality', 'kw' => ['consistent', 'uniform', 'balanced']],
        ['icon' => 'fa-hourglass-half',     'label' => 'Extended Lifespan',  'kw' => ['lifecycle', 'maintenance frequency', 'service life', 'extends']],
        ['icon' => 'fa-gauge-high',         'label' => 'High Performance',   'kw' => ['perform', 'efficien', 'cost-effective']],
        ['icon' => 'fa-ruler-combined',     'label' => 'Reliable Coverage',  'kw' => ['coverage', 'thick', 'gradation']],
        ['icon' => 'fa-screwdriver-wrench', 'label' => 'Easy Application',   'kw' => ['applica', 'install', 'spray', 'roller', 'brush', 'modular']],
    ];
    foreach ($map as $entry) {
        foreach ($entry['kw'] as $kw) {
            if (strpos($lower, $kw) !== false) {
                return $entry;
            }
        }
    }
    return ['icon' => 'fa-circle-check', 'label' => pv2_fallback_label($text)];
}

// Safety net for a sentence that matches none of the categories above —
// derives a short heading from its own first few words instead of a
// generic placeholder, so it can never collide with another item's label.
function pv2_fallback_label($text)
{
    $words = preg_split('/\s+/', trim($text));
    $words = array_slice($words, 0, 4);
    $label = rtrim(implode(' ', $words), ',.;:');
    return $label !== '' ? $label : 'Key Benefit';
}

// PLACEHOLDER CONTENT — no real client testimonials exist in the data yet.
// Swap these three entries for real quotes/names once available; nothing
// here is sourced from actual customers.
$dummy_testimonials = [
    ['quote' => 'The retroreflectivity held up well past the first monsoon season — exactly what we needed for a state highway contract.', 'name' => 'Client Name', 'role' => 'Site Engineer, Highway Contractor'],
    ['quote' => 'Consistent batch quality and the technical team was responsive whenever we needed a data sheet for a tender submission.', 'name' => 'Client Name', 'role' => 'Procurement Manager, Infrastructure Firm'],
    ['quote' => 'Delivery across our multi-state project sites was reliable, and the product performed consistently across every batch.', 'name' => 'Client Name', 'role' => 'Project Manager, Road Safety Contractor'],
];
?>

<div class="page-heading">
    <h1 class="text-center fw-bold text-white">Our Products</h1>
</div>

<main class="p-lg-5 p-sm-4 p-3">
    <div class="container p-0">

        <nav class="pd-breadcrumb" aria-label="breadcrumb">
            <a href="<?= $base_url ?>index.php">Home</a> /
            <a href="<?= $base_url ?>products.php">Products</a> /
            <span class="text-dark"><?= htmlspecialchars($selected_category['cat_name']) ?></span>
        </nav>

        <div class="pv2-page">

            <!-- HERO: product visual + product info -->
            <div class="pv2-hero">
                <div class="pv2-hero-visual">
                    <div class="pv2-hero-visual-bg" aria-hidden="true"></div>
                    <?php if ($product_count > 0): ?>
                        <span class="pv2-hero-count-badge"><?= $product_count ?> Product<?= $product_count === 1 ? '' : 's' ?> Available</span>
                    <?php endif; ?>
                    <img src="<?= $base_url . $hero_image_dir . $hero_image ?>"
                        alt="<?= $hero_image_alt ?>"
                        class="pv2-hero-image">
                </div>

                <div class="pv2-hero-info">
                    <span class="pv2-eyebrow">Product Category</span>
                    <h1 class="pv2-title"><?= htmlspecialchars($selected_category['cat_name']) ?></h1>
                    <?php if ($cc && !empty($cc['tagline'])): ?>
                        <span class="pv2-tagline-pill"><?= htmlspecialchars($cc['tagline']) ?></span>
                    <?php endif; ?>

                    <?php if (($cc && !empty($cc['intro'])) || !empty($selected_category['cat_blurb'])): ?>
                        <span class="pv2-content-label">Product Overview</span>
                        <div class="pv2-content pv2-overview-card">
                            <div class="pv2-overview-icon"><i class="fa-solid fa-quote-left"></i></div>
                            <?php if ($cc && !empty($cc['intro'])): ?>
                                <?php foreach ($cc['intro'] as $para): ?>
                                    <p><?= $para /* static trusted content — may include <strong> */ ?></p>
                                <?php endforeach; ?>
                                <?php foreach ($cc['outro'] ?? [] as $para): ?>
                                    <p><?= $para ?></p>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p><?= htmlspecialchars($selected_category['cat_blurb']) ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="pv2-hero-actions">
                        <a href="<?= $base_url ?>contact.php#contact_form" class="pv2-btn-primary">
                            <i class="fa-solid fa-file-invoice"></i> Request a Quote
                        </a>
                        <?php if ($product_count > 0): ?>
                            <a href="#pv2-products" class="pv2-btn-outline">
                                <i class="fa-solid fa-arrow-down"></i> View Products
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- BENEFITS / APPLICATIONS / STANDARDS — each wrapped in its own
                 alternating white/light band (mirrors the homepage's
                 bg-light rhythm), driven by a running counter so the
                 alternation stays correct no matter which conditional
                 sections actually render for a given category. Starts at 0
                 so the first band here is light, alternating straight off
                 the (white) hero. -->
            <?php $pv2_band = 0; ?>

            <?php if ($cc && !empty($cc['features'])): $pv2_band++; ?>
                <section class="pv2-benefits-panel">
                    <h2 class="pv2-section-title pv2-section-title-light">Key Benefits</h2>
                    <div class="pv2-benefit-grid">
                        <?php
                        $used_benefit_labels = [];
                        foreach ($cc['features'] as $feature):
                            $meta = pv2_benefit_meta($feature);
                            if (in_array($meta['label'], $used_benefit_labels, true)) {
                                // Two different sentences matched the same category (e.g. two
                                // separate compliance statements) — re-derive from this exact
                                // sentence instead of showing the same label twice.
                                $meta = ['icon' => $meta['icon'], 'label' => pv2_fallback_label($feature)];
                            }
                            $used_benefit_labels[] = $meta['label'];
                        ?>
                            <div class="pv2-benefit-card">
                                <div class="pv2-benefit-icon"><i class="fa-solid <?= $meta['icon'] ?>"></i></div>
                                <h3><?= htmlspecialchars($meta['label']) ?></h3>
                                <span class="pv2-benefit-rule"></span>
                                <p><?= htmlspecialchars($feature) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if ($applications_list): $pv2_band++; ?>
                <section class="pv2-band <?= $pv2_band % 2 ? 'pv2-band-light' : 'pv2-band-white' ?>">
                    <h2 class="pv2-section-title"><?= htmlspecialchars($applications_list['title']) ?></h2>
                    <div class="pv2-chip-row">
                        <?php foreach ($applications_list['items'] as $item): ?>
                            <span class="pv2-chip"><?= htmlspecialchars($item) ?></span>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php $pv2_band++; ?>
            <section class="pv2-band <?= $pv2_band % 2 ? 'pv2-band-light' : 'pv2-band-white' ?>">
                <h2 class="pv2-section-title">Standards &amp; Quality</h2>
                <div class="pv2-standards-grid">
                    <?php foreach ($trust_highlights as $h): ?>
                        <div class="pv2-standards-card">
                            <div class="pv2-standards-icon"><i class="fa-solid <?= $h['icon'] ?>"></i></div>
                            <span><?= htmlspecialchars($h['text']) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <?php if (empty($selected_category['products']) && $cc): ?>

                <?php if (!empty($cc['sub_points'])): $pv2_band++; ?>
                    <section class="pv2-band <?= $pv2_band % 2 ? 'pv2-band-light' : 'pv2-band-white' ?>">
                        <div class="pv2-subpoints">
                            <?php foreach ($cc['sub_points'] as $sp): ?>
                                <div class="pv2-subpoint">
                                    <strong><?= htmlspecialchars($sp['label']) ?></strong>
                                    <span><?= htmlspecialchars($sp['text']) ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>

                <?php if (!empty($cc['specs'])): $pv2_band++; ?>
                    <section class="pv2-band <?= $pv2_band % 2 ? 'pv2-band-light' : 'pv2-band-white' ?>">
                        <h2 class="pv2-section-title">Specifications</h2>
                        <div class="pv2-spec-rows">
                            <?php foreach ($cc['specs'] as $label => $value): ?>
                                <div class="pv2-spec-row">
                                    <span><?= htmlspecialchars($label) ?></span>
                                    <span><?= htmlspecialchars($value) ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>

                <?php if (!empty($other_lists)): $pv2_band++; ?>
                    <section class="pv2-band <?= $pv2_band % 2 ? 'pv2-band-light' : 'pv2-band-white' ?>">
                        <div class="pv2-info-cards">
                            <?php foreach ($other_lists as $list): ?>
                                <div class="pv2-info-card">
                                    <h3><?= htmlspecialchars($list['title']) ?></h3>
                                    <ul>
                                        <?php foreach ($list['items'] as $item): ?>
                                            <li><?= htmlspecialchars($item) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>

            <?php elseif (empty($selected_category['products']) && !$cc): $pv2_band++; ?>
                <section class="pv2-band <?= $pv2_band % 2 ? 'pv2-band-light' : 'pv2-band-white' ?>">
                    <p class="text-muted my-4">Product listings for this category are coming soon. Please contact us for full specifications.</p>
                </section>
            <?php endif; ?>

            <!-- AVAILABLE PRODUCTS -->
            <?php if (!empty($selected_category['products'])): $pv2_band++; ?>
                <div class="pv2-band <?= $pv2_band % 2 ? 'pv2-band-light' : 'pv2-band-white' ?> pv2-products-section" id="pv2-products">
                    <div class="pv2-products-heading">
                        <div>
                            <span class="pv2-content-label">Shop This Category</span>
                            <h2 class="pv2-section-title">Available Products</h2>
                        </div>
                        <span class="pv2-product-count"><?= $product_count ?> Product<?= $product_count === 1 ? '' : 's' ?></span>
                    </div>
                    <div class="pv2-product-grid">
                        <?php foreach ($selected_category['products'] as $p):
                            $image = !empty($p['image']) ? htmlspecialchars($p['image']) : 'no-product-image.webp';
                            $short_desc = $p['description'];
                            if (function_exists('mb_strlen')) {
                                if (mb_strlen($short_desc) > 140) {
                                    $short_desc = mb_substr($short_desc, 0, 137) . '…';
                                }
                            } elseif (strlen($short_desc) > 140) {
                                $short_desc = substr($short_desc, 0, 137) . '...';
                            }
                            $has_detail = isset($product_details[$p['url_slug']]);
                            $href = $has_detail
                                ? $base_url . 'product-details.php?product=' . urlencode($p['url_slug'])
                                : 'javascript:void(0)';
                        ?>
                            <a href="<?= $href ?>" class="pv2-product-card">
                                <div class="pv2-product-card-image">
                                    <img src="<?= $base_url ?>assets/images/products/product/<?= $image ?>" alt="<?= htmlspecialchars($p['name']) ?>" loading="lazy">
                                </div>
                                <div class="pv2-product-card-body">
                                    <h3><?= htmlspecialchars($p['name']) ?></h3>
                                    <p><?= htmlspecialchars($short_desc) ?></p>
                                    <?php if ($has_detail): ?>
                                        <span class="pv2-product-card-link">View Details <i class="fa-solid fa-arrow-right"></i></span>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <?php if ($selected_category['cat_slug'] === 'glass-beads'): ?>
                        <div class="pv2-also-available">
                            <span class="pv2-chip pv2-chip-accent">Also available</span>
                            <div class="pv2-also-available-logos">
                                <img src="<?= $base_url ?>assets/images/products/product/potters-logo.png" alt="Potters">
                                <div class="pv2-also-available-logo-card">
                                    <img src="<?= $base_url ?>assets/images/products/product/sovtec-logo.png" alt="Sovtec">
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- CLIENT REVIEWS — placeholder content, not real testimonials.
                 Replace $dummy_testimonials above with actual client quotes
                 once available. -->
            <?php $pv2_band++; ?>
            <div class="pv2-band <?= $pv2_band % 2 ? 'pv2-band-light' : 'pv2-band-white' ?> pv2-testimonials">
                <span class="pv2-content-label">Client Feedback</span>
                <h2 class="pv2-section-title">What Our Clients Say</h2>
                <div class="pv2-testimonial-grid">
                    <?php foreach ($dummy_testimonials as $t): ?>
                        <div class="pv2-testimonial-card">
                            <div class="pv2-testimonial-stars">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                            <p class="pv2-testimonial-quote">&ldquo;<?= htmlspecialchars($t['quote']) ?>&rdquo;</p>
                            <div class="pv2-testimonial-author">
                                <div class="pv2-testimonial-avatar"><i class="fa-solid fa-user"></i></div>
                                <div>
                                    <strong><?= htmlspecialchars($t['name']) ?></strong>
                                    <span><?= htmlspecialchars($t['role']) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p class="pv2-testimonial-disclaimer">Sample placeholder reviews — to be replaced with real client feedback.</p>
            </div>

            <!-- CTA -->
            <div class="pv2-cta">
                <div>
                    <h3>Need <?= htmlspecialchars($selected_category['cat_name']) ?> for your next project?</h3>
                    <p>Get a quote or technical data sheet within 24 hours.</p>
                </div>
                <a href="<?= $base_url ?>contact.php#contact_form">Request a Quote</a>
            </div>

        </div>

    </div>
</main>

<?php require_once "inc/footer.php"; ?>
