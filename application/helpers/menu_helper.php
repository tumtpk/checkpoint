<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('active_link')) {
  function activate_menu($str) {
    // Getting CI class instance.
    $CI = get_instance();
    // Getting router class to active.
    $class = $CI->router->fetch_class();
    $method = $CI->router->method;
    $result = "";
    if($method == null || $method == "index"){
        if($class == $str){
            $result = " active";
        }
    }else{
        if($class."/".$method."/" == $str){
            $result = " active";
        }
    }
    return $result;
  }

  function textLenght($str, $number){
    // strip tags to avoid breaking any html
    $string = "";
    $string = strip_tags($str);  
    if (strlen($string) > $number) {

        // truncate string
        $stringCut = substr($string, 0, $number);
        $endPoint = strrpos($stringCut, ' ');

        //if the string doesn't contain any space then it will cut without word basis.
        $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
        $string .= '...';
    }
    return $string;
  }
}?>