<?php
$current_page = 'about';
$page_title = "About Prismoline - Road Safety Manufacturer India Since 2010";
$page_meta_desc = "Learn how Prismoline has been engineering road marking and safety solutions for India's highways since 2010, backed by ISO certifications and a dedicated leadership team.";
$page_meta_keywords = "Road Safety Manufacturer India, Road Marking Paint Company, Indian Road Safety Company, Highway Infrastructure Manufacturer, ISO Certified Road Safety Manufacturer";

require_once "inc/data.php";
require_once "inc/header.php";
require_once "inc/nav.php";
?>

<div class="page-heading about-heading-bg">
    <h1 class="text-center fw-bold text-white"><?= $page_title ?></h1>
</div>

<main class="p-lg-5 p-sm-4 p-3">
    <nav class="floating-about-nav">
        <a href="#hero" class="floating-nav-link active"><i class="fas fa-book-open"></i><span>Story</span></a>
        <a href="#leadership" class="floating-nav-link"><i class="fas fa-user-tie"></i><span>Leadership</span></a>
        <a href="#team" class="floating-nav-link"><i class="fas fa-users"></i><span>Team</span></a>
        <a href="#values" class="floating-nav-link"><i class="fas fa-gem"></i><span>Values</span></a>
        <a href="#clients" class="floating-nav-link"><i class="fas fa-handshake"></i><span>Clients</span></a>
    </nav>

    <div class="about-page-container">

        <section id="hero" class="bg-light rounded-5 shadow-sm py-5">
            <div class="container">
                <div class="row align-items-center about-content">
                    <div class="col-lg-6 hero-content p-sm-4">
                        <h2 class="hero-title">PRISMOLINE</h2>
                        <p class="hero-content text-justify">At <span class="fw-bold text-main">PRISMOLINE</span>, we are driven by a singular mission — <span class="fw-bold text-muted">making roads safer for everyone</span>. As a <span class="fw-bold text-muted">leading manufacturer</span> and <span class="fw-bold text-muted">exporter of thermoplastic road marking materials</span>, we combine rich experience with advanced formulations to lead the way in global road safety.</p>
                        <p class="hero-content text-justify">Our commitment to <span class="fw-bold text-muted">Quality, Safety, Environment,</span> and <span class="fw-bold text-muted">Customer Satisfaction</span> forms the foundation of everything we do.</p>
                        <p class="hero-content text-justify">
                            We maintain the highest standards through:
                        <ul class="text-muted">
                            <li class="p-1">Rigorous quality assurance testing of all incoming raw materials.</li>
                            <li class="p-1">Controlled, computerized batch manufacturing processes.</li>
                            <li class="p-1">Thorough inspection of all finished products.</li>
                        </ul>
                        </p>
                        <p class="hero-content text-justify">This ensures we deliver <span class="fw-bold text-muted">consistent, superior-quality materials</span> every time</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="image-gallery">
                            <div class="gallery-item"><i class="fas fa-exclamation-triangle"></i></div>
                            <div class="gallery-item"><i class="fas fa-road"></i></div>
                            <div class="gallery-item"><i class="fas fa-street-view"></i></div>
                            <div class="gallery-item"><i class="fas fa-map-signs"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-12 hero-content p-sm-4 mt-4">
                        <p class="hero-content text-justify">At <span class="fw-bold text-muted">PRISMOLINE</span>, <span class="fw-bold text-muted">quality is a passion</span> — from the careful selection of raw materials to expert technical support during on-road application. Our goal is simple: <span class="fw-bold text-muted">100% Customer Satisfaction</span>. We believe our success is built on the success of our valued customers</p>
                        <p class="hero-content text-justify"><span class="fw-bold text-muted">PRISMOLINE</span> is also deeply committed to sustainability. We manufacture environmental friendly <span class="fw-bold text-muted">Thermoplastic Road Marking Materials</span> that meet or exceed major standards, including <span class="fw-bold text-muted">MORTH 803.4</span> and <span class="fw-bold text-muted">BS 3262</span></p>
                        <p class="hero-content text-justify my-4 mb-5"><span class="fw-bold text-muted lead">PRISMOLINE</span> — <span class="fw-bold text-main lead">Performance Visibility Safety !!!!</span></p>
                    </div>
                </div>
            </div>
        </section>

        <section id="thermoplatics" class="rounded-5 border my-5 shadow-sm py-5">
            <div class="container">
                <div class="row align-items-center about-content">
                    <div class="col-lg-12 hero-content p-sm-4">
                        <h2 class="hero-title">THERMOPLASTIC ROAD MARKING</h2>
                        <p class="hero-content text-justify"><span class="fw-bold text-muted">PRISMOLINE</span> — <span class="fw-bold text-muted">Thermoplastic Road Marking Materials</span> are high-performance solution engineered for durability, visibility, and safety.</p>
                        <p class="hero-content text-justify">
                            Formulated with <span class="fw-bold text-muted">advanced thermoplastic technology</span>, it offers:
                        <ul class="text-muted">
                            <li class="p-1">Exceptional adhesion to a wide range of road surfaces.</li>
                            <li class="p-1">Superior wear resistance for long-lasting markings.</li>
                            <li class="p-1">Outstanding retro-reflectivity, ensuring high visibility day and night.</li>
                            <li class="p-1">Quick-drying properties for faster project completion.</li>
                            <li class="p-1">Optimal skid resistance for enhanced road safety.</li>
                        </ul>
                        </p>
                        <p class="hero-content text-justify">Designed for <span class="fw-bold text-muted">highways, urban roads, parking lots,</span> and <span class="fw-bold text-muted">more</span>, Prismoline's road marking material maintains superior performance even under Extreme Weather Conditions.</p>
                        <p class="hero-content text-justify">In addition, its <span class="fw-bold text-muted">eco-friendly</span> formulation minimizes environmental impact while meeting stringent international quality standards, including <span class="fw-bold text-muted">MORTH 803.4</span> and <span class="fw-bold text-muted">BS 3262</span>.</p>
                        <p class="hero-content text-justify">Trusted by professionals worldwide, Prismoline delivers reliable and efficient road marking solutions you can count on.</p>
                    </div>
                </div>
                <div class="d-flex gap-3 flex-wrap justify-content-center align-items-start">
                    <a href="#leadership" class="btn btn-lg btn-primary-custom">Meet Our Team</a>
                    <a href="#values" class="btn btn-lg btn-outline-custom">Our Values</a>
                </div>
            </div>
        </section>

        <section id="leadership" class="director-section bg-light rounded-5 shadow-sm py-5 my-5">
            <div class="container">
                <h2 class="section-title my-4 my-sm-5">Our Leadership</h2>

                <div class="director-card p-sm-5">
                    <div class="row align-items-center p-0 pb-sm-5">
                        <div class="col-lg-4 text-center">
                            <div class="director-img">
                                <div class="director-img-inner overflow-hidden">
                                    <img src="<?= $base_url ?>assets/images/team/lt1.png" alt="Mr. Rishabh Singhania" class="w-100 img-fluid object-fit-cover">
                                </div>
                            </div>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-x-twitter"></i></a>
                                <a href="#"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <h3 class="director-name mt-5 mt-lg-0">Mr. Rishabh Singhania</h3>
                            <p class="director-role">Founder & Managing Director</p>
                            <p class="director-bio">
                                Mr. Rishabh Singhania is <span class="fw-semibold text-muted">the founder and serves as the Managing Director</span> of Sharda Infrasolutions Private Limited, bringing extensive knowledge and leadership to the company. He holds a Master's degree in Business Administration (Marketing) from <span class="fw-semibold text-muted">Western International University, USA</span>, underscoring his deep understanding of marketing principles and commitment to continuous professional growth.<br><br>
                                With over two decades of experience in marketing and business management, Mr. Rishabh possesses a keen understanding of market dynamics and strategic operations. His comprehensive background enables him to effectively guide the company's development and drive its business objectives forward.<br><br>
                                His vast experience enables him to oversee both operational and financial aspects of the business, ensuring efficiency while driving growth. Mr. Rishabh's hands-on approach, coupled with his marketing acumen, positions him as a key figure in shaping the future of the thermoplastic paint industry.
                                <br><br>
                                <span class="text-main fw-semibold">
                                    "His leadership was prominently recognized at the Times of India Realty
                                    Infrastructure Conclave 2025 and was featured in Forbes India
                                    (Billionaire) Edition May 2025."
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="director-card p-sm-5">
                    <div class="row align-items-center py-5">
                        <div class="col-lg-8 order-lg-1 order-2">
                            <h3 class="director-name mt-5 mt-lg-0">Mrs. Sneha Singhania</h3>
                            <p class="director-role">Director - Human Resource & Administration</p>
                            <p class="director-bio">
                                At Sharda Infrasolutions Private Limited, Mrs. Sneha Singhania plays a pivotal role in shaping the company's organizational strength and operational efficiency. With her extensive expertise in <span class="fw-semibold text-muted">human resources and administration</span>, she has been instrumental in establishing robust systems, streamlining processes, and fostering a productive work culture.
                                Her leadership, strategic thinking, and keen attention to detail make her an indispensable part of the company. Her contributions continue to drive growth, ensuring sustained progress in a dynamic and competitive industry.<br><br>
                                Mrs. Sneha's ability to manage and optimize operations ensures the company functions efficiently while adhering to strategic goals. She is actively involved in key decision-making processes that significantly influence the company's direction and success.
                                Her focus on improving workflows and enhancing operational efficiency has been instrumental in supporting the company's growth trajectory.<br><br> Her leadership and meticulous attention to detail make her an integral part of the management team, driving Sharda Infrasolutions towards continued success in a competitive market.
                                Through her expertise, Mrs. Sneha plays a key role in shaping the future of the company and contributing to its sustained progress.
                            </p>
                        </div>
                        <div class="col-lg-4 text-center order-lg-2 order-1">
                            <div class="director-img">
                                <div class="director-img-inner overflow-hidden">
                                    <img src="<?= $base_url ?>assets/images/team/lt2.png" alt="Mrs. Sneha Singhania" class="w-100 img-fluid object-fit-cover">
                                </div>
                            </div>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-github"></i></a>
                                <a href="#"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="director-card p-sm-5">
                    <div class="row align-items-center py-5">
                        <div class="col-lg-4 text-center">
                            <div class="director-img">
                                <div class="director-img-inner overflow-hidden">
                                    <img src="<?= $base_url ?>assets/images/team/lt3.png" alt="Mr. Yash Maheshwari" class="w-100 img-fluid object-fit-cover">
                                </div>
                            </div>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <h3 class="director-name mt-5 mt-lg-0">Mr. Yash Maheshwari</h3>
                            <p class="director-role">Director - Financial Controls & Business Operations</p>
                            <p class="director-bio">
                                Mr. Yash Maheshwari is the Director of Financial Controls and Business Operations at Sharda Infrasolutions Pvt. Ltd., where he plays a crucial role in optimizing financial strategies and operational performance. With over a decade of entrepreneurial and marketing experience, he brings a unique blend of strategic thinking, financial discipline, and innovation to the organization.<br><br>
                                An alumnus of Newcastle University, UK, Mr. Maheshwari holds a Bachelor's degree in Business Management with a focus on Marketing and Related Support Services. His academic background, combined with hands-on leadership experience, enables him to drive impactful, data-backed decisions that enhance both efficiency and profitability. Prior to joining Sharda, he founded and successfully scaled Tefabo Products Pvt. Ltd., ultimately achieving a profitable exit.<br><br>
                                At Sharda Infrasolutions, Mr. Maheshwari's leadership is central to streamlining operations, enforcing strong fiscal governance, and aligning financial planning with long-term growth ambitions. His focus on innovation, transparency, and execution excellence positions the company for scalable and sustainable expansion both nationally and globally.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="director-card p-sm-5">
                    <div class="row align-items-center pt-5">
                        <div class="col-lg-8 order-lg-1 order-2">
                            <h3 class="director-name mt-5 mt-lg-0">Mr. Nasim Khan</h3>
                            <p class="director-role">Director - Sales & Marketing</p>
                            <p class="director-bio">
                                Mr. Nasim Khan serves as the Director of Sales & Marketing at Prismoline, bringing over 30 years of expertise in the Thermoplastic Road Marking and Road Safety Industry. With a strong foundation in commerce, personnel management, and computer systems, and professional certifications from IIM Ahmedabad, NACE, and Dale Carnegie Training, Mr. Khan blends technical proficiency with strategic vision to drive business growth and market expansion.<br><br>
                                Throughout his distinguished career, Mr. Khan has worked with leading organizations such as CMS Traffic Systems and Asian Paints / Asian Paints PPG, where he contributed to product innovation, vendor development, turnkey project execution, and nationwide sales strategies.<br><br>
                                At Prismoline, Mr. Khan is spearheading the company's pan-India expansion, focusing on strengthening participation in Government Tenders, NHAI, NHIDCL, and PWD projects, while ensuring product excellence and customer satisfaction.
                            </p>
                        </div>
                        <div class="col-lg-4 text-center order-lg-2 order-1">
                            <div class="director-img">
                                <div class="director-img-inner overflow-hidden">
                                    <img src="<?= $base_url ?>assets/images/team/lt4.png" alt="Mr. Nasim Khan" class="w-100 img-fluid object-fit-cover">
                                </div>
                            </div>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="team" class="rounded-5 border my-5 shadow-sm py-5">
            <div class="container">
                <h2 class="section-title my-4 my-sm-5">Our Management Team</h2>
                <div class="row g-sm-4 gy-3">
                    <?php foreach ($team_member as $member): ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="team-member text-center">
                                <div class="team-img overflow-hidden">
                                    <img src="<?= $base_url ?>assets/images/team/<?= htmlspecialchars($member['url']) ?>" alt="<?= htmlspecialchars($member['name']) ?>" class="w-100 img-fluid object-fit-cover">
                                </div>
                                <h5><?= htmlspecialchars($member['name']) ?></h5>
                                <p class="text-muted mb-2"><?= htmlspecialchars($member['designation']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="testimonials" class="rounded-5 shadow-sm py-5">
            <div class="container py-sm-5">
                <h2 class="section-title inverse">What Our Clients Say</h2>
                <div class="row g-sm-4 g-2 gy-3">
                    <div class="col-lg-6">
                        <div class="testimonial-card h-100">
                            <div class="stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="testimonial-text">"The quality of thermoplastic road marking paints supplied by Sharda Infrasolutions has been consistently reliable. Their technical guidance and prompt after-sales support have helped us maintain high standards at every site."</p>
                            <p class="client-name mb-1">Vineet Tiwari</p>
                            <p class="client-company">Sr. Manager Procurement & Subcontract, Welspun Enterprise Ltd, Varanasi Aurangabad Road Project NH19</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial-card h-100">
                            <div class="stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="testimonial-text">"We appreciate the excellent execution and attention to detail shown by the team at Sharda Infrasolutions. Their proactive approach and clear communication ensured our project was completed on schedule without compromise."</p>
                            <p class="client-name mb-1">Abhishek Kumar Gupta</p>
                            <p class="client-company">Planning In-charge, GSRP O&M, L&T</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="values" class="rounded-5 border my-5 shadow-sm py-5">
            <div class="container">
                <h2 class="section-title my-4 my-sm-5">Our Core Values</h2>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="value-card">
                            <div class="value-icon"><i class="fas fa-lightbulb"></i></div>
                            <h4>Innovation</h4>
                            <p class="text-muted">We constantly push boundaries and embrace new technologies to deliver cutting-edge solutions.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="value-card">
                            <div class="value-icon"><i class="fas fa-users"></i></div>
                            <h4>Collaboration</h4>
                            <p class="text-muted">We believe in the power of teamwork and building strong partnerships with our clients.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="value-card">
                            <div class="value-icon"><i class="fas fa-award"></i></div>
                            <h4>Excellence</h4>
                            <p class="text-muted">We are committed to delivering the highest quality in everything we do, without compromise.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="value-card">
                            <div class="value-icon"><i class="fas fa-heart"></i></div>
                            <h4>Integrity</h4>
                            <p class="text-muted">We operate with transparency, honesty, and respect in all our relationships and interactions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-brochure-section mb-5">
            <div class="about-brochure-wrapper">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <span class="about-brochure-badge">Company Profile</span>
                        <h2 class="about-brochure-title mt-3">Download Prismoline Company Brochure</h2>
                        <p class="about-brochure-text mb-0">
                            Access detailed information about our thermoplastic
                            road marking solutions, manufacturing standards,
                            certifications, applications and infrastructure products.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="<?= $base_url ?>downloads/prismoline_brochure.pdf" target="_blank" class="btn about-brochure-btn">
                            <i class="fa-solid fa-download me-2"></i>
                            Download Brochure
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-md-5 py-4 clients-section" id="clients">
            <h2 class="section-title">Our Clients</h2>
            <div class="logo-slider my-4">
                <div class="logos-track">
                    <?php foreach (array_merge($client_logo, $client_logo) as $logo): ?>
                        <div class="logo-card text-center">
                            <div class="logo-img mb-2">
                                <a href="<?= htmlspecialchars($logo['link']) ?>" target="_blank">
                                    <img src="<?= $base_url ?>assets/images/clients/logo/<?= htmlspecialchars($logo['url']) ?>" alt="<?= htmlspecialchars($logo['name']) ?>" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
</main>

<?php require_once "inc/footer.php"; ?>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const sections = document.querySelectorAll("section[id]");
        const navLinks = document.querySelectorAll(".floating-nav-link");

        function setActive(id) {
            navLinks.forEach(link => {
                link.classList.remove("active");
                if (link.getAttribute("href") === `#${id}`) {
                    link.classList.add("active");
                }
            });
        }

        function updateActiveSection() {
            let currentSection = "";
            const triggerPoint = window.innerHeight / 2;
            sections.forEach(section => {
                const rect = section.getBoundingClientRect();
                if (rect.top <= triggerPoint && rect.bottom >= triggerPoint) {
                    currentSection = section.id;
                }
            });
            if (currentSection) setActive(currentSection);
        }

        updateActiveSection();
        let ticking = false;
        window.addEventListener("scroll", () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    updateActiveSection();
                    ticking = false;
                });
                ticking = true;
            }
        });
    });
</script>
