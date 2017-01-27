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
    
    update_reading_amount_button.click(function(){
        var reading_amount = this.getAttribute("amount");
        var customer_id  = this.getAttribute('reading_id');
        reading_amount_value.val(reading_amount);
        update_reading_modal.modal('show');
    });
    
    update_reading_button.click(function(){
        
    })
    
});
