<?php
// This design is now the main products.php — redirect here (preserving the
// ?category= query string) so old bookmarked/shared links keep working.
$qs = $_SERVER['QUERY_STRING'] ?? '';
header('Location: products.php' . ($qs !== '' ? '?' . $qs : ''), true, 301);
exit;
