/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    var submit_reading_button = $('.submit_reading_button');
    submit_reading_button.click(function(){
        var customer_id = this.getAttribute('customer_id');
        var submit_reading_loading = $('#submit_reading_loading'+customer_id);
        var reading_input_amount = $('#input_reading'+customer_id).val();
        var reading_error_display = $('#reading_error_display'+customer_id);
        submit_reading_loading.show();
        
        $.ajax({
            type: "POST",
            url: window.base_url + "ReadingController/addReading",
            dataType: "json",
            data: {
                    customer_id : customer_id,
                    reading_amount : reading_input_amount
            },
            success: function(data){
                if (data.error == true) {
                    reading_error_display.show();
                    reading_error_display.text(data.message);
                    reading_error_display.fadeIn();
                    reading_error_display.fadeOut(4000, 'linear');
                } else {
                    console.log("Hellos");
                    var amount_row = $("#amount_row"+customer_id);
                    var date_row = $('#date_row'+customer_id);
                    var status_row = $('#status_row'+customer_id);
                    var row_form_table = $('#row_form_table'+customer_id);
                    var action_row = $('#action_row'+customer_id);
                    amount_row.text(data.reading_amount);
                    date_row.text(data.reading_date);
                    status_row.text('Unpaid');
                    row_form_table.hide();
                    action_row.html('<button class="btn btn-success btn-xs update_reading_amount_button" reading_id="'+data.reading_id+'" customer_id="'+customer_id+'" amount="'+reading_input_amount+'">Update</button>');
                }
                submit_reading_loading.hide();
                console.log(data);
            },
            error: function(error){
                    console.log(error);
            }
	});
    });
    
    
    
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
    var customer_id = 0
    
    success_display_text.hide();
    
//    $('#action_row7').on('click','button.update_reading_amount_button', function(){
//        alert();
//    });
    
    $(document).on('click', '.update_reading_amount_button', function(){
        var reading_amount = parseInt(this.getAttribute("amount"));
        reading_id  = this.getAttribute('reading_id');
        customer_id = this.getAttribute('customer_id');
        reading_amount_value.val(reading_amount.toFixed(2));
        update_reading_modal.modal('show');
        error_display.text('');
        success_display_text.hide();
    });
    
//    update_reading_amount_button.click(function(){
//        var reading_amount = this.getAttribute("amount");
//        reading_id  = this.getAttribute('reading_id');
//        customer_id = this.getAttribute('customer_id');
//        console.log(reading_amount);
//        console.log(reading_id);
//        reading_amount_value.val(reading_amount);
//        update_reading_modal.modal('show');
//        error_display.text('');
//        success_display_text.hide();
//    });
    
    update_reading_button.click(function(){
        loading_image.show();
        var amount_row = $("#amount_row"+customer_id);
        var amount = reading_amount_value.val();
        $.ajax({
            type: "POST",
            url: window.base_url + "ReadingController/editReading",
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
                    update_reading_amount_button.attr('amount', amount);
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
            url: window.base_url + "ReadingController/refreshData",
            dataType: "json",
            data: {
                    id : reading_id
            },
            success: function(data){
                console.log(data);
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
