<?php


wp_head();
// Start the session if not started
if (!session_id()) {
	session_start();
}

// Determine the menu type
$menu_location = 'default_menu';
$menu_text = 'Default';

if (isset($_SESSION['is_organic']) && true === $_SESSION['is_organic']) {
	$menu_location = 'organic_menu';
	$menu_text = 'Organic';
}
?>

<header class="site-header">
	<div class="header-container">
		<div class="header-left">
			<a class="site-logo" href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">
				<?php
				$header_logo = get_theme_mod('custom_logo');
				if ($header_logo) {
					echo wp_get_attachment_image($header_logo, 'full');
				} else {
					echo '<h1 class="site-title">' . esc_html(get_bloginfo('name')) . '</h1>';
				}
				?>
			</a>
			<p class="menu-type-text"><?php echo esc_html($menu_text); ?></p>
		</div>

		<nav class="header-right">
			<?php
			wp_nav_menu(array(
				'theme_location' => $menu_location,
				'container'      => false,
				'menu_class'     => 'main-menu',
			));
			?>
		</nav>
	</div>
</header>