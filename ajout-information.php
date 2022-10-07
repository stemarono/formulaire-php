<?php
 $filter= array (
    "firstname" => array('filter'=> FILTER_SANITIZE_STRING),
    "lastname"=>array('filter'=>  FILTER_SANITIZE_STRING),
    "mail"=> array('filter'=>FILTER_VALIDATE_EMAIL,FILTER_SANITIZE_EMAIL,
                    'flag'=> FILTER_FLAG_EMAIL_UNICODE ),
    "password"=>array('filter'=> FILTER_SANITIZE_ENCODED, FILTER_SANITIZE_STRING),
   );
    $_POST = filter_input_array( INPUT_POST, $filter);

    $firstname = $_POST['firstname']?? '';
    $lastname = $_POST['lastname']?? '';
    $mail = $_POST['mail']?? '';
    $password = $_POST['password']?? '';

    if(!$firstname){
        $error['firstname'] = ERROR_NOFIRSTNAME;
    };
    if(!$lastname){
        $error['lastname'] = ERROR_NOLASTNAME;
    };
    if(!$mail){
        $error['mail'] = ERROR_SEIZURE_MAIL;
    };

    if(!$password){
        $error['password'] = ERROR_PASSWORD;
    } elseif(mb_strlen($password) < 10){
            $error['password'] = ERROR_TOO_SHORT_PASSWORD;
        }


        if(empty(array_filter($error,fn($e)=> $e !== ''))){
            $information=[...$information, [
              'firstname'=> $firstname,
              'lastname'=> $lastname,
              'mail'=> $mail,
              'password'=>$password,
              'register'=>false,
              'id'=> time(),
            ]];
            file_put_contents($filename,json_encode($information));
              $firstname ='';
              $lastname = '';
              $mail='';
              $password='';
             
              // $secure_pass = password_hash($password,PASSWORD_DEFAULT );
             
         };