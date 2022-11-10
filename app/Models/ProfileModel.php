<?php 

class ProfileModel extends Model implements ReaderInterface{

    public function find(string $tablename, array $ids): array{

       return[];
    }
    public function findAll(string $tablename, array $ids): array{
        
        $table = [];
        $query = "SELECT * FROM $tablename";
        $result = $this->sqli->query($query);

        while($record = $result -> fetch_assoc())
        {
            $table[] = $record;
        }

        //print_r($table);
        return $table;
    }
}