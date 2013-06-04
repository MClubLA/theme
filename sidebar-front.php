<?php
/**
 * The sidebar containing the front page widget areas.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 */

/*
 * The front page widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if ( ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) )
	return;

// If we get this far, we have widgets. Let do this.
?>

                    <article class="right-container">
                        <h2 class="post">Popular Posts</h2>
                        <ul class="people-post">
                            <li>
                                <figure class="pic">
                                    <img src="include/images/people-1.jpg" alt=""/>
                                </figure>
                                <div class="msg">
                                    <p>Maison Martin Margicla for H&M 2012 Fall/Winter NYC Launch Video Recap</p>
                                    <span>2 daya ago</span>
                                </div>
                            </li>
                            <li>
                                <figure class="pic">
                                    <img src="include/images/people-2.jpg" alt=""/>
                                </figure>
                                <div class="msg">
                                    <p>Maison Martin Margicla for H&M 2012 Fall/WinterFootwear Collection</p>
                                    <span>2 daya ago</span>
                                </div>
                            </li>
                            <li>
                                <figure class="pic">
                                    <img src="include/images/people-3.jpg" alt=""/>
                                </figure>
                                <div class="msg">
                                    <p>Ben Baller Makes Sean Kingston's 3rd Jusus piece to Matchf Rick Ross</p>
                                    <span>1 daya ago</span>
                                </div>
                            </li>
                            <li>
                                <figure class="pic">
                                    <img src="include/images/people-4.jpg" alt=""/>
                                </figure>
                                <div class="msg">
                                    <p>Applying Sneaker Marketing to a 259- Year-Old Beer Compabny with Andy Chiu</p>
                                    <span>2 daya ago</span>
                                </div>
                            </li>
                            <li>
                                <figure class="pic">
                                    <img src="include/images/people-5.jpg" alt=""/>
                                </figure>
                                <div class="msg">
                                    <p>OBEY 2012 Holiday Lookbook</p>
                                    <span>1 daya ago</span>
                                </div>
                            </li>
                            <li>
                                <figure class="pic">
                                    <img src="include/images/people-6.jpg" alt=""/>
                                </figure>
                                <div class="msg">
                                    <p>Apple Introduces the New iMac</p>
                                    <span>1 daya ago</span>
                                </div>
                            </li>
                            <li>
                                <figure class="pic">
                                    <img src="include/images/people-7.jpg" alt=""/>
                                </figure>
                                <div class="msg">
                                    <p>Essentials: Annoushka Giltsoff of A Number of Names*</p>
                                    <span>2 daya ago</span>
                                </div>
                            </li>
                            <li>
                                <figure class="pic">
                                    <img src="include/images/people-8.jpg" alt=""/>
                                </figure>
                                <div class="msg">
                                    <p>Gourmet x Mitchell & Ness Vintage Satin Jacket</p>
                                    <span>1 daya ago</span>
                                </div>
                            </li>
                            <li>
                                <figure class="pic">
                                    <img src="include/images/people-9.jpg" alt=""/>
                                </figure>
                                <div class="msg">
                                    <p>Danny Brown - Witlt | Video</p>
                                    <span>1 daya ago</span>
                                </div>
                            </li>
                            <li>
                                <figure class="pic">
                                    <img src="include/images/people-10.jpg" alt=""/>
                                </figure>
                                <div class="msg">
                                    <p>Acapulco Gold 2012 Fall Lookbook</p>
                                    <span>1 daya ago</span>
                                </div>
                            </li>
                        </ul>
                    </article>




<div id="secondary" class="widget-area" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<div class="first front-widgets">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- .first -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div class="second front-widgets">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div><!-- .second -->
	<?php endif; ?>
</div><!-- #secondary -->