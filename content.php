<?php
/**
 * @package MClub LA
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	/**
	 * Display for non-singular page types
	 */
	if ( !is_singular() ) : ?>
		<header class="entry-header">
			<?php
				// See if we should display the category (first only)
				$mclub_category = get_the_category();

				if( $mclub_category[0] && ( $mclub_category[0]->name != "Uncategorized" ) ): ?>
					<h2 class="entry-category"><a href="<?php echo get_category_link( $mclub_category[0]->term_id ); ?>"><?php echo $mclub_category[0]->name; ?></a>:
			<?php endif; ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta-header">
				<?php mclub_posted_on(); ?>
			</div><!-- .entry-meta-header -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		<?php 
			/**
			* Check for a post thumbnail to display
			*/
		if ( '' != get_the_post_thumbnail() ) : // Display the post featured image ?>
			<figure class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_post_thumbnail( $post_id, 'front-page-thumb' ); ?></a>
			</figure>
		<?php elseif ( '' != mclub_post_image_search() ) : // Display first image in the post ?>
			<figure class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php echo mclub_post_image_search() ?>" /></a>
			</figure>
		<?php else : // fallback ?>
			<!--no thumbnail-->
		<?php endif; ?>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-meta-footer">
			<?php if ( 'post' == get_post_type() ) : // Hide tag text for pages on Search ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '<ul><li>', '</li><li>', '</li></ul>' );
					if ( $tags_list ) :
				?>
				<span class="tag-link-title">TAGS:</span>
				<div class="tags-links"><?php printf( __( '%1$s', 'mclub' ), $tags_list ); ?></span>
				<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>
		</footer><!-- .entry-meta-footer -->
	<?php 
		/**
		 * (Fallback) display for singular content
		 */
		else : ?>
		<!-- BATMAN! WE HAVE FALLBACK MODE! -->
		<header class="entry-header">

			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta-header">
				<?php mclub_posted_on(); ?>
			</div><!-- .entry-meta-header -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'mclub' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'mclub' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-meta-footer">
			<?php if ( 'post' == get_post_type() ) : // Hide tag text for pages on Search ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '<ul><li>', '</li><li>', '</li></ul>' );
					if ( $tags_list ) :
				?>
				<span class="tag-link-title">TAGS</span>
				<span class="tags-links"><?php printf( __( '%1$s', 'mclub' ), $tags_list ); ?></span>
				<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'mclub' ), __( '1 Comment', 'mclub' ), __( '% Comments', 'mclub' ) ); ?></span>
			<?php endif; ?>
			<?php edit_post_link( __( 'Edit', 'mclub' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta-footer -->

<?php endif; ?>
</article><!-- #post-## -->
