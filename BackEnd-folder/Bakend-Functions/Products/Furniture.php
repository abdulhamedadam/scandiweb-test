<?php

class DimensionProduct extends Product
{
    protected $height;
    protected $width;
    protected $length;
    
    public function setHeight($height) {
        $this->height = $height;
    }
    
    public function setWidth($width) {
        $this->width = $width;
    }
    
    public function setLength($length) {
        $this->length = $length;
    }
    
    public function getAttributes() {
        return 'Dimension: ' . $this->height . 'x' . $this->width . 'x' . $this->length;
    }
}