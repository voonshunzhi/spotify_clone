$("document").ready(function(){
    $(".hideLogin").on("click",function(){
        $("#logInForm").hide();
        $("#registerForm").show();
    });
    $(".hideRegister").on("click",function(){
        $("#logInForm").show();
        $("#registerForm").hide();
    })
})