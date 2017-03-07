

$(document).ready(function() {
    
    var update_cubic_modal = $("#updateCubicModal");
    var update_per_cubic_button_modal = $("#updatePerCubicButtonModal");
    var edit_per_cubic = $("#editPerCubic");
    var amount = "";
    var per_cubic_value = $("#perCubicValue");
    var update_cubic_error_display = $("#udpateCubicErrorDisplay");
    var cubic_value_container = $("#cubicValueContainer");
    var update_cubic_loading_image = $("#updateCubicLoadingImage");
    
    update_cubic_loading_image.hide();
    
    edit_per_cubic.click(function() {
        amount = this.getAttribute("value");
        update_cubic_modal.modal("show");
        per_cubic_value.val(amount);
    });
    
    // update cubic settings
    update_per_cubic_button_modal.click(function() {
        update_cubic_loading_image.show();
        update_cubic_error_display.text("");
        updateSystemValue(function(data){
            if (data.error === true) {
                update_cubic_error_display.text(data.message);
            } else {
                cubic_value_container.text(per_cubic_value.val());
                var the_button = document.getElementById("editPerCubic");
                the_button.setAttribute("value", per_cubic_value.val());
                update_cubic_modal.modal("hide");
            }
            update_cubic_loading_image.hide();
            console.log(data);
        }, 1,per_cubic_value.val());
    });
    
    var update_minimum_modal = $("#updateMinimumModal");
    var update_minimum_amount_button = $("#editMinimumAmountButton");
    var update_minimum_loading_image = $("#updateMinimumLoadingImage");
    var minimum_value_field = $("#minimumValueField");
    var update_minimum_button_modal = $("#updateMinimumButtonModal");
    var update_minimum_error_display = $("#udpateMinimumErrorDisplay");
    var minimum_amount_container = $("#minimumAmountContainer");
    var minimum_amount = "";
    
    update_minimum_loading_image.hide();
    
    update_minimum_amount_button.click(function() {
        minimum_amount = this.getAttribute("value");
        minimum_value_field.val(minimum_amount);
        update_minimum_modal.modal("show");
    });
    
    update_minimum_button_modal.click(function(){
        update_minimum_error_display.text("");
        update_minimum_loading_image.show();
        updateSystemValue(function(data){
            if (data.error === true) {
                update_minimum_error_display.text(data.message);
            } else {
                minimum_amount_container.text(minimum_value_field.val());
                
                //var the_button = document.getElementById("editPerCubic");
                document.getElementById("editMinimumAmountButton").setAttribute("value", minimum_value_field.val());
                update_minimum_modal.modal("hide");
            }
            update_minimum_loading_image.hide();
            console.log(data);
        }, 2,minimum_value_field.val());
    });
     
});

function updateSystemValue(callback, id, value){
    $.ajax({
        type: "POST",
        url: window.base_url + "SystemSettingsController/updateSetting",
        data: {
            id : id,
            value : value
        },
        dataType: "json",
        success: function(data) {
            callback(data);
        },
        error: function() {
        }
    });
}