<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */
?>                  
                        <article class="left-container">
                            <div class="fig-area">
                                <figure class="drive">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/m-car3.jpg" alt="img"/>
                                </figure>
                                <div class="tags">
                                     <h3 class="tags-head">TAGS:</h3>
                                    <?php the_tags('<ul><li>','</li><li>','</li></ul>') ?>
                                </div>
                            </div>
							<article class="content">
			<?php if ( is_single() ) : ?>
			<h3 class="heading solid-border"><?php the_title(); ?></h1>
			<?php else : ?>
			<h3 class="heading solid-border">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>
			<?php endif; // is_single() ?>
                        
  <span class="date"><?php get_the_date() ?></span>
		<?php if ( is_single() ) {
        		the_content();
		} else {
         		the_excerpt( "More" );
		} ?>
        <!-- .entry-content -->
                            </article>
                        </article>
<!-- end main post content area -->
