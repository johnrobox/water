/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
    
    var single_mark_as_paid_button = $('.single_mark_as_paid_button');
    var mark_as_paid_modal = $('#mark_as_paid_modal');
    
    var mark_as_paid_submit_button = $('#mark_as_paid_submit_button');
    
    var amount_to_pay = $('#amount_to_pay');
    var loading_image_billing_customer = $('#loading_image_billing_customer');
    var error_display = $('.error_display');
    
    var success_text_content = $('#success_text_content');
    success_text_content.hide();
    
    var reading_id = 0;
    var reading_amount = 0;
        
    single_mark_as_paid_button.click(function(){
        reading_id = this.getAttribute('reading_id');
        reading_amount = this.getAttribute('reading_amount');
        mark_as_paid_modal.modal('show');
        amount_to_pay.val(reading_amount);
    });
    
    mark_as_paid_submit_button.click(function() {
        error_display.text('');
        loading_image_billing_customer.show();
        $.ajax({
            type: "POST",
            url: window.base_url + "BillingController/payBilling",
            dataType: "json",
            data: {
               id : reading_id,
               amount : reading_amount
            },
            success: function(data){
                if (data.error == true) {
                    error_display.text(data.message);
                } else {
                    $('#status_td'+reading_id).text('Paid');
                    document.getElementById('status_td'+reading_id).style.background = 'green';
                    $('#paid_amount_td'+reading_id).text(reading_amount);
                    $('#paid_date_td'+reading_id).text(data.date);
                    $('#reading_button_id'+reading_id).hide();
                    $('#option_td'+reading_id).html('<small style="color: green"><i>No Action</i></small>');
                    mark_as_paid_modal.modal('hide');
                    success_text_content.html("<strong>Successfully!</strong> process the request!");
                    success_text_content.show();
                    success_text_content.fadeIn();
                    success_text_content.fadeOut(6000, 'linear');
                }
                loading_image_billing_customer.hide();
            },
            error: function(error){
                    console.log(error);
            }
	});
    });
    
})