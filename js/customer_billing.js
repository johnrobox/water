/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    var mark_as_paid_button = $('.mark_as_paid_button');
    
    var mark_as_paid_modal = $('#mark_as_paid_modal');
    var mark_as_unpaid_modal = $('#mark_as_unpaid_modal');
    
    var amount_to_pay = $('#amount_to_pay');
    
    var mark_as_paid_submit_button = $('#mark_as_paid_submit_button');
    var mark_as_unpaid_submit_button = $('#mark_as_unpaid_submit_button');
    
    var loading_image_billing_customer = $('#loading_image_billing_customer');
    var loading_image_unpaid_billing_customer = $('#loading_image_unpaid_billing_customer');
    
    var error_display = $('.error_display');
    var success_display_text = $('#success_display_text');
    var success_text_content = $('.success_text_content');
    
    var reading_id = 0;
    var reading_amount = 0;
    var reading_status = 0;
    
    success_display_text.hide();
    
    mark_as_paid_button.click(function() {
        success_display_text.hide();
        reading_id = this.getAttribute('reading_id');
        reading_amount = this.getAttribute('reading_amount');
        reading_status = this.getAttribute('status');
        if (reading_status == 0) {
            amount_to_pay.val(reading_amount);
            mark_as_paid_modal.modal('show');
        } else {
            mark_as_unpaid_modal.modal('show');
        }
        error_display.text('');
    });
    
    mark_as_unpaid_submit_button.click(function(){
        var mark_button_id = $('#mark_as_paid_button'+reading_id);
        error_display.text('');
        loading_image_unpaid_billing_customer.show();
        $.ajax({
            type: "POST",
            url: window.base_url + "BillingController/unPayBilling",
            dataType: "json",
            data: {
               id : reading_id
            },
            success: function(data){
                if (data.error == true) {
                    error_display.text(data.message);
                } else {
                    $('#status_td'+reading_id).text('Unpaid');
                    $('#date_td'+reading_id).text("");
                    mark_button_id.addClass('btn-primary');
                    mark_button_id.removeClass('btn-warning');
                    mark_button_id.text('Mark as Paid');
                    mark_button_id.attr("status", 0);
                    success_display_text.show();
                    success_text_content.html("<strong>Successfully!</strong> process the request!");
                    loading_image_unpaid_billing_customer.hide();
                    mark_as_unpaid_modal.modal('hide');
                }
            },
            error: function(error){
                    console.log(error);
            }
	});
    })
    
    mark_as_paid_submit_button.click(function() {
        var mark_button_id = $('#mark_as_paid_button'+reading_id);
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
                    $('#date_td'+reading_id).text(data.date);
                    mark_button_id.addClass('btn-warning');
                    mark_button_id.removeClass('btn-primary');
                    mark_button_id.text('Mark as Unpaid');
                    mark_button_id.attr("status", 1);
                    success_display_text.show();
                    success_text_content.html("<strong>Successfully!</strong> process the request!");
                    loading_image_billing_customer.hide();
                    mark_as_paid_modal.modal('hide');
                }
            },
            error: function(error){
                    console.log(error);
            }
	});
    });
    
});