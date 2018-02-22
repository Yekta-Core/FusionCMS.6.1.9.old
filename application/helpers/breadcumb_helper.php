<?php

/**
 * Create a breadcumb for headlines
 * Item A → Item B → Item C
 * @param Array $items
 * @return String
 */
function breadcumb($items)
{
	$CI = &get_instance();
	
	$data = array(
		"links" => $items,
		"url" => pageURL
	);

	return $CI->smartyengine->view($CI->template->view_path."breadcumb.tpl", $data, true);
}