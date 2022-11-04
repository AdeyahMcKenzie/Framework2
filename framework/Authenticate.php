<?php 

class Authenticate{
    
    public function loginUser(array $data){
        $validator = new ValidateClass();
        //ensure credentials are validated 
        if ($validator->areCredentialsValid($data)){
            //check session variable not already set
            if(!isset($_SESSION['session_user'])){
                //start session 
                session_start();

                //store data in session array 
                $user = array("email"=> $data['email'], "first"=>$data['fname'],"last"=>$data['lname'],"login"=>$data['login']);
 
                //create session array
                $_SESSION['session_user'] = $user;
            }else{
                echo "Sorry, only one user can have an active session !";
            }
            

        }else{
            echo "Sorry...These login credentials are not valid.";
        }
        
    }

    public function isUserLoggedIn() {
        //start a session
        session_start();

        //create instance of validate
        $validator = new ValidateClass();
        //check for session variable
        if(isset($_SESSION['session_user'])){
            //check for valid email
            $email = $_SESSION['session_user']['email'];

            if($email){
                if ($validator->isEmailValid($email)){
                    return true;
                }
            }
        }else {
            session_write_close();
            header("Location:index.php");
        }
        
    }

    public function logOutUser(){
        session_start();
         
        session_unset();
    
        session_destroy();
        
        header("Location:index.php");
    }
}