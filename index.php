<?php
/**
 * Main template file
 *
 * @package Aquila
 */

get_header();
?>

<div class="primary">
	<div id="main" class="site-main mt-5" role="main">
		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) {
				?>
				<div class="mt-5">
					<h1 class="page-title screen-reader-text">
						<?php single_post_title(); ?>
					</h1>
			</div>
				<?php
			}
			?>
				<div class="container">
					<?php
					while ( have_posts() ) :
						the_post();
						the_title( '<h2>', '</h2>' );
						the_excerpt();
						endwhile;
					?>
				</div>
				<?php
			endif;
		?>
	</div>
</div>

<?php
get_footer();
