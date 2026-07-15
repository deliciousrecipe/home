<?php
/**
 * The Sunday Table — core helper functions
 * Loads recipes from the JSON data store and provides small,
 * dependency-free helpers used across every page.
 */

define('SITE_NAME', 'The Sunday Table');
define('SITE_TAGLINE', 'Home cooking, one card at a time');
define('SITE_URL', '/'); // update to your live domain, e.g. https://www.thesundaytable.com/
define('DATA_FILE', __DIR__ . '/../data/recipes.json');

/**
 * Load and cache all recipes from the JSON data file.
 * @return array
 */
function get_all_recipes() {
    static $recipes = null;
    if ($recipes === null) {
        $json = file_get_contents(DATA_FILE);
        $recipes = json_decode($json, true) ?: [];
    }
    return $recipes;
}

/**
 * Get recipes filtered by category (breakfast|lunch|dinner).
 */
function get_recipes_by_category($category) {
    return array_values(array_filter(get_all_recipes(), function ($r) use ($category) {
        return strtolower($r['category']) === strtolower($category);
    }));
}

/**
 * Find one recipe by its slug.
 */
function get_recipe_by_slug($slug) {
    foreach (get_all_recipes() as $r) {
        if ($r['slug'] === $slug) return $r;
    }
    return null;
}

/**
 * Return a handful of featured/highest-rated recipes for the homepage.
 */
function get_featured_recipes($limit = 6) {
    $all = get_all_recipes();
    usort($all, fn($a, $b) => $b['rating'] <=> $a['rating']);
    return array_slice($all, 0, $limit);
}

function category_label($category) {
    $labels = ['breakfast' => 'Breakfast', 'lunch' => 'Lunch', 'dinner' => 'Dinner'];
    return $labels[strtolower($category)] ?? ucfirst($category);
}

/** Escape helper for cleaner templates. */
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/** Render a row of star icons for a numeric rating out of 5. */
function render_stars($rating) {
    $full = floor($rating);
    $half = ($rating - $full) >= 0.5;
    $out = str_repeat('★', (int)$full);
    if ($half) $out .= '½';
    return $out;
}

/**
 * Inline SVG icon library — flat line-art, single color via currentColor,
 * so every icon can be recolored per-context in CSS with no image requests.
 */
function icon($name, $size = 40) {
    $icons = [
        'pancake' => '<circle cx="24" cy="30" r="14" fill="none" stroke="currentColor" stroke-width="2.5"/><ellipse cx="24" cy="30" rx="14" ry="4" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M10 30v6c0 2.2 6.3 4 14 4s14-1.8 14-4v-6" fill="none" stroke="currentColor" stroke-width="2.5"/><circle cx="30" cy="24" r="2" fill="currentColor"/>',
        'egg' => '<path d="M24 8c9 10 14 18 14 24a14 14 0 1 1-28 0c0-6 5-14 14-24z" fill="none" stroke="currentColor" stroke-width="2.5"/><circle cx="24" cy="30" r="5" fill="currentColor" opacity=".85"/>',
        'oats' => '<path d="M12 20h24l-2.5 18a3 3 0 0 1-3 2.6H17.5a3 3 0 0 1-3-2.6L12 20z" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M12 20a12 6 0 0 1 24 0" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M18 26h12M17 32h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
        'sandwich' => '<path d="M8 30h32l-3 8a3 3 0 0 1-3 2H14a3 3 0 0 1-3-2l-3-8z" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M10 30c0-8 6-14 14-14s14 6 14 14" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M13 30l2-4M35 30l-2-4M20 30l1-5M28 30l-1-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
        'salad' => '<path d="M8 26a16 12 0 0 1 32 0z" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M6 26h36" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/><path d="M14 26c0-6 3-12 3-16M24 26c0-8 0-14 0-18M34 26c0-6-3-12-3-16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
        'soup' => '<path d="M8 24h32c0 9-6 16-16 16S8 33 8 24z" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M14 24c0-3 2-4 2-7M24 24c0-4 2-5 2-9M34 24c0-3-2-4-2-7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M4 24h4M40 24h4" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>',
        'salmon' => '<path d="M6 26c8-10 22-12 30-6-2 4-2 8 0 12-8 6-22 4-30-6z" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M36 20c3-2 5-2 6-1-1 2-1 5 0 7-1 1-3 1-6-1" fill="none" stroke="currentColor" stroke-width="2.5"/><circle cx="14" cy="24" r="1.6" fill="currentColor"/>',
        'stirfry' => '<path d="M8 30a16 6 0 0 0 32 0" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M8 30c0-3 3.2-6 16-6s16 3 16 6" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M16 20c0-4 1-7 1-10M24 18c0-4 0-6 0-9M32 20c0-4-1-7-1-10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
        'casserole' => '<rect x="9" y="22" width="30" height="14" rx="3" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M6 22h4M38 22h4" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/><path d="M13 22c1-4 4-6 11-6s10 2 11 6" fill="none" stroke="currentColor" stroke-width="2.5"/>',
        'clock' => '<circle cx="24" cy="24" r="15" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M24 15v9l6 5" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>',
        'flame' => '<path d="M24 6c2 6-4 8-4 14a6 6 0 0 0 12 0c0-2-1-3-2-4 1 6-2 8-4 8a5 5 0 0 1-5-6c0-6 5-8 3-12z" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linejoin="round"/><path d="M14 30a10 10 0 0 0 20 0c0-2-.5-4-1-5 0 5-3 9-9 9s-9-4-9-9c-.6 1.5-1 3-1 5z" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linejoin="round"/>',
        'plate' => '<circle cx="24" cy="24" r="16" fill="none" stroke="currentColor" stroke-width="2.5"/><circle cx="24" cy="24" r="9" fill="none" stroke="currentColor" stroke-width="2"/>',
        'basket' => '<path d="M10 20h28l-3 16a3 3 0 0 1-3 2.4H16a3 3 0 0 1-3-2.4l-3-16z" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M14 20c0-7 4-11 10-11s10 4 10 11" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M10 20h28" stroke="currentColor" stroke-width="2.5"/>',
        'leaf' => '<path d="M10 38C10 18 26 10 38 10c0 12-8 28-28 28z" fill="none" stroke="currentColor" stroke-width="2.5"/><path d="M12 36c8-8 16-14 22-22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
    ];
    $body = $icons[$name] ?? $icons['plate'];
    return "<svg width=\"$size\" height=\"$size\" viewBox=\"0 0 48 48\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" aria-hidden=\"true\">$body</svg>";
}
