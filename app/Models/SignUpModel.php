<?php 

class SignUpModel extends Model implements WriterInterface{

    public function add(array $tables, array $fields){

        //get values
        $name = $fields['name'];
        $email = $fields['email'];
        $password = $fields['password'];
        $table = $tables[0];//get tablename
        //run query
        $query = "INSERT INTO ".$table.
        " (name,email,password )".
        " VALUES ". 
        "('$name','$email','$password')";
        
        $result = $this->sqli->query($query);

        
        return $result;
           
            
    }
    
}