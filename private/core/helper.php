<?php

function get_var($key, $default = "")
{

	if (isset($_POST[$key])) {
		return $_POST[$key];
	}

	return $default;
}

//popup message
//message[] consists of message and the type of message
//$msg=['this is the message','success']
//$msg=['this is the message','danger']
function message($msg = ['', 'success'], $erase = false)
{
	if (!is_array($msg)) {
		$msg = [$msg, 'success'];
	}

	if (!empty($msg[0])) {
		if (!isset($_SESSION['message'])) {
			$_SESSION['message'] = [];
		}
		$_SESSION['message'][] = $msg;
	} else {
		if (!empty($_SESSION['message'])) {
			$msg = $_SESSION['message'];
			if ($erase) {
				unset($_SESSION['message']);
			}
			return $msg;
		}
	}
	return false;
}

function get_select($key, $value)
{
	if (isset($_POST[$key])) {
		if ($_POST[$key] == $value) {
			return "selected";
		}
	}

	return "";
}

function esc($var)
{
	return htmlspecialchars($var);
}

function random_string($length)
{
	$array = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
	$text = "";

	for ($x = 0; $x < $length; $x++) {

		$random = rand(0, 61);
		$text .= $array[$random];
	}

	return $text;
}

function get_time($time)
{

	return date("g:i a", strtotime($time));
}

function get_date($date)
{

	return date("jS M, Y", strtotime($date));
}

function generateID($id)
{
	$currentTime = time();
	$randomCode = random_string(4);
	$uniqueId = $id . $currentTime . $randomCode;

	return $uniqueId;
}

function show($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function statustoint($status)
{
    switch ($status) {
        case "New":
			return 0;
        case "In_Progress":
            return 0;
        case "Assigned":
			return 1;
        case "Collected":
            return 2;
        case "In_whorehouse":
            return 3;
        case "Sorting":
            return 4;
        case "Sorted":
            return 5;
        case "Ready To Sell":
            return 6;
        case "Sold":
            return 7;
        default:
            // Handle unknown status
            return -1;
    }
}

