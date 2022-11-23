<?php 

class EnrollModel extends Model implements WriterInterface{

    public function add(array $tables, array $fields){

        //get values
        $id = $fields[0];
        $email = $fields[1];
        $table = $tables[0];//get tablename
        //run query
        $query = "INSERT INTO ".$table.
        " (email,course_id )".
        " VALUES ". 
        "('$email','$id')";
        
        $result = $this->sqli->query($query);

        
        return $result;
           
            
    }
    
}