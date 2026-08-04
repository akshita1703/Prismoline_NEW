    <footer class="text-light">
        <div class="py-lg-5 py-sm-4">
            <div class="footer-container container m-auto row mb-4 border-bottom border-light p-4" style="border-color: #efefef20 !important">
                <h3 class="fs-4 text-uppercase mb-4">
                    <img src="<?= $base_url ?>assets/images/logo/blue_bg_logo.png" alt="Prismoline" style="width:160px">
                </h3>
                <div class="footer-section col-lg-4 col-md-6">
                    <p class="text-jusitfy">
                        <strong class="text-uppercase d-block mb-1">CORPORATE OFFICE</strong>
                        195/B Mandeliya Nagar, Bariatu, Ranchi -834009, Jharkhand, INDIA
                    </p>
                    <p class="m-0"><i class="fa-solid fa-phone me-2"></i> <a href="tel:+91-7857860666" class="text-light">+91 78578 60666</a></p>
                    <p><i class="fa-regular fa-envelope me-2"></i> <a href="mailto:info@prismoline.com" class="text-light">info@prismoline.com</a></p>
                </div>
                <div class="footer-section col-lg-4 col-md-6">
                    <p class="text-jusitfy">
                        <strong class="text-uppercase d-block mb-1">REGISTERED OFFICE</strong>
                        36(P), Phase II, Industrial Area, Tatisilwai, Ranchi, Jharkhand, Pin Code - 835103
                    </p>
                    <p class="m-0"><i class="fa-solid fa-phone me-2"></i> <a href="tel:+91-7033275747" class="text-light">+91 70332 75747</a></p>
                    <p><i class="fa-regular fa-envelope me-2"></i> <a href="mailto:info@prismoline.com" class="text-light">info@prismoline.com</a></p>
                </div>
                <div class="footer-section col-lg-4 col-md-6">
                    <p class="text-jusitfy">
                        <strong class="text-uppercase d-block mb-1">REGIONAL OFFICE</strong>
                        512-513 Manish Chamber, Sonawala Lane Opp Hotel Karan Palace, Goregaon East, Mumbai - 400063
                    </p>
                    <p class="m-0"><i class="fa-solid fa-phone me-2"></i> <a href="tel:+91-9819862365" class="text-light">+91 98198 62365</a></p>
                    <p><i class="fa-regular fa-envelope me-2"></i> <a href="mailto:info@prismoline.com" class="text-light">info@prismoline.com</a></p>
                </div>
            </div>

            <div class="footer-container container m-auto row py-4">
                <div class="footer-section col-lg-4 col-md-6">
                    <h3 class="text-uppercase fs-4 mb-3">QUICK LINKS</h3>
                    <h3 class="mb-3 text-uppercase">ABOUT</h3>
                    <ul>
                        <li><a href="<?= $base_url ?>about.php">Prismoline</a></li>
                        <li><a href="<?= $base_url ?>about.php#clients">Clients</a></li>
                        <li><a href="<?= $base_url ?>team.php">Our Team</a></li>
                        <li><a href="<?= $base_url ?>contact.php">Contact</a></li>
                        <li><a href="<?= $base_url ?>index.php#brochure-form-container">Download Brochure</a></li>
                    </ul>
                </div>
                <div class="footer-section col-lg-4 col-md-6">
                    <h3 class="text-uppercase fs-4 mb-3" style="opacity:0;">-</h3>
                    <h3 class="mb-3 text-uppercase">More</h3>
                    <ul>
                        <li><a href="<?= $base_url ?>index.php">Home</a></li>
                        <li><a href="<?= $base_url ?>gallery.php">Gallery</a></li>
                        <li><a href="<?= $base_url ?>products.php">Products</a></li>
                        <li><a href="<?= $base_url ?>career.php">Career</a></li>
                    </ul>
                </div>
                <div class="footer-section col-lg-4 col-md-6">
                    <div class="newsletter">
                        <h3 class="mb-3">Subscribe for latest updates</h3>
                        <form id="newsletter_form">
                            <input type="email" placeholder="Your email" name="email" id="newsletter_email" required>
                            <button type="submit" id="newsletter_submit_btn">SUBSCRIBE</button>
                        </form>
                        <h4>Follow us</h4>
                        <div class="social-icons">
                            <div class="h-100 d-inline-flex align-items-center">
                                <a class="btn btn-sm-square bg-white text-main me-1" href="https://www.facebook.com/profile.php?id=61581730136758" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square bg-white text-main me-1" href="https://x.com/prismoline" target="_blank"><i class="fab fa-x-twitter"></i></a>
                                <a class="btn btn-sm-square bg-white text-main me-1" href="https://www.linkedin.com/company/prismolineindia" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-sm-square bg-white text-main me-1" href="https://www.instagram.com/prismolineroadsafety/" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-sm-square bg-white text-main me-0" href="https://www.youtube.com/channel/UC8TOqw9f2oQvgwsvS4bfBig/featured" target="_blank"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="text-light">

        <div class="d-flex flex-column align-items-center">
            <p class="m-0">© <?= date('Y') ?> Prismoline | All Rights Reserved</p>
            <p class="m-0"><small style="font-size:12px; font-weight: 300; letter-spacing: 0.5px;">Designed by <a href="http://www.sysrootsolution.com" class="text-light" target="_blank">Sysroot Solution</a></small></p>
        </div>
    </footer>

    <div class="whatsapp-link-box bg-gradient p-1">
        <a class="btn btn-sm-square w-100" target="_blank"
            href="https://api.whatsapp.com/send/?phone=<?= $WhatsApp ?>&text=<?= $encoded_message ?>&type=phone_number&app_absent=0">
            <i class="fa-brands fa-whatsapp w-100"></i>
        </a>
    </div>

    <div class="contact-link-box bg-gradient p-1">
        <a class="btn btn-sm-square w-100" target="_blank" href="<?= $base_url ?>contact.php#contact_form">
            <i class="fa fa-envelope w-100"></i>
        </a>
    </div>

    <div class="mobile-cta d-md-none">
        <a href="<?= $base_url ?>contact.php#contact_form" class="btn btn-main w-100 d-flex align-items-center text-light justify-content-center gap-2">
            <i class="fa fa-file-text"></i>
            <span>Get a Quote</span>
        </a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Forms in script.js post to this endpoint (unchanged backend).
        const API = 'https://prismoline.com/api/';
    </script>
    <script src="<?= $base_url ?>assets/js/script.js"></script>
</body>

</html>
