<?php  

	function escape($string) {
			return htmlentities($string, ENT_QUOTES, 'UTF-8');
		}

	function confcode($num1, $num2) {
			return rand($num1, $num2);
		}
		
	function url($location) {
		return header("Location: " . $location);
	}