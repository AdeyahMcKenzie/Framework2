<?php 

class SignUpValidationController extends AbstractController {


    
    
    protected function makeModel(): Model{
        //make a new model
        $this->model = new SignUpModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
         
        return $this->model;
    }

    
    protected function makeView(): View{
        $this->view = new View();
        $this->view->registerTemplate(TEMPLATE_DIR . '/signup.tpl.php');

        return $this->view;
    }

    
    public function start(){
        
        //make view
        $this->view=$this->makeView();
        //make model
        $this->model = $this->makeModel();

        //get form data if it isset 
        //if(isset($_POST))
        if (isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if (isset($_POST['password'])){
            $password = $_POST['password'];
        }
        if(isset($_POST['password2']))
        {
            $password2 = $_POST['password2'];
        }
        if (isset($_POST['name']))
        {
            $name = $_POST['name'];
            $space = strrpos($name," ");
            
            $fname = substr($name,0,(-$space));
            $lname = substr($name,($space+1));
        }

        //create validation objects
        $validator = new ValidateClass();
        //validate name
        if(!$validator->isNameValid($name)){
            echo "This name is not valid!";
            $nameErr = "This name is inavlid. Please use only alphabetic characters.";
            echo $nameErr;
            $this->view->importVar('nameErr',$nameErr);

        }
        //validate email
        if(!$validator->isEmailValid($email)){
            $emailErr = "Sorry, this email is not valid.";
            $this->view->importVar('emailErr',$emailErr);

        }
        //validate passwords
        if(!$validator->isPasswordValid($password,$retyped = true,$password2)){
            $passErr = "This password is invalid or passwords do not match. Please ensure the password is 8 characters long, contains at least one uppercase letter, one lowercase letter and a number<br>";
            echo "<br>".$password."<br>".$password2;
            $this->view->importVar('passErr',$passErr);

        }

        //if none of the above isset add new user 
        if(!isset($passErr) && !isset($nameErr) && !isset($emailErr)){
            //store user data in array
            $user = array('name'=>$name,'email'=>$email,'password'=>password_hash($password,PASSWORD_DEFAULT));
            
            
            //pass user data to add function 
            if($this->model->add(['users'],$user)){
                //redirect to login with success message
                $success = "SignUp successful. Please login below !";
                    $this->view->importVar('success',$success);
                    $this->view->importVar('email',$email);//send email to login page to facilitate easier login

                    //redirect to login page with success message
                    $this->view->registerTemplate(TEMPLATE_DIR . '/login.tpl.php');
                    
            }else {
                
                $registerErr = "There seems to be an issue getting you signed up. Please try again later.";
                $this->view->importVar('registerErr',$registerErr);
            }

        }else{
                echo " The problem is here";
        }

        //if any of the errors isset set template to signup page again
        /*if(isset($passErr) || isset($nameErr) || isset($emailErr) || isset($registerErr)){
            //set view
        }*/
        

        //display everything
        $this->view->display();

    }
}