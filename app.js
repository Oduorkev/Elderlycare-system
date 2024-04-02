
var staySignedFlag = localStorage.getItem("staySI");
var loginClick = document.getElementById("navLogin-btn");
loginClick.addEventListener("click",function(){
    if(staySignedFlag == "true"){
        //open profile page directly
        loginClick.setAttribute("href","index.php");
        window.location.replace("index.php");
    }
    else{
        //open login page
        loginClick.setAttribute("href","login.php");
        window.location.replace("login.php");
    }
});






        