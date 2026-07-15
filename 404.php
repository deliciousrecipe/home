<?php
require_once __DIR__ . '/includes/functions.php';
http_response_code(404);
$page_title = 'Page Not Found — ' . SITE_NAME;
$active_nav = '';
include __DIR__ . '/includes/header.php';
?>
<div class="container static-page" style="text-align:center;">
  <span class="eyebrow">404</span>
  <h1>This card isn't in the box.</h1>
  <p>The page you're looking for may have been moved or never existed. Let's get you back to the recipes.</p>
  <p><a class="btn btn-primary" href="/index.php">Back to home</a></p>
</div>
<?php include __DIR__ . '/includes/footer.php'; ?>
