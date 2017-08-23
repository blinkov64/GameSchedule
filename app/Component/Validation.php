<?php

namespace Schedule\Component;

use \Respect\Validation\Exceptions\NestedValidationException as Ex;

class Validation {
    
    private $err = [];
    public function validate(array $rules, $request)
    {
        foreach ($rules as $field => $rule)
        {
            try
            {
                $rule->assert($request->getParam($field));
            } catch (Ex $ex) {
                $this->err[$field] = preg_replace('/".*"/', '', $ex->getMessages()[0]);
            }
        }
        return $this->err;
    }
}
