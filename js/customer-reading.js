/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    var update_reading_amount_button = $('.update_reading_amount_button');
    var update_reading_modal = $('#update_reading_modal');
    var reading_amount_value = $('.reading_amount_value');
    
    var update_reading_button = $('#update_reading_button');
    var refresh_reading_button = $('#refresh_reading_button');
    
    var error_display = $('.error_display');
    var success_display_text = $('#success_display_text');
    var success_text_content = $('.success_text_content');
    
    var loading_image = $('#loading_image_update_customer');
    var reading_id = 0;
    
    success_display_text.hide();
    
    update_reading_amount_button.click(function(){
        var reading_amount = this.getAttribute("amount");
        reading_id  = this.getAttribute('reading_id');
        reading_amount_value.val(reading_amount);
        update_reading_modal.modal('show');
        error_display.text('');
        success_display_text.hide();
    });
    
    update_reading_button.click(function(){
        loading_image.show();
        var amount_row = $("#row"+reading_id);
        var amount = reading_amount_value.val();
        $.ajax({
            type: "POST",
            url: "editReading",
            dataType: "json",
            data: {
                 id : reading_id,
                 amount : amount
            },
            success: function(data){
                if (data.error == true) {
                    if (data.common == true) 
                        error_display.text(data.message.amount);
                    else
                        error_display.text(data.message);
                } else {
                    success_display_text.show();
                    success_text_content.html('<strong>Successfully!</strong> update!');
                    amount_row.text(amount);
                    update_reading_modal.modal('hide');
                }
                loading_image.hide();
                console.log(data);
            },
            error: function(error){
                console.log(error);
            }
	});
    });
    
    refresh_reading_button.click(function(){
        success_display_text.hide();
        error_display.text('');
        loading_image.show();
        $.ajax({
            type: "POST",
            url: "refreshData",
            dataType: "json",
            data: {
                    id : reading_id
            },
            success: function(data){
                if (data.error == true) 
                    error_display.text(data.message);
                else 
                    reading_amount_value.val(data.amount.customer_reading_amount);
                    loading_image.hide();
            },
            error: function(error){
                    console.log(error);
            }
	});
    });
    
});
