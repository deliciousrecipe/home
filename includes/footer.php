</main>

<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div>
        <a href="/index.php" class="logo" style="margin-bottom:12px;">
          <?= icon('plate', 26) ?>
          The Sunday <span>Table</span>
        </a>
        <p style="color:var(--linen); opacity:.85; font-size:.92rem; max-width:34ch;">
          Tested, everyday recipes for American home cooks — real ingredients, clear steps, no fuss.
        </p>
      </div>
      <div>
        <h4>Recipes</h4>
        <ul>
          <li><a href="/category.php?cat=breakfast">Breakfast</a></li>
          <li><a href="/category.php?cat=lunch">Lunch</a></li>
          <li><a href="/category.php?cat=dinner">Dinner</a></li>
        </ul>
      </div>
      <div>
        <h4>Site</h4>
        <ul>
          <li><a href="/pages/about.php">About Us</a></li>
          <li><a href="/pages/contact.php">Contact</a></li>
          <li><a href="/sitemap.xml">Sitemap</a></li>
        </ul>
      </div>
      <div>
        <h4>Legal</h4>
        <ul>
          <li><a href="/pages/privacy-policy.php">Privacy Policy</a></li>
          <li><a href="/pages/terms.php">Terms of Use</a></li>
          <li><a href="/pages/disclaimer.php">Disclaimer</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <?= date('Y') ?> The Sunday Table. All rights reserved.</span>
      <span>Made for home cooks across the USA 🇺🇸</span>
    </div>
  </div>
</footer>

<script src="/assets/js/main.js"></script>
</body>
</html>
