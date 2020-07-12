// this file is to make ajax request to the register handler to register the user

$(document).ready(function(){

    // adding click event listener on submit button
    $("#register-btn").click(registerUser);

    // function to register the user 
    function registerUser(){

        // getting form data
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var confirm_password = document.getElementById('confirm_password').value;
        var username_regex = /[!#$%^&*(),.?":;`~[\]/\\=+\-{}|<>]/g;
        var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var password_regex = /[a-z A-Z 0-9 !#$%^&*(),.?":;`~/\\=+\-{}|<>]/g;
        var errors=[];
        // checking if any field is empty or not?
        if(username == "" || email == "" || password == "" || confirm_password == ""){
            errors.push("Please Fill All The Fields");
        }
        // checking username must not exceed 15 characters limit
        if(username.length > 15){
            errors.push("Username must be 15 characters long");
        }
        // checking special characters in username
        if(username.match(username_regex)){
            errors.push("username must not contains any special characters")
        }
        // checking password is not less than 8 characters long
        if(password.length < 8 && confirm_password.length < 8){
            errors.push("Password must be 8 characters long"); 
        }
        // checking password with confirm password
        if(password != confirm_password){
            errors.push("Password Doesn't Match");
        }
        // checking for strong password
        if(!password.match(password_regex)){
            errors.push("Password should contains atleast 1 number 1 alphabet and 1 special symbol");
        }
        // checking email is correctly filled or not
        if(!email_regex.test(email)){
            errors.push("Invalid email id");
        }
        // checking if errors array is empty or not if not empty then display the errors or else ajax call to insert
        if(!errors.length == 0){
            var error = "";
            for (let i = 0; i < errors.length; i++) {
                error= error + errors[i]+"<br>";
            }
            $("#error-message").html(error);
            setTimeout(function(){
                $("#error-message").html("");
            }, 5000);
        }else{
            console.log(password);
            // calling ajax function to insert data in database
            $.post("../../includes/ajax/register.handler.php",
            {username: username , email: email , password: password},
            function(data){
                if(data == "thank you for Registering with us..please verified your email before sign-in"){
                    $(".form-container").html("<h3>"+data+"</h3>");
                }else{
                    $("#error-message").html(data);
                    setTimeout(function(){
                        $("#error-message").html("");
                    }, 5000);
                }
            }).done(function(){
                console.log("success");
            });
        }
    }
});



