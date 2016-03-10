<footer>
  <div class="container">
    <p>&copy; Lynn Gammie <?php echo date('Y'); ?></p>
  </div>
</footer>

<script>
// scripts.js, plugins.js and jquery are enqueued in functions.php
/* Google Analytics! */
 var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]]; // Change UA-XXXXX-X to be your site's ID
 (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
 g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
 s.parentNode.insertBefore(g,s)}(document,"script"));
</script>

<?php wp_footer(); ?>
</div>

<?php if (get_field('sea_creatures')): ?>
      <?php $number = 1; $classnames = array(); ?>
      <?php while(the_repeater_field('sea_creatures')): ?>
        <img class="creature creature-gallery<?= $number ?>" src="<?php the_sub_field('sea_creature'); ?>"></img>
        <?php array_push($classnames, "word-gallery".$number) ?>
        <?php $number++ ?>
      <?php endwhile; ?>
    <?php endif; ?>
</body>
</html>