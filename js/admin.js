/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
    
    var change_pass_button = $("#change_password");
    var change_pass_modal = $("#change_password_modal");
    var loading_image = $("#loading_image");
    var submit_button = $('#submit_button');
    var update_pass_form = $("#update_password_form");
    
    var old_password_err = $('.old_password_err');
    var new_password_err = $('.new_password_err');
    var repeat_new_password_err = $('.repeat_new_password_err');
    var common_error_display = $('#common_error_display');
    var success_message = $('#success_message');
    var success_message_cont = $('#success_message_cont');
    
    success_message.hide();
    common_error_display.hide();
    
    change_pass_button.click(function(){
        update_pass_form.trigger('reset');;
        old_password_err.text('');
        new_password_err.text('');
        repeat_new_password_err.text('');
        change_pass_modal.modal('show');
        common_error_display.hide();
    });
    
    submit_button.click(function(){
        old_password_err.text('');
        new_password_err.text('');
        repeat_new_password_err.text('');
        common_error_display.text('');
        loading_image.show();
        common_error_display.hide();
        
        var data_string = update_pass_form.serialize();
        $.ajax({
            type: "POST",
            url: "changePassword",
            data: data_string,
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data.error == true) {
                    if (data.common == false) {
                        var message = data.messages;
                        for (var i in message) {
                            var text = message[i];
                            if (i == 'old_password') 
                                old_password_err.text(text);
                            if (i == 'new_password')
                                new_password_err.text(text);
                            if (i == 'repeat_new_password');
                                repeat_new_password_err.text(text);
                        }
                    } else {
                        common_error_display.text(data.messages);
                        common_error_display.show();
                    }
                } else {
                    success_message_cont.text("Password change successfully!");
                    success_message.show();
                    change_pass_modal.modal('hide');
                }                
                loading_image.hide();
                
            },
            error: function(error) {
                console.log(error);
            }
        });
        
    });
    
})