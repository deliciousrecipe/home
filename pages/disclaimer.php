<?php
require_once __DIR__ . '/../includes/functions.php';

$page_title = 'Disclaimer — ' . SITE_NAME;
$page_description = 'Recipe, nutrition, and allergen disclaimer for The Sunday Table.';
$active_nav = '';
$canonical_path = 'pages/disclaimer.php';

include __DIR__ . '/../includes/header.php';
?>

<div class="container static-page">
  <span class="eyebrow">Legal</span>
  <h1>Disclaimer</h1>

  <h2>Nutrition information</h2>
  <p>Calorie counts and other nutrition figures listed with each recipe are estimates only, calculated using standard ingredient databases. Actual values will vary based on specific brands, substitutions, and portion sizes. If you are managing a medical condition, please consult a registered dietitian or your doctor rather than relying solely on these estimates.</p>

  <h2>Allergens</h2>
  <p>Recipes on this Site may contain or come into contact with common allergens, including dairy, eggs, wheat, soy, tree nuts, and shellfish. Always check your own ingredient labels and adjust recipes as needed for your dietary needs and allergies.</p>

  <h2>Food safety</h2>
  <p>Please follow safe food handling practices, including cooking meat and poultry to the internal temperatures recommended by the USDA, when preparing any recipe from this Site.</p>

  <h2>Results may vary</h2>
  <p>Every recipe is tested before publishing, but results can vary based on your specific oven, stovetop, altitude, and ingredient freshness. Use listed times as a guide and rely on visual and temperature cues where provided.</p>

  <p>Questions? Reach out through our <a href="/pages/contact.php">contact page</a>.</p>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
