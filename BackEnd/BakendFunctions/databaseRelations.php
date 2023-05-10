<?php

include 'database.php';

abstract class QueryBuilder
{
    private $db;
    private $query = '';
    private $table_name;
    private $column;
    private $stmt;
    private $data = array();

    //constructor 
    function __construct($table_name,$column)
    {
        $this->db = (new Database)->get();
        $this->table_name = $table_name;
        $this->column = $column;
    }


    //select Array function
    public function select(array $columns)
    {
        $this->query = 'SELECT '.implode(',', $columns).' FROM '.$this->table_name;
        return $this;
    }




 

 
    //insert function
    public function insert(array $data,array $columns)
    
    {
    

        $this->data = array(); // Reset the data array
        $this->data = array_merge($this->data, $data);
    
        $columnNames = implode(',', $columns);
        $placeholders = implode(',', array_fill(0, count($columns), '?'));
    
        $this->query = 'INSERT INTO '.$this->table_name.' ('.$columnNames.') VALUES ('.$placeholders.')';
    
        return $this->bind($data);
    }


    //delete function
    public function delete(string $column, array $data)
    {
       
       // $ids = implode(',', $data);
       // $this->query = 'DELETE FROM '.$this->table_name.' '.' WHERE '.$column.' IN '.'( '.$ids.' )';
        $this->query = 'DELETE FROM '.$this->table_name;
        $this->where($column,' IN ',$data);
        return $this->bind();
    }
    

    //where function for multi select
    public function where(string $column, string $operator, array $value)
    {
        
    $placeholders = implode(',', array_fill(0, count($value), '?'));
    $this->query .= ' WHERE '.$column.' '.$operator.' ('.$placeholders.')';
    $this->data = array_merge($this->data, $value);

    return $this;
    }


    //bind function
    private function bind()
    {
        $this->stmt = $this->db->prepare($this->query);

        if($this->data != null)
        {
            $params = array();
            array_push($params, $this->getTypes());
            $params = array_merge($params, $this->data);
            foreach($params as $key => $value) $params[$key] = &$params[$key];

            call_user_func_array(array($this->stmt, 'bind_param'), $params);   
        }
        
        $this->data = array();
        $this->stmt->execute();
        return $this->stmt;
    }

    //get function

    public function get()
    {
        return mysqli_fetch_all($this->bind()->get_result(), MYSQLI_ASSOC);
    }

    //where function for column select
    public function whereColumn(string $column, string $operator, string $value)
    {

    $this->query .= ' WHERE '.$column.' '.$operator.' ?';
    $this->data[] = $value;

    return $this;

    }


    
    private function getTypes(): string
    {
        $types = '';

        foreach ($this->data as $key => $value) {
            $types .= $this->getDataType($value);
        }
        
        return $types;
    }

    private function getDataType($data)
    {
        switch(gettype($data))
        {
            case 'string': return 's';
            case 'double': return 'd';
            case 'integer': return 'i';

            default:
                return 's';
        }
    }

};
