<?php

//Validate Date//
function validateDate(string $date, string $seperator){
    $test_arr  = explode($seperator, $date);
    $year = $test_arr[0];
    $month = $test_arr[1];
    $day = $test_arr[2];
    if (checkdate($month, $day, $year)) {
       return true;
    }
    return false;
}

/*Ensure that we have at least three out of four password criteria met. 
This would far more complicated to achieve using standard regular expressions
charecter one is not working*/
function validatePassword(string $password) {
    $count = 0;
 
    if( 8 <= strlen($password) && strlen($password) <= 32  )
    {
       if(preg_match("/^.*\\d.*$/", $password))
          $count ++;
       if(preg_match("/^.*[a-z].*$/", $password))
          $count ++;
       if(preg_match("/^.*[*.!@#$%^&(){}[]:;<>,.?~_-=|].*$/", $password))
          $count ++;
       if(preg_match("/^.*[A-Z].*$/", $password))
          $count ++;
    }

    if($count >= 3){
        return true;
    }
    else{
        return false;
    }
}

//Validate a username//
function validateUsername(string $username){
    if(!empty($username)){
        if(preg_match("/^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/", $username)){
            return true;
        }
    }
    return false;
}

//Validate plain Text//
function validatePlainText(string $plainText){
    if(!empty($plainText)){
        if(preg_match("/^[a-zA-Z ]*$/", $plainText)){
            return true;
        }
    }
    return false;
}

//Validate alphanumeric//
function validateAlphanumeric(string $alphanumeric){
    if(!empty($alphanumeric)){
        if(preg_match("/^[A-Za-z0-9]*$/", $alphanumeric)){
            return true;
        }
    }
    return false;
}

//Validate Email Address//
function validateEmail(string $email){
    if(!empty($email)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
    }
    return false;
}
?>