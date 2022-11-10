<?php 

class LoginController extends AbstractController {


    
    
    protected function makeModel(): Model{
        //make a new model
        $this->model = new IndexModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
         
        return $this->model;
    }

    
    protected function makeView(): View{
        $this->view = new View();
        $this->view->registerTemplate(TEMPLATE_DIR . '/login.tpl.php');

        return $this->view;
    }

    
    public function start(){
        
        //make view 
        $this->view = $this->makeView();
        

        //display everything
        $this->view->display();

    }
}