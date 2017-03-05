
$(document).ready(function() {
    var submit_form =  $("#loginSubmit");
    var login_form = $("#loginForm")
    var email_error = $("#emailError");
    var password_error = $("#passwordError");
    var login_loading = $("#loginLoading");
    
    login_loading.hide();
    
    submit_form.click(function() {
        email_error.text("");
        password_error.text("");
        
        login_loading.show();
        $.ajax({
            type: "POST",
            url: window.base_url + "AuthController/loginExec",
            dataType: "json",
            data: login_form.serialize(),
            success: function(data){
                if (data.error == true) {
                    if (data.type == "required") {
                        email_error.text(data.message.email);
                        password_error.text(data.message.password);
                    } else if (data.type == "common") {
                        email_error.text(data.message);
                    } else {
                        console.log("[ERROR] : error type not set!"); 
                    }
                } else {
                    window.location.href = window.base_url + "DashboardController/index";
                }
                login_loading.hide();
            },
            error: function(error){
                    console.log(error);
            }
	});
    }); 
    
});