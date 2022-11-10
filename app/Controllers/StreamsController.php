<?php 

class StreamsController extends AbstractController {


    //protected $model;
    
    protected function makeModel(): Model{
        //make a new model
        $this->model = new StreamsModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
         
        return $this->model;
    }

    
    protected function makeView(): View{
        $this->view = new View();
        $this->view->registerTemplate(TEMPLATE_DIR . '/streams.tpl.php');

        return $this->view;
    }

    
    public function start(){

        $auth = new Authenticate();
        if($auth->isUserLoggedIn() == true){
        
        //make model
        $this->model = $this->makeModel();

        //make view 
        $this->view = $this->makeView();
        
        //for now 
        $arr = array(1,2,3,4);
        //get data 
        $streams = $this->model->findAll('streams',$arr);

        //print_r($streams);

        $instructors = $this->model->findAll('instructors',$arr);

        //print_r($instructors);

        $stream_instructors = $this->model->findAll('stream_instructor',$arr);

        //print_r($stream_instructors);
        
        //data to be displayed
        $this->view->importVar('streams',$streams);
        $this->view->importVar('instructors',$instructors);
        $this->view->importVar('stream_instructors',$stream_instructors);

        //display everything
        $this->view->display();
        }

    }
}