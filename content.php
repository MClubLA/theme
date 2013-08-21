<?php
/**
 * @package MClub LA
 */
?>
<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta-header">
			<?php mclub_posted_on(); ?>
		</div><!-- .entry-meta-header -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php if ( !is_singular() ) : // Display excerpts everywhere except 'single' type data - page/post/attachment ?>
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
		<a href="<?php the_permalink(); ?>" rel="bookmark"><img width="278" height="138" src="<?php echo mclub_post_image_search() ?>" /></a>
	</figure>
	<?php else : // fallback ?>
	<!--no thumbnail-->
	<?php endif; ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'mclub' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'mclub' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'mclub' ) );
				if ( $categories_list && mclub_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'mclub' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

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
</article><!-- #post-## -->
