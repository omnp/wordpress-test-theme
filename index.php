<?php?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
        <meta charset="<?php bloginfo('charset');?>">
        <meta name="viewport" content="width=device-width">
        <title><?php wp_title(); ?></title>
        <?php wp_head(); ?>
</head>
<body>
        <div id="content" class="site-content">
		<?php
			$menu = 'primary';
			$locations = get_nav_menu_locations();
			if ($locations && isset ($locations[$menu])) {
				$menu_ref = wp_get_nav_menu_object($locations[$menu]);
				
				$menu_items = wp_get_nav_menu_items($menu_ref->term_id);
				
				$menu_dsp  = '<div id="menu-' . $menu . '-container">';
				$menu_dsp .= '<input type="checkbox" id="menu-' . $menu . '-checkbox">';
				$menu_dsp .= '<label for="menu-' . $menu . '-checkbox">&#x2630;</label>';
				$menu_dsp .= '<nav id="menu-' . $menu . '">';
				
				foreach ($menu_items as $key => $menu_item) {
					$title = $menu_item->title;
					
					$url = $menu_item->url;
					
					$class = ( $menu_item->object_id == get_queried_object_id() ) ? 'current-item ' : '';
					$class .= 'navigation-item';
					
					$menu_dsp .= '<a href="' . $url . '" class="' . $class . '">' . $title . '</a>';
				}
				$menu_dsp .= '</nav></div>';
				
				echo($menu_dsp);
			}
		?>
        <?php the_post();?>
        <h1><?php the_title();?></h1>
        <?php the_content();?>
        </div>
	<?php wp_footer(); ?>
</body>
</html>
