<?php get_header();  ?>


  	
	  	<div class="about">
	  		<div class="about-text-container">
		  		<div class="about-text">
			  		<h4>About Me!</h4>
			  		<?php // Start the loop ?>
			  		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			  		<p><?php the_content(); ?></p>
			  		 <?php endwhile; // end the loop?>
			  	</div>
			  </div>
		  	<div class="about-image">
	  			<img src="<?php the_field('profile_picture');?>" alt="">
	  		</div>
	  	</div>


			<div class="container">

	    <div class="skills-items">
				
	    	<?php $skillsQuery = new WP_Query(array(
	    	    'post_type' => 'skill',
	    	    'order' => 'ASC'
	    	)); ?>

	    	<?php if ($skillsQuery-> have_posts()): ?>
	    	  <?php while($skillsQuery-> have_posts()): ?>
	    	    <?php $skillsQuery->the_post(); ?>
	    	    <!-- what we want to show goes here -->
	    	    <div class="skills-item">
	    	    	<h4><?php the_title(); ?></h4>
	    	    	<div class="logos">
	    	    		<?php while(has_sub_field('skills_image')): ?>
	    	      	<p><?php the_sub_field('skills_logo'); ?></p>
	    	    		<?php endwhile ?>
	    	    		</div>
	    				<p class="skills-text"><?php the_content(); ?></p>
	    			</div>
	    	  	<?php endwhile; ?>
	    	  <?php wp_reset_postdata(); ?>
	    	<?php endif; ?>
	     
	   </div> <!-- /skills section -->

	   </div>

	   <?php if (has_post_thumbnail( $post->ID ) ): ?>
  		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  		<?php endif; ?>
			<div class="section-header" style="background-image:url(<?php echo $image[0]; ?>)">
				<div class="section-overlay">
					<h3><?php $object = get_post_type_object( 'portfolio' );
			echo $object->labels->singular_name; ?></h3>
				</div>
			</div>

		<div class="container">

    <div class="portfolio">

    	<?php $portfolioQuery = new WP_Query(array(
    	    'post_type' => 'portfolio',
    	    'order' => 'ASC'
    	)); ?>
    	
    	<?php if ($portfolioQuery-> have_posts()): ?>
    	  <?php while($portfolioQuery-> have_posts()): ?>
    	    <?php $portfolioQuery->the_post(); ?>
    	    <div class="portfolio-item">
    	    	<div class="portfolio-text">
	    	    	<h4><?php the_title(); ?></h4>
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
    </div>

	   <?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<?php endif; ?>
			<div class="section-header" style="background-image:url(<?php echo $image[0]; ?>)">
				<div class="section-overlay">
					<h3><?php the_field('contact_title')?></h3>
				</div>
			</div>


    <div class="contact">

    	<div class="contact-image">
    		
				<?php $image = get_field('contact_image');
					if( !empty($image) ): ?>
					<img class="sub" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php endif; ?>
				<img class="prop" src="<?php the_field('contact_image_2'); ?>" alt="">

    	</div>
    	<div class="contact-text">
	    	<div class="contact-form">
	    		<?php the_field('contact_form'); ?>
	    	</div>
	    	<div class="contact-email">
	    		<p>Or send me a note at <?php the_field('contact_email'); ?></p>
	    	</div>
	    	<div class="contact-fields">
	    			<?php while(has_sub_field('contact_info')): ?>
	    				<div class="field">
	    				<a href="<?php the_sub_field('contact_link'); ?>">
	    				<?php the_sub_field('contact_icon') ?>
	    				</a>
	    				<a href="<?php the_sub_field('contact_link'); ?>">
	    				<p><?php the_sub_field('contact_item') ?></p>
	    				</a>
	    				</div>
	    	    <?php endwhile ?>
	    	</div>
	    </div>
    </div>


<?php get_footer(); ?>