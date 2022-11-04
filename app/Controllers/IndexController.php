<?php 

class IndexController extends AbstractController {


    //protected $model;
    
    protected function makeModel(): Model{
        //make a new model
        $this->model = new IndexModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
         
        return $this->model;
    }

    
    protected function makeView(): View{
        $this->view = new View();
        $this->view->registerTemplate(TEMPLATE_DIR . '/index.tpl.php');

        return $this->view;
    }

    
    public function start(){
        
        //make model
        $this->model = $this->makeModel();

        //make view 
        $this->view = $this->makeView();
        
        //for now 
        $arr = array(1,2,3,4);
        //get data 
        $courses = $this->model->find('courses',$arr);

        $instructors = $this->model->findAll('instructors',$arr);

        
        
        //data to be displayed
        $this->view->importVar('courses',$courses);
        $this->view->importVar('instructors',$instructors);

        //display everything
        $this->view->display();

    }
}