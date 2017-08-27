<?php

namespace Schedule\Component;

use \Schedule\Controller\Controller;

class CreateModel extends Controller{
    
    public function create($modelClass, array $properties) {
        
        $modelClass = '\\Schedule\\Model\\'.$modelClass;
        $model = new $modelClass;
        if($properties)
        {
            foreach ($properties as $getName => $getValue)
            {
                $set = 'set'.$getName;
                if(method_exists($model, $set))
                {
                    $model->$set($getValue);
                }
            }
        }
        return $model;
    }
}