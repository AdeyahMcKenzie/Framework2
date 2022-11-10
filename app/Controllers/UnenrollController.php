<?php 

class UnenrollController extends AbstractController {


    //protected $model;
    
    protected function makeModel(): Model{
        //make a new model
        $this->model = new UnenrollModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);

         
        return $this->model;
    }

    
    protected function makeView(): View{
        $this->view = new View();
        $this->view->registerTemplate(TEMPLATE_DIR . '/questionunenroll.tpl.php');

        return $this->view;
    }

    
    public function start(){
        
        

        //make view 
        $this->view = $this->makeView();
         //make view 
         $this->model = $this->makeModel();

         if (isset($_POST['course'])){
           
            $course_id = $_POST['course'];
         }
         session_start();
         if (isset($_SESSION['session_user']['email'])){
            $email = $_SESSION['session_user']['email'];
         }

         //Provide correct course
         $course = $this->model->findAll('user_courses',[$course_id,$email]);
         $courseInfo = $this->model->find('courses',['id'=>$course_id,'field'=>'course_id']);
         $instructor = $this->model->find('instructors',['id'=>$course_id,'field'=>'instructor_id']);

        

         $this->view->importVar('courseInfo',$courseInfo);
         $this->view->importVar('instructor',$instructor);
        
        //display everything
        $this->view->display();

    }
}