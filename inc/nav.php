<?php $current_page = $current_page ?? ''; ?>
<div class="container-fluid bg-light p-0 topbar">
    <div class="gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-4 px-xl-5 text-start">
            <div class="h-100 d-inline-flex align-items-center py-xl-2 me-4">
                <a href="https://www.google.com/maps/search/Sharda%20Infrasolutions%20Private%20Limited/@23.36857888,85.4455348,17z?hl=en" target="_blank" class="text-muted">
                    <small class="fa fa-map-marker-alt text-main me-2"></small>
                    <small class="small">36(P), Phase II, Industrial Area, Tatisilwai, Ranchi, Jh, 835103</small>
                </a>
            </div>
        </div>
        <div class="col-lg-5 px-4 px-xl-5 text-end">
            <div class="h-100 d-inline-flex align-items-center py-2 py-xl-2 me-4">
                <a href="tel:+91-7033275747" class="text-muted shadow-sm rounded-pill py-1 px-3 top-header-phone">
                    <small class="fa fa-phone text-main me-2"></small>
                    <small class="fw-semibold">+91-7033275747</small>
                </a>
            </div>
            <div class="h-100 d-inline-flex align-items-center social-icons">
                <a class="btn btn-sm-square bg-white text-main me-1" href="https://www.facebook.com/profile.php?id=61581730136758" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-sm-square bg-white text-main me-1" href="https://x.com/prismoline" target="_blank"><i class="fab fa-x-twitter"></i></a>
                <a class="btn btn-sm-square bg-white text-main me-1" href="https://www.linkedin.com/company/prismolineindia" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-sm-square bg-white text-main me-1" href="https://www.instagram.com/prismolineroadsafety/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-sm-square bg-white text-main me-0" href="http://youtube.com/channel/UC8TOqw9f2oQvgwsvS4bfBig/featured" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top p-0 w-100 topnav">

    <a href="<?= $base_url ?>index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img src="<?= $base_url ?>assets/images/logo/image.png" alt="Prismoline" class="logo">
    </a>

    <div class="d-flex jusitfy-content-center align-items-center gap-3">
        <div class="bg-gradient p-1 whatsapp-nav">
            <a class="btn btn-sm-square w-100" target="_blank"
                href="https://api.whatsapp.com/send/?phone=<?= $WhatsApp ?>&text=<?= $encoded_message ?>&type=phone_number&app_absent=0">
                <i class="fa-brands fa-whatsapp w-100"></i>
            </a>
        </div>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <div class="collapse navbar-collapse g-0 p-0" id="navbarCollapse">
        <div class="navbar-nav ms-auto align-items-lg-center p-4 p-lg-0">

            <a href="<?= $base_url ?>index.php" class="nav-item nav-link <?= $current_page === 'home' ? 'active' : '' ?>">
                Home
            </a>

            <div class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    About
                </a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="<?= $base_url ?>about.php" class="dropdown-item">Prismoline</a>
                    <a href="<?= $base_url ?>about.php#clients" class="dropdown-item">Clients</a>
                    <a href="<?= $base_url ?>team.php" class="dropdown-item">Team</a>
                    <a href="<?= $base_url ?>index.php#certificate-section" class="dropdown-item">Certificates</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    Products
                </a>
                <div class="dropdown-menu fade-up m-0">
                    <?php foreach ($products as $product): ?>
                        <a href="<?= $base_url ?>products.php?category=<?= $product['cat_slug'] ?>" class="dropdown-item text-capitalize">
                            <?= htmlspecialchars($product['cat_name']) ?>
                        </a>
                    <?php endforeach; ?>
                    <a href="<?= $base_url ?>products.php" class="dropdown-item text-capitalize">
                        All Categories
                    </a>
                </div>
            </div>

            <a href="<?= $base_url ?>gallery.php" class="nav-item nav-link <?= $current_page === 'gallery' ? 'active' : '' ?>">
                Gallery
            </a>

            <a href="<?= $base_url ?>career.php" class="nav-item nav-link <?= $current_page === 'career' ? 'active' : '' ?>">
                Career
            </a>

            <a href="<?= $base_url ?>contact.php" class="nav-item nav-link <?= $current_page === 'contact' ? 'active' : '' ?>">
                Contact
            </a>

            <a href="<?= $base_url ?>downloads/prismoline_brochure.pdf" target="_blank" class="header-brochure-btn nav-link">
                <i class="fa-solid fa-file-arrow-down"></i>
                <span class="ms-2">Brochure</span>
            </a>
        </div>
    </div>
</nav>
