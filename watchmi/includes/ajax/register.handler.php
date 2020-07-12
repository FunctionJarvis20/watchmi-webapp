<?php 
    // error_reporting(0);
    include_once("../../database/connection.php");

    if($connection){
        // getting all post data from ajax request
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $error = 0;
        // checking length of username 
        if(strlen($username)>15){
            echo "username must be less than 15 characters";
            $error++;
            die();
        }
        // validate email using php
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "oops, email is invalid";
            $error++;
            die();
        }
        // checking length of password
        if(strlen($password)<8){
            echo "password must be greater than 8 characters";
            $error++;
            die();
        }
        // check if error count
        if($error==0){
            // check already exists account
            checkExists($username,$email,$password,$connection);
        }else{
            die();
        }
   
    }else{
        // if connection is not establish with database
        echo "something went Wrong";
    }

    // function to check existence of user in database
    function checkExists($username,$email,$password,$connection){
        
        // query to get user details 
        $already_reg_check_query = "SELECT username,email FROM `registereduser` WHERE username='".$username."' OR email='".$email."';";
        $result = mysqli_query($connection, $already_reg_check_query);
        // if output is >0 then run 'if' otherwise insert in database
        if(mysqli_num_rows($result)>0){
            // if username or email is exists the store it in row variable
            $row = mysqli_fetch_assoc($result);
            // if username is matched from database then throw 'if' part or else email is matched from database then throw 'else' part
            if($row['username'] == $username){
                echo "username '".$row['username']."' already exists";
            }else if($row['email'] == $email){
                echo "email '".$row['email']."' already exists";
            }
        }else{
            // register the user
            registerUserWithInsert($username,$email,$password,$connection);
        }
    }

    // function to insert user details to the database
    function registerUserWithInsert($username,$email,$password,$connection){
        
        // get hashed password
        $password = generateHashedPassword($password);
        $verified = 1;
        // register query
        $register_user_query = "INSERT INTO `registereduser`(`id`, `username`, `email`, `password`, `verified`, `created at`) VALUES (null,'$username','$email','$password',0,null)";
        $result = mysqli_query($connection,$register_user_query);
        // checking result if inserted
        if($result){
            // $to = "shivam121820@gmail.com";
            // $subject = "Test mail";
            // $message = "Hello! This is a simple email message.";
            // $from = "shivam121820@gmail.com";
            // $headers = "From:" . $from;
            // mail($to,$subject,$message,$headers);
            echo "thank you for Registering with us..please verified your email before sign-in";
        }else{
            echo "something went wrong";
        }
    }

    // to generate hashed password
    function generateHashedPassword($password){
        $hashed_password = base64_encode(sha1($password));
        return $hashed_password;
    }

?>