<?php
    class Account
    {
    private $con;
    private $errorArray;
    //Public function can be accessed from both within the class and outside the class
    public function __construct($con)
    {
        $this -> errorArray = array();
        $this -> con = $con;
    }
    //Public function need to be called manually,and later it calls the private function that it contains in this case
    public function register($un,$fn,$ln,$e1,$e2,$pw1,$pw2)
    {
        //These function is private so this is how it is called/accessed inside the class
        $this -> validateUsername($un);
        $this -> validateFirstname($fn);
        $this -> validateLastname($ln);
        $this -> validateEmails($e1,$e2);
        $this -> validatePassword($pw1,$pw2);
        
        
        if(empty($this -> errorArray) == true)
        {
            //Insert into database
            return $this -> insertUserDetails($un,$fn,$ln,$e1,$pw1);
           
        }
        else
        {
            return false;
        }
    }
        
    public function getError($error)
    {
        if(!in_array($error,$this -> errorArray))
        {
            $error = "";
        }
        return "<span class='errorMessage'>{$error}</span>";
    }
    
    private function insertUserDetails($un,$fn,$ln,$e1,$pw1)
    {
        //md5() is effective in both database and webpages
        $encryptedpw = md5($pw1);
        $profilePic = "assets/img/profile-pics/profile_pic.jpg";
        $date = date("Y-m-d");
        
        $result = mysqli_query($this -> con,"INSERT INTO users VALUES('','$un','$fn','$ln','$e1','$encryptedpw','$date','$profilePic')");//Must have single quote on every parameter
        
        return $result;
    }
            
    //Private function can only be accessed within the class   
    private function validateUsername($un)
    {
        if(strlen($un) > 25 || strlen($un) < 5)
        {
            array_push($this -> errorArray, Constants::$usernameCharacter);
            // We don't want to continue with the registration since the error appears. So, we just return.
            //Return with no parameter means IT WILL BREAK OUT THE FUNCTIUON EXECUTED EARLY.
            return;
                
        }
        //TODO: Check if the username have already existed
    }

    private function validateFirstname($fn)
    {
        if(strlen($fn) > 25 || strlen($fn) < 2)
        {
            array_push($this -> errorArray, Constants::$firstnameCharacter);
            return;
                
        }
    }
    
    private function validateLastname($ln)
    {
        if(strlen($ln) > 25 || strlen($ln) < 2)
        {
            array_push($this -> errorArray, Constants::$lastnameCharacter);
            return;
                
        }
    }

    private function validateEmails($e1,$e2)
    {
        if($e1 != $e2)
        {
            array_push($this -> errorArray, Constants::$emailDoNoMatch);
            return;
        }
        
        //Check the format of the email whether it is right or not
        //We still need this validation though we have already chosen the type of the input to be email but this only ensure that we have the @ in the string but we can still put other words rather than .com after the @ sign
        //this filter validate help us to prevent this
        if(!filter_var($e1,FILTER_VALIDATE_EMAIL))
        {
            array_push($this -> errorArray, Constants::$emailInvalid);
            return;
        }
        //TODO : Check if the email has already been used or not
    }

    private function validatePassword($pw1,$pw2)
    {
        if($pw1 != $pw2)
        {
            array_push($this -> errorArray, Constants::$passwordsDoNoMatch);
            //So if both the password are not equal, it will return and BREAK OUT THE FUNCTION.
            return;
            
        }
        //If the password does not match the condition(the 1st parameter)which means ^ not in A-Z,a-z,0-9 which in other words, means that it might contain special character
        if(preg_match('/[^A-Za-z0-9]/',$pw1))
        {
            array_push($this -> errorArray, Constants::$passwordsNotAlphanumeric);
            return;
        }
        
        if(strlen($pw1) > 25 || strlen($pw1) < 5)
        {
            array_push($this -> errorArray, Constants::$passwordsCharacter);
            return;
                
        }
    }
    }
    
?>