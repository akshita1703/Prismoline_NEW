<?php
// This design is now the main product-details.php — redirect here
// (preserving the ?product= query string) so old bookmarked/shared links
// keep working.
$qs = $_SERVER['QUERY_STRING'] ?? '';
header('Location: product-details.php' . ($qs !== '' ? '?' . $qs : ''), true, 301);
exit;
