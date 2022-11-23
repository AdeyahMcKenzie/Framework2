<?php 

class ProfileController extends AbstractController {


    
    
    protected function makeModel(): Model{
        //make a new model
        $this->model = new ProfileModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
         
        return $this->model;
    }

    
    protected function makeView(): View{
        $this->view = new View();
        $this->view->registerTemplate(TEMPLATE_DIR . '/profile.tpl.php');

        return $this->view;
    }

    
    public function start(){

        //create validator object
        $auth = new Authenticate();
        if($auth->isUserLoggedIn() == true){
            //make model
            $this->model = $this->makeModel();

            //make view 
            $this->view = $this->makeView();
        
            //for now 
            $arr = array(1,2,3,4);

            //get courses table 
            $courses = $this->model->findAll('courses',$arr);

            //get user courses table
            $user_courses = $this->model->findAll('user_courses',$arr);

        
        
            //print_r($courses);
            echo "<br>";
            //print_r($user_courses);
            //data to be displayed
            $this->view->importVar('courses',$courses);
            $this->view->importVar('user_courses',$user_courses);

            //display everything
            $this->view->display();

        }else {
            header("Location:login.php");
        }

    }
}