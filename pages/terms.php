<?php
require_once __DIR__ . '/../includes/functions.php';

$page_title = 'Terms of Use — ' . SITE_NAME;
$page_description = 'Terms of use governing access to and use of The Sunday Table website.';
$active_nav = '';
$canonical_path = 'pages/terms.php';

include __DIR__ . '/../includes/header.php';
?>

<div class="container static-page">
  <span class="eyebrow">Legal</span>
  <h1>Terms of Use</h1>
  <p><em>Last updated: <?= date('F j, Y') ?></em></p>

  <p>By accessing and using The Sunday Table (the "Site"), you agree to the following terms. If you do not agree, please discontinue use of the Site.</p>

  <h2>Use of content</h2>
  <p>Recipes, text, images, and design elements on this Site are provided for personal, non-commercial use. You may share links to our pages, but you may not republish, redistribute, or reproduce substantial portions of our content without prior written permission.</p>

  <h2>No professional advice</h2>
  <p>Recipes and nutritional information are provided for general informational purposes only and are not a substitute for professional dietary or medical advice. See our <a href="/pages/disclaimer.php">Disclaimer</a> for more detail, including on allergens and nutrition estimates.</p>

  <h2>Third-party advertising</h2>
  <p>This Site may display advertisements served by Google AdSense and other third-party networks. We do not endorse and are not responsible for the products, services, or content of advertisers.</p>

  <h2>User conduct</h2>
  <p>You agree not to misuse the Site, including attempting to disrupt its normal operation, scraping content at scale, or using it for any unlawful purpose.</p>

  <h2>Disclaimer of warranties</h2>
  <p>The Site and its content are provided "as is" without warranties of any kind, express or implied. We do our best to keep recipes accurate and tested, but we cannot guarantee specific results in every kitchen.</p>

  <h2>Limitation of liability</h2>
  <p>To the fullest extent permitted by law, The Sunday Table shall not be liable for any indirect, incidental, or consequential damages arising from your use of the Site.</p>

  <h2>Changes to these terms</h2>
  <p>We may revise these Terms of Use at any time. Continued use of the Site after changes are posted constitutes acceptance of the revised terms.</p>

  <h2>Contact</h2>
  <p>Questions about these terms can be sent through our <a href="/pages/contact.php">contact page</a>.</p>

  <p style="color:var(--ink-soft); font-size:.85rem;"><strong>Note:</strong> This template is provided for general guidance and is not legal advice. Consult a qualified attorney before publishing.</p>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
