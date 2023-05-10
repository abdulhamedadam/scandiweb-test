<?php

class WeightProduct extends Product
{
     
    protected $weight;
    
    public function setWeight($weight) {
        $this->weight = $weight;
    }
    
    public function getAttributes() {
        return 'Weight: ' . $this->weight . 'kg';
    }
 
}