<?php
require_once __DIR__ . '/includes/functions.php';

$slug = $_GET['slug'] ?? '';
$recipe = get_recipe_by_slug($slug);

if (!$recipe) {
    http_response_code(404);
    $page_title = 'Recipe Not Found — ' . SITE_NAME;
    $active_nav = '';
    include __DIR__ . '/includes/header.php';
    echo '<div class="container static-page"><h1>Recipe not found</h1><p>That recipe may have been moved or renamed. Try browsing by category instead.</p>
    <p><a class="btn btn-primary" href="/index.php">Back to home</a></p></div>';
    include __DIR__ . '/includes/footer.php';
    exit;
}

$label = category_label($recipe['category']);
$total_time = (int)$recipe['prep_time'] + (int)$recipe['cook_time'];

$page_title = $recipe['title'] . ' — ' . SITE_NAME;
$page_description = $recipe['description'];
$active_nav = $recipe['category'];
$canonical_path = 'recipe.php?slug=' . $recipe['slug'];

// Related recipes: same category, excluding this one
$related = array_values(array_filter(get_recipes_by_category($recipe['category']), fn($r) => $r['slug'] !== $recipe['slug']));

include __DIR__ . '/includes/header.php';
?>

<script type="application/ld+json">
<?php
$ld = [
    "@context" => "https://schema.org/",
    "@type" => "Recipe",
    "name" => $recipe['title'],
    "description" => $recipe['description'],
    "recipeCategory" => $label,
    "recipeCuisine" => "American",
    "prepTime" => "PT" . (int)$recipe['prep_time'] . "M",
    "cookTime" => "PT" . (int)$recipe['cook_time'] . "M",
    "totalTime" => "PT" . $total_time . "M",
    "recipeYield" => $recipe['servings'] . " servings",
    "recipeIngredient" => $recipe['ingredients'],
    "recipeInstructions" => array_map(fn($s) => ["@type" => "HowToStep", "text" => $s], $recipe['steps']),
    "aggregateRating" => [
        "@type" => "AggregateRating",
        "ratingValue" => (string)$recipe['rating'],
        "ratingCount" => "50"
    ],
    "nutrition" => [
        "@type" => "NutritionInformation",
        "calories" => $recipe['calories'] . " calories"
    ]
];
echo json_encode($ld, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
?>
</script>

<section class="recipe-hero">
  <div class="container">
    <div class="breadcrumbs">
      <a href="/index.php">Home</a> &rsaquo; <a href="/category.php?cat=<?= h($recipe['category']) ?>"><?= h($label) ?></a> &rsaquo; <?= h($recipe['title']) ?>
    </div>
    <div class="recipe-title-row">
      <div>
        <span class="eyebrow"><?= h($label) ?> &middot; <?= h($recipe['difficulty']) ?></span>
        <h1><?= h($recipe['title']) ?></h1>
        <p style="max-width:60ch; color:var(--ink-soft);"><?= h($recipe['description']) ?></p>
        <div class="recipe-tags">
          <?php foreach ($recipe['tags'] as $tag): ?>
            <span class="tag"><?= h($tag) ?></span>
          <?php endforeach; ?>
        </div>
        <div class="stars" style="font-size:1rem;"><?= render_stars($recipe['rating']) ?> <?= number_format($recipe['rating'], 1) ?> out of 5</div>
      </div>
      <button class="btn print-btn" id="printRecipe" aria-label="Print this recipe">🖨️ Print recipe</button>
    </div>

    <div class="meta-strip">
      <div><strong><?= (int)$recipe['prep_time'] ?> min</strong><span>Prep</span></div>
      <div><strong><?= (int)$recipe['cook_time'] ?> min</strong><span>Cook</span></div>
      <div><strong><?= (int)$recipe['servings'] ?></strong><span>Servings</span></div>
      <div><strong><?= (int)$recipe['calories'] ?></strong><span>Calories</span></div>
    </div>
  </div>
</section>

<div class="container">
  <div class="recipe-body">
    <aside class="ingredients-card">
      <h3>Ingredients</h3>
      <ul>
        <?php foreach ($recipe['ingredients'] as $ing): ?>
          <li><?= h($ing) ?></li>
        <?php endforeach; ?>
      </ul>
    </aside>

    <div>
      <h3>Instructions</h3>
      <ol class="steps-list">
        <?php foreach ($recipe['steps'] as $step): ?>
          <li><div><?= h($step) ?></div></li>
        <?php endforeach; ?>
      </ol>

      <div class="tip-box">
        <span class="eyebrow">Kitchen tip</span>
        <p class="note" style="margin:0;"><?= h($recipe['tip']) ?></p>
      </div>

      <div class="ad-slot">Advertisement space — reserved for AdSense (in-content unit)</div>
    </div>
  </div>

  <?php if (!empty($related)): ?>
  <section class="section" style="padding-top:0;">
    <div class="section-head">
      <div>
        <span class="eyebrow">More from this drawer</span>
        <h2>Other <?= h($label) ?> recipes</h2>
      </div>
    </div>
    <div class="card-grid">
      <?php foreach (array_slice($related, 0, 3) as $r): ?>
        <a class="recipe-card" href="/recipe.php?slug=<?= h($r['slug']) ?>">
          <span class="card-pin"></span>
          <span class="corner-tag"><?= (int)$r['prep_time'] + (int)$r['cook_time'] ?> min</span>
          <div class="card-media" style="color:var(--pine);"><?= icon($r['icon'], 56) ?></div>
          <div class="card-body">
            <div class="card-cat"><?= h($r['difficulty']) ?></div>
            <h3><?= h($r['title']) ?></h3>
            <p class="card-desc"><?= h($r['description']) ?></p>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </section>
  <?php endif; ?>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
