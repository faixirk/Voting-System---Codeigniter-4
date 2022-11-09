<?php

namespace App\Libraries;

class Validation
{
    // Function returns hash password entered by the user
    public static function make($password)
    {

        return password_hash($password, PASSWORD_BCRYPT);
    }
   // Admin password check i.e., entered password matches database password
    
    public static function check($entered_password, $db_password)
    {
        if (password_verify($entered_password, $db_password)) {
            return true;
        } else {

            return false;
        }
    }
}
