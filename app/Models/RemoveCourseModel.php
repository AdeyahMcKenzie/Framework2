<?php 

class RemoveCourseModel extends Model implements DeleterInterface{

    public function del(array $tablename, array $ids){

        $query = "DELETE FROM ".$tablename[0]. 
        " WHERE course_id='". $ids['course_id']."' AND email ='".$ids['email']."'";
        echo "<br><br><br><br>";
        echo $query;
        $result = $this->sqli->query($query);

        return $result;
            
    }
   
}