<?php 
    // error_reporting(0);
    include_once("../../database/connection.php");
    include_once("../functions.php");

    if($connection){
        
        // getting user data from ajax post method
        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);

        // checking if it is null or not
        if($username == "" && $password == ""){
            echo "Please Enter Your Credentials";
        }else{
            // checking user credentials
            doCheckUser($username,$password,$connection);
        }
        
    }else{
        echo "something went wrong";
    }

    // function to check if user is registered with us or not
    function doCheckUser($username,$password,$connection){

        if(isset($_COOKIE['uid']) && isset($_COOKIE['PHPSESSID'])){
            
            echo "done";
        }else{
            $password = base64_encode(sha1($password));
            $login_query = "SELECT * FROM `registereduser` WHERE username = '".$username."' AND password = '".$password."';";
            $result = mysqli_query($connection,$login_query);
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);

                // delete the cookies token and serial from usersession table  and destroy session if already available
                $search_sessions_query = "SELECT * FROM `usersessions` WHERE uid = ".$row['id'].";";
                $result = mysqli_query($connection,$search_sessions_query);
                if(mysqli_num_rows($result) == 1){ 
                    $delete_user_cookie_query = "DELETE FROM `usersessions` where uid=".$row['id'].";";
                    $result = mysqli_query($connection,$delete_user_cookie_query);
                }else{
                
                    // create cookies and sessions if not already present in usersessions
                    $result = createCookieForUser($row['id'],$connection);
                    if($result){
                        createSessionForUser($row['id'],$row['username']);
                        echo "done";
                    }else{
                        echo "data not inserted";
                    }
                }
            }else{
                echo "not found please register with us";
            }
        }
    }
?>