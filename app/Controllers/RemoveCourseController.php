<?php 

class RemoveCourseController extends AbstractController {


    //protected $model;
    
    protected function makeModel(): Model{
        //make a new model
        $this->model = new RemoveCourseModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
         
        return $this->model;
    }

    
    protected function makeView(): View{
        $this->view = new View();
        $this->view->registerTemplate(TEMPLATE_DIR . '/profile.tpl.php');

        return $this->view;
    }

    
    public function start(){
        
        //make model
        $this->model = $this->makeModel();

        //make view 
        $this->view = $this->makeView();

        session_start();
        $email = $_SESSION['session_user']['email'];
        $course = $_POST['course'];

        echo $course;
        
        //for now 
        $arr = array('email'=>$email,'course_id'=>$course);
        //get data 
        $courses = $this->model->del(['user_courses',],$arr);

        if($courses){
            $success = "You have been successfully unenrolled";
            //data to be displayed
            $this->view->importVar('success',$success);
            
        }
        else {
            $fail = " There was some trouble removing you from this course...please try again later";
            $this->view->importVar('fail',$fail);
           
        }
        
        
        header("Location:profile.php");
        //display everything
        $this->view->display();

    }
}