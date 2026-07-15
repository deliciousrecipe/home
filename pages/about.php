<?php
require_once __DIR__ . '/../includes/functions.php';

$page_title = 'About Us — ' . SITE_NAME;
$page_description = 'Learn about The Sunday Table, a home-cooking recipe site built for real American kitchens and weeknight schedules.';
$active_nav = 'about';
$canonical_path = 'pages/about.php';

include __DIR__ . '/../includes/header.php';
?>

<div class="container static-page">
  <span class="eyebrow">About</span>
  <h1>A recipe box, not a scrapbook.</h1>
  <p>The Sunday Table started the way most good recipe collections do — as a shoebox of index cards, splattered with butter and scribbled with notes in the margins. This site is that box, cleaned up and put online.</p>

  <p>Every recipe here is written and tested in a real home kitchen using ingredients you can find at a typical American grocery store. We measure in cups and Fahrenheit, we tell you what a "soft peak" actually looks like, and we skip the life story — you came for dinner, not a memoir.</p>

  <h2>What we care about</h2>
  <ul>
    <li><strong>Recipes that work the first time.</strong> Every card is tested more than once before it's published, and timing, temperatures, and yields are checked for accuracy.</li>
    <li><strong>Plain instructions.</strong> No jargon, no unnecessary equipment, and every step explains the "why" when it matters.</li>
    <li><strong>Respect for your time.</strong> Prep and cook times are listed up front so you can decide if tonight's the night before you start chopping.</li>
  </ul>

  <h2>How the site is organized</h2>
  <p>Recipes are sorted into three drawers — <a href="/category.php?cat=breakfast">Breakfast</a>, <a href="/category.php?cat=lunch">Lunch</a>, and <a href="/category.php?cat=dinner">Dinner</a> — so you can browse by the meal you're actually planning instead of scrolling an endless feed.</p>

  <h2>Get in touch</h2>
  <p>Have a recipe request, a substitution question, or found a typo in a step? We'd genuinely like to hear from you on the <a href="/pages/contact.php">contact page</a>.</p>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
