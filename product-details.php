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

// Find the category's banner image to use as the hero background.
$cat_hero_image = '1.webp';
foreach ($products as $cat) {
    if ($cat['cat_slug'] === $item['cat_slug']) {
        $cat_hero_image = $cat['cat_image'];
        break;
    }
}

$certifications = [
    ['image' => 'ISO.jpg',  'name' => 'ISO 9001:2015',  'desc' => 'Quality Management System'],
    ['image' => 'ISO2.jpg', 'name' => 'ISO 14001:2015', 'desc' => 'Environmental Management System'],
    ['image' => 'zed.jpg',  'name' => 'MSME ZED',        'desc' => 'Zero Defect Zero Effect Certification'],
];
?>

<main class="p-lg-5 p-sm-4 p-3">
    <div class="container">

        <nav class="pd-breadcrumb" aria-label="breadcrumb">
            <a href="<?= $base_url ?>index.php">Home</a> /
            <a href="<?= $base_url ?>products.php">Products</a> /
            <a href="<?= $base_url ?>products.php?category=<?= htmlspecialchars($item['cat_slug']) ?>"><?= htmlspecialchars($item['cat_name']) ?></a> /
            <span class="text-dark"><?= htmlspecialchars($item['name']) ?></span>
        </nav>

        <!-- HERO (with background image behind the heading) -->
        <div class="pd-hero-wrapper" style="--pd-hero-bg: url('<?= $base_url ?>assets/images/products/category/<?= htmlspecialchars($cat_hero_image) ?>');">
            <section class="pd-hero">
                <div class="pd-hero-image">
                    <img src="<?= $base_url ?>assets/images/products/product/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['full_name']) ?>">
                </div>
                <div class="pd-hero-content">
                    <span class="pd-category-badge"><?= htmlspecialchars($item['cat_name']) ?></span>
                    <h1 class="pd-hero-title"><?= htmlspecialchars($item['name']) ?></h1>
                    <p class="pd-hero-tagline"><?= htmlspecialchars($item['tagline']) ?></p>
                    <p class="pd-hero-desc"><?= htmlspecialchars($item['description']) ?></p>

                    <?php if (!empty($item['spec_chips'])): ?>
                    <div class="pd-spec-chips">
                        <?php foreach ($item['spec_chips'] as $chip): ?>
                            <div class="pd-spec-chip">
                                <span class="pd-spec-chip-label"><?= htmlspecialchars($chip['label']) ?></span>
                                <span class="pd-spec-chip-value"><?= htmlspecialchars($chip['value']) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <div class="pd-hero-actions">
                        <a href="<?= $base_url ?>contact.php#contact_form" class="btn-primary-custom">
                            <i class="fa-solid fa-file-invoice"></i> Enquire Now
                        </a>
                        <a href="<?= $base_url ?>downloads/prismoline_brochure.pdf" target="_blank" class="btn-outline-custom">
                            <i class="fa-solid fa-download"></i> Download Brochure
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <!-- PRODUCT DESCRIPTION (standalone section, sourced from the product brochure) -->
        <section class="pd-section">
            <span class="pd-section-eyebrow">Overview</span>
            <h2 class="pd-section-title">Product Description</h2>
            <p class="pd-split-desc"><?= nl2br(htmlspecialchars($item['description'])) ?></p>
        </section>

        <!-- PRODUCT SPECIFICATION -->
        <section class="pd-section">
            <span class="pd-section-eyebrow">Data Sheet</span>
            <h2 class="pd-section-title">Product Specification</h2>
            <div class="row">
                <div class="col-lg-8">
                    <div class="pd-simple-list">
                        <?php foreach ($item['specs'] as $label => $value): ?>
                            <div class="pd-simple-row">
                                <span class="pd-simple-label"><?= htmlspecialchars($label) ?></span>
                                <span class="pd-simple-value"><?= htmlspecialchars($value) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- APPLICATIONS -->
        <?php if (!empty($item['applications'])): ?>
        <section class="pd-section">
            <span class="pd-section-eyebrow">Where It's Used</span>
            <h2 class="pd-section-title">Applications</h2>
            <div class="row">
                <div class="col-lg-8">
                    <ul class="pd-simple-bullets">
                        <?php foreach ($item['applications'] as $app): ?>
                            <li><?= htmlspecialchars($app) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- FEATURES -->
        <?php if (!empty($item['features'])): ?>
        <section class="pd-section">
            <span class="pd-section-eyebrow">Why <?= htmlspecialchars($item['name']) ?></span>
            <h2 class="pd-section-title">Features</h2>
            <div class="row">
                <div class="col-lg-8">
                    <ul class="pd-simple-bullets">
                        <?php foreach ($item['features'] as $feature): ?>
                            <li><?= htmlspecialchars($feature) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- CERTIFICATIONS -->
        <section class="pd-section">
            <span class="pd-section-eyebrow">Manufactured To Standard</span>
            <h2 class="pd-section-title">Quality & Certifications</h2>
            <div class="pd-cert-grid">
                <?php foreach ($certifications as $cert): ?>
                    <div class="pd-cert-card">
                        <img src="<?= $base_url ?>assets/images/certificates/<?= htmlspecialchars($cert['image']) ?>" alt="<?= htmlspecialchars($cert['name']) ?>">
                        <h3><?= htmlspecialchars($cert['name']) ?></h3>
                        <p><?= htmlspecialchars($cert['desc']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- PACKAGING & AVAILABILITY -->
        <section class="pd-section">
            <span class="pd-section-eyebrow">Order Details</span>
            <h2 class="pd-section-title">Packaging & Availability</h2>
            <div class="pd-info-strip">
                <div class="pd-info-card">
                    <i class="fa-solid fa-box"></i>
                    <strong><?= htmlspecialchars($item['specs']['Packaging'] ?? '25 kg bags') ?></strong>
                    <span>Standard Packaging</span>
                </div>
                <div class="pd-info-card">
                    <i class="fa-solid fa-truck-fast"></i>
                    <strong>Pan-India</strong>
                    <span>Delivery Network</span>
                </div>
                <div class="pd-info-card">
                    <i class="fa-solid fa-clock"></i>
                    <strong>24 Hours</strong>
                    <span>Quote Response Time</span>
                </div>
                <div class="pd-info-card">
                    <i class="fa-solid fa-file-invoice"></i>
                    <strong>Bulk & Tender</strong>
                    <span>Orders Supported</span>
                </div>
            </div>
        </section>

        <!-- FAQs -->
        <?php if (!empty($item['faqs'])): ?>
        <section class="pd-section">
            <span class="pd-section-eyebrow">Common Questions</span>
            <h2 class="pd-section-title">Frequently Asked Questions</h2>
            <div class="pd-faq-list">
                <?php foreach ($item['faqs'] as $i => $faq): ?>
                    <div class="pd-faq-item">
                        <button type="button" class="pd-faq-question" aria-expanded="false" data-faq-toggle>
                            <span><?= htmlspecialchars($faq['q']) ?></span>
                            <i class="fa-solid fa-plus pd-faq-icon"></i>
                        </button>
                        <div class="pd-faq-answer">
                            <p><?= htmlspecialchars($faq['a']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

        <!-- CTA -->
        <section class="pd-section" style="border-top: none;">
            <div class="pd-cta-banner">
                <h2>Need <?= htmlspecialchars($item['name']) ?> for your next project?</h2>
                <p>Get a quote, technical data sheet, or samples from our team within 24 hours.</p>
                <a href="<?= $base_url ?>contact.php#contact_form" class="btn btn-light fw-semibold px-4 py-2 rounded-pill">
                    Request a Quote
                </a>
            </div>
        </section>

    </div>
</main>

<?php require_once "inc/footer.php"; ?>

<script>
    document.querySelectorAll('[data-faq-toggle]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const answer = btn.nextElementSibling;
            const isOpen = btn.getAttribute('aria-expanded') === 'true';

            // Close any other open FAQ in this list for a cleaner accordion feel.
            document.querySelectorAll('[data-faq-toggle]').forEach(function (other) {
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
