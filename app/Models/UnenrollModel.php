<?php 

class UnenrollModel extends Model implements ReaderInterface{

    public function find(string $tablename, array $ids): array{

        $query = "SELECT * FROM $tablename WHERE ". $ids['field']." = '". 
        $ids['id']."'";
        //echo $query;
        $result = $this->sqli->query($query);

        if($result){
            //echo "a match has been found";
            $course = $result -> fetch_assoc();
            return $course;
        }else{
            return [];
        }
    

       //return $course;
    }

    public function findAll(string $tablename, array $ids): array{
        $table = [];
        $query = "SELECT * FROM $tablename WHERE email ='$ids[1]'";
        $result = $this->sqli->query($query);

        while($record = $result -> fetch_assoc())
        {
            array_push($table,$record);
            if($record['course_id'] == $ids[0]){
                return $record;
            }
            
        }

        //print_r($table);
        return $table;
    }

  
}