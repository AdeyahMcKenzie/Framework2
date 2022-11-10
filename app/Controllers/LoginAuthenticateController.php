<?php 

class LoginAuthenticateController extends AbstractController {


    
    
    protected function makeModel(): Model{
        //make a new model
        $this->model = new AuthenticateModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
         
        return $this->model;
    }

    
    protected function makeView(): View{
        $this->view = new View();
        $this->view->registerTemplate(TEMPLATE_DIR . '/login.tpl.php');

        return $this->view;
    }

    
    public function start(){
        
        //get user info from form
        if (isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
        }

        //make model
        $this->model = $this->makeModel();

        //make view 
        $this->view = $this->makeView();
        
        //read data into array 
        $user = array('email'=> $email, 'password'=>$password);

        //validate login information
        $validator = new ValidateClass();//create validate object

        //if method returns true 
        if($validator->areCredentialsValid($user)) {
            $auth = new Authenticate();//create authenticate object
            $sess_user = $this->model->find('users',$user);//get user record from db
                //split name into first and last
                $name = $sess_user['name'];
                $space = strrpos($name," ");
                $first = substr($name,0,(-$space));
                $last = substr($name,($space+1));
                //get date 
                $date = date("d/m/Y"). date("h:i:sa");

                //convert data into valid format for login function
                $passable = array('email'=>$sess_user['email'],'first'=>$first,'last'=>$last,'login'=>$date,4);

                //call login user function
                $auth->loginUser($passable);
        }
        else {
            //create error message
            $this->view->importVar('loginError','Sorry...these credentials are not valid. Please try again.');
            //redisplay login page with added errors
            $this->view->display();
            
        }

        


        

    }
}