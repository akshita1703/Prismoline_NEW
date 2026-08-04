<?php
$current_page = 'career';
$page_title = "Careers at Prismoline | Join India's Leading Road Marking Company";
$page_meta_desc = "Explore careers at Prismoline and be part of a team building safer roads across India through manufacturing, engineering and quality innovation.";
$page_meta_keywords = "Road Safety Careers, Manufacturing Jobs India, Highway Infrastructure Careers, Engineering Jobs, Prismoline Careers";

require_once "inc/data.php";
require_once "inc/header.php";
require_once "inc/nav.php";
?>

<div class="page-heading">
    <h1 class="text-center fw-bold text-white">Career</h1>
</div>

<main class="p-lg-5 p-sm-4 p-3">
    <section class="rounded-5 shadow-sm my-3 border clients-section">
        <div class="row justify-content-center align-items-center overflow-hidden">
            <div class="col-lg-6 h-100">
                <img src="<?= $base_url ?>assets/images/career.png" alt="Careers at Prismoline" class="w-100">
            </div>
            <div class="col-lg-6">
                <div class="career-card shadow-sm">
                    <h2 class="text-center mb-4" style="font-size: var(--h3-size);">Apply for a Position</h2>
                    <form id="career-form">
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="fa-regular fa-pen-to-square"></i> Full Name <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control border-light rounded-1" name="name" placeholder="Enter your full name" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted"><i class="fa-regular fa-pen-to-square"></i> Email</label>
                                <input type="email" class="form-control border-light rounded-1" name="email" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted"><i class="fa-regular fa-pen-to-square"></i> Phone Number <sup class="text-danger">*</sup></label>
                                <input type="tel" class="form-control border-light rounded-1" name="phone" placeholder="+1 234 567 8900" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="fa-regular fa-pen-to-square"></i> Position applying for <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control border-light rounded-1" name="position" placeholder="Enter the position" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="fa-regular fa-pen-to-square"></i> Upload Resume (PDF or DOC Only) <sup class="text-danger">*</sup></label>
                            <input class="form-control border-light rounded-1" type="file" name="resume" accept=".pdf,.doc,.docx" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="fa-regular fa-pen-to-square"></i> Why should we hire you? <sup class="text-danger">*</sup></label>
                            <textarea class="form-control border-light rounded-1" rows="4" name="reason" placeholder="Write a short summary" required></textarea>
                        </div>

                        <button type="submit" class="btn text-light w-100 py-2 fw-semibold" id="career-form-button">
                            Submit Application
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once "inc/footer.php"; ?>
