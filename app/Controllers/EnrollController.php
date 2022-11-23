<?php 

class EnrollController extends AbstractController {


    //protected $model;
    
    protected function makeModel(): Model{
        //make a new model
        $this->model = new EnrollModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);

         
        return $this->model;
    }

    
    protected function makeView(): View{
        $this->view = new View();
        $this->view->registerTemplate(TEMPLATE_DIR . '/profile.tpl.php');

        return $this->view;
    }

    
    public function start(){
        
        

        //make view 
        $this->view = $this->makeView();
         //make view 
         $this->model = $this->makeModel();

         if (isset($_POST['course'])){
           echo $_POST['course'];
            $course_id = $_POST['course'];
            
         }
         else{
            echo " the value for course does not exist";
         }
         session_start();
         if (isset($_SESSION['session_user']['email'])){
            $email = $_SESSION['session_user']['email'];
         }

         //add course
         $course = $this->model->add(['user_courses',''],[$course_id,$email]);
         

         if($course){
            $this->view->importVar('success','Your new course has been added...We hope you enjoy!');
            header("Location:profile.php");
           
         }
         else{
            $this->view->importVar('fail','There was an error...please try enrolling again.');
            header("Location:courses.php");
            
         }
        

         
          //display everything
          //$this->view->display();
        
        

    }
}