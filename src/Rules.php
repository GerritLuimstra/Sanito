<?php

namespace Sanito;

/*
 * Rules (validation checks) that can be used inside the Validator
 */
trait Rules {

    /*
     * TYPES
     */

    /*
     * Returns true if a given parameter is a string
     */
    public static function string($s){
        return is_string($s);
    }

    /*
    * Returns true if a given parameter is an integer
    */
    public static function int($s){
        return is_int($s);
    }

    /*
    * Returns true if a given parameter is a boolean
    */
    public static function boolean($s){
        return is_bool($s);
    }

    /*
     * Returns true if a given string is equal or smaller than the given max length
     */
    private static function maxLength($s, $length){
        return mb_strlen($s) <= $length;
    }

    /*
     * Returns true if a given string is higher or equal than the given min length
     */
    private static function minLength($s, $length){
        return mb_strlen($s) >= $length;
    }

    /*
     * Returns true if a given string is not empty
     */
    private static function required($s){
        return !empty($s);
    }

    /*
     * Returns true if a given string is an email
     */
    public static function email($s){
        return filter_var($s, FILTER_VALIDATE_EMAIL);
    }

}