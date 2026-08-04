<?php
$current_page = 'team';
$page_title = "Leadership & Management Team | Prismoline";
$page_meta_desc = "Meet the leadership behind Prismoline's road safety manufacturing, driving quality, compliance and innovation across every product line since 2010.";
$page_meta_keywords = "Road Safety Experts, Manufacturing Leadership, Highway Infrastructure Company, Engineering Excellence India";

require_once "inc/data.php";
require_once "inc/header.php";
require_once "inc/nav.php";
?>

<div class="page-heading">
    <h1 class="text-center fw-bold text-white">Our Team</h1>
</div>

<main class="p-lg-5 p-sm-4 p-3">
    <section class="team-main-image-container shadow-sm p-1 p-sm-4">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-12">
                    <img src="<?= $base_url ?>assets/images/team/team.png" alt="Our Team" class="img-fluid w-100 team-image">
                </div>
            </div>
        </div>
    </section>

    <section class="team-all-members-container container">
        <div class="pt-5 text-center">
            <h2 class="section-title">Meet Our Management Team</h2>
            <p class="section-subtitle">Talented individuals working together to achieve excellence</p>
        </div>

        <div class="row g-4">
            <?php foreach ($team_member as $member): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <img src="<?= $base_url ?>assets/images/team/<?= htmlspecialchars($member['url']) ?>" alt="<?= htmlspecialchars($member['name']) ?>" class="member-photo">
                        <h3 class="member-name mb-1"><?= htmlspecialchars($member['name']) ?></h3>
                        <p class="member-designation"><?= htmlspecialchars($member['designation']) ?></p>
                        <p class="member-intro"><?= htmlspecialchars($member['intro']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php require_once "inc/footer.php"; ?>
