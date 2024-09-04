<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		the_content(
			sprintf(
				__( 'Continue reading %s', 'tailpress' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			)
		);
		?>
    </div>

</article>
