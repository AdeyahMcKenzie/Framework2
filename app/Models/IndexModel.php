<?php 

class IndexModel extends Model implements ReaderInterface{

    public function find(string $tablename, array $ids): array{

        //fields 
        $arr = array('course_recommendation_count','course_access_count');
        $courses = $this->findAll('courses',$arr);
        $courses_copy = $courses;

        //get popular courses column
        $popular_col = array_column($courses,$arr[1]);
        //get recommended courses column 
        $recommended_col = array_column($courses,$arr[0]);

        
        //sort by most popular 
        array_multisort($popular_col, SORT_DESC, $courses);
        //sort by most recommended
        array_multisort($recommended_col, SORT_DESC, $courses_copy);

        //filter out top 8 popular
        $popular = array_slice($courses, 0, 8);
        //filter out top 8 recommended 
        $recommended = array_slice($courses_copy, 0, 8);


       return ['popular'=>$popular, 'recommended'=>$recommended];
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