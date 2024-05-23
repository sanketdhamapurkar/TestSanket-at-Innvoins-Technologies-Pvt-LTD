<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('dd'))
{
    function dd($value)
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";  
        die();
        exit();
    }   
}
if (!function_exists('camel_case_str')) {
    function camel_case_str($var = '')
    {
      return ucwords(strtolower($var));
    }
  }
  
  if (!function_exists('camelCase')) {
    function camelCase($var = '')
    {
      return ucwords(strtolower($var));
    }
  }
  
  if (!function_exists('upperCase')) {
    function upperCase($var = '')
    {
      return strtoupper(strtolower($var));
    }
  }

