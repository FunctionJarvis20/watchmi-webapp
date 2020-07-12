<?php 
    include_once("../../database/connection.php");
    //  function to create cookies for login
    function createCookieForUser($uid,$connection){
        $token = createHash();
        $serial = createHash();
        setcookie("uid","$uid",time() + 60*60*24*30,'/');
        setcookie("token","$token",time() + 60*60*24*30,'/');
        setcookie("serial","$serial",time() + 60*60*24*30,'/');

        // store cookies in database
        $store_cookie_query = "INSERT INTO `usersessions`(`sid`, `uid`, `stoken`, `sserial`, `screated at`) VALUES (null,$uid,'$token','$serial',null);";
        // store to the usersessions table 
        $result = mysqli_query($connection , $store_cookie_query);
        // returning the result if inserted or not
        return $result;
    }

    // create session variables for user
    function createSessionForUser($uid,$username){

        // start the new session here
        ob_start();
        session_start();
        // set session variables here
        $_SESSION['username'] = $username;
        $_SESSION['uid'] = $uid;
    }

    // function to create random hash string for token and serial
    function createHash(){
        // creating token or serial as per function call when needed
        $hash = md5(rand(10000,2000000));
        return $hash;
    }


?>