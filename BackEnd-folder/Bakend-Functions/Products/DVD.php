
<?php

class SizeProduct extends Product
{
    protected $size;
    
    public function setSize($size) {
        $this->size = $size;
    }
    
    public function getAttributes() {
        return 'Size: ' . $this->size . 'MB';
    }
}