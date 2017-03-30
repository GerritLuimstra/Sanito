<?php

namespace Sanito;

/*
 * Rules (validation checks) that can be used inside the Validator
 */
trait Rules {
    /*
     * Returns true if a given string is equal or smaller than the given max length
     */
    private static function maxLength($s, $length){
        return mb_strlen($s) <= $length;
    }

    /*
     * Returns true if a given string is not empty
     */
    private static function required($s){
        return !empty($s);
    }
}