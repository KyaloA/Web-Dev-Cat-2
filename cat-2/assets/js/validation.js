function validateForm(){

    let userName = document.getElementById("uname").value;
    let emailAddress = document.getElementById("emad").value;
    let phoneNumber = document.getElementById("pnum").value;
    let passWord = document.getElementById("pwd").value;
    let passCon = document.getElementById("pwdc").value;
    let gender = document.getElementById("gender").value;
    let userType = document.getElementById("ustype").value;
    let disaster = document.getElementById("disaster").value;


    if(userName == "" || emailAddress == "" || phoneNumber =="" || passWord == "" || passCon == "" || gender == "" || userType == "" || disaster == ""){
        alert("Fields should not be empty!!");
    }

    if(!userName.match(/^[A-Za-z]+$/)){
        result_1.innerHTML = "Warning! username should only  have alphabets";
        return false;
    }
        

    if(!phoneNumber.match(/^[0-9]+$/)){
        result_2.innerHTML = "Warning! Enter Numbers Only";
        return false;
    }
    if(!passWord.match(/^[A-Z]+$/) && !passWord.match(/^[0-9]+$/)){  
        result_3.innerHTML = "Warning! Password should contain numbers and Uppercase letters only";
        return false;
    }
    
    if(passWord !== passCon){
        result_4.innerHTML = "Warning! Passwords don't match";
        return false;
    }
    else{
        confirm("Welcome!! " + userName + " Successfully Registered as " + userType  );
    }

    return true;
}