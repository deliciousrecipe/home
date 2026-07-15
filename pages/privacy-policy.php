<?php
require_once __DIR__ . '/../includes/functions.php';

$page_title = 'Privacy Policy — ' . SITE_NAME;
$page_description = 'Privacy policy for The Sunday Table, including how cookies and advertising partners are used on this site.';
$active_nav = '';
$canonical_path = 'pages/privacy-policy.php';

include __DIR__ . '/../includes/header.php';
?>

<div class="container static-page">
  <span class="eyebrow">Legal</span>
  <h1>Privacy Policy</h1>
  <p><em>Last updated: <?= date('F j, Y') ?></em></p>

  <p>This Privacy Policy explains how The Sunday Table ("we," "us," or "our") collects, uses, and discloses information when you visit this website. Replace the bracketed placeholders below with your actual business details before publishing.</p>

  <h2>Information we collect</h2>
  <p>We collect information you provide directly, such as your name and email address when you use the contact form or subscribe to updates. We also collect standard technical information automatically, including your IP address, browser type, device type, pages viewed, and time spent on pages, through server logs and analytics tools.</p>

  <h2>Cookies and similar technologies</h2>
  <p>This site uses cookies and similar tracking technologies to operate correctly, remember preferences, and understand how visitors use the site. Cookies are small text files stored on your device.</p>

  <h2>Advertising and Google AdSense</h2>
  <p>We may display advertisements served by Google AdSense and other third-party advertising networks. These third parties may use cookies, web beacons, and similar technologies to collect information about your visits to this and other websites in order to provide advertisements about goods and services of interest to you.</p>
  <ul>
    <li>Google uses advertising cookies to serve ads based on a user's prior visits to this website or other websites.</li>
    <li>Google's use of advertising cookies enables it and its partners to serve ads to your users based on their visit to your sites and/or other sites on the Internet.</li>
    <li>Users may opt out of personalized advertising by visiting <a href="https://adssettings.google.com" target="_blank" rel="noopener">Google Ads Settings</a>.</li>
    <li>Users may also opt out of a third-party vendor's use of cookies for personalized advertising by visiting <a href="https://www.aboutads.info/choices/" target="_blank" rel="noopener">www.aboutads.info</a>.</li>
  </ul>
  <p>We do not control the cookies placed by third-party advertising networks. Please review Google's <a href="https://policies.google.com/technologies/partner-sites" target="_blank" rel="noopener">Advertising Policies</a> for more information on how Google uses data when you use our site.</p>

  <h2>How we use information</h2>
  <p>We use collected information to operate and improve the site, respond to inquiries submitted through the contact form, understand site traffic and engagement, and, where applicable, serve relevant advertising.</p>

  <h2>Third-party links</h2>
  <p>This site may link to third-party websites. We are not responsible for the privacy practices or content of those external sites.</p>

  <h2>Children's privacy</h2>
  <p>This site is not directed at children under 13, and we do not knowingly collect personal information from children under 13.</p>

  <h2>Your choices</h2>
  <p>You can control cookies through your browser settings. Disabling cookies may affect how parts of the site function. You may also opt out of interest-based advertising using the links provided above.</p>

  <h2>Changes to this policy</h2>
  <p>We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated revision date.</p>

  <h2>Contact us</h2>
  <p>If you have questions about this Privacy Policy, please reach out via our <a href="/pages/contact.php">contact page</a>.</p>

  <p style="color:var(--ink-soft); font-size:.85rem;"><strong>Note:</strong> This template is provided for general guidance and is not legal advice. Consult a qualified attorney to ensure this policy meets the requirements of your jurisdiction, your ad network agreements, and laws such as the CCPA/CPRA (California) and, if you have EU/UK visitors, GDPR.</p>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
