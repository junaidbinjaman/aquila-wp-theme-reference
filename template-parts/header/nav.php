<?php
/**
 * The header template
 *
 * @package aquila
 */

$menu_class     = \AQUILA_THEME\inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'aquila-header-menu' );

$header_menu = wp_get_nav_menu_items( $header_menu_id );
?>

<div class="container">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
	<div class="container-fluid">
	<?php
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
	?>
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<?php
		if ( ! empty( $header_menu ) && is_array( $header_menu ) ) {
			?>
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<?php
			foreach ( $header_menu as $menu_item ) {
				if ( ! $menu_item->menu_item_parent ) {

					$child_menu_items = $menu_class->get_child_menu_items( $header_menu, $menu_item->ID );
					$has_children     = ! empty( $child_menu_item ) && is_array( $child_menu_item );

					if ( ! $has_children ) {
						?>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="<?php echo esc_url( $menu_item->url ); ?>">
									<?php echo esc_html( $menu_item->title ); ?>
								</a>
							</li>
						<?php
					} else {
						?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="<?php echo esc_html( $menu_item->url ); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<?php echo esc_html( $menu_item->title ); ?>
								</a>
							<ul class="dropdown-menu">
								<?php
								foreach ( $child_menu_items as $child_menu_item ) {
									?>
										<li><a class="dropdown-item" href="<?php echo esc_html( $child_menu_item->url ); ?>">
											<?php echo esc_html( $child_menu_item->title ); ?>
										</a></li>
									<?php
								}
								?>
							</ul>
							</li>
						<?php
					}
					?>
					<?php
				}
			}
			?>
		</ul>
			<?php
		}
		?>
		<form class="d-flex" role="search">
		<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-success" type="submit">Search</button>
		</form>
	</div>
	</div>
</nav>
</div>
