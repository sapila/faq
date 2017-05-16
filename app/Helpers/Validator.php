<?php namespace App\Helpers;

/**
 * Created by PhpStorm.
 * User: nikosgkogktzilas
 * Date: 16/05/2017
 * Time: 00:21
 */

class Validator
{
    protected $errors = [];

    public function validate($rules, $data)
    {
        $isValid = true ;

        foreach ($rules as $key => $value) {
            //parse rules for every item
            $itemRules = explode("|",$value);

            foreach ($itemRules as $rule) {
                //execute for every parsed rule
                switch ($rule) {
                    case 'required':
                        if(empty($data[$key])){
                            $this->errors[] = "$key can not be empty";
                        }
                        break;
                    case preg_match('/^min/', $rule) ? true : false:
                        $rule_split = explode(":",$rule);

                        // Check if parameter is given to the rule
                        if (count($rule_split) > 1) {
                            // validate the actual rule using te parameter
                            if(strlen($data[$key]) < $rule_split[1]){
                                $this->errors[] = "$key must be at least 8 chars";
                            }

                        } else {
                            throw new \RuntimeException("No parameter given to rule : $rule");
                        }
                        break;
                    default:
                        throw new \RuntimeException('Invalid validation rule');
                }
            }
        }
    }

    /**
     * Return errors
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

}