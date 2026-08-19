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
<link rel="stylesheet" href="<?= $base_url ?>assets/css/products-v3.css?v=<?= filemtime(__DIR__ . '/assets/css/products-v3.css') ?>">

<?php
$cc = $category_content[$selected_category['cat_slug']] ?? null;
$has_products = !empty($selected_category['products']);

// Prefer a real product photo for the hero; category banner (with its own
// printed title) is the fallback for categories with no individual SKUs.
if (!empty($selected_category['products'][0]['image'])) {
    $hero_image = htmlspecialchars($selected_category['products'][0]['image']);
    $hero_image_dir = 'assets/images/products/product/';
} else {
    $hero_image = !empty($selected_category['cat_image']) ? htmlspecialchars($selected_category['cat_image']) : 'no-category-image.webp';
    $hero_image_dir = 'assets/images/products/category/';
}
// A second, different product photo for the "about" section image so the
// same picture isn't repeated back-to-back where avoidable.
$about_image_product = $selected_category['products'][1] ?? ($selected_category['products'][0] ?? null);
$about_image = $about_image_product ? htmlspecialchars($about_image_product['image']) : $hero_image;
$about_image_dir = $about_image_product ? 'assets/images/products/product/' : $hero_image_dir;

$trust_highlights = [
    ['icon' => 'fa-certificate', 'text' => 'MoRTH & BS 3262 Compliant'],
    ['icon' => 'fa-truck-fast',  'text' => 'Pan-India Delivery'],
    ['icon' => 'fa-headset',     'text' => 'Dedicated Support'],
];

$feature_cards = [
    ['icon' => 'fa-award',    'title' => 'Certified Quality', 'text' => 'Manufactured under ISO 9001 & ISO 14001 systems, to MoRTH and BS 3262 standards.'],
    ['icon' => 'fa-truck',    'title' => 'Pan-India Reach', 'text' => 'Reliable delivery network supporting highway, municipal and infrastructure projects nationwide.'],
    ['icon' => 'fa-headset',  'title' => 'Technical Support', 'text' => 'A dedicated team on hand for data sheets, tender documentation and on-site queries.'],
];

$product_count = count($selected_category['products'] ?? []);

// DUMMY PRICING — placeholder only, no real price list exists yet. Stable
// per-product (not random per reload). Replace before this page goes live.
function pv3_dummy_price($seed)
{
    return 3500 + (crc32($seed) % 5000);
}
?>

<main class="pv3-page">

    <div class="container">
        <nav class="pd-breadcrumb" aria-label="breadcrumb">
            <a href="<?= $base_url ?>index.php">Home</a> /
            <a href="<?= $base_url ?>products-v3.php">Products</a> /
            <span class="text-dark"><?= htmlspecialchars($selected_category['cat_name']) ?></span>
        </nav>
    </div>

    <!-- HERO -->
    <section class="pv3-hero">
        <div class="container pv3-hero-inner">
            <div class="pv3-hero-copy">
                <span class="pv3-eyebrow">Product Category</span>
                <h1><?= htmlspecialchars($selected_category['cat_name']) ?></h1>
                <p><?= htmlspecialchars($selected_category['cat_blurb']) ?></p>
                <a href="<?= $base_url ?>contact.php#contact_form" class="pv3-btn">Request a Quote <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="pv3-hero-visual">
                <div class="pv3-hero-blob" aria-hidden="true"></div>
                <img src="<?= $base_url . $hero_image_dir . $hero_image ?>" alt="<?= htmlspecialchars($selected_category['cat_name']) ?>">
            </div>
        </div>

        <!-- Floating trust strip, overlapping the hero's bottom edge -->
        <div class="container">
            <div class="pv3-floating-strip">
                <?php foreach ($trust_highlights as $i => $h): ?>
                    <div class="pv3-floating-item <?= $i === 1 ? 'pv3-floating-item-accent' : '' ?>">
                        <i class="fa-solid <?= $h['icon'] ?>"></i>
                        <span><?= htmlspecialchars($h['text']) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CATEGORY SWITCHER -->
    <div class="container">
        <nav class="pv3-cat-pills" aria-label="Product categories">
            <?php foreach ($products as $cat): ?>
                <a href="<?= $base_url ?>products-v3.php?category=<?= urlencode($cat['cat_slug']) ?>"
                    class="<?= $cat['cat_slug'] === $selected_category['cat_slug'] ? 'active' : '' ?>">
                    <?= htmlspecialchars($cat['cat_name']) ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>

    <div class="pv3-tinted">

        <!-- ABOUT THIS CATEGORY -->
        <section class="container pv3-about">
            <div class="pv3-about-copy">
                <span class="pv3-eyebrow">About This Range</span>
                <h2>What Makes It Different</h2>
                <?php if ($cc && !empty($cc['intro'])): ?>
                    <?php foreach (array_slice($cc['intro'], 0, 2) as $para): ?>
                        <p><?= $para /* static trusted content — may include <strong> */ ?></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p><?= htmlspecialchars($selected_category['cat_blurb']) ?></p>
                <?php endif; ?>
                <a href="<?= $base_url ?>contact.php#contact_form" class="pv3-text-link">Talk to our team <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="pv3-about-image">
                <img src="<?= $base_url . $about_image_dir . $about_image ?>" alt="<?= htmlspecialchars($selected_category['cat_name']) ?>">
            </div>
        </section>

        <!-- FEATURE CARDS -->
        <section class="container pv3-features">
            <?php foreach ($feature_cards as $f): ?>
                <div class="pv3-feature-card">
                    <div class="pv3-feature-icon"><i class="fa-solid <?= $f['icon'] ?>"></i></div>
                    <h3><?= htmlspecialchars($f['title']) ?></h3>
                    <span class="pv3-feature-rule"></span>
                    <p><?= htmlspecialchars($f['text']) ?></p>
                </div>
            <?php endforeach; ?>
        </section>

        <?php if ($has_products): ?>
            <!-- POPULAR IN THIS RANGE (first 3, circular photo) -->
            <section class="container">
                <div class="pv3-popular-panel">
                    <div class="pv3-popular-copy">
                        <span class="pv3-eyebrow pv3-eyebrow-light">Popular In This Range</span>
                        <h2>Top Picks</h2>
                        <p>Frequently specified products from <?= htmlspecialchars($selected_category['cat_name']) ?>.</p>
                    </div>
                    <div class="pv3-popular-list">
                        <?php foreach (array_slice($selected_category['products'], 0, 3) as $pp):
                            $pp_image = !empty($pp['image']) ? htmlspecialchars($pp['image']) : 'no-product-image.webp';
                            $pp_price = pv3_dummy_price($pp['url_slug']);
                        ?>
                            <div class="pv3-popular-item">
                                <div class="pv3-popular-photo">
                                    <img src="<?= $base_url ?>assets/images/products/product/<?= $pp_image ?>" alt="<?= htmlspecialchars($pp['name']) ?>" loading="lazy">
                                </div>
                                <strong><?= htmlspecialchars($pp['name']) ?></strong>
                                <span>&#8377;<?= number_format($pp_price) ?> <em>/ 25kg (indicative)</em></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- AVAILABLE PRODUCTS -->
            <section class="container pv3-products">
                <div class="pv3-products-heading">
                    <span class="pv3-eyebrow">Shop This Category</span>
                    <h2>Available Products</h2>
                </div>
                <div class="pv3-product-row">
                    <?php foreach ($selected_category['products'] as $p):
                        $image = !empty($p['image']) ? htmlspecialchars($p['image']) : 'no-product-image.webp';
                        $short_desc = $p['description'];
                        if (function_exists('mb_strlen')) {
                            if (mb_strlen($short_desc) > 110) {
                                $short_desc = mb_substr($short_desc, 0, 107) . '…';
                            }
                        } elseif (strlen($short_desc) > 110) {
                            $short_desc = substr($short_desc, 0, 107) . '...';
                        }
                        $has_detail = isset($product_details[$p['url_slug']]);
                        $href = $has_detail
                            ? $base_url . 'product-details.php?product=' . urlencode($p['url_slug'])
                            : 'javascript:void(0)';
                        $price = pv3_dummy_price($p['url_slug']);
                    ?>
                        <a href="<?= $href ?>" class="pv3-product-card">
                            <div class="pv3-product-card-image">
                                <img src="<?= $base_url ?>assets/images/products/product/<?= $image ?>" alt="<?= htmlspecialchars($p['name']) ?>" loading="lazy">
                            </div>
                            <h3><?= htmlspecialchars($p['name']) ?></h3>
                            <p><?= htmlspecialchars($short_desc) ?></p>
                            <div class="pv3-product-card-footer">
                                <span class="pv3-product-card-price">&#8377;<?= number_format($price) ?></span>
                                <span class="pv3-product-card-add"><i class="fa-solid fa-plus"></i></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php else: ?>
            <section class="container pv3-products">
                <p class="text-muted my-4 text-center">Product listings for this category are coming soon. Please contact us for full specifications.</p>
            </section>
        <?php endif; ?>

    </div>

    <!-- CLOSING CONTACT BAND -->
    <section class="container">
        <div class="pv3-contact-band">
            <div class="pv3-contact-info">
                <h2>Need <?= htmlspecialchars($selected_category['cat_name']) ?> for your project?</h2>
                <p><i class="fa-solid fa-phone"></i> +91-7033275747</p>
                <p><i class="fa-solid fa-envelope"></i> info@prismoline.com</p>
            </div>
            <div class="pv3-contact-cta">
                <p>Get a quote or technical data sheet within 24 hours.</p>
                <a href="<?= $base_url ?>contact.php#contact_form" class="pv3-btn pv3-btn-light">Request a Quote</a>
            </div>
        </div>
    </section>

</main>

<?php require_once "inc/footer.php"; ?>
