<?php
$current_page = 'products';

require_once "inc/data.php";
require_once "inc/product_details_data.php";

$cat_slug = isset($_GET['category']) ? trim($_GET['category']) : null;
$selected_category = null;

if ($cat_slug) {
    foreach ($products as $cat) {
        if ($cat['cat_slug'] == $cat_slug) {
            $selected_category = $cat;
            break;
        }
    }
}

$page_title = $selected_category
    ? htmlspecialchars($selected_category['cat_name']) . " | Prismoline"
    : "Road Marking Paint & Road Safety Products | Prismoline India";
$page_meta_desc = $selected_category
    ? htmlspecialchars($selected_category['cat_blurb'])
    : "Explore Prismoline's full range of road marking paint, glass beads, signage, crash barriers and road safety accessories manufactured to MoRTH and BS standards.";
$page_meta_keywords = "Road Marking Products, Road Safety Products, Highway Safety Equipment, Traffic Safety Products, Road Infrastructure Solutions";

require_once "inc/header.php";
require_once "inc/nav.php";

// Company-wide facts (already used elsewhere on the site) shown as a
// trust strip under every category, the way Automark's product pages
// lead with a "Product Features" list.
$trust_highlights = [
    ['icon' => 'fa-certificate', 'text' => 'MoRTH & BS 3262 Compliant'],
    ['icon' => 'fa-award',       'text' => 'ISO 9001 & ISO 14001 Certified Manufacturing'],
    ['icon' => 'fa-truck-fast',  'text' => 'Pan-India Delivery Network'],
    ['icon' => 'fa-headset',     'text' => 'Dedicated Technical Support'],
];
?>

<div class="page-heading">
    <h1 class="text-center fw-bold text-white"><?= $selected_category ? htmlspecialchars($selected_category['cat_name']) : 'Our Products' ?></h1>
</div>

<main class="p-lg-5 p-sm-4 p-3">
    <div class="container p-0">

        <nav class="pd-breadcrumb" aria-label="breadcrumb">
            <a href="<?= $base_url ?>index.php">Home</a> /
            <a href="<?= $base_url ?>products.php">Products</a>
            <?php if ($selected_category): ?>
                / <span class="text-dark"><?= htmlspecialchars($selected_category['cat_name']) ?></span>
            <?php endif; ?>
        </nav>

        <?php if (!$cat_slug): ?>
            <ul class="nav nav-pills justify-content-center mb-3 modern-tabs" id="productTabs" role="tablist">
                <?php foreach ($products as $index => $cat):
                    $tab_id = 'tab-' . strtolower($cat['cat_id']);
                    $is_active = $index === 0 ? 'active' : '';
                ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?= $is_active ?>" id="<?= $tab_id ?>-tab" data-bs-toggle="pill" data-bs-target="#<?= $tab_id ?>" type="button" role="tab">
                            <?= htmlspecialchars($cat['cat_name']) ?>
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="tab-content" id="productTabsContent">
            <?php
            $display_products = $cat_slug && $selected_category ? [$selected_category] : $products;
            ?>
            <?php foreach ($display_products as $index => $cat):
                $tab_id = 'tab-' . strtolower($cat['cat_id']);
                $is_active = ($cat_slug || $index === 0) ? 'show active' : '';
                $cat_image = !empty($cat['cat_image']) ? htmlspecialchars($cat['cat_image']) : 'no-category-image.webp';
            ?>
                <div class="tab-pane fade <?= $is_active ?>" id="<?= $tab_id ?>" role="tabpanel">

                    <!-- CATEGORY HERO -->
                    <div class="category-hero shadow-sm">
                        <img src="<?= $base_url ?>assets/images/products/category/<?= $cat_image ?>"
                            alt="<?= htmlspecialchars($cat['cat_name']) ?>"
                            class="category-hero-image">
                        <div class="category-hero-body">
                            <span class="pd-section-eyebrow">Product Category</span>
                            <h2 class="section-title"><?= htmlspecialchars($cat['cat_name']) ?></h2>
                            <?php if (!empty($cat['cat_blurb'])): ?>
                                <p class="category-hero-desc"><?= htmlspecialchars($cat['cat_blurb']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- TRUST / CERTIFICATION STRIP -->
                    <div class="category-highlights">
                        <?php foreach ($trust_highlights as $h): ?>
                            <div class="category-highlight-card">
                                <div class="pd-feature-icon"><i class="fa-solid <?= $h['icon'] ?>"></i></div>
                                <span><?= htmlspecialchars($h['text']) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- PRODUCT GRID -->
                    <?php if (!empty($cat['products'])): ?>
                        <span class="pd-section-eyebrow d-block text-center">Explore Our Collection</span>
                        <h2 class="section-title mb-5">Featured <span class="fw-bold">Products</span></h2>

                        <div class="row g-4">
                            <?php foreach ($cat['products'] as $p):
                                $image = !empty($p['image']) ? htmlspecialchars($p['image']) : 'no-product-image.webp';
                                // Trim the long SEO description down to a short card-friendly summary.
                                $short_desc = $p['description'];
                                if (function_exists('mb_strlen')) {
                                    if (mb_strlen($short_desc) > 130) {
                                        $short_desc = mb_substr($short_desc, 0, 127) . '…';
                                    }
                                } elseif (strlen($short_desc) > 130) {
                                    $short_desc = substr($short_desc, 0, 127) . '...';
                                }
                                $has_detail = isset($product_details[$p['url_slug']]);
                            ?>
                                <div class="col-xl-3 col-lg-4 col-sm-6 d-flex">
                                    <?php if ($has_detail): ?><a href="<?= $base_url ?>product-details.php?product=<?= urlencode($p['url_slug']) ?>" class="text-decoration-none w-100 d-flex"><?php endif; ?>
                                    <div class="product-card-full shadow-sm w-100">
                                        <div class="product-card-full-image">
                                            <img src="<?= $base_url ?>assets/images/products/product/<?= $image ?>"
                                                alt="<?= htmlspecialchars($p['name']) ?>">
                                        </div>
                                        <div class="product-card-full-body">
                                            <span class="product-card-full-cat"><?= htmlspecialchars($cat['cat_name']) ?></span>
                                            <h3 class="product-card-full-title"><?= htmlspecialchars($p['name']) ?></h3>
                                            <p class="product-card-full-desc"><?= htmlspecialchars($short_desc) ?></p>
                                            <?php if ($has_detail): ?>
                                                <span class="product-card-full-link">View Details <i class="fa-solid fa-arrow-right"></i></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if ($has_detail): ?></a><?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-center text-muted my-5">Product listings for this category are coming soon. Please contact us for full specifications.</p>
                    <?php endif; ?>

                    <?php if ($cat['cat_slug'] === 'glass-beads'): ?>
                        <div class="row g-4 mt-5">
                            <div class="container py-5 text-center">
                                <span class="badge bg-primary px-4 py-2 fs-5 rounded-pill mb-4">Also available</span>
                                <div class="row justify-content-center align-items-center g-4 mt-2">
                                    <div class="col-auto">
                                        <img src="<?= $base_url ?>assets/images/products/product/potters-logo.png" alt="Potters" class="img-fluid" style="max-height:70px;">
                                    </div>
                                    <div class="col-auto">
                                        <div class="bg-white rounded-4 shadow p-3">
                                            <img src="<?= $base_url ?>assets/images/products/product/sovtec-logo.png" alt="Sovtec" class="img-fluid" style="max-height:70px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- CTA -->
                    <div class="pd-section" style="border-top: none;">
                        <div class="pd-cta-banner">
                            <h2>Need <?= htmlspecialchars($cat['cat_name']) ?> for your next project?</h2>
                            <p>Get a quote, technical data sheet, or samples from our team within 24 hours.</p>
                            <a href="<?= $base_url ?>contact.php#contact_form" class="btn btn-light fw-semibold px-4 py-2 rounded-pill">
                                Request a Quote
                            </a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

    </div>
</main>

<?php require_once "inc/footer.php"; ?>
