<?php
$current_page = 'products';

require_once "inc/data.php";
require_once "inc/product_details_data.php";

$slug = isset($_GET['product']) ? trim($_GET['product']) : '';
$item = $product_details[$slug] ?? null;

// Fallback to the one product we have detail content for, so this page
// always has something to show while more products are being added.
if (!$item) {
    $slug = array_key_first($product_details);
    $item = $product_details[$slug];
}

$page_title = $item['seo_title'];
$page_meta_desc = $item['seo_desc'];
$page_meta_keywords = $item['seo_keywords'];

require_once "inc/header.php";
require_once "inc/nav.php";
?>
<link rel="stylesheet" href="<?= $base_url ?>assets/css/product-details-v2.css?v=<?= filemtime(__DIR__ . '/assets/css/product-details-v2.css') ?>">

<?php
$certifications = [
    ['image' => 'ISO.jpg',  'name' => 'ISO 9001:2015',  'desc' => 'Quality Management System'],
    ['image' => 'ISO2.jpg', 'name' => 'ISO 14001:2015', 'desc' => 'Environmental Management System'],
    ['image' => 'zed.jpg',  'name' => 'MSME ZED',        'desc' => 'Zero Defect Zero Effect Certification'],
];

// Same sitewide facts shown on products.php — reused here so the
// single-product page carries the same trust strip as the category page,
// instead of missing it entirely.
$trust_highlights = [
    ['icon' => 'fa-certificate', 'text' => 'MoRTH & BS 3262 Compliant'],
    ['icon' => 'fa-award',       'text' => 'ISO 9001 & ISO 14001 Certified'],
    ['icon' => 'fa-truck-fast',  'text' => 'Pan-India Delivery'],
    ['icon' => 'fa-headset',     'text' => 'Dedicated Technical Support'],
];

// Picks an icon + short category label for a "Features" line based on
// keywords in the existing text — presentation only. The original sentence
// is always shown in full underneath as the description; the label is just
// a category heading for it, not new information. (Same logic as the
// products.php "Key Benefits" panel, kept in sync for a consistent feel.)
function pdv2_benefit_meta($text)
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
    return ['icon' => 'fa-circle-check', 'label' => pdv2_fallback_label($text)];
}

// Safety net for a sentence that matches none of the categories above —
// derives a short heading from its own first few words instead of a
// generic placeholder, so it can never collide with another item's label.
function pdv2_fallback_label($text)
{
    $words = preg_split('/\s+/', trim($text));
    $words = array_slice($words, 0, 4);
    $label = rtrim(implode(' ', $words), ',.;:');
    return $label !== '' ? $label : 'Key Feature';
}
?>

<main class="p-lg-5 p-sm-4 p-3">
    <div class="container">

        <nav class="pd-breadcrumb" aria-label="breadcrumb">
            <a href="<?= $base_url ?>index.php">Home</a> /
            <a href="<?= $base_url ?>products.php">Products</a> /
            <a href="<?= $base_url ?>products.php?category=<?= htmlspecialchars($item['cat_slug']) ?>"><?= htmlspecialchars($item['cat_name']) ?></a> /
            <span class="text-dark"><?= htmlspecialchars($item['name']) ?></span>
        </nav>

        <div class="pdv2-page">

            <!-- HERO (dark, premium treatment — the rest of the page stays
                 on the lighter alternating bands below) -->
            <div class="pdv2-hero pdv2-hero-dark">
                <div class="pdv2-hero-visual">
                    <div class="pdv2-hero-visual-bg" aria-hidden="true"></div>
                    <img src="<?= $base_url ?>assets/images/products/product/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['full_name']) ?>" class="pdv2-hero-image">
                </div>

                <div class="pdv2-hero-info">
                    <span class="pdv2-badge"><?= htmlspecialchars($item['cat_name']) ?></span>
                    <h1 class="pdv2-title"><?= htmlspecialchars($item['name']) ?></h1>
                    <p class="pdv2-tagline"><?= htmlspecialchars($item['tagline']) ?></p>
                    <p class="pdv2-hero-desc"><?= htmlspecialchars($item['description']) ?></p>

                    <?php if (!empty($item['spec_chips'])): ?>
                        <div class="pdv2-chip-grid">
                            <?php foreach ($item['spec_chips'] as $chip): ?>
                                <div class="pdv2-chip-card">
                                    <span class="pdv2-chip-label"><?= htmlspecialchars($chip['label']) ?></span>
                                    <span class="pdv2-chip-value"><?= htmlspecialchars($chip['value']) ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="pdv2-hero-actions">
                        <a href="<?= $base_url ?>contact.php#contact_form" class="pdv2-btn-primary">
                            <i class="fa-solid fa-file-invoice"></i> Enquire Now
                        </a>
                        <a href="<?= $base_url ?>downloads/prismoline_brochure.pdf" target="_blank" class="pdv2-btn-outline">
                            <i class="fa-solid fa-download"></i> Download Brochure
                        </a>
                    </div>
                </div>
            </div>

            <?php
            // Alternating white/light-blue bands, same rhythm as
            // products.php (mirrors the homepage's bg-light pattern).
            $pdv2_band = 0;
            ?>

            <!-- PRODUCT DESCRIPTION -->
            <?php $pdv2_band++; ?>
            <section class="pdv2-band <?= $pdv2_band % 2 ? 'pdv2-band-light' : 'pdv2-band-white' ?>">
                <span class="pdv2-section-eyebrow">Overview</span>
                <h2 class="pdv2-section-title">Product Description</h2>
                <div class="pdv2-overview-card">
                    <p><?= nl2br(htmlspecialchars($item['description'])) ?></p>
                </div>
            </section>

            <!-- PRODUCT SPECIFICATION -->
            <?php $pdv2_band++; ?>
            <section class="pdv2-band <?= $pdv2_band % 2 ? 'pdv2-band-light' : 'pdv2-band-white' ?>">
                <span class="pdv2-section-eyebrow">Data Sheet</span>
                <h2 class="pdv2-section-title">Product Specification</h2>
                <div class="pdv2-spec-rows">
                    <?php foreach ($item['specs'] as $label => $value): ?>
                        <div class="pdv2-spec-row">
                            <span><?= htmlspecialchars($label) ?></span>
                            <span><?= htmlspecialchars($value) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- APPLICATIONS -->
            <?php if (!empty($item['applications'])): $pdv2_band++; ?>
                <section class="pdv2-band <?= $pdv2_band % 2 ? 'pdv2-band-light' : 'pdv2-band-white' ?>">
                    <span class="pdv2-section-eyebrow">Where It's Used</span>
                    <h2 class="pdv2-section-title">Applications</h2>
                    <div class="pdv2-chip-row">
                        <?php foreach ($item['applications'] as $app): ?>
                            <span class="pdv2-pill"><?= htmlspecialchars($app) ?></span>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <!-- STANDARDS & QUALITY (trust strip, same content and bold
                 icon style as products.php) -->
            <?php $pdv2_band++; ?>
            <section class="pdv2-band <?= $pdv2_band % 2 ? 'pdv2-band-light' : 'pdv2-band-white' ?>">
                <span class="pdv2-section-eyebrow">Manufactured To Standard</span>
                <h2 class="pdv2-section-title">Standards &amp; Quality</h2>
                <div class="pdv2-standards-grid">
                    <?php foreach ($trust_highlights as $h): ?>
                        <div class="pdv2-standards-card">
                            <div class="pdv2-standards-icon"><i class="fa-solid <?= $h['icon'] ?>"></i></div>
                            <span><?= htmlspecialchars($h['text']) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- FEATURES (its own solid blue panel, matching the Key
                 Benefits treatment on products.php) -->
            <?php if (!empty($item['features'])): $pdv2_band++; ?>
                <section class="pdv2-benefits-panel">
                    <h2 class="pdv2-section-title pdv2-section-title-light">Features</h2>
                    <div class="pdv2-benefit-grid">
                        <?php
                        $used_feature_labels = [];
                        foreach ($item['features'] as $feature):
                            $meta = pdv2_benefit_meta($feature);
                            if (in_array($meta['label'], $used_feature_labels, true)) {
                                // Two different sentences matched the same category (e.g. two
                                // separate compliance statements) — re-derive from this exact
                                // sentence instead of showing the same label twice.
                                $meta = ['icon' => $meta['icon'], 'label' => pdv2_fallback_label($feature)];
                            }
                            $used_feature_labels[] = $meta['label'];
                        ?>
                            <div class="pdv2-benefit-card">
                                <div class="pdv2-benefit-icon"><i class="fa-solid <?= $meta['icon'] ?>"></i></div>
                                <h3><?= htmlspecialchars($meta['label']) ?></h3>
                                <span class="pdv2-benefit-rule"></span>
                                <p><?= htmlspecialchars($feature) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <!-- CERTIFICATIONS -->
            <?php $pdv2_band++; ?>
            <section class="pdv2-band <?= $pdv2_band % 2 ? 'pdv2-band-light' : 'pdv2-band-white' ?>">
                <span class="pdv2-section-eyebrow">Manufactured To Standard</span>
                <h2 class="pdv2-section-title">Quality &amp; Certifications</h2>
                <div class="pdv2-cert-grid">
                    <?php foreach ($certifications as $cert): ?>
                        <div class="pdv2-cert-card">
                            <div class="pdv2-cert-card-image">
                                <img src="<?= $base_url ?>assets/images/certificates/<?= htmlspecialchars($cert['image']) ?>" alt="<?= htmlspecialchars($cert['name']) ?>">
                            </div>
                            <h3><?= htmlspecialchars($cert['name']) ?></h3>
                            <p><?= htmlspecialchars($cert['desc']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- PACKAGING & AVAILABILITY -->
            <?php $pdv2_band++; ?>
            <section class="pdv2-band <?= $pdv2_band % 2 ? 'pdv2-band-light' : 'pdv2-band-white' ?>">
                <span class="pdv2-section-eyebrow">Order Details</span>
                <h2 class="pdv2-section-title">Packaging &amp; Availability</h2>
                <div class="pdv2-info-grid">
                    <div class="pdv2-info-card">
                        <div class="pdv2-info-icon"><i class="fa-solid fa-box"></i></div>
                        <strong><?= htmlspecialchars($item['specs']['Packaging'] ?? '25 kg bags') ?></strong>
                        <span>Standard Packaging</span>
                    </div>
                    <div class="pdv2-info-card">
                        <div class="pdv2-info-icon"><i class="fa-solid fa-truck-fast"></i></div>
                        <strong>Pan-India</strong>
                        <span>Delivery Network</span>
                    </div>
                    <div class="pdv2-info-card">
                        <div class="pdv2-info-icon"><i class="fa-solid fa-clock"></i></div>
                        <strong>24 Hours</strong>
                        <span>Quote Response Time</span>
                    </div>
                    <div class="pdv2-info-card">
                        <div class="pdv2-info-icon"><i class="fa-solid fa-file-invoice"></i></div>
                        <strong>Bulk &amp; Tender</strong>
                        <span>Orders Supported</span>
                    </div>
                </div>
            </section>

            <!-- FAQs -->
            <?php if (!empty($item['faqs'])): $pdv2_band++; ?>
                <section class="pdv2-band <?= $pdv2_band % 2 ? 'pdv2-band-light' : 'pdv2-band-white' ?>">
                    <span class="pdv2-section-eyebrow">Common Questions</span>
                    <h2 class="pdv2-section-title">Frequently Asked Questions</h2>
                    <div class="pdv2-faq-list">
                        <?php foreach ($item['faqs'] as $i => $faq): ?>
                            <div class="pdv2-faq-item">
                                <button type="button" class="pdv2-faq-question" aria-expanded="false" data-faq-toggle-v2>
                                    <span><?= htmlspecialchars($faq['q']) ?></span>
                                    <i class="fa-solid fa-plus pdv2-faq-icon"></i>
                                </button>
                                <div class="pdv2-faq-answer">
                                    <p><?= htmlspecialchars($faq['a']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <!-- CTA -->
            <div class="pdv2-cta">
                <div>
                    <h3>Need <?= htmlspecialchars($item['name']) ?> for your next project?</h3>
                    <p>Get a quote, technical data sheet, or samples from our team within 24 hours.</p>
                </div>
                <a href="<?= $base_url ?>contact.php#contact_form">Request a Quote</a>
            </div>

        </div>

    </div>
</main>

<?php require_once "inc/footer.php"; ?>

<script>
    document.querySelectorAll('[data-faq-toggle-v2]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const answer = btn.nextElementSibling;
            const isOpen = btn.getAttribute('aria-expanded') === 'true';

            // Close any other open FAQ in this list for a cleaner accordion feel.
            document.querySelectorAll('[data-faq-toggle-v2]').forEach(function (other) {
                if (other !== btn) {
                    other.setAttribute('aria-expanded', 'false');
                    other.nextElementSibling.classList.remove('open');
                }
            });

            btn.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
            answer.classList.toggle('open', !isOpen);
        });
    });
</script>
