<?php

function get_percent($num_amount, $num_total) {
	$count1 = $num_amount / $num_total;
	$count2 = $count1 * 100;
	$count = number_format($count2, 0);
	return round($count,0,PHP_ROUND_HALF_UP);
}