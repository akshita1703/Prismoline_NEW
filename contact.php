<?php
$current_page = 'contact';
$page_title = 'Contact Prismoline — Get a Quote for Road Marking Products';
$page_meta_desc = "Get in touch with Prismoline for a quote on thermoplastic paint, glass beads, signage, crash barriers and road safety accessories. Fast response guaranteed.";
$page_meta_keywords = "Road Marking Paint Supplier, Get Road Safety Quote, Contact Road Safety Manufacturer, Road Safety Solutions India";

require_once "inc/data.php";
require_once "inc/header.php";
require_once "inc/nav.php";
?>

<div class="page-heading contact-heading-bg">
    <h1 class="text-center fw-bold text-white"><?= $page_title ?></h1>
</div>

<div class="call-strip mb-4 w-100 mt-1">
    <div class="cta-modern d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 p-4">
        <div class="text-center text-md-start">
            <h2 class="fw-bold text-white mb-1" style="font-size: var(--h4-size);">Need Help? Let's Talk</h2>
            <p class="mb-0 text-light small">Fast response • Expert support • No waiting</p>
        </div>
        <div class="d-flex gap-2 flex-wrap justify-content-center">
            <a href="tel:<?= $main_phone ?>" class="btn btn-light fw-semibold px-4 py-2 rounded-pill">
                <i class="fa fa-phone me-2"></i><?= $main_phone ?>
            </a>
            <a href="#contact_form" class="btn btn-outline-light fw-semibold px-4 py-2 rounded-pill">
                Request Quote →
            </a>
        </div>
    </div>
</div>

<main class="p-lg-5 p-sm-4 p-3 mt-5 mt-sm-0">
    <div class="container contact-section shadow-sm mb-sm-5 mb-4 g-0 p-0 border border-light">
        <div class="row g-0">
            <div class="col-md-6 contact-image overflow-hidden">
                <img src="<?= $base_url ?>assets/images/contact.jpeg" alt="Contact Us">
            </div>

            <div class="col-md-6 p-4 p-md-5 contact-form">
                <h2 class="mb-4 fw-bold text-main">Get a Quote for Your Road Marking Project</h2>

                <div class="d-flex flex-wrap align-items-center justify-content-between bg-light rounded gap-1 p-3 mb-3 contact-quick-box">
                    <div class="d-flex align-items-center gap-2 mb-2 mb-md-0">
                        <i class="fa-solid fa-phone text-main"></i>
                        <a href="tel:<?= $main_phone ?>" class="fw-semibold text-main2 text-decoration-none"><?= $main_phone ?></a>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa-brands fa-whatsapp text-main"></i>
                        <a href="https://wa.me/<?= str_replace('-', '', $WhatsApp) ?>" target="_blank" class="fw-semibold text-main text-decoration-none">Chat on WhatsApp</a>
                    </div>
                </div>

                <form id="contact_form" class="mt-lg-4 mt-2">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="company" name="company" placeholder="Enter your company name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Interest</label>
                        <select name="product_interest" id="product_interest" class="form-control" required>
                            <option value="">Select a product</option>
                            <option value="thermoplastic_paint">Thermoplastic Paint</option>
                            <option value="glass_beads">Glass Beads</option>
                            <option value="road_studs">Road Studs</option>
                            <option value="reflectometer">Reflectometer</option>
                            <option value="other_safety_products">Other Safety Products</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="4" id="message" name="message" placeholder="Write your message..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-main w-100 py-2 text-light fw-semibold" id="contact_form_btn">Send My Enquiry</button>
                </form>
                <p class="text-muted text-center small mt-2">We respond within 24 hours</p>
            </div>
        </div>
    </div>

    <div class="w-100">
        <div class="map-container">
            <?= $map ?>
        </div>
    </div>
</main>

<?php require_once "inc/footer.php"; ?>
