<?php
/**
 * Shared header. Expects (optionally) these variables set before include:
 * $page_title, $page_description, $active_nav, $canonical_path
 */
if (!isset($page_title)) $page_title = SITE_NAME . ' — ' . SITE_TAGLINE;
if (!isset($page_description)) $page_description = 'Simple, tested recipes for breakfast, lunch, and dinner — built for real weeknights and easy weekend mornings.';
if (!isset($active_nav)) $active_nav = '';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= h($page_title) ?></title>
<meta name="description" content="<?= h($page_description) ?>">
<meta name="robots" content="index, follow">
<link rel="canonical" href="<?= h(SITE_URL . ($canonical_path ?? '')) ?>">

<!-- Open Graph / social preview -->
<meta property="og:site_name" content="<?= h(SITE_NAME) ?>">
<meta property="og:title" content="<?= h($page_title) ?>">
<meta property="og:description" content="<?= h($page_description) ?>">
<meta property="og:type" content="website">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="/assets/css/style.css">

<!--
  GOOGLE ADSENSE — SITE VERIFICATION / AUTO ADS SCRIPT
  Paste your AdSense loader snippet here once your account is approved, e.g.:
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-XXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>
  Do not add this script until your site has real traffic and complies with
  Google's Publisher Policies (see /pages/privacy-policy.php for the required disclosure).
-->
</head>
<body>
<a class="skip-link" href="#main-content">Skip to content</a>

<header class="site-header">
  <div class="container">
    <a href="/index.php" class="logo">
      <?= icon('plate', 30) ?>
      The Sunday <span>Table</span>
    </a>
    <button class="nav-toggle" id="navToggle" aria-label="Toggle menu" aria-expanded="false">☰</button>
    <nav class="main-nav" id="mainNav" aria-label="Primary">
      <ul>
        <li><a href="/index.php" class="<?= $active_nav === 'home' ? 'active' : '' ?>">Home</a></li>
        <li><a href="/category.php?cat=breakfast" class="<?= $active_nav === 'breakfast' ? 'active' : '' ?>">Breakfast</a></li>
        <li><a href="/category.php?cat=lunch" class="<?= $active_nav === 'lunch' ? 'active' : '' ?>">Lunch</a></li>
        <li><a href="/category.php?cat=dinner" class="<?= $active_nav === 'dinner' ? 'active' : '' ?>">Dinner</a></li>
        <li><a href="/pages/about.php" class="<?= $active_nav === 'about' ? 'active' : '' ?>">About</a></li>
        <li><a href="/pages/contact.php" class="<?= $active_nav === 'contact' ? 'active' : '' ?>">Contact</a></li>
      </ul>
    </nav>
  </div>
</header>

<main id="main-content">
