<?php get_header();  ?>

<div class="container">
  <div class="main">
  	<div class="about-text">
  		<?php // Start the loop ?>
  		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  		<p><?php the_content(); ?></p>
  		 <?php endwhile; // end the loop?>
  	</div>
  	<div class="about-image">
  		<img src="<?php the_field('profile_picture');?>" alt="">
  	</div>

    <div class="skills">
    	<h3><?php $object = get_post_type_object( 'skill' );
			echo $object->labels->name; ?></h3>

    	<?php $skillsQuery = new WP_Query(array(
    	    'post_type' => 'skill',
    	    'order' => 'ASC'
    	)); ?>

    	<?php if ($skillsQuery-> have_posts()): ?>
    	  <?php while($skillsQuery-> have_posts()): ?>
    	    <?php $skillsQuery->the_post(); ?>
    	    <?php while(has_sub_field('skills_image')): ?>
    	      <p><?php the_sub_field('skills_logo'); ?></p>
    	    <?php endwhile ?>
    	    <!-- what we want to show goes here -->
    	    <h4><?php the_title(); ?></h4>
    			<p><?php the_content(); ?></p>
    	  	<?php endwhile; ?>
    	  <?php wp_reset_postdata(); ?>
    	<?php endif; ?>
     
    </div> <!-- /skills -->

    <div class="portfolio">

    <h3><?php $title = get_post_type_object( 'portfolio' );
			echo $title->labels->singular_name; ?></h3>

    	<?php $portfolioQuery = new WP_Query(array(
    	    'post_type' => 'portfolio',
    	    'order' => 'ASC'
    	)); ?>
    	
    	<?php if ($portfolioQuery-> have_posts()): ?>
    	  <?php while($portfolioQuery-> have_posts()): ?>
    	    <?php $portfolioQuery->the_post(); ?>
    	    <div class="portfolio-item">
    	    	<div class="portfolio-text">
	    	    	<h3><?php the_title(); ?></h3>
	    	    	<p class="porfolio-text"><?php the_content(); ?></p>
    	    	</div>
    	    	<div class="portfolio-image">
	    	    	<?php if (has_post_thumbnail( $post->ID ) ): ?>
	    	    	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	    	    		 <?php $thumbnail_id = get_post_thumbnail_id( $post->ID );
	    	    		 $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
	    	    	<?php endif; ?>
							<a href="<?php the_field('link')?>">
    	    		<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>"></a>
    	    	</div>
    	    </div>

    	  	<?php endwhile; ?>
    	  <?php wp_reset_postdata(); ?>
    	<?php endif; ?>
     
    </div>  <!-- /portfolio -->

    <div class="contact">
    	<div class="contact-image">
    		<?php the_field('contact_image'); ?>
    	</div>
    	<div class="contact-form">
    		<?php the_field('contact_form'); ?>
    	</div>
    	<div class="contact-fields">
    		<div class="field">
    			<?php while(has_sub_field('contact_info')): ?>
    				<a href="<?php the_sub_field('contact_link'); ?>">
    					<p><?php the_sub_field('contact_icon') ?> <?php the_sub_field('contact_item') ?></p>
    				</a>
    	    <?php endwhile ?>
    		</div>
    	</div>
    </div>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>