function regValidation(){
    
    if(document.myForm.fname.value == ""){
        alert("Please provide your name");
        document.myForm.fname.focus();
        return false;
    }
    if(document.myForm.last_name.value == ""){
        alert("Please provide your name");
        document.myForm.last_name.focus();
        return false;
    }
    if(document.myForm.user_name.value == ""){
        alert("Please provide your name");
        document.myForm.user_name.focus();
        return false;
    }
    if(document.myForm.user_email.value == ""){
        alert("Please provide your name");
        document.myForm.user_email.focus();
        return false;
    }
    if(document.myForm.address.value == ""){
        alert("Please provide your name");
        document.myForm.address.focus();
        return false;
    }
    if(document.myForm.phonenum.value == ""){
        alert("Please provide your name");
        document.myForm.phonenum.focus();
        return false;
    }
    if(document.myForm.password.value == ""){
        alert("Please provide your name");
        document.myForm.password.focus();
        return false;
    }
    if(document.myForm.cpassword.value == ""){
        alert("Please provide your name");
        document.myForm.cpassword.focus();
        return false;
    }
    
}


function validate(){
    
    if(document.myForm.user_name.value == ""){
        alert("Please provide your name");
        document.myForm.user_name.focus();
        return false;
    }
    if(document.myForm.password.value == ""){
        alert("Please provide password");
        document.myForm.password.focus();
        return false;
    }
    return (true);
    
}