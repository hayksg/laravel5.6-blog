<?php
		
function sortNestedCategories($children) 
{
	if (count($children) > 0) {
		$orderedChildren = [];

		foreach ($children as $key => $child) {
			$orderedChildren[$child->category_order] = $child;
		}

		ksort ($orderedChildren);
		return $orderedChildren;
	}
	
	return false;
}