<?php
$current_page = 'gallery';
$page_title = "Prismoline Events & Site Visits - Photo Gallery";
$page_meta_desc = "Photo highlights from Prismoline's events, site visits and industry engagements across India's road safety sector.";
$page_meta_keywords = "Road Safety Events, Infrastructure Events, Industry Exhibitions, Highway Safety Conferences, Prismoline Events";

require_once "inc/data.php";
require_once "inc/header.php";
require_once "inc/nav.php";

// Build the events list by scanning the gallery image folders directly
// (the old admin-managed $events array has been dropped along with the
// admin panel; folder names double as the event title).
$galleryRoot = __DIR__ . '/assets/images/gallery';
$groupedEvents = [];

if (is_dir($galleryRoot)) {
    foreach (scandir($galleryRoot) as $folder) {
        if ($folder === '.' || $folder === '..') continue;
        $folderPath = $galleryRoot . '/' . $folder;
        if (!is_dir($folderPath)) continue;

        $images = array_values(array_filter(scandir($folderPath), function ($f) use ($folderPath) {
            return !in_array($f, ['.', '..']) && is_file($folderPath . '/' . $f);
        }));

        if (empty($images)) continue;

        $title = ($folder === 'projects')
            ? 'PROJECTS'
            : strtoupper(str_replace('_', ' ', $folder));

        $groupedEvents[$title] = [
            'folder' => $folder,
            'images' => $images,
        ];
    }
}
?>

<div class="page-heading event-heading-bg">
    <h1 class="text-center fw-bold text-white"><?= $page_title ?></h1>
</div>

<main class="p-lg-5 p-sm-4 p-3">
    <div class="container p-0">

        <?php foreach ($groupedEvents as $title => $group): ?>
            <h2 class="event-group-title mb-4 text-main fw-semibold border-bottom pb-2" style="font-size: var(--h3-size);"><?= htmlspecialchars($title) ?></h2>
            <div class="row g-4 mb-5">
                <?php
                $shown = array_slice($group['images'], 0, 8);
                foreach ($shown as $i => $img):
                    $modalId = 'eventModal_' . md5($group['folder'] . $img);
                ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="card event-card shadow-sm border-0 rounded-3 overflow-hidden position-relative">
                            <img src="<?= $base_url ?>assets/images/gallery/<?= htmlspecialchars($group['folder']) ?>/<?= htmlspecialchars($img) ?>"
                                class="card-img-top event-img"
                                alt="<?= htmlspecialchars($title) ?>"
                                data-bs-toggle="modal"
                                data-bs-target="#<?= $modalId ?>"
                                style="cursor: zoom-in; aspect-ratio: 4/3; object-fit: cover;">
                        </div>
                    </div>

                    <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content border-0 rounded-4 shadow-lg" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);">
                                <div class="modal-body p-0 position-relative">
                                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <img src="<?= $base_url ?>assets/images/gallery/<?= htmlspecialchars($group['folder']) ?>/<?= htmlspecialchars($img) ?>" class="img-fluid rounded-top w-100" alt="<?= htmlspecialchars($title) ?>">
                                    <div class="p-3 text-center">
                                        <h3 class="fw-semibold text-main mb-1" style="font-size: var(--h4-size);"><?= htmlspecialchars($title) ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if (count($group['images']) > 8): ?>
                    <div class="col-md-3 col-sm-6 d-flex align-items-stretch">
                        <div class="card event-card shadow-sm border-0 rounded-3 overflow-hidden position-relative w-100">
                            <div class="row g-0 w-100 h-100">
                                <?php foreach (array_slice($group['images'], 0, 4) as $img): ?>
                                    <div class="col-6" style="height: 50%;">
                                        <img src="<?= $base_url ?>assets/images/gallery/<?= htmlspecialchars($group['folder']) ?>/<?= htmlspecialchars($img) ?>" class="w-100 h-100 object-fit-cover d-block">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column align-items-center justify-content-center text-decoration-none" style="background: rgba(0,0,0,0.45);">
                                <span class="text-white fw-semibold fs-5">+ More Images</span>
                                <small class="text-light"><?= count($group['images']) - 8 ?> more</small>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

    </div>
</main>

<?php require_once "inc/footer.php"; ?>
