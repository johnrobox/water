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
        var reading_input_amount = parseFloat($('#input_reading'+customer_id).val());
        var reading_error_display = $('#reading_error_display'+customer_id);
        
        submit_reading_loading.show();
        
        reading_input_amount = reading_input_amount.toFixed(2)
        
        if (isNaN(reading_input_amount) == true) {
            reading_error_display.show();
            reading_error_display.text("Field is required!");
            reading_error_display.fadeIn();
            reading_error_display.fadeOut(4000, 'linear');
            submit_reading_loading.hide();
            return;
        }
        
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
                    var amount_row = $("#amount_row"+customer_id);
                    var date_row = $('#date_row'+customer_id);
                    var status_row = $('#status_row'+customer_id);
                    var row_form_table = $('#row_form_table'+customer_id);
                    var action_row = $('#action_row'+customer_id);
                    var reading_cubic_row = $("#reading_cubic_row"+customer_id);
                    var reading_per_cubic_row = $("#reading_per_cubic_row"+customer_id);
                    reading_per_cubic_row.text(data.per_cubic);
                    reading_cubic_row.text(reading_input_amount);
                    amount_row.text(data.reading_amount);
                    date_row.text(data.reading_date);
                    status_row.text('Unpaid');
                    row_form_table.hide();
                    action_row.html('<button class="btn btn-success btn-xs update_reading_amount_button" id="update_button_ID'+customer_id+'" reading_id="'+data.reading_id+'" customer_id="'+customer_id+'" amount="'+data.reading_amount+'"><i class="glyphicon glyphicon-pencil"></i> Update</button>');
                }
                submit_reading_loading.hide();
                console.log(data);
            },
            error: function(error){
                    console.log(error);
            }
	});
    });
    
    
    var update_reading_modal = $('#update_reading_modal');
    var reading_amount_value = document.getElementById('reading_amount_value');
    var minimum_field_modal = document.getElementById("minimum_field_modal");
    var per_cubic_field_modal = document.getElementById("per_cubic_field_modal");
    
    var update_reading_button = $('#update_reading_button');
    var refresh_reading_button = $('#refresh_reading_button');
    
    var error_display = $('.error_display');
    var success_display_text = $('#success_display_text');
    var success_text_content = $('.success_text_content');
    
    var loading_image = $('#loading_image_update_customer');
    var reading_id = 0;
    var customer_id = 0;
    
    success_display_text.hide();

    $(document).on('click', '.update_reading_amount_button', function(){
        
        reading_id  = this.getAttribute('reading_id');
        customer_id = this.getAttribute('customer_id');
        
        update_reading_modal.modal('show');
        error_display.text('');
        success_display_text.hide();
        
        getReadingData(function(data){
            console.log(data);
            if (data.error == true)  {
                error_display.text(data.message);
            } else {
                var amount = data.data;
                var reading_amount = parseFloat(amount.customer_reading_cubic);
                reading_amount_value.value = reading_amount.toFixed(2);
                var minimum_amount = parseFloat(amount.customer_reading_minimum);
                minimum_field_modal.value = minimum_amount.toFixed(2);
                var per_cubic = parseFloat(amount.customer_reading_per_cubic);
                per_cubic_field_modal.value = per_cubic.toFixed(2);
            }
            loading_image.hide();
        }, reading_id);
        
    });
    
    
    update_reading_button.click(function(){
        loading_image.show();
        
        var amount_row = $("#amount_row"+customer_id);
        var reading_cubic_row = $("#reading_cubic_row"+customer_id);
        var reading_per_cubic_row = $("#reading_per_cubic_row"+customer_id);
        
        var cu_final = parseFloat(reading_amount_value.value).toFixed(2);
        var minimum_final = parseFloat(minimum_field_modal.value).toFixed(2);
        var per_cubic_final = parseFloat(per_cubic_field_modal.value).toFixed(2);
        
        $.ajax({
            type: "POST",
            url: window.base_url + "ReadingController/editReading",
            dataType: "json",
            data: {
                 id : reading_id,
                 cubic_used : cu_final,
                 minimum_amount : minimum_final,
                 per_cubic : per_cubic_final
            },
            success: function(data){
                console.log(data);
                if (data.error == true) {
                    if (data.common == true) 
                        error_display.text(data.message.amount);
                    else
                        error_display.text(data.message);
                } else {
                    success_display_text.show();
                    success_text_content.html('<strong>Successfully!</strong> update!');
                    
                    amount_row.text(data.customer_reading_amount);
                    reading_cubic_row.text(data.customer_reading_cubic);
                    reading_per_cubic_row.text(data.customer_reading_per_cubic);
                    
                    update_reading_modal.modal('hide');
                }
                loading_image.hide();
            },
            error: function(error){
                console.log(error);
            }
	});
    });
    
    // refresh fields in modal
    refresh_reading_button.click(function(){
        success_display_text.hide();
        error_display.text('');
        loading_image.show();
        getReadingData(function(data){
            console.log(data);
            if (data.error == true)  {
                error_display.text(data.message);
            } else {
                var amount = data.data;
                var reading_amount = parseFloat(amount.customer_reading_cubic);
                reading_amount_value.value = reading_amount.toFixed(2);
                var minimum_amount = parseFloat(amount.customer_reading_minimum);
                minimum_field_modal.value = minimum_amount.toFixed(2);
                var per_cubic = parseFloat(amount.customer_reading_per_cubic);
                per_cubic_field_modal.value = per_cubic.toFixed(2);
            }
            loading_image.hide();
        }, reading_id);
    });
    
});

function getReadingData(callback, id){
    $.ajax({
        type: "POST",
        url: window.base_url + "ReadingController/refreshData",
        dataType: "json",
        data: {
                id : id
        },
        success: function(data){
            callback(data);
        },
        error: function(error){
            console.log(error);
        }
    });
}
