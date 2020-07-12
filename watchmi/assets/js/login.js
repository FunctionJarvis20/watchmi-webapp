//  this file is to login the user 


$(document).ready(function(){

    // generate click event on button to get all login data from form
    $("#signin-btn").click(loginuser);

    // function to login the user
    function loginuser(){
        // getting data by id
        var username = $("#username").val();
        var password = $("#password").val();

        if(username == "" && password == ""){
            $("#error-message").html("Please Enter Your Credentials");
            setTimeout(() => {
                $("#error-message").html("");
            }, 5000);
        }else{
            $.post("../../includes/ajax/login.handler.php",{username: username, password: password},function(data){
                if(data == "done"){
                    window.location.replace("../../views/movies.php");
                }else{
                    $("#error-message").html(data);
                    setTimeout(() => {
                        $("#error-message").html("");
                    }, 5000);
                }
            }).done(function(){
                console.log("success");
            });
        }
    }

});