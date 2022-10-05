<?php
if (!class_exists('ACF')) {
	return false;

}
function get_all_modules()
{
	if (have_rows('Homepage')):
		while (have_rows('Homepage')) : the_row();
			$module = get_row_layout();

			include get_template_directory() . "/modules/$module/$module.php";
		endwhile;
	endif;
}
