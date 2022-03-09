<?php

namespace App\domain;

class Name 
{
    
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
      
    
    public static function create($name)
    {
       return self::captalize($name);
      
    }
    
    
    private static function captalize($value)
    {
       $name = strtolower($value);
       $explodedName = explode(' ', $name);
       $capitalized = array();
       
       foreach($explodedName as $word)
       {
           if(strlen($word)>2 && preg_match('/d[oa]s/', $word)<>1)
           {
               array_push($capitalized, ucfirst($word)) ; 
           } else
           {
             array_push($capitalized, $word) ; 
        
           }
       }
       
       return implode(" ",$capitalized);
    }
    
    
    public function __toString() {
        return $this->captalize($this->name);
    }
    
    
}
