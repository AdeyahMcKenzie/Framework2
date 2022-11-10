<?php 

class LogoutController extends AbstractController {


    //protected $model;
    
    protected function makeModel(): Model{
        return $this->model;
    }

    
    protected function makeView(): View{
        $this->view = new View();
        $this->view->registerTemplate(TEMPLATE_DIR . '/courses.tpl.php');

        return $this->view;
    }

    
    public function start(){
        //make view 
        $this->view = $this->makeView();
        //create validator object 
        $auth = new Authenticate();

        $auth->logOutUser();

    }

    
}