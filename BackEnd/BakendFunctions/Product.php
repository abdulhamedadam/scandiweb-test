<?php
include 'databaseRelations.php';
 class Product extends QueryBuilder
{
    private $table_name = 'productstest';
    private  $column    ='id';

    protected $inputs;

    protected $sku;
    protected $name;
    protected $price;
    protected $type;
    protected $attr;
 

    function __construct()
    {
        parent::__construct($this->table_name,$this->column);
     
    }




    public function getArray(): array
    {
        return array($this->sku, $this->name, $this->price,$this->type,$this->attr);
    }




    public function save($sku,$name,$price,$type,$attr)
    {
        return $this->insert(array($sku, $name, $price,$type,$attr),array('sku','name','price','type','attribute'));
    }



    public function find(string $sku)
    {
        return $this->select(['*'])->whereColumn('sku', '=', $sku)->get();  
    }


    public function getID($id)
    {
        return $this->select(['*'])->whereColumn('id', '=', $id)->get(); 
    }




    public function getAll()
    {
        return $this->select(['*'])->get();
    }



    public function validateSKU($sku)
    {
        return (!preg_match('/\s/', $sku) && (strlen($sku) > 0));
    }



    public function isUniqueSKU($sku)
    {
    $product = $this->find($sku);

       if ($product) 
        {
           return false;
        }
           return true;
    }




    public function validateName($name)
    {
        return (strlen($name) > 0);
    }




    public function validatePrice($price)
    {
        
        return (filter_var($price,FILTER_VALIDATE_FLOAT) && (strlen($price) > 0) && floatval($price >= 0));
    }



    public function validateType($type)
    {
        return !(preg_match('/[0-2]/', $type) && (strlen($type) > 0));
    }




    public function getAttributes() {
        return '';
    }
    


    public function Massdelete($checkedIds)
    {
        return $this->delete('id', $checkedIds);
    }



    public function setSku($sku) {
        $this->sku = $sku;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function setPrice($price) {
        $this->price = $price;
    }
    public function setType($type) {
        $this->type = $type;
    }


  
     
      

      

};