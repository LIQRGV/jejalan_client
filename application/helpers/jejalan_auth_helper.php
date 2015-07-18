<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    if ( ! function_exists('isUserLoggedIn()'))
    {
        function isUserLoggedIn()
        {
            //dummy
            $response = array();
            $response['userLoggedIn'] = false;
            return $response;
        }
    }