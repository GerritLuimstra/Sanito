<?php

namespace Sanito;
require "Rules.php";

class Validator
{
    use Rules;

    private function __construct()
    {
        // We only want to be using this class statically, Sorry! ;)
    }

    public static function validate($checks){
        $passed = true;
        foreach($checks as $check => $data){
            // Get the value to check against
            $value = isset($data[0]) ? $data[0] : NULL;
            $rulesString = isset($data[1]) ? $data[1] : NULL;

            // check against invalid input
            if(!$value || !$rulesString){
                $passed = false;
                break;
            }

            // Get the rules based on the rulestring
            $rules = self::getRules($rulesString);

            // Check if the given string matches the rules
            $valid = self::valid($value, $rules);

            // If not, set the passed to false and stop further checking
            if(!$valid) {
                $passed = false;
                break;
            }
        }

        return $passed;
    }

    /*
     * Extracts the rules from the given parameters
     */
    private static function getRules($s){
        return array_values(array_filter(explode('|', $s)));
    }

    /*
     * Returns true if a value matches all the given rules
     */
    private static function valid($value, $paramRules){
        $valid = true;
        foreach($paramRules as $rule){
            if(!self::checkRule($value, $rule)){
                $valid = false;
                break;
            }
        }
        return $valid;
    }

    /*
     * Returns if the value meets the rule
     */
    private static function checkRule($value, $rule){
        // Check if the rule has an associated method, if not: stop
        if(!method_exists(__NAMESPACE__ . '\Validator', $rule)) return false;

        // If the rule contains a dot, the next values will be parameters to the function
        if(strpos('x' . $rule, ':') !== false){
            // Extra parameters are found. Explode them to create an array of parameters
            $snippets = explode(':', $rule);
            // The first snippet will always be the rule. Extract this for later use
            $rule = $snippets[0];
            // A little hack, to combine the rule combined with the extra parameters as an array
            $params = array_merge(array($value), array_slice($snippets, 1));

            // Execute the parameters to the function belonging to the given rule
            return call_user_func_array(array(__NAMESPACE__ .'\Validator', $rule), $params);
        }

        // No extra parameters were found, execute the function as usual
        return self::$rule($value);
    }

}