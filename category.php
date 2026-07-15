<?php
require_once __DIR__ . '/includes/functions.php';

$valid_categories = ['breakfast', 'lunch', 'dinner'];
$cat = strtolower($_GET['cat'] ?? '');
if (!in_array($cat, $valid_categories, true)) {
    $cat = 'breakfast';
}

$recipes = get_recipes_by_category($cat);
$label = category_label($cat);

$intros = [
    'breakfast' => 'Morning recipes built around one idea: something worth getting up for, on the table before the coffee finishes brewing.',
    'lunch' => 'Midday recipes that hold up in a lunchbox, a work-from-home kitchen, or a lazy Saturday — quick to make, quicker to disappear.',
    'dinner' => 'Weeknight-tested dinners the whole table will actually eat, from 20-minute skillets to slow-cooker set-and-forget meals.',
];

$page_title = "$label Recipes — " . SITE_NAME;
$page_description = "Browse $label recipes: " . implode(', ', array_column($recipes, 'title')) . '.';
$active_nav = $cat;
$canonical_path = 'category.php?cat=' . $cat;

include __DIR__ . '/includes/header.php';
?>

<section class="cat-hero <?= h($cat) ?>">
  <div class="container">
    <span class="eyebrow" style="color:var(--gold);">Recipe box &rsaquo; <?= h($label) ?></span>
    <h1><?= h($label) ?> Recipes</h1>
    <p><?= h($intros[$cat]) ?></p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head">
      <div>
        <span class="eyebrow">In this drawer</span>
        <h2><?= count($recipes) ?> <?= h($label) ?> recipes</h2>
      </div>
    </div>

    <?php if (empty($recipes)): ?>
      <div class="empty-state">
        <p>No recipes here yet — check back soon, or browse another category.</p>
      </div>
    <?php else: ?>
      <div class="card-grid">
        <?php foreach ($recipes as $i => $r): ?>
          <a class="recipe-card" href="/recipe.php?slug=<?= h($r['slug']) ?>">
            <span class="card-pin"></span>
            <span class="corner-tag"><?= (int)$r['prep_time'] + (int)$r['cook_time'] ?> min</span>
            <div class="card-media" style="color:var(--pine);"><?= icon($r['icon'], 56) ?></div>
            <div class="card-body">
              <div class="card-cat"><?= h($r['difficulty']) ?> &middot; Serves <?= (int)$r['servings'] ?></div>
              <h3><?= h($r['title']) ?></h3>
              <p class="card-desc"><?= h($r['description']) ?></p>
              <div class="card-meta">
                <span><?= icon('clock', 15) ?> <?= (int)$r['prep_time'] + (int)$r['cook_time'] ?> min</span>
                <span class="stars"><?= render_stars($r['rating']) ?> <?= number_format($r['rating'], 1) ?></span>
              </div>
            </div>
          </a>
          <?php if ($i === 1): ?>
            <div class="ad-slot" style="grid-column:1/-1;">Advertisement space — reserved for AdSense (in-feed unit)</div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
