# The Sunday Table — Recipe Website (PHP)

A lightweight, no-database recipe blog with Breakfast, Lunch, and Dinner
sections, built for a US home-cooking audience and designed to meet
Google AdSense's content and policy requirements.

## What's included

```
recipe-site/
├── index.php              Homepage (hero, category tabs, featured recipes)
├── category.php           Listing page — ?cat=breakfast|lunch|dinner
├── recipe.php             Single recipe page — ?slug=recipe-slug
├── 404.php                Custom "not found" page
├── ads.txt                Placeholder — replace with your real AdSense line
├── robots.txt             Crawler rules + sitemap reference
├── sitemap.xml            Static sitemap of all pages/recipes
├── .htaccess              Blocks direct access to /includes and /data
├── data/
│   └── recipes.json       All recipe content lives here — no database needed
├── includes/
│   ├── functions.php      Recipe loading/filtering + inline SVG icon library
│   ├── header.php         Shared <head>, nav, AdSense script placeholder
│   └── footer.php         Shared footer, legal links, JS include
├── pages/
│   ├── about.php
│   ├── contact.php        Working contact form (see "Enable email" below)
│   ├── privacy-policy.php Includes required AdSense cookie/ads disclosure
│   ├── terms.php
│   └── disclaimer.php     Nutrition/allergen/food-safety disclaimer
└── assets/
    ├── css/style.css      Full design system ("recipe card catalog" theme)
    ├── js/main.js         Mobile nav toggle, print button, form validation
    └── svg/               (reserved for any additional custom art)
```

## Run it locally

You need PHP 7.4+ installed. From inside the `recipe-site` folder, run:

```bash
php -S localhost:8000
```

Then open **http://localhost:8000/index.php** in your browser.

## Deploying

1. Upload the entire `recipe-site` folder contents to your web host's
   public folder (e.g. `public_html/`) via FTP or your host's file manager.
2. Make sure the host runs PHP 7.4 or newer.
3. Update `SITE_URL` in `includes/functions.php` and the domain references
   inside `robots.txt` and `sitemap.xml` to your real domain.
4. Update the destination email address in `pages/contact.php` and
   uncomment the `@mail()` line once your host has outbound mail enabled
   (most shared hosts do; test it before relying on it).

## Adding or editing recipes

All content lives in `data/recipes.json` — no database, no admin login.
Copy an existing recipe object and edit the fields. Each recipe needs:

- `slug` — used in the URL, must be unique, lowercase, hyphenated
- `category` — `breakfast`, `lunch`, or `dinner`
- `icon` — one of the icon keys defined in `includes/functions.php`
  (`pancake`, `egg`, `oats`, `sandwich`, `salad`, `soup`, `salmon`,
  `stirfry`, `casserole`) — add a new one to the `icon()` function if needed
- `ingredients` / `steps` — plain arrays of strings
- `tip`, `tags`, `rating`, `calories`, `servings`, `prep_time`, `cook_time` (minutes)

The homepage, category pages, and sitemap all read from this one file
automatically — no other code changes needed for new recipes (though you
should add new recipe URLs to `sitemap.xml` by hand, or regenerate it).

## Turning on Google AdSense

This site was structured with AdSense's publisher policies in mind:

- **Original, sufficient content** — each recipe includes a real
  description, timing, full ingredients/instructions, and a kitchen tip
  (not thin, templated text).
- **Clear navigation** — sticky header nav, footer sitemap, and
  breadcrumbs on every recipe page.
- **Required legal pages** — Privacy Policy (with the specific Google
  cookie/ads-personalization disclosure AdSense expects), Terms of Use,
  and a Disclaimer are all included and linked in the footer.
- **`ads.txt`** — placeholder file at the site root; replace its contents
  with the exact line Google gives you after approval.
- **Reserved ad slots** — look for `<div class="ad-slot">...</div>` in
  `index.php`, `category.php`, and `recipe.php`. Once approved, replace
  these divs with your AdSense `<ins class="adsbygoogle">` ad unit code.
- **No interstitials or popups** — intentionally left out; AdSense
  penalizes pages that obstruct content, especially on mobile.
- **Mobile responsive** — the whole layout, including nav and cards,
  adapts down to phone widths.

Before applying, update the placeholder business details in
`pages/privacy-policy.php` (and consider having a lawyer review it),
add a handful more recipes so the site doesn't look thin, and make sure
`SITE_URL` and all domain references point to your live domain.

## Notes on the design

The visual identity ("recipe card catalog") uses a deep pine green,
mustard gold, and brick red palette with Fraunces (display) and Inter
(body) type, styled to look like a vintage recipe box — index-card style
recipe tiles, drawer-tab category navigation, and a handwritten-style
"kitchen tip" note on every recipe. All icons are inline SVG (no image
requests), so the site loads fast even before you add real photography.
If you'd like to swap in real food photography, replace the
`.card-media` icon block in each template with an `<img>` tag.
