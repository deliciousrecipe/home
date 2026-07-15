<?php
require_once __DIR__ . '/includes/functions.php';

$page_title = 'The Sunday Table — Easy Breakfast, Lunch & Dinner Recipes';
$page_description = 'Tested, everyday recipes for American home cooks. Browse simple breakfast, lunch, and dinner ideas with clear steps and real ingredients.';
$active_nav = 'home';
$canonical_path = 'index.php';

$featured = get_featured_recipes(6);
$counts = [
    'breakfast' => count(get_recipes_by_category('breakfast')),
    'lunch' => count(get_recipes_by_category('lunch')),
    'dinner' => count(get_recipes_by_category('dinner')),
];

include __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="container hero-grid">
    <div class="hero-copy">
      <span class="eyebrow">Grandma's recipe box, digitized</span>
      <h1>Recipes worth pulling out of the box twice.</h1>
      <p class="lede">Every recipe here has been cooked, timed, and tested in a real home kitchen — no life stories, no 40 pop-ups, just the recipe and the reasons it works.</p>
      <div class="hero-cta">
        <a href="#featured" class="btn btn-primary">Browse today's recipes</a>
        <a href="/category.php?cat=dinner" class="btn btn-outline" style="border-color:var(--linen); color:var(--linen);">Plan tonight's dinner</a>
      </div>
      <div class="hero-stats">
        <div><strong><?= array_sum($counts) ?></strong><span>Recipes &amp; counting</span></div>
        <div><strong>&lt; 45 min</strong><span>Average total time</span></div>
        <div><strong>4.7★</strong><span>Average reader rating</span></div>
      </div>
    </div>
    <div class="hero-art" aria-hidden="true">
      <svg viewBox="0 0 320 260" width="100%" height="100%">
        <rect x="20" y="40" width="280" height="180" rx="16" fill="#28493A" stroke="#E8A33D" stroke-width="3"/>
        <rect x="20" y="40" width="280" height="34" rx="16" fill="#E8A33D"/>
        <text x="160" y="63" text-anchor="middle" font-family="Fraunces, serif" font-size="18" fill="#152A20" font-weight="700">RECIPE BOX</text>
        <line x1="20" y1="118" x2="300" y2="118" stroke="#3d6b52" stroke-width="1"/>
        <line x1="20" y1="152" x2="300" y2="152" stroke="#3d6b52" stroke-width="1"/>
        <line x1="20" y1="186" x2="300" y2="186" stroke="#3d6b52" stroke-width="1"/>
        <rect x="34" y="86" width="60" height="24" rx="4" fill="#FFF8EC" opacity=".92" transform="rotate(-3 64 98)"/>
        <rect x="110" y="130" width="60" height="24" rx="4" fill="#FFF8EC" opacity=".92" transform="rotate(2 140 142)"/>
        <rect x="200" y="90" width="60" height="24" rx="4" fill="#FFF8EC" opacity=".92" transform="rotate(-2 230 102)"/>
        <rect x="60" y="170" width="60" height="24" rx="4" fill="#FFF8EC" opacity=".92" transform="rotate(3 90 182)"/>
      </svg>
    </div>
  </div>

  <div class="container">
    <div class="drawer-tabs">
      <a class="drawer-tab" href="/category.php?cat=breakfast">
        <div class="tab-icon" style="color:var(--gold);"><?= icon('egg', 34) ?></div>
        <h3>Breakfast</h3>
        <p><?= $counts['breakfast'] ?> recipes to start the day right</p>
      </a>
      <a class="drawer-tab" href="/category.php?cat=lunch">
        <div class="tab-icon" style="color:var(--brick);"><?= icon('sandwich', 34) ?></div>
        <h3>Lunch</h3>
        <p><?= $counts['lunch'] ?> recipes for the midday reset</p>
      </a>
      <a class="drawer-tab" href="/category.php?cat=dinner">
        <div class="tab-icon" style="color:var(--pine);"><?= icon('salmon', 34) ?></div>
        <h3>Dinner</h3>
        <p><?= $counts['dinner'] ?> recipes for the whole table</p>
      </a>
    </div>
  </div>
</section>

<section class="section" id="featured">
  <div class="container">
    <div class="section-head">
      <div>
        <span class="eyebrow">Reader favorites</span>
        <h2>Today's top-rated cards</h2>
        <p>Pulled from the front of the box — the recipes readers make again and again.</p>
      </div>
    </div>
    <div class="card-grid">
      <?php foreach ($featured as $r): ?>
        <a class="recipe-card" href="/recipe.php?slug=<?= h($r['slug']) ?>">
          <span class="card-pin"></span>
          <span class="corner-tag"><?= (int)$r['prep_time'] + (int)$r['cook_time'] ?> min</span>
          <div class="card-media" style="color:var(--pine);"><?= icon($r['icon'], 56) ?></div>
          <div class="card-body">
            <div class="card-cat"><?= h(category_label($r['category'])) ?></div>
            <h3><?= h($r['title']) ?></h3>
            <p class="card-desc"><?= h($r['description']) ?></p>
            <div class="card-meta">
              <span><?= icon('clock', 15) ?> <?= (int)$r['prep_time'] + (int)$r['cook_time'] ?> min</span>
              <span class="stars"><?= render_stars($r['rating']) ?> <?= number_format($r['rating'], 1) ?></span>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>

    <div class="ad-slot">
      Advertisement space — reserved for AdSense (in-content unit)
    </div>

    <div class="newsletter">
      <div>
        <h2>A new recipe card, every Sunday.</h2>
        <p>One email a week. No spam, no filler — just the next recipe worth trying.</p>
      </div>
      <form action="/pages/contact.php" method="get">
        <input type="email" name="email" placeholder="you@email.com" aria-label="Email address" required>
        <button type="submit" class="btn btn-primary">Subscribe</button>
      </form>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
