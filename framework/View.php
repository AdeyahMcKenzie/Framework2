<?php 

class View {

    //private members
    private $vars = [];
    private $template;


    /**
     * @param filename - name of the template file to be used
     * accepts the name of a file and assigns it to the template member
     */
    public function registerTemplate(string $filename){
        if(file_exists($filename)){//check that file exists
                
            $this->template = $filename;
            
        } else {
            //throw exception to warn that file doesn't exist
            throw new Exception ('VWF1:Sorry, the file ' . $filename . ' does not exist.'); 
        }
    }

    /**
     * @param name - the name of variable being passed to the business layer
     * @param value - the variable being passed to the business layer
     * passes a variable from the data store to the business layer
     */
    public function importVar($name,$value){
        $this -> vars[$name] = $value;
    }

    /**
     * @param variables - the variables to be passed to the business layer
     * passes multiple variables from the data store to the business layer
     */
    public function importVars(array $variables){
        if(empty($variables)){
            throw new \InvalidArgumentException('VWF3:Sorry, the array cannot be null.');
        }
    
        foreach ($variables as $name=>$value){
            $this -> vars[$name] = $value;
        } 
    }

    /**
     * displays the data from the selected template file
     */
    public function display(){
        $displayText = extract($this ->vars);
        require $this -> template;    
    }


}