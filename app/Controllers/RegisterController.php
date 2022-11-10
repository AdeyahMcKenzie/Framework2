<?php 

class RegisterController extends AbstractController {


    
    
    protected function makeModel(): Model{
        return $this->model;
    }

    
    protected function makeView(): View{
        $this->view = new View();
        $this->view->registerTemplate(TEMPLATE_DIR . '/signup.tpl.php');

        return $this->view;
    }

    
    public function start(){
        
        //make view 
        $this->view = $this->makeView();
        

        //display everything
        $this->view->display();

    }
}