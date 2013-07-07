<?php

    ob_start();
    ini_set('display_errors', 'On');

    $db_string = 'mysql:host=localhost;dbname=eventimages';
    $db_username = 'eventimages';
    $db_password = '9994sussex';
    
    
        
    function get_random_string($length)
    {
        $valid_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        // start with an empty random string
        $random_string = "";
        
        // count the number of chars in the valid chars string so we know how many choices we have
        $num_valid_chars = strlen($valid_chars);
        
        // repeat the steps until we've created a string of the right length
        for ($i = 0; $i < $length; $i++)
        {
            // pick a random number from 1 up to the number of valid chars
            $random_pick = mt_rand(1, $num_valid_chars);
            
            // take the random character out of the string of valid chars
            // subtract 1 from $random_pick because strings are indexed starting at 0, and we started picking at 1
            $random_char = $valid_chars[$random_pick-1];
            
            // add the randomly-chosen char onto the end of our string so far
            $random_string .= $random_char;
        }
        
        // return our finished random string
        return $random_string;
    }
    
    function exitWithHttpError($error_code, $message = '')
    {
        switch ($error_code)
        {
            case 400: header("HTTP/1.0 400 Bad Request"); break;
            case 403: header("HTTP/1.0 403 Forbidden"); break;
            case 404: header("HTTP/1.0 404 Not Found"); break;
            case 500: header("HTTP/1.0 500 Server Error"); break;
        }

        header('Content-Type: text/plain');

        if ($message != '')
            header('X-Error-Description: ' . $message);

        exit;
    }
?>