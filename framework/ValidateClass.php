<?php 

class ValidateClass{

    /** @param user_info - an array of the current users login credentials to be validated.
     * Validates the credentials of the current user and returns true if they are valid
     * @return bool 
     */
    public function areCredentialsValid( array $user_info): bool {
        //validate name 
        if(!isNameValid($user_info['name'])){
            return false;
        }

        if(!isEmailValid($user_info['email'])){
            return false;
        }

        if(isPasswordValid($user_info['pass1'],true,$user_info['pass2'])){
            return false;
        }
        return true;
    }

    /** @param email - the email to be validated
     * Validates user email
     * @return bool 
     */
    public function isEmailValid( string $email): bool{
        //use built in filter var function to validate email
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return true;
        }

        return false;
    }

    /** @param password - the password to be validated
     *  @param retyped - validates whether the passwords match or not
     *  @param retyped_pass - retyped password
     * Validates user email
     * @return bool 
     */
    public function isPasswordValid(string $password, bool $retyped=false, string $retyped_pass = ''): bool{

        //check if two passwords match 
        if ($password == $retyped_pass && $retyped == true){
            //check length of string
            if (strlen($password)>8){
                return true;//return true if string valid
            }
        }
        return false;

    }

    /** @param name - the name to be validated  
     * Validates user's name
     * @return bool 
     */
    public function isNameValid(string $name): bool{
        //check that name is string 
        if (!ctype_alpha($name)){
            return false;
        }

        //find the seperator between names
        $space = strrpos($name," ");
                
        $fname = substr($name,0,(-$space));//single out first name
        //confirm lastname exists
        if(!($lname = substr($name,($space+1)))){
            return false;//if no lastname present return false
        }

        return true;
    }
}