<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!-- stylesheets should be enqueued in functions.php -->
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <?php endif; ?>
<div class="full-page" style="background-image:url(<?php echo $image[0]; ?>)">

<header>
  
  <div class="container">
    <h1>
      <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
        <?php bloginfo( 'name' ); ?>
      </a>
    </h1>
    <h2><?php bloginfo('description'); ?> 

        <?php if (get_field('lynn_is')): ?>
          <?php $count = 1; $classes = array(); ?>
          <?php while(the_repeater_field('lynn_is')): ?>
            <span class="word-master word-gallery<?= $count ?>"><?php the_sub_field('lynn_word'); ?></span>
            <?php array_push($classes, "word-gallery".$count) ?>
            <?php $count++ ?>
          <?php endwhile; ?>
        <?php endif; ?>

    </h2>


    
    
  </div> <!-- /.container -->

  

</header><!--/.header-->

<style>
      /*<?php $position = 0; ?>
      <?php foreach ($classes as $class) {
          echo ".$class {
            display: inline-block;
            transform: rotate({$position}deg);
          }";
          $position += 20;
      } ?>*/

    </style>


