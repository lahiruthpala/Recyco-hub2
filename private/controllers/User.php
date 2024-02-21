<?php
class User extends Controller
{
	function verify(){
        header('Content-Type: application/json');
        if (password_verify($_POST['pwd'], Auth::getpwd())){
            echo "true";
        }else{
            echo "false";
        }
    }
}
