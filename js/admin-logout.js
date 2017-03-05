/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    
    var logout = $("#logout");
    var admin_logout_modal = $("#adminLogoutModal");
    var loading_images = $("#loadingImageLogout");
    var confirm = $("#confirm");
    var logout_confirm_error = $("#logoutConfirmError");
    
    loading_images.hide();
    logout_confirm_error.hide();
    
    logout.click(function(){
        admin_logout_modal.modal("show");
    });
    
    confirm.click(function() {
        logout_confirm_error.hide();
        loading_images.show();
        $.ajax({
            type: "POST",
            url: window.base_url + "AuthController/logoutExec",
            dataType: "json",
            data: {
                type : "logout"
            },
            success: function(data){
                console.log(data);
                if (data.logout == false) {
                    logout_confirm_error.show();
                    logout_confirm_error.text("Cannot process request! Please refresh the page and try the action again!");
                } else {
                    window.location.href = window.base_url;
                }
                loading_images.hide();
            },
            error: function(error){
                    console.log(error);
            }
	});
    });
})

