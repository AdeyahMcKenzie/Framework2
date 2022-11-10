<?php 

class AuthenticateModel extends Model implements ReaderInterface{

    public function find(string $tablename, array $ids): array{

           
            $email = $ids['email'];
            
            $query = "SELECT * FROM $tablename WHERE email = '$email'";
            $result = $this->sqli->query($query);
            
            //if user exists return user record
            if($result){
                //echo "a match has been found";
                $record = $result -> fetch_assoc();
                return $record;
            }else{
                return [];
            }
            
    }
    public function findAll(string $tablename, array $ids): array{
        
        return [];
    }
}